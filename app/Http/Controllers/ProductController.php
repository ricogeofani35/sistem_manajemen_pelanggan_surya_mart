<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        return view('check_products.index', [
            'title' => 'Check Product'
        ]);
    }

    public function product_detail(Request $request) {
        $code  = $request->data;

        $product = DB::table('products')->where('code', $code)->first();

        if(!$product) {
            return response()->json([
                'success'   => false,
                'status'    => 400,
                'message'   => 'Data Tidak Ada'
            ]);
        }

        return response()->json([
            'success'   => true,
            'status'    => 200,
            'data'      => $product,
        ]);
    }
}
