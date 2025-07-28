<?php 

namespace App\Services;

use App\Models\Product;

class CartService
{
    protected $productServices;

    public function __construct(ProductServices $productServices)
    {
        $this->productServices = $productServices;
    }

    public function getCart()
    {
        return session()->get('cart', []);
    }

    public function addToCart($id)
    {
        $product = $this->productServices->find($id);
        $cart = $this->getCart();

        $images = json_decode($product->image_url, true);
        $mainImage = $images[0];

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $mainImage,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        return $cart;
    }

    public function updateQuantity($id, $type)
    {
        $cart = $this->getCart();

        if (!isset($cart[$id])) {
            return ['success' => false];
        }

        if ($type === 'plus') {
            $cart[$id]['quantity']++;
        } elseif ($type === 'minus') {
            $cart[$id]['quantity']--;
            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }
        }

        session(['cart' => $cart]);

        $quantity = $cart[$id]['quantity'] ?? 0;
        $price = ($cart[$id]['price'] ?? 0) * $quantity;
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return [
            'success' => true,
            'quantity' => $quantity,
            'price' => $price,
            'total' => $total
        ];
    }

    public function removeFromCart($id)
    {
        $cart = $this->getCart();
        unset($cart[$id]);
        session(['cart' => $cart]);

        return $cart;
    }
}



?>