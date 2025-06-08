<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan Bulan {{ $bulan }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            font-size: 14px;
        } */

        thead {
            background-color: #f2f2f2;
        }

        .summary {
            margin-top: 30px;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* penting agar border saling menempel */
            margin-top: 15px;
            border: 1px solid #333;
            /* tambahkan ini agar border luar tabel muncul */
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="6" style="text-align: center; font-size: 18px; font-weight: bold;"> Laporan Penjualan - Bulan {{ $bulan }} </th>
            </tr>
            <tr>
                <th colspan="6" style="text-align: center; font-size: 14px; font-weight: bold;" >Total Pendapatan: Rp {{ number_format($totalAmount, 0, ',', '.') }}</th>
            </tr>
            <tr>
                <th colspan="6" style="text-align: center; font-size: 14px; font-weight: bold;" >Total Pesanan: {{ $totalOrders }} pesanan</th>
            </tr>
            <tr>
                <th colspan="6" style="text-align: center; font-size: 14px; font-weight: bold;" >Total Barang Terjual: {{ $totalSold }} pcs</th>
            </tr>
            <tr>
                <th colspan="6" style="text-align: center; font-size: 14px; font-weight: bold;" >Total Customer Aktif: {{ $totalCustomers }} orang</th>
            </tr>
        </thead>
    </table>

    <table style=" width: 100%; border-collapse: collapse; margin-top: 15px; border: 1px solid #333; margin: 0 auto; width: 80%;">
        <thead>
            <tr>
                <th colspan="6" style="text-align: center; font-size: 14px; font-weight: bold; " > Top Produk Terjual </th>
            </tr>
            <tr>
                <th colspan="2" style="border: 1px solid #333; padding: 8px;" width="20" align="center">No</th>
                <th colspan="2" style="border: 1px solid #333; padding: 8px;" width="20" align="center">Nama Produk</th>
                <th colspan="2" style="border: 1px solid #333; padding: 8px;" width="20" align="center">Total Terjual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topSoldItems as $index => $item)
                <tr>
                    <td colspan="2" style="border: 1px solid #333; padding: 8px;" width="20" align="center">{{ $index + 1 }}</td>
                    <td colspan="2" style="border: 1px solid #333; padding: 8px;" width="20" align="center">
                        {{ $item->product->nama ?? '-' }}</td>
                    <td colspan="2" style="border: 1px solid #333; padding: 8px;" width="20" align="center">{{ $item->total_sold }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table style=" width: 100%; border-collapse: collapse; margin-top: 15px; border: 1px solid #333;">
        <thead>
             <tr>
                <th colspan="6" style="text-align: center; font-size: 14px; font-weight: bold;" >Daftar Pesanan </th>
            </tr>
            <tr>
                <th style="border: 1px solid #333; padding: 8px;" width="20" align="center">No</th>
                <th style="border: 1px solid #333; padding: 8px;" width="20" align="center">ID Order</th>
                <th style="border: 1px solid #333; padding: 8px;" width="20" align="center">Customer</th>
                <th style="border: 1px solid #333; padding: 8px;" width="20" align="center">Total</th>
                <th style="border: 1px solid #333; padding: 8px;" width="20" align="center">Status</th>
                <th style="border: 1px solid #333; padding: 8px;" width="20" align="center">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $index => $o)
                <tr>
                    <td style="border: 1px solid #333; padding: 8px;" width="20" align="center">{{ $index + 1 }}</td>
                    <td style="border: 1px solid #333; padding: 8px;" width="20" align="center">{{ $o->id }}</td>
                    <td style="border: 1px solid #333; padding: 8px;" width="20" align="center">
                        {{ $o->user->name ?? 'Guest' }}</td>
                    <td style="border: 1px solid #333; padding: 8px;" width="20" align="center">Rp
                        {{ number_format($o->total, 0, ',', '.') }}</td>
                    <td style="border: 1px solid #333; padding: 8px;" width="20" align="center">{{ ucfirst($o->status) }}
                    </td>
                    <td style="border: 1px solid #333; padding: 8px;" width="20" align="center">
                        {{ $o->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>