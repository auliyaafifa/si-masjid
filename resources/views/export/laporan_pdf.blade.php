<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center">Laporan Keuangan Tahunan</h2>
    <p class="text-center">Takmir Masjid Baitul Amin Tahun {{$tahun}}</p>
    <p>Saldo sebelumnya: {{ format_currency($saldotahunsebelumnya) }}</p>
    <table class="table table-bordered">
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

    <table>
    <p style="text-align:left; ">Nganjuk, ........ </p>
    <p class="text-end">Mengetahui,</p>
    <tr>
        <td style="height: 2rem;"></td>
    </tr>
    <p class="text-end">Ketua Takmir</p>
    </table>
</body>

</html>