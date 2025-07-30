<?php
namespace App\Repositories;

use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class OrderRepository extends BaseRepository

{

    function __construct(Orders $Orders)
    {
        parent::__construct($Orders);
    }

    public function getOrdersWithUsers()
    {
       return  $this->model
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('payments', 'orders.payments_id', '=', 'payments.id')
        ->select(
            'orders.*',
            'users.fulllname as user_name',  
            'payments.payment as payment_name'
        )
        ->get();
    }
    public function getOrdersWithUsersWithPaymentsById($id){
        return  $this->model
       ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('payments', 'orders.payments_id', '=', 'payments.id')
        ->where('orders.id', $id)
        ->select(
            'orders.*',
            'users.fulllname as user_name',  
            'payments.payment as payment_name'
        )
        ->first(); 
    }
   
   public function getOrdersWithUsersById($id){
    return  $this->model
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->where('orders.id', $id) 
        ->select(
            'orders.*',
            'users.gender as user_gender',
            'users.fulllname as user_name',  
            'users.phone as user_phone',
            'users.Email as user_email',
            'users.address as user_address'
        )
        ->first(); 
}


}



?>