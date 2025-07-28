<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    /** @use HasFactory<\Database\Factories\RatingsFactory> */
    use HasFactory;
    protected $fillable =['product_id', 'user_id', 'rating', 'review'];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Products(){
        return $this->belongsTo(Products::class);
    }
}
