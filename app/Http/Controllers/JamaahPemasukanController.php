<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Pemasukan;
use App\Models\KategoriPemasukan;
use Illuminate\Http\Request;

class JamaahPemasukanController extends Controller
{
    public function index(Request $request)
    {
        $departemen = $request['departemen'];
        $kategori = $request['kategori'];
        $bulan = $request['bulan'];
        $tahun = $request['tahun'];
        $pemasukan = Pemasukan::query()
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->when($kategori, function ($query, $kategori) {
                $query->where('kategori_id', $kategori);
            })
            ->when($bulan, function ($query, $bulan) {
                $query->whereMonth('tanggal', $bulan);
            })
            ->when($tahun, function ($query, $tahun) {
                $query->whereYear('tanggal', $tahun);
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(10);
        $listdepartemen = Departemen::where('status', 'Aktif')->get();
        $listkategori = KategoriPemasukan::where('status', 'Aktif')->get();
        $listbulan = config('application.months');
        $listtahun = Pemasukan::selectRaw("YEAR(tanggal) as year")->orderBy('tanggal', 'desc')->groupBy('year')->pluck('year');
        return view('jamaah.pemasukan',compact(['pemasukan', 'listdepartemen', 'listkategori', 'listbulan', 'listtahun']));
    }
}
