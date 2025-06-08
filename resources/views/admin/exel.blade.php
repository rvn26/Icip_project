<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="20" align="center">No Order</th>
                    <th width="20" align="center">Nama</th>
                    <th width="20" align="center">Nomer</th>

                    <th width="20" align="center" >Total</th>

                    <th width="20"  align="center" >Status</th>
                    <th width="20" align="center" >Tanggal Pesan</th>
                    <th width="20" align="center" class="text-center">Total Item</th>
                    <th width="20" align="center" class="text-center">Dikirim pada</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($order as $orders)
                    <tr>
                        <td align="center">{{ $orders->id }}</td>
                        <td align="center">{{ $orders->nama }}</td>
                        <td align="center">{{ $orders->nomer }}</td>
                        <td align="center">{{ 'Rp' . number_format($orders->total, 0, ',', '.') }}</td>
                        <td align="center">
                            @if($orders->status == "terkirim")
                                <span class="badge bg-success">Terkirim</span>
                            @elseif($orders->status == "dibatalkan")
                                <span class="badge bg-danger">Dibatalkan</span>
                            @else
                                <span class="badge bg-warning">Dipesan</span>
                            @endif
                        </td>
                        <td align="center">{{ $orders->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}
                        </td>
                        <td align="center">{{ $orders->orderItems->count()}}</td>
                        <td>{{ $orders->tanggal_dikirim }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </table>
</body>

</html>