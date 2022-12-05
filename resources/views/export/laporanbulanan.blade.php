<table>
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