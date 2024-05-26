<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('customers.orders.index', [
            'title'     => 'Order Products',
            'products'  => $products
        ]);
    }

    public function checkout(Request $request) {

        $sub_total = 0;

        $user = auth()->user();
        $customer = Customer::where('user_id', $user->id)->first();

        $data_carts = Cart::with('product')->where('customer_id', $customer->id)->get();

        foreach($data_carts as $key => $cart) {
            $sub_total += $cart->product->price * $request->quantitys[$key];

            $cart->update([
                'quantity'  => $request->quantitys[$key]
            ]);
        }


        return view('customers.carts.checkout', [
            'title'      => 'Order Products',
            'data_carts' => $data_carts,
            'quantitys'  => $request->quantitys,
            'sub_total'  => $sub_total
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $sub_total = 0;

        $customer = Customer::where('user_id', auth()->user()->id)->first();

        // insert order
        $order = Order::create([
            'date_order'    => now(),
            'customer_id'   => $customer->id,
            'total_payment' => $sub_total,
            'status'        => 'pending'
        ]);

        $data_carts = Cart::with('product')->where('customer_id', $customer->id)->get();

        // insert order_detais
        foreach ($data_carts as  $cart) {

            $sub_total += $cart->product->price * $cart->quantity;

            OrderDetail::create([
                'quantity'      => $cart->quantity,
                'product_id'    => $cart->product->id,
                'order_id'      => $order->id
            ]);

            // delete card where customer id
            $cart->delete();
        };

        $order->update([
            'total_payment' => $sub_total
        ]);

        // if success
        Alert::success('', 'Order Product Success!');
        return redirect('/history_orders');
    }

}
