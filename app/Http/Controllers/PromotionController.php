<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    public function index() {

        if( request()->end_date_from || request()->end_date_to) {
            $data_promotions = Promotion::with('product')->whereBetween('end_date', [request()->end_date_from, request()->end_date_to])->latest()->get();
        } else {
            $data_promotions = Promotion::with('product')->latest()->get();
        }

        return view('promotions.index', [
            'title'         => 'Promotions',
            'promotions'    => $data_promotions
        ]);
    }

    public function promotion_detail() {
        $id = $_GET['data'];
        $promotion = Promotion::with('product')->where('id', $id)->first();

        if(!$promotion) {
            return response()->json([
                'success'   => false,
                'status'    => 400,
                'message'   => 'Data Tidak Ada'
            ]);
        }

        return response()->json([
            'success'   => true,
            'status'    => 200,
            'data'      => $promotion,
        ]);
    }
}
