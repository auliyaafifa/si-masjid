<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use App\Models\KategoriPemasukan;
use App\Models\Departemen;
use Illuminate\Support\Facades\DB;

class PemasukanController extends Controller
{
    public function index(Request $request)
    {
        $departemen = $request['departemen'];
        $kategori = $request['kategori'];
        $tanggal = explode(' to ', $request['tanggal']);
        $mulai = $tanggal[0] ?? null;
        $sampai = $tanggal[1] ?? null;
        $perPage = $request['per_page'] ?? 10;
        if ($perPage == 'all') {
            $perPage = Pemasukan::count();
        }
        $pemasukan = Pemasukan::query()
            ->when($departemen, function ($query, $departemen) {
                $query->where('departemen_id', $departemen);
            })
            ->when($kategori, function ($query, $kategori) {
                $query->where('kategori_id', $kategori);
            })
            ->when($mulai, function ($query, $mulai) {
                $query->whereDate('tanggal', '>=', $mulai);
            })
            ->when($sampai, function ($query, $sampai) {
                $query->whereDate('tanggal', '<=', $sampai);
            })
            ->orderBy('tanggal', 'desc')
            ->paginate($perPage);
        $listdepartemen = Departemen::where('status', 'Aktif')->get();
        $listkategori = KategoriPemasukan::where('status', 'Aktif')->get();
        $listbulan = config('application.months');
        $listtahun = Pemasukan::selectRaw("YEAR(tanggal) as year")->orderBy('tanggal', 'desc')->groupBy('year')->pluck('year');
        return view('pemasukan.index',compact(['pemasukan', 'listdepartemen', 'listkategori', 'listbulan', 'listtahun']));
    }

    public function create()
    {
        $listkategori = KategoriPemasukan::where('status', 'Aktif')->get();
        $listdepartemen = Departemen::where('status', 'Aktif')->get();
        return view('pemasukan.create', compact('listkategori', 'listdepartemen'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|string',
            'departemen_id' => 'required|integer|exists:departemen,id',
            'kategori_id' => 'required|integer|exists:kategori_pemasukan,id',
            'nama_donatur' => 'nullable|string',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'nullable|string'
        ]);
        Pemasukan::create($validated);
        return redirect('/pemasukan');
    }

    public function show($id)
    {   
        return view('pemasukan.show', ['pemasukan' => Pemasukan::findOrFail($id)]);
    }

    public function edit($id)
    {
        $listkategori = KategoriPemasukan::all();
        $listdepartemen = Departemen::all();
        $pemasukan = Pemasukan::find($id);
        return view('pemasukan.edit',compact(['pemasukan', 'listkategori', 'listdepartemen']));
    }

    public function update($id, Request $request)
    {
        $pemasukan = Pemasukan::find($id);
        $pemasukan->update($request->except(['_token','submit']));
        return redirect('/pemasukan');
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::find($id);
        $pemasukan->delete();
        return redirect('/pemasukan');
    }
}
