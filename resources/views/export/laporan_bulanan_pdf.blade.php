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
    <h2 class="text-center">Laporan Keuangan Bulanan</h2>
    <p class="text-center">Takmir Masjid Baitul Amin Tahun {{$tahun}}</p>
    <p>Saldo sebelumnya: {{ format_currency($saldobulansebelumnya) }}</p>
    <h3>Pemasukan</h3>
    <table class="table table-bordered" style="table-layout: fixed;">
        <tr>
            <th>Tanggal</th>
            <th>Departemen</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
        </tr>
        @forelse($pemasukan as $pm)
        <tr>
            <td>{{$pm->tanggal}}</td>
            <td>{{$pm->departemen->nama_departemen}}</td>
            <td>{{$pm->kategori_pemasukan->nama_k_pemasukan}}</td>
            <td>{{$pm->deskripsi}}</td>
            <td>{{format_currency($pm->jumlah)}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No Data</td>
        </tr>
        @endforelse
        <tr>
            <td colspan="4">Total</td>
            <td>{{format_currency($jumlahpemasukan)}}</td>
        </tr>
    </table>
    <h3>Pengeluaran</h3>
    <table class="table table-bordered" style="table-layout: fixed;">
        <tr>
            <th>Tanggal</th>
            <th>Departemen</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
        </tr>
        @forelse($pengeluaran as $pk)
        <tr>
            <td>{{$pk->tanggal}}</td>
            <td>{{$pk->departemen->nama_departemen}}</td>
            <td>{{$pk->kategori_pengeluaran->nama_k_pengeluaran}}</td>
            <td>{{$pk->deskripsi}}</td>
            <td>{{format_currency($pk->jumlah)}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No Data</td>
        </tr>
        @endforelse
        <tr>
            <td colspan="4">Total</td>
            <td>{{format_currency($jumlahpengeluaran)}}</td>
        </tr>
    </table>
    <p>Saldo akhir: {{ format_currency($saldoakhir) }}</p>

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