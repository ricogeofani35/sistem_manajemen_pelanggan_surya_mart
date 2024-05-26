<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Rules\OldPasswordValidaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\map;

class DataAkunController extends Controller
{
    public function index() {

        $id_user = auth()->user()->id;

        $data_user = User::where('id', $id_user)->first();

        return view('customers.data_akuns.index', [
            'title' => 'Data Akuns',
            'data_user'     => $data_user
        ]);
    }

    public function detail_customer($id) {
    
        $data_customer = Customer::where('user_id', $id)->first();

        return view('customers.data_akuns.detail_customer', [
            'title' => 'Data Akuns',
            'data_customer' => $data_customer
        ]);

    }

    public function edit(string $id) {
    
        $data_user = User::where('id', $id)->first();


        return view('customers.data_akuns.edit', [
            'title' => 'Data Akuns',
            'data_user' => $data_user
        ]);

    }

    public function update(string $id, Request $request) {

        //validation
        $request->validate([
            'username'     => 'required',
            'old_password' => ['required','min:5', 'max:20', new OldPasswordValidaton],
            'new_password' => 'required|min:5|max:20'
        ]);

        $id_user = auth()->user()->id;
        $data_user = User::where('id', $id_user)->first();

        // jika old password true    
        $data_user->update([
            'name'      => $data_user->name,
            'username'  => $request->username,
            'password'  => Hash::make($request->new_password),
            'is_admin'  => 0
        ]);

        return redirect('/data_akuns')->with('success', 'Update Akun Success');
    }
}
