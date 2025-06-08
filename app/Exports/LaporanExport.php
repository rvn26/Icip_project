<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{

    protected $bulan;
    protected $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function view(): View
    {   
        $bulan = $this->bulan;
        // Filter semua berdasarkan bulan yang dipilih
        $order = Order::whereMonth('created_at', $this->bulan)->whereYear('created_at', $this->tahun)
            ->where('status', 'terkirim')
            ->orderBy('id', 'ASC')
            ->get();

        $totalOrders = Order::where('status', 'terkirim')
            ->whereMonth('created_at', $this->bulan)->whereYear('created_at', $this->tahun)
            ->count();

        $totalAmount = Order::whereMonth('created_at', $this->bulan)->whereYear('created_at', $this->tahun)
            ->where('status', 'terkirim')
            ->sum('total');

        $topSoldItems = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->whereMonth('created_at', $this->bulan)->whereYear('created_at', $this->tahun)
            ->whereHas('order', function ($query) {
                $query->where('status', 'terkirim');
            })
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->take(5)
            ->get();

        $totalSold = OrderItem::whereMonth('created_at', $this->bulan)->whereYear('created_at', $this->tahun)
            ->whereHas('order', function ($query) {
                $query->where('status', 'terkirim');
            })
            ->sum('quantity');

        $totalCustomers = User::whereHas('order', function ($query) {
            $query->whereMonth('created_at', $this->bulan)->whereYear('created_at', $this->tahun)
                ->where('status', 'terkirim');
        })->count();

        return view('admin.laporanExel', compact(
            'order',
            'totalAmount',
            'topSoldItems',
            'totalSold',
            'totalCustomers','totalOrders','bulan'
        ));
    }
}
