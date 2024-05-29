<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class DataOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_orders = Order::with('customer')->get();

        return view('admins.data_orders.index', [
            'title' => 'Data Orders',
            'data_orders' => $data_orders
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('customer', 'products')->where('id', $id)->first();

        $order_details = OrderDetail::where('order_id', $order->id)->get();

        return view('admins.data_orders.detail', [
            'title' => 'Data Order',
            'order' => $order,
            'order_details' => $order_details
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::with('customer', 'products')->where('id', $id)->first();

        return view('admins.data_orders.edit', [
            'title' => 'Data Order',
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status'    => 'required'
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'status'    => $request->status
        ]);

        return redirect('/data_orders')->with('success', 'Data Order Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        $order_details = OrderDetail::where('order_id', $order->id)->get();

        if($order_details) {
            foreach($order_details as $order_detail) {
                $order_detail->delete();
            }
        }
        
        $order->delete();
    
        return redirect('/data_orders')->with('success', 'Data Order Berhasil Didelete');
    }
}
