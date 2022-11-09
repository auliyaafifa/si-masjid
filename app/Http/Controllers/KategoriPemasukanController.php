<?php

namespace App\Http\Controllers;

use App\Models\KategoriPemasukan;
use Illuminate\Http\Request;

class KategoriPemasukanController extends Controller
{
    public function index(){
        $kategoripemasukan = KategoriPemasukan::all();
        return view('kategoripemasukan.index',compact(['kategoripemasukan']));
    }

    public function create()
    {
        return view('kategoripemasukan.create');
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token','submit']));
        KategoriPemasukan::create($request->except(['_token','submit']));
        return redirect('/kategoripemasukan');
    }

    public function edit($id)
    {
        $kategoripemasukan = KategoriPemasukan::find($id);
        return view('kategoripemasukan.edit',compact(['kategoripemasukan']));
    }

    public function update($id, Request $request)
    {
        $kategoripemasukan = KategoriPemasukan::find($id);
        $kategoripemasukan->update($request->except(['_token','submit']));
        return redirect('/kategoripemasukan');
    }

    public function destroy($id)
    {
        $kategoripemasukan = KategoriPemasukan::find($id);
        $kategoripemasukan->delete();
        return redirect('/kategoripemasukan');
    }
}
