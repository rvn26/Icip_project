<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{

   protected $bulan;

    public function __construct($bulan)
    {
        $this->bulan = $bulan;
    }

    public function view(): View
    {
        $order = Order::whereMonth('created_at', $this->bulan)
                      ->orderBy('id', 'ASC')
                      ->get();

        return view('admin.exel', compact('order'));
    }
    public function viewLaporan(): View
    {
        $order = Order::whereMonth('created_at', $this->bulan)
                      ->orderBy('id', 'ASC')
                      ->get();
 $totalAmount = Order::where('status', 'terkirim')->sum('total');
        $order = Order::orderBy('created_at', 'DESC')->paginate(5);
        $topSoldItems = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->take(5)
            ->get();
        $totalSold = OrderItem::whereHas('order', function ($query) {
            $query->where('status', 'terkirim'); // atau sesuai status sukses
        })->sum('quantity');
        $totalCustomers = User::whereHas('order')->count();

        // Data per bulan untuk grafik
        $pendapatanbulanan = Order::where('status', 'terkirim')->selectRaw('MONTH(created_at) as month, SUM(total) as total_sales')
            ->groupBy('month')
            ->pluck('total_sales', 'month')
            ->toArray();

        $pesananbulanan = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total_orders')
            ->groupBy('month')
            ->pluck('total_orders', 'month')
            ->toArray();

        $barangterjualbulanan = OrderItem::selectRaw('MONTH(created_at) as month, SUM(quantity) as total_quantity')
            ->groupBy('month')
            ->pluck('total_quantity', 'month')
            ->toArray();

        // Lengkapi agar semua bulan 1–12 ada (pakai 0 kalau tidak ada data)
        $datagrafik = [
            'pendapatan' => array_map('floatval', array_replace(array_fill(1, 12, 0), $pendapatanbulanan)),
            'pesanan' => array_map('intval', array_replace(array_fill(1, 12, 0), $pesananbulanan)),
            'items' => array_map('intval', array_replace(array_fill(1, 12, 0), $barangterjualbulanan)),
        ];

        return view('admin.laporanExel', compact('order', 'totalAmount', 'topSoldItems', 'totalSold', 'totalCustomers', 'datagrafik'));
    }
}
