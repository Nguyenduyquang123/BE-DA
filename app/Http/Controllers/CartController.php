<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\ProductServices;
use Illuminate\Http\Request;

class CartController extends Controller
{

    protected CartService $cartService;

    public function __construct( CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        $cart = $this->cartService->getCart();
        return view('pages.cart', compact('cart'));
    }

    public function addToCart($id)
    {
        $this->cartService->addToCart($id);
        return redirect()->route('cart')->with('success', 'Đã thêm vào giỏ hàng');
    }

    public function update(Request $request)
    {
        $result = $this->cartService->updateQuantity($request->id, $request->type);
        return response()->json($result);
    }

    public function remove($id)
    {
        $this->cartService->removeFromCart($id);
        return redirect()->route('cart')->with('success', 'Đã xóa khỏi giỏ hàng');
    }

    
   
}
