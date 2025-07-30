<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderItemsRequest;
use App\Models\Order_item;
use App\Services\OrderItemServices;
use App\Services\OrderServices;
use App\Services\ProductServices;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    protected OrderItemServices $order_item;
    protected ProductServices $product;

    protected OrderServices $order;

    public function __construct(OrderItemServices $order_item, ProductServices $product, OrderServices $order)
    {
        $this->order_item = $order_item;
        $this->product = $product;
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  $orderItems = $this->order_item->find($id);
        // $productall = $this->product->all();
        // return view('admin.orderItems.create',compact('productall','orderItems'));
     
    }
    public function customUpdate($id)
    {
        $orderItems = $this->order->find($id);
        $productall = $this->product->all();
        return view('admin.orderItems.create',compact('productall','orderItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderItemsRequest $request)
    {
        $data = $request->validated();

        $this->order_item->create($data);
        $this->order_item->getTotalByOrderId($data['orders_id']);

        return redirect()->route('admin.orders.show', $data['orders_id'])
                         ->with('success', 'Thêm sản phẩm thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orderItems = $this->order_item->find($id);
        $products = $this->product->find($orderItems->product_id);
        $productall = $this->product->all();
        return view('admin.orderItems.edit',compact('orderItems','products','productall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderItemsRequest $request, string $id)
    {
        // $this->order_item->update($id, $request->validated());
        // $orderId = $request->input('orders_id');
        // return redirect()->route('admin.orders.show', $orderId)
        //              ->with('success', 'Thêm sản phẩm vào đơn hàng thành công!');
        $data = $request->validated();
        $orderItem = $this->order_item->find($id);

        $this->order_item->update($id, $data);
        $this->order_item->getTotalByOrderId($orderItem->orders_id);

        return redirect()->route('admin.orders.show', $orderItem->orders_id)
                         ->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
        $orderItem = $this->order_item->find($id);
        $orderId = $orderItem->orders_id;

        $this->order_item->delete($id);
        $this->order_item->getTotalByOrderId($orderId);

        return redirect()->route('admin.orders.show', $orderId)
                         ->with('success', 'Xóa sản phẩm thành công!');
    }
}
