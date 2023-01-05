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
        $tanggal = explode(' to ', $request['tanggal']);
        $mulai = $tanggal[0] ?? null;
        $sampai = $tanggal[1] ?? null;
        $perPage = $request['per_page'] ?? 10;
        if ($perPage == 'all') {
            $perPage = Pengeluaran::count();
        }
        $pengeluaran = Pengeluaran::query()
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
        $validated = $request->validate([
            'tanggal' => 'required|string',
            'departemen_id' => 'required|integer|exists:departemen,id',
            'kategori_id' => 'required|integer|exists:kategori_pengeluaran,id',
            'nama_donatur' => 'nullable|string',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|file'
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = time().'.'.$request->gambar->extension();
    
            $request->gambar->move(public_path('uploaded_image'), $gambar);
        }

        Pengeluaran::create([
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'departemen_id' => $request->departemen_id,
            'gambar' => $gambar
        ]);
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
        if ($request->hasFile('gambar')) {
            $gambar = time().'.'.$request->gambar->extension();
    
            $request->gambar->move(public_path('uploaded_image'), $gambar);
            $pengeluaran->gambar = $gambar;
        }
        $pengeluaran->tanggal = $request->tanggal;
        $pengeluaran->kategori_id = $request->kategori_id;
        $pengeluaran->jumlah = $request->jumlah;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->departemen_id = $request->departemen_id;
        $pengeluaran->save();
        return redirect('/pengeluaran');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return redirect('/pengeluaran');
    }
}
