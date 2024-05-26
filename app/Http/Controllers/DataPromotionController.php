<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class DataPromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data_promotions = Promotion::with('product')->latest()->get();

        return view('admins.data_promotions.index', [
            'title' => 'Data Promotions',
            'data_promotions'   => $data_promotions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::latest()->get();

        return view('admins.data_promotions.create', [
            'title' => 'Data Promotions',
            'products'  => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'beginning_date'    => 'required|date',
            'end_date'          => 'required|date',
            'promotion_price'   => 'required|integer',
            'description'       => 'required|max:500',
            'product_id'        => 'required|integer'
        ]);

        Promotion::create($validate);

        return redirect('/data_promotions')->with('success', 'Data Promosi berhasil Ditambahkan!');
    }

    public function show(string $id) {
        $promotion = Promotion::where('id', $id)->first();
        return view('admins.data_promotions.detail', [
            'title'     => 'Data Promotion',
            'promotion' => $promotion

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_promotion = Promotion::with('product')->where('id', $id)->first();
        $products = Product::latest()->get();

        return view('admins.data_promotions.edit', [
            'title'             => 'Data Promotions',
            'data_promotion'    => $data_promotion,
            'products'          => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'beginning_date'    => 'required|date',
            'end_date'          => 'required|date',
            'promotion_price'   => 'required|integer',
            'description'       => 'required|max:500',
            'product_id'        => 'required|integer'
        ]);

        $promotion = Promotion::findOrFail($id);
        $promotion->update($validate);

        return redirect('/data_promotions')->with('success', 'Data Promosi berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect('/data_promotions')->with('success', 'Data Promosi berhasil Diupdate!');
    }
}
