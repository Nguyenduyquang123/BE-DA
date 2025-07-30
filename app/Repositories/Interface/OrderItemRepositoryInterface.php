<?php 

namespace App\Repositories\Interface;

interface OrderItemRepositoryInterface extends BaseRepositoryInterface{

  
    public function getOrderItemWithProductsById($id);
      public function getTotalByOrderId($orderId);


}





?>