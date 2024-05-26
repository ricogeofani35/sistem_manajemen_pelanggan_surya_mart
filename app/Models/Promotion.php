<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'beginning_date','end_date', 'promotion_price', 'description', 'product_id'
    ];

    public function product() 
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
