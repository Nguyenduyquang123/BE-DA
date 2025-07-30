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
                  <a href="#">Đơn hàng</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Danh sách đơn hàng</a>
                </li>
              </ul>
            </div>
           <div class="row">
        <div class="col-md-12">
            <div class="card">
               @if (session('success'))
                    <p class="alert alert-success" style="color: green">{{ session('success') }}</p>
                @endif
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Danh sách đơn hàng</h4>
                        <a  href="{{route('admin.products.create')}}">
                         
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên khách Hàng</th>
                                    <th>PTTT</th>
                                    <th>Tổng tiền</th>
                                    <th>thời gian đặt hàng</th>
                                    <th>Trạng thái</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($orders as $order)
                              <tr>
                                  <td>{{$order->id}}</td>
                                  <td>{{$order->user_name}}</td>
                                  <td>{{ $order->payment_name }}</td>
                                  <td>{{ number_format($order->total_price, 0, ',', '.') }}₫</td>
                                  <td>{{ $order->created_at }}</td>
                                  @php
                                   

                                    $statusEnum = $order->confirmation_status;
                                    $status = $statusEnum->value; 

                                    $color = $statusConfig[$status]['color'] ?? 'secondary';
                                    $icon = $statusConfig[$status]['icon'] ?? 'bi-question-circle';
                                @endphp

                                <td>
                                    <span class="badge bg-{{ $color }}" style="padding: 10px;font-weight: bold;">
                                        <i class="bi {{ $icon }}"></i> {{ $status }}
                                    </span>
                                </td>
                                  <td>
                                      <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-flex align-items-center">
                                          @csrf
                                          @method('DELETE')
                                          <a class="btn btn-link btn-info btn-lg me-1" href="{{ route('admin.orders.show', $order->id) }}" title="Xem chi tiết">
                                              <i class="fa fa-eye"></i>
                                          </a>
                                          <a class="btn btn-link btn-primary btn-lg" href="{{ route('admin.orders.edit', $order->id) }}">
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
        </div>
    </div>
          </div>
</div>

@endsection