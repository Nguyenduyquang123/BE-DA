<?php 
namespace App\Repositories;

use App\Models\Products;
use App\Repositories\Interface\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Products $Products)
    {
        parent::__construct($Products);
    }
    public function getProductWithCategoryById($id)
    {
        return $this->model
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.id', $id)
        ->select(
            'products.*',
            'categories.name as category_name'
        )
        ->first();

    }
    public function getProductWithCategory()
    {
        return  $this->model
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select(
            'products.*',
            'categories.name as category_name'
        )
        ->get();

    }

}  


?>