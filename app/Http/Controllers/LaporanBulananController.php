<?php

namespace App\Http\Controllers;

use App\LaporanBulanan;

use App\Exports\LaporanBulananExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pengeluaran;
use App\Models\Pemasukan;
use App\Models\KategoriPemasukan;
use App\Models\Departemen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanBulananController extends Controller
{
    public function index(Request $request)
    {
        $departemen = $request['departemen'];
        $bulan = $request['bulan'] ?? now()->month;
        $tahun = $request['tahun'] ?? now()->year;

        $pemasukanbulansebelumnya = Pemasukan::query()
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->where('tanggal', '<', Carbon::createFromDate($tahun, $bulan, 1))
            ->sum('jumlah');
        $pengeluaranbulansebelumnya = Pengeluaran::query()
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->where('tanggal', '<', Carbon::createFromDate($tahun, $bulan, 1))
            ->sum('jumlah');
        $saldobulansebelumnya = $pemasukanbulansebelumnya - $pengeluaranbulansebelumnya;

        $pemasukan = Pemasukan::query()
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->when($bulan, function ($query, $bulan) {
                $query->whereMonth('tanggal', $bulan);
            })
            ->when($tahun, function ($query, $tahun) {
                $query->whereYear('tanggal', $tahun);
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        $pengeluaran = Pengeluaran::query()
                ->when($departemen, function ($query, $departemen) {
                    $query->where('departemen_id', $departemen);
                })
                ->when($bulan, function ($query, $bulan) {
                    $query->whereMonth('tanggal', $bulan);
                })
                ->when($tahun, function ($query, $tahun) {
                    $query->whereYear('tanggal', $tahun);
                })
                ->orderBy('tanggal', 'desc')
                ->get();

        $jumlahpemasukan = $pemasukan->sum('jumlah');
        $jumlahpengeluaran = $pengeluaran->sum('jumlah');
        $saldoakhir = $saldobulansebelumnya + $jumlahpemasukan - $jumlahpengeluaran;
        $listdepartemen = Departemen::where('status', 'Aktif')->get();
        $listbulan = config('application.months');
        $listtahun = Pengeluaran::selectRaw("YEAR(tanggal) as year")->orderBy('tanggal', 'desc')->groupBy('year')->pluck('year');

        return view('jamaah.laporanbulanan', compact(['pemasukan', 'pengeluaran', 'saldobulansebelumnya', 'listdepartemen', 'listbulan', 'listtahun', 'jumlahpemasukan', 'jumlahpengeluaran', 'saldoakhir']));
    }

    public function export_excel(Request $request)
	{
		return Excel::download(new LaporanBulananExport, 'laporanbulanan.xlsx');
	}
}
