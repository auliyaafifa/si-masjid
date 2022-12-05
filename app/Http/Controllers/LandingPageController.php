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

        $dataYPemasukanPerDepartemen = Pemasukan::select('departemen_id', DB::raw('sum(jumlah) as jumlah'))
            ->with('departemen')
            ->whereYear('tanggal', $year)
            ->groupBy('departemen_id')
            ->get();
        $dataXPemasukanPerDepartemen = $dataYPemasukanPerDepartemen->pluck('departemen')->pluck('nama_departemen');
        $dataYPemasukanPerDepartemen = $dataYPemasukanPerDepartemen->pluck('jumlah');

        $dataYPengeluaranPerDepartemen = Pengeluaran::select('departemen_id', DB::raw('sum(jumlah) as jumlah'))
            ->with('departemen')
            ->whereYear('tanggal', $year)
            ->groupBy('departemen_id')
            ->get();
        $dataXPengeluaranPerDepartemen = $dataYPengeluaranPerDepartemen->pluck('departemen')->pluck('nama_departemen');
        $dataYPengeluaranPerDepartemen = $dataYPengeluaranPerDepartemen->pluck('jumlah');

        $dataYPemasukanPerKategori = Pemasukan::select('kategori_id', DB::raw('sum(jumlah) as jumlah'))
            ->with('kategori_pemasukan')
            ->whereYear('tanggal', $year)
            ->groupBy('kategori_id')
            ->get();
        $dataXPemasukanPerKategori = $dataYPemasukanPerKategori->pluck('kategori_pemasukan')->pluck('nama_k_pemasukan');
        $dataYPemasukanPerKategori = $dataYPemasukanPerKategori->pluck('jumlah');

        $dataYPengeluaranPerKategori = Pengeluaran::select('kategori_id', DB::raw('sum(jumlah) as jumlah'))
            ->with('kategori_pengeluaran')
            ->whereYear('tanggal', $year)
            ->groupBy('kategori_id')
            ->get();
        $dataXPengeluaranPerKategori = $dataYPengeluaranPerKategori->pluck('kategori_pengeluaran')->pluck('nama_k_pengeluaran');
        $dataYPengeluaranPerKategori = $dataYPengeluaranPerKategori->pluck('jumlah');
        
        return view('welcome', compact('year', 'listBulan', 'dataYPemasukan', 'dataYPengeluaran', 'pemasukanTotal', 'pengeluaranTotal', 'saldoTotal', 'dataXPemasukanPerDepartemen', 'dataYPemasukanPerDepartemen', 'dataXPengeluaranPerDepartemen', 'dataYPengeluaranPerDepartemen', 'dataXPemasukanPerKategori', 'dataYPemasukanPerKategori', 'dataXPengeluaranPerKategori', 'dataYPengeluaranPerKategori'));
    }
}
