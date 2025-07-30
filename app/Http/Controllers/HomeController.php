<?php

namespace App\Http\Controllers;

use App\Services\ProductServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected ProductServices $productServices;

    public function __construct(ProductServices $productServices)
    {
        $this->productServices = $productServices;
    }

    public function index()
    {
        $products = $this->productServices->all();
        return view('pages.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function detaipro($id, $slug){
    $product = $this->productServices->find($id);
    return view('pages.detail_product',compact('product'));
   }
   public function success(){
    return view('pages.order_success');
   }
}
