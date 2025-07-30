<?php

namespace App\Repositories;

use App\Models\Order_item;
use Illuminate\Support\Facades\DB;

class OrderItemRepository extends BaseRepository{
    function __construct(Order_item $order_item){
        parent::__construct($order_item);
    }

    public function getOrder_itemWithProductsById($id)
    {
        return $this->model
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('order_items.orders_id', $id)
        ->select(
            'order_items.*',
            'products.name as product_name'
        )
        ->get(); 

    }
    public function getTotalByOrderId($orderId)
    {
        return  $this->model
        ->where('orders_id', $orderId)
            ->select(DB::raw('SUM(price * quantity) as total'))
            ->value('total') ?? 0;
    }
}

?>
