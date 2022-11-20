<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index',compact(['users']));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|string|in:Pengurus,Bendahara',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        return redirect('/users');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact(['user']));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email,' . $user->email,
            'role' => 'required|string|in:Pengurus,Bendahara',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);
        return redirect('/users');
    }

    public function destroy($id)
    {
        if ($id == auth()->id()) {
            abort(400, 'Tidak bisa menghapus diri sendiri');
        }
        $users = User::find($id);
        $users->delete();
        return redirect('/users');
    }
}