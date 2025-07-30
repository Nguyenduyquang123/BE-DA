<?php 

namespace App\Services;

use App\Models\Order_item;

use App\Repositories\Interface\OrderItemRepositoryInterface;
use App\Repositories\Order_itemRepository;
use App\Repositories\Order_itemRepotory;
use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;

class OrderItemServices extends BaseService implements OrderItemRepositoryInterface{
    protected OrderItemRepository $order_item;
    protected OrderRepository $orderRepo;


    public function __construct(OrderItemRepository $order_item, OrderRepository $orderRepo)
    {
        parent::__construct($order_item);
        $this->order_item = $order_item;
        $this->orderRepo = $orderRepo;
    }
 
    public function getOrderItemWithProductsById($id)
    {
        return $this->order_item->getOrder_itemWithProductsById($id);
    }
    public function getTotalByOrderId($orderId)
    {
         $total = $this->order_item->getTotalByOrderId($orderId);

        return $this->orderRepo->update($orderId, [
            'total_price' => $total,
            'sale_price' => $total, 
        ]);
    }

}


?>