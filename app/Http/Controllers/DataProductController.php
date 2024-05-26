<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_products = Product::latest()->get();

        return view('admins.data_products.index', [
            'title'     => 'Data Products',
            'data_products' => $data_products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.data_products.create', [
            'title'     => 'Create Data Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'  => 'required|min:5|max:20|unique:products',
            'name'  => 'required',
            'price' => 'required|integer',
            'unit'  => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //upload image
        $fileName = $request->file('image');
        $fileName->storeAs('public/assets/images', $fileName->hashName());
        
        Product::create([
            'code'  => $request->code,
            'name'  => $request->name,
            'price' => $request->price,
            'unit'  => $request->unit,
            'stock' => $request->stock,
            'image' => $fileName->hashName()
        ]);

        return redirect('/data_products')->with('success', 'Data Product Berhasil Ditambahkan!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_product = Product::findOrFail($id);


        return view('admins.data_products.edit', [
            'title'     => 'Edit Data Product',
            'data_product'  => $data_product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|integer',
            'unit'  => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $data_product = Product::findOrFail($id);

        // jika ada request image
        if($request->hasFile('image')) {
            //upload new image
            $fileName = $request->file('image');
            $fileName->storeAs('public/assets/images', $fileName->hashName());

            // delete old image
            Storage::delete('/public/assets/images/'.$data_product->image);

            // update data with image
            $data_product->update([
                'name'  => $request->name,
                'price' => $request->price,
                'unit'  => $request->unit,
                'stock'  => $request->stock,
                'image' => $fileName->hashName()
            ]);

        } else {
             // update data without image
             $data_product->update([
                'code'  => $request->code,
                'name'  => $request->name,
                'price' => $request->price,
                'unit'  => $request->unit,
                'stock'  => $request->stock,
            ]);
        }

        return redirect('/data_products')->with('success', 'Data Product Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // delete order and detail order
        $order_details = OrderDetail::where('product_id', $id)->get();
        
        if($order_details) {
            
            foreach($order_details as $order_detail) {
                $order_detail->delete();

                $order = Order::where('id', $order_detail->order_id)->first();

                $order->delete();
            }
        }

        // delete promotion
        $promotion = Promotion::where('product_id', $id)->first();
        $promotion->delete();

        // delete data product
        $data_product = Product::findOrFail($id);
        
        Promotion::where('product_id', $data_product->id)->delete();

        $data_product->delete();
        return redirect('/data_products')->with('success', 'Data Product Berhasil Didelete!');
    }
}
