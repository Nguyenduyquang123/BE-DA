<?php

namespace App\Models;

use App\enum\CommonStatus as EnumCommonStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriesFactory> */
    use HasFactory;
    protected $fillable =['name', 'slug','status'];
    protected $casts = [
        'status' => EnumCommonStatus::class,
    ];

    public function Products(){
        return $this->hasMany(Products::class);
    }
}
