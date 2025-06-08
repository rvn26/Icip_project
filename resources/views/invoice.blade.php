<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Invoice</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            background-color: #fff;
            padding: 0;
            margin: 0;
            color: #333;
        }

        .container {
            width: 650px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
            border: 1px solid #ccc;
        }

        .header-table {
            width: 100%;
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .header-table td {
            vertical-align: top;
        }

        .logo {
            width: 100px;
        }

        .company-info {
            font-size: 12px;
            line-height: 1.5;
        }

        .invoice-title {
            font-size: 20px;
            font-weight: bold;
            text-align: right;
        }

        .invoice-meta {
            font-size: 12px;
            text-align: right;
        }

        .bill-to {
            margin-bottom: 20px;
        }

        .bill-to h3 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 6px;
        }

        .table th {
            background-color: #f0f0f0;
        }

        .text-right {
            text-align: right;
        }

        .total {
            margin-top: 20px;
            font-size: 14px;
            text-align: right;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="header-table">
            <tr>
                <td width="60%">
                    <img src="{{ public_path('images/logo/Logo_Icip.png') }}" class="logo" alt="Logo">
                    <div class="company-info">
                        <h2>Icip-Icip</h2>
                        Perum Jl. Wirasana Indah, RT.03/RW.06, Wirasana, Purbalingga<br>
                        Jawa Tengah 53318<br>
                        Phone: +6288220132902<br>
                        Email: contact@awesomecompany.com
                    </div>
                </td>
                <td width="40%">
                    <div class="invoice-title">INVOICE</div>
                    <div class="invoice-meta">
                        <p>Invoice #: <strong>INV-{{ $order->created_at->format('Ymd') }}{{ $order->id }}</strong></p>
                        <p>Date: <strong>{{ $order->created_at->format('d-m-Y') }}</strong></p>
                    </div>
                </td>
            </tr>
        </table>

        <div class="bill-to">
            <h3>Pesanan oleh :</h3>
            <p><strong>{{ $order->user->name }}</strong></p>
            <p>{{ $order->alamat }}</p>
            <p>{{ $order->kota }}, {{ $order->provinsi }}</p>
            <p>Nomee: {{ $order->nomer }}</p>
            <p>Email: {{ $order->user->email }}</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th class="text-right">Banyak</th>
                    <th class="text-right">Harga</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->nama }}</td>
                        <td class="text-right">{{ $item->quantity }}</td>
                        <td class="text-right">{{ 'Rp' . number_format($item->harga, 2, ',', '.') }}</td>
                        <td class="text-right">{{ 'Rp' . number_format($item->harga * $item->quantity, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            Total: {{ 'Rp' . number_format($order->total, 2, ',', '.') }}
        </div>

        <div class="footer">
            <p>Terimakasih telah membeli</p>
            <p>Hubungi +6288220132902 atau contact@awesomecompany.com</p>
        </div>
    </div>
</body>

</html>
