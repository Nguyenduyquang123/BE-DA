<?php 
namespace App\Services;

use App\Repositories\Order_itemRepotory;
use App\Repositories\OrderRepository;

class OrderServices extends BaseService{
    protected OrderRepository $order;
    protected Order_itemRepotory $order_item;


    function __construct(OrderRepository $order, Order_itemRepotory $order_item)
    {
        parent::__construct($order);
        $this->order = $order;
        $this->order_item = $order_item;

    }
    public function create(array $data)
    {
    

        return [
            'orders' => $order,
            'order_items' => $items,
            'users' => $users,
        ];
    }


}



?>