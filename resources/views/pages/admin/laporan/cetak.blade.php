<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi - Cetak</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
    table tr td,
    table tr th {
        font-size: 9pt;
    }
</style>
<center>
    <h5 style="margin-top: 10px;">Laporan Transaksi Penjualan</h5>
    <p>Peridoe Laporan : ({{ $start }} sd {{ $end }})</p>
</center>

<table class='table table-bordered'>
    <thead>
    <tr>
        <th>No</th>
        <th>No Transaksi</th>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>No resi</th>
        <th>Biaya Barang</th>
        <th>Ongkir</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
        @php $total = 0;$no=0; @endphp
        @forelse ($transaction as $row)
            <tr>
                <th>@php $no += 1 @endphp {{$no}}</th>
                <th>{{$row->code}}</th>
                <th>{{$row->created_at}}</th>
                <th>{{$row->name}}</th>
                <th>{{$row->resi}}</th>
                <th>{{$row->total_price}}</th>
                <th>{{$row->total_ongkir}}</th>
                <th>{{$row->total_all}}</th>

        @php $total += $row->total_all @endphp
         @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data</td>
            </tr>
        @endforelse
  
    <tr>
        <th colspan="7">Total</th>
       <th>Rp {{ number_format($total) }}</th>
    </tr>
    </tbody>
</table>
</body>
</html>