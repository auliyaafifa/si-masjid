<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masjid Baitul Amin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
<table>
    <tr>
        <td>Laporanan Keuangan Tahunan</td>
    </tr>
    <tr>
        <td>Takmir Masjid Baitul Amin Tahun</td>
    </tr>
    <tr>
        <td>Saldo sebelumnya</td>
        <td>{{ $saldotahunsebelumnya }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <th>Bulan</th>
        <th class="text-end">Pemasukan</th>
        <th class="text-end">Pengeluaran</th>
        <th class="text-end">Saldo</th>
    </tr>
    @foreach($laporan as $l)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$listbulan[$l['bulan'] - 1]}}</td>
        <td class="text-end">{{$l['pemasukan']}}</td>
        <td class="text-end">{{$l['pengeluaran']}}</td>
        <td class="text-end">{{$l['saldo']}}</td>
    </tr>
    @endforeach
    <tr class="fw-bold">
        <td colspan="2">Total</td>
        <td class="text-end">{{ format_currency($totalpemasukan) }}</td>
        <td class="text-end">{{ format_currency($totalpengeluaran) }}</td>
        <td class="text-end">{{ format_currency($totalsaldo) }}</td>
    </tr>
</table>
<table class="text-left">
    <tr>
        <td class="text-center">Mengetahui,</td>
    </tr>
    <tr>
        <td style="height: 16rem;"></td>
    </tr>
    <tr>
        <td class="text-center">Ketua Takmir</td>
    </tr>
</table>

</body>

</html>