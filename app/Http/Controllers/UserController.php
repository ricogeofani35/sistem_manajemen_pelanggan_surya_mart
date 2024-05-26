<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('admins.users.index', [
            'title' => 'Data Users',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.users.create', [
            'title' => 'Data Users'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'name'      => 'required',
            'username'  => 'required|unique:users',
            'password'  => 'required|min:5|max:20',
            'is_admin'  => 'required'
        ]);
        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);

        return redirect('/users')->with('success', 'Data User berhasil Ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admins.users.edit', [
            'title' => 'Data Users',
            'user'  => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $this->validate($request, [
            'name'      => 'required',
            'username'  => 'required',
            'password'  => 'required|min:5|max:20',
            'is_admin'  => 'required'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        $user = User::findOrFail($id);

        $user->update([
            'name'      => $request->name,
            'password'  => Hash::make($request->password),
            'is_admin'  => $request->is_admin
        ]);

        return redirect('/users')->with('success', 'Data User berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // customer delete
        $customer = Customer::where('user_id', $user->id)->first();
        $customer->delete();

        // user delete
        $user->delete();

        return redirect('/users')->with('success', 'Data User berhasil Didelete!');
    }
}
