<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Http\Update;

class DepartemenController extends Controller
{
    public function index(){
        $departemen = Departemen::all();
        return view('departemen.index',compact(['departemen']));
    }

    public function create()
    {
        return view('departemen.create');
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token','submit']));
        Departemen::create($request->except(['_token','submit']));
        return redirect('/departemen');
    }

    public function edit($id)
    {
        $departemen = Departemen::find($id);
        return view('departemen.edit',compact(['departemen']));
    }

    public function update($id, Request $request)
    {
        $departemen = Departemen::find($id);
        $departemen->update($request->except(['_token','submit']));
        return redirect('/departemen');
    }

    public function destroy($id)
    {
        $departemen = Departemen::find($id);
        $departemen->delete();
        return redirect('/departemen');
    }
}
