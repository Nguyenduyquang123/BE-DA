<?php

namespace App\Models;


use App\enum\CommonStatus as EnumCommonStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /** @use HasFactory<\Database\Factories\ProductsFactory> */
    use HasFactory;

     protected $fillable =['category_id', 'name', 'price', 'old_price', 'image_url', 'slide', 'installment', 'discounted', 'desciption', 'specifications','slug','status'];
    protected $casts = [
        'status' => EnumCommonStatus::class,
    ];
    public function Categories() {
        return $this->belongsTo(Categories::class);
    }
    public function Order_item()  {
        return $this->hasMany(Order_item::class);
    }
    public function Ratings()  {
        return $this->hasMany(Ratings::class);
    }
    

}
