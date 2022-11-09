<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengeluaran;
use Illuminate\Http\Request;

class KategoriPengeluaranController extends Controller
{
    public function index(){
        $kategoripengeluaran = KategoriPengeluaran::all();
        return view('kategoripengeluaran.index',compact(['kategoripengeluaran']));
    }

    public function create()
    {
        return view('kategoripengeluaran.create');
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token','submit']));
        KategoriPengeluaran::create($request->except(['_token','submit']));
        return redirect('/kategoripengeluaran');
    }

    public function edit($id)
    {
        $kategoripengeluaran = KategoriPengeluaran::find($id);
        return view('kategoripengeluaran.edit',compact(['kategoripengeluaran']));
    }

    public function update($id, Request $request)
    {
        $kategoripengeluaran = KategoriPengeluaran::find($id);
        $kategoripengeluaran->update($request->except(['_token','submit']));
        return redirect('/kategoripengeluaran');
    }

    public function destroy($id)
    {
        $kategoripengeluaran = KategoriPengeluaran::find($id);
        $kategoripengeluaran->delete();
        return redirect('/kategoripengeluaran');
    }
}
