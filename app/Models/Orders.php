<?php

namespace App\Models;

use App\enum\OrderConfirmationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /** @use HasFactory<\Database\Factories\OrdersFactory> */
    use HasFactory;
    protected $fillable =['user_id', 'payments_id', 'total_price', 'sale_price', 'confirmation_status'];

    protected $casts = [
        'confirmation_status' => OrderConfirmationStatus::class,
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Payments(){
        return $this->belongsTo(Payments::class);
    }
    public function Order_item(){
        return $this->hasMany(Order_item::class);
    }
}
