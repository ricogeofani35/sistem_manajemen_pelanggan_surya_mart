<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $product_count = Product::count();
        $promotion_count = Promotion::count();

        return view('dashboards.index', [
            'title' => 'Dashboard',
            'product_count'       => $product_count,
            'promotion_count'     => $promotion_count,  
        ]);

        
        
    }
}
