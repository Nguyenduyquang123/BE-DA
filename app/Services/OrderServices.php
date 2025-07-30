<?php 
namespace App\Services;

use App\Models\payments;
use App\Models\User;
use App\Repositories\Interface\OrderRepositoryInterface;
use App\Repositories\Order_itemRepository;
use App\Repositories\Order_itemRepotory;
use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\DB;

class OrderServices extends BaseService implements OrderRepositoryInterface{
    protected OrderRepository $order;
    protected OrderItemRepository $order_item;
    protected User $User;
    protected payments $payments;



    function __construct(OrderRepository $order, OrderItemRepository $order_item , User $user, payments $payment)
    {
        parent::__construct($order);
        $this->order = $order;
        $this->order_item = $order_item;
        $this->User = $user;
        $this->payments = $payment;

    }
    public function create(array $data)
    {
     DB::beginTransaction();

    try {

        $user = $this->User->create([
            'fulllname' => $data['fulllname'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'Email' => $data['email'] ?? '', 
            'address' => $data['address'],
        ]);

        

        $payment = $this->payments->create([
            // 'oder_id' => '0',
            'payment' => $data['payment_method'],
            'paid' => now(),
        ]);


        $total = 0;
        foreach ($data['products'] as $product) {
            $total += $product['price'] * $product['quantity'];
        }

        $order = $this->order->create([
            'user_id' => $user->id,
            'payments_id' => $payment->id,
            'total_price' => $total,
            'sale_price' => $total, 
        ]);

        // $payment->update(['orders_id' => $order->id]);

        $items = [];
        foreach ($data['products'] as $product) {
            $items[] = $this->order_item->create([
                'orders_id' => $order->id,
                'product_id' => $product['product_id'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
            ]);
        }

        DB::commit();

        return [
            'user' => $user,
            'order' => $order,
            'payment' => $payment,
            'items' => $items,
        ];
    } catch (\Exception $e) {
        DB::rollBack();
        throw $e;
    }
    }

    public function getOrdersWithUsers()
    {
        return $this->order->getOrdersWithUsers();
    }
    public function getOrdersWithUsersWithPaymentsById($id)
    {
        return $this->order->getOrdersWithUsersWithPaymentsById($id);
    }
    public function getOrdersWithUsersById($id)
    {
        return $this->order->getOrdersWithUsersById($id);
    }
    



}



?>