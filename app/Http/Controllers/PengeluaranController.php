<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\KategoriPengeluaran;
use App\Models\Departemen;

class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        $departemen = $request['departemen'];
        $kategori = $request['kategori'];
        $bulan = $request['bulan'];
        $tahun = $request['tahun'];
        $pengeluaran = Pengeluaran::query()
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
        $listkategori = KategoriPengeluaran::where('status', 'Aktif')->get();
        $listbulan = config('application.months');
        $listtahun = Pengeluaran::selectRaw("YEAR(tanggal) as year")->orderBy('tanggal', 'desc')->groupBy('year')->pluck('year');
        return view('pengeluaran.index',compact(['pengeluaran', 'listdepartemen', 'listkategori', 'listbulan', 'listtahun']));
    }
    public function create()
    {
        $listkategori = KategoriPengeluaran::all();
        $listdepartemen = Departemen::all();
        return view('pengeluaran.create', compact('listkategori', 'listdepartemen'));
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token','submit']));
        Pengeluaran::create($request->except(['_token','submit']));
        return redirect('/pengeluaran');
    }

    public function show($id)
    {   
        return view('pengeluaran.show', ['pengeluaran' => Pengeluaran::findOrFail($id)]);
    }

    public function edit($id)
    {
        $listkategori = KategoriPengeluaran::all();
        $listdepartemen = Departemen::all();
        $pengeluaran = Pengeluaran::find($id);
        return view('pengeluaran.edit',compact(['pengeluaran', 'listkategori', 'listdepartemen']));
    }

    public function update($id, Request $request)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->update($request->except(['_token','submit']));
        return redirect('/pengeluaran');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return redirect('/pengeluaran');
    }
}
