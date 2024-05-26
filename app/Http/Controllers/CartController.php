<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $customer = Customer::where('user_id', $user->id)->first();

        $data_carts = Cart::with('product')->where('customer_id', $customer->id)->get();

        return view('customers.carts.index', [
            'title' => 'data carts',
            'data_carts' => $data_carts,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'    => 'required'
        ]);

        $user = auth()->user();
        $customer = Customer::where('user_id', $user->id)->first();

        $data_cart = Cart::where('customer_id', $customer->id)->where('product_id', $request->product_id)->first();

        if($data_cart) {
            Alert::error('', 'Data Sudah Ada diKeranjang!');
            return redirect()->back();
        }

        $customer = Customer::where('user_id', auth()->user()->id)->first();

        Cart::create([
            'customer_id'   => $customer->id,
            'product_id'    => $request->product_id,
            'quantity'      => 0
        ]);

        Alert::success('', 'Data Disimpan diKeranjang!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_cart = Cart::findOrFail($id);

        $data_cart->delete();

        Alert::success('', 'Data Berhasil Didelete!');
        return redirect()->back();
    }
}
