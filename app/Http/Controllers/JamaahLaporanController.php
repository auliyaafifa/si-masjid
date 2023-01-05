<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\Departemen;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class JamaahLaporanController extends Controller
{
    public function index (Request $request) {
        $departemen = $request['departemen'];
        $tahun = $request['tahun'] ?? now()->year;
        $pemasukantahunsebelumnya = Pemasukan::query()
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->whereYear('tanggal', '<', $tahun)
            ->sum('jumlah');
        $pengeluarantahunsebelumnya = Pengeluaran::query()
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->whereYear('tanggal', '<', $tahun)
            ->sum('jumlah');
        $saldotahunsebelumnya = $pemasukantahunsebelumnya - $pengeluarantahunsebelumnya;
        $pemasukanperbulan = Pemasukan::query()
            ->select(
                DB::raw('sum(jumlah) as total'),
                DB::raw('year(tanggal) as year'),
                DB::raw('month(tanggal) as month')
            )
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->whereYear('tanggal', $tahun)
            ->groupBy('year', 'month')
            ->get();
        $pengeluaranperbulan = Pengeluaran::query()
            ->select(
                DB::raw('sum(jumlah) as total'),
                DB::raw('year(tanggal) as year'),
                DB::raw('month(tanggal) as month')
            )
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->whereYear('tanggal', $tahun)
            ->groupBy('year', 'month')
            ->get();
        $laporan = [];
        $totalpemasukan = 0;
        $totalpengeluaran = 0;
        $saldo = $saldotahunsebelumnya;
        for ($i = 1; $i <= 12; $i++) {
            $pemasukan = $pemasukanperbulan->where('month', $i)->first();
            $pengeluaran = $pengeluaranperbulan->where('month', $i)->first();
            $laporan[] = [
                'tahun' => $tahun,
                'bulan' => $i,
                'pemasukan' => $pemasukan?->total ?? 0,
                'pengeluaran' => $pengeluaran->total ?? 0,
                'saldo' => $saldo + ($pemasukan?->total ?? 0) - ($pengeluaran->total ?? 0)
            ];
            $saldo = $saldo + ($pemasukan?->total ?? 0) - ($pengeluaran->total ?? 0);
            $totalpemasukan = $totalpemasukan + $pemasukan?->total ?? 0;
            $totalpengeluaran = $totalpengeluaran + $pengeluaran?->total ?? 0;
        }
        $totalsaldo = $saldotahunsebelumnya + $totalpemasukan - $totalpengeluaran; 
        $listbulan = config('application.months');
        $listdepartemen = Departemen::where('status', 'Aktif')->get();
        $listtahunpemasukan = Pemasukan::selectRaw("YEAR(tanggal) as year")->orderBy('tanggal', 'desc')->groupBy('year')->pluck('year')->toArray();
        $listtahunpengeluaran = Pemasukan::selectRaw("YEAR(tanggal) as year")->orderBy('tanggal', 'desc')->groupBy('year')->pluck('year')->toArray();
        $listtahun = array_merge($listtahunpemasukan, $listtahunpengeluaran);
        $listtahun = array_unique($listtahun);
        return view('jamaah.laporan',compact(['laporan', 'listbulan', 'totalpemasukan', 'totalpengeluaran', 'totalsaldo', 'listtahun', 'listdepartemen', 'saldotahunsebelumnya']));
    }

    public function export_excel(Request $request)
	{
		return Excel::download(new LaporanExport, 'laporan.xlsx');
	}

    public function export_pdf(Request $request)
    {
    	$request = request()->all();
        $departemen = $request['departemen'];
        $tahun = $request['tahun'] ?? now()->year;
        $pemasukantahunsebelumnya = Pemasukan::query()
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->whereYear('tanggal', '<', $tahun)
            ->sum('jumlah');
        $pengeluarantahunsebelumnya = Pengeluaran::query()
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->whereYear('tanggal', '<', $tahun)
            ->sum('jumlah');
        $saldotahunsebelumnya = $pemasukantahunsebelumnya - $pengeluarantahunsebelumnya;
        $pemasukanperbulan = Pemasukan::query()
            ->select(
                DB::raw('sum(jumlah) as total'),
                DB::raw('year(tanggal) as year'),
                DB::raw('month(tanggal) as month')
            )
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->whereYear('tanggal', $tahun)
            ->groupBy('year', 'month')
            ->get();
        $pengeluaranperbulan = Pengeluaran::query()
            ->select(
                DB::raw('sum(jumlah) as total'),
                DB::raw('year(tanggal) as year'),
                DB::raw('month(tanggal) as month')
            )
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->whereYear('tanggal', $tahun)
            ->groupBy('year', 'month')
            ->get();
        $laporan = [];
        $totalpemasukan = 0;
        $totalpengeluaran = 0;
        $saldo = $saldotahunsebelumnya;
        for ($i = 1; $i <= 12; $i++) {
            $pemasukan = $pemasukanperbulan->where('month', $i)->first();
            $pengeluaran = $pengeluaranperbulan->where('month', $i)->first();
            $laporan[] = [
                'tahun' => $tahun,
                'bulan' => $i,
                'pemasukan' => $pemasukan?->total ?? 0,
                'pengeluaran' => $pengeluaran->total ?? 0,
                'saldo' => $saldo + ($pemasukan?->total ?? 0) - ($pengeluaran->total ?? 0)
            ];
            $saldo = $saldo + ($pemasukan?->total ?? 0) - ($pengeluaran->total ?? 0);
            $totalpemasukan = $totalpemasukan + $pemasukan?->total ?? 0;
            $totalpengeluaran = $totalpengeluaran + $pengeluaran?->total ?? 0;
        }
        $totalsaldo = $saldotahunsebelumnya + $totalpemasukan - $totalpengeluaran; 
        $listbulan = config('application.months');
        $listdepartemen = Departemen::where('status', 'Aktif')->get();
        $listtahunpemasukan = Pemasukan::selectRaw("YEAR(tanggal) as year")->orderBy('tanggal', 'desc')->groupBy('year')->pluck('year')->toArray();
        $listtahunpengeluaran = Pemasukan::selectRaw("YEAR(tanggal) as year")->orderBy('tanggal', 'desc')->groupBy('year')->pluck('year')->toArray();
        $listtahun = array_merge($listtahunpemasukan, $listtahunpengeluaran);
        $listtahun = array_unique($listtahun);
 
    	$pdf = PDF::loadview('export.laporan_pdf', compact(['tahun', 'laporan', 'listbulan', 'totalpemasukan', 'totalpengeluaran', 'totalsaldo', 'listtahun', 'listdepartemen', 'saldotahunsebelumnya']));
    	return $pdf->download('laporan.pdf');
    }
}
