<?php

namespace App\Repositories\Interface;

interface OrderRepositoryInterface extends BaseRepositoryInterface{

    public function getOrdersWithUsersById($id);
    public function getOrdersWithUsers();
    public function getOrdersWithUserswithPaymentsById($id);


}



?>




