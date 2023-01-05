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
        <td>Laporanan Keuangan Bulanan</td>
    </tr>
    <tr>
        <td>Takmir Masjid Baitul Amin Tahun</td>
    </tr>
    <tr>
        <td>Saldo sebelumnya</td>
        <td>{{ $saldobulansebelumnya }}</td>
    </tr>
    <tr>
        <th colspan="5">Pemasukan</th>
        <th colspan="5">Pengeluaran</th>
    </tr>
    <tr>
        <th>Tanggal</th>
        <th>Departemen</th>
        <th>Kategori</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Tanggal</th>
        <th>Departemen</th>
        <th>Kategori</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
    </tr>
    @php
        $count = max(count($pemasukan), count($pengeluaran));
    @endphp
    @if ($count === 0)
        <tr>
            <td colspan="10">Tidak ada data</td>    
        </tr>                    
    @endif
    @for ($i = 0; $i < $count; $i++)
        <tr>
            <td>{{isset($pemasukan[$i]) ? $pemasukan[$i]->tanggal : ''}}</td>
            <td>{{isset($pemasukan[$i]) ? $pemasukan[$i]->departemen->nama_departemen : ''}}</td>
            <td>{{isset($pemasukan[$i]) ? $pemasukan[$i]->kategori_pemasukan->nama_k_pemasukan : ''}}</td>
            <td>{{isset($pemasukan[$i]) ? $pemasukan[$i]->deskripsi : ''}}</td>
            <td>{{isset($pemasukan[$i]) ? $pemasukan[$i]->jumlah : ''}}</td>
            <td>{{isset($pengeluaran[$i]) ? $pengeluaran[$i]->tanggal : ''}}</td>
            <td>{{isset($pengeluaran[$i]) ? $pengeluaran[$i]->departemen->nama_departemen : ''}}</td>
            <td>{{isset($pengeluaran[$i]) ? $pengeluaran[$i]->kategori_pengeluaran->nama_k_pengeluaran : ''}}</td>
            <td>{{isset($pengeluaran[$i]) ? $pengeluaran[$i]->deskripsi : ''}}</td>
            <td>{{isset($pengeluaran[$i]) ? $pengeluaran[$i]->jumlah : ''}}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="4">Jumlah</td>
        <td>{{ $jumlahpemasukan }}</td>
        <td colspan="4">Jumlah</td>
        <td>{{ $jumlahpengeluaran }}</td>
    </tr>
    <tr>
        <td>Saldo akhir</td>
        <td>{{ $saldoakhir }}</td>
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