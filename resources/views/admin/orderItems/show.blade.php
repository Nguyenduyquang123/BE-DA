@extends('admin.layouts.admin')

@section('content_admin')
<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Sản phẩm</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Xem chi tiết</a>
                </li>
              </ul>
            </div>
             <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                    <h4 class="card-title">Chi tiết đơn hàng</h4>
                    
                    <a class="btn btn-success btn-round ms-auto" href="{{route('admin.orderItems.customUpdate', $order->id)}}">
                                <i class="fa fa-plus"></i>
                                Thêm
                            </a>
                </div>

               <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>thời gian đặt hàng</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($order_items as $item)
                              <tr>
                                  <td>{{$item->id}}</td>
                                  <td>{{$item->product_name}}</td>
                                  <td>{{ number_format($item->price, 0, ',', '.') }}₫</td>
                                  <td>{{ $item->quantity }}</td>
                                  <td>{{ $item->created_at }}</td>
                                  <td>
                                      <form action="{{ route('admin.orderItems.destroy', $item->id) }}" method="POST" class="d-flex align-items-center">
                                          @csrf
                                          @method('DELETE')
                                      
                                          <a class="btn btn-link btn-primary btn-lg" href="{{ route('admin.orderItems.edit', $item->id) }}">
                                              <i class="fa fa-edit"></i>
                                          </a>
                                          <button type="submit" class="btn btn-link btn-danger delete-button"
                                              onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">
                                              <i class="fa fa-trash"></i>
                                          </button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                           
                                   
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>

             <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin người mua hàng</h4>
                </div>

             
                 <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Giới tính</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Địa điể<main></main></th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                    
                              <tr>
                                <td>{{$orderUser->user_name}}</td>
                                <td>{{$orderUser->user_gender}}</td>
                                  <td> {{$orderUser->user_phone}} </td>
                                  <td>{{$orderUser->user_email}}</td>
                                  <td>{{$orderUser->user_address}}</td>
                                 
                              </tr>
                     
                           
                                   
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
          </div>
</div>

@endsection