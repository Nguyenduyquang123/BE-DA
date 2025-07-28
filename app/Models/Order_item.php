<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    protected $fillable =['product_id', 'orders_id', 'price', 'quantity'];
    public function Products(){
        return $this->belongsTo(Products::class);
    }
    public function Orders(){
        return $this->belongsTo(Orders::class);
    }
}
