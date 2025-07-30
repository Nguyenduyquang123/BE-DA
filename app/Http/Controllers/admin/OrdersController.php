<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderItemServices;
use App\Services\OrderServices;
use App\Services\PaymentsService;
use App\Services\UserService;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected OrderServices $order;
    protected OrderItemServices $order_item;
    protected UserService $user;





    public function __construct(OrderServices $order , OrderItemServices $order_item, UserService $user)
    {
        $this->order = $order;
        $this->order_item = $order_item;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        $orders = $this->order->getOrdersWithUsers();
      
        return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_items = $this->order_item->getOrderItemWithProductsById($id);
        $order = $this->order->find($id);
        $orderUser = $this->order->getOrdersWithUsersById($id);

        return view('admin.OrderItems.show',compact('order_items','orderUser','order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = $this->order->find($id);
        
       
        return view('admin.orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'confirmation_status' => 'required|string|in:Chờ xác nhận,Đang xử lý,Đang giao,Đã thanh toán,Đã giao và thanh toán,Đã hủy']);
        
        $order = $this->order->find($id);
        $order->update([
            'confirmation_status' => $validated['confirmation_status'],
            
            
            
        ]);
        return redirect()->route('admin.orders.index')->with('success', 'Cập nhật thành công.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->order->delete($id);
        return redirect()->route('admin.orders.index')->with('success', 'Xóa thành công.');
    }
}
