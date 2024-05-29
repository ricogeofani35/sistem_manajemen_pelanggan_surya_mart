<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class DataCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data_customers = Customer::latest()->get();

        return view('admins.data_customers.index', [
            'title' => 'Data Customers',
            'data_customers' => $data_customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('is_admin', 0)->get();

        return view('admins.data_customers.create', [
            'title'     => 'Data Customer',
            'users'     => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'jenis'         => ['required', 'string'],
            'phone_number'  => ['required'],
            'address'       => ['required'],
            'user_id'       => ['required', 'integer']
        ]);

        $validator['email'] = $request->email;

        Customer::create($validator);

        return redirect('/data_customers')->with('success', 'Data Customer Berhasil Ditambahkan!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data_customer = Customer::where('id', $id)->first();
        $users = User::where('is_admin', 0)->get();

        return view('admins.data_customers.edit', [
            'title' => 'Data Customers',
            'data_customer' => $data_customer,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'jenis'         => ['required', 'string'],
            'phone_number'  => ['required'],
            'address'       => ['required'],
            'user_id'       => ['required', 'integer']
        ]);

        $validator['email'] = $request->email;

        $customer = Customer::findOrFail($id);

        $customer->update($validator);

        return redirect('/data_customers')->with('success', 'Data Customer Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::where('customer_id', $id)->first();

        // delete data order
        if($order) {
            $order_details = OrderDetail::where('order_id', $order->id)->get();
            
            if($order_details) {
                foreach($order_details as $order_detail) {
                    $order_detail->delete();
                }
            }

            $order->delete();
        }
        
        // delete data customer
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // delete data user
        $user = User::where('id', $customer->user_id)->first();
        if($user) {
            $user->delete();
        }

        return redirect('/data_customers')->with('success', 'Data Customer Berhasil Didelete!');
    }
}
