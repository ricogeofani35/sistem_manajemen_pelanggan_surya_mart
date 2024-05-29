<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['date_order', 'customer_id', 'total_payment', 'status'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'order_details', 'product_id', 'order_id');
    }

}
