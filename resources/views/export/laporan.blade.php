<table>
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