<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index(Request $request) {
        $year = now()->year;
        $listBulan = config('application.months');
        $listPemasukan = Pemasukan::select(DB::raw('sum(jumlah) as jumlah'), DB::raw('month(tanggal) as bulan'))
            ->whereYear('tanggal', $year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();
        $dataYPemasukan = [];
        for ($i = 1; $i <= count($listBulan); $i++) {
            $dataYPemasukan[] = $listPemasukan->where('bulan', $i)?->first()?->jumlah ?? 0;
        }

        $listPengeluaran = Pengeluaran::select(DB::raw('sum(jumlah) as jumlah'), DB::raw('month(tanggal) as bulan'))
            ->whereYear('tanggal', $year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();
        $dataYPengeluaran = [];
        for ($i = 1; $i <= count($listBulan); $i++) {
            $dataYPengeluaran[] = $listPengeluaran->where('bulan', $i)?->first()?->jumlah ?? 0;
        }

        $pemasukanTotal = Pemasukan::sum('jumlah');
        $pengeluaranTotal = Pengeluaran::sum('jumlah');
        $saldoTotal = $pemasukanTotal - $pengeluaranTotal;
        return view('welcome', compact('year', 'listBulan', 'dataYPemasukan', 'dataYPengeluaran', 'pemasukanTotal', 'pengeluaranTotal', 'saldoTotal'));
    }
}
