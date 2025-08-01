<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentsFactory> */
    use HasFactory;
    protected $fillable =['payment', 'paid'];

    public function Orders(){
        return $this->belongsTo(Orders::class);
    }
    
}
