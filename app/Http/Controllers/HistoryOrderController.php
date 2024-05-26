<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class HistoryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $history_orders = Order::with('customer')->get();

        return view('customers.history_orders.index', [
            'title' => 'History Orders',
            'history_orders' => $history_orders
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $order = Order::with('customer', 'products')->where('id', $id)->first();

        $order_details = OrderDetail::where('order_id', $order->id)->get();

        return view('customers.history_orders.detail', [
            'title' => 'History Order',
            'order' => $order,
            'order_details' => $order_details
        ]);
    }

}
