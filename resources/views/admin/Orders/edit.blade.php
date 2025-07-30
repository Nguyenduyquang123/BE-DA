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
                  <a href="#">Sửa sản phẩm</a>
                </li>
              </ul>
            </div>
            <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4>Sửa đơn hàng</h4></div>
            <div class="card-body">
                <form action="{{route('admin.orders.update', $order->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <h5 class="mt-4">Thông tin đơn hàng</h5>
                    <select name="confirmation_status" class="form-select">
                        <option value="Chờ xác nhận" {{ $order->confirmation_status === 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
                        <option value="Đang xử lý" {{ $order->confirmation_status === 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
                        <option value="Đang giao" {{ $order->confirmation_status === 'Đang giao' ? 'selected' : '' }}>Đang giao</option>
                        <option value="Đã thanh toán" {{ $order->confirmation_status === 'Đã thanh toán' ? 'selected' : '' }}>Đã thanh toán</option>
                        <option value="Đã giao và thanh toán" {{ $order->confirmation_status === 'Đã giao và thanh toán' ? 'selected' : '' }}>Đã giao và thanh toán</option>
                        <option value="Đã hủy" {{ $order->confirmation_status === 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                    </select>

                   


                    <h5 class="mt-4">vận chuyển</h5>
                    
                    <div class="mb-3">
                        <label class="form-label">Đơn vị vận chuyển</label>
                        <input type="text" name="delivery[shipping_method]" class="form-control" placeholder="Ví dụ: Giao hàng nhanh, VNPost...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Đơn Hàng</label>
                        <input type="text" name="delivery[shipping_method]" class="form-control" placeholder="Ví dụ: Giao hàng nhanh, VNPost...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái giao hàng</label>
                        <select name="delivery[delivery_status]" class="form-select">
                            <option value="Đang xử lý">Đang xử lý</option>
                            <option value="Đang giao">Đang giao</option>
                            <option value="Giao thành công">Giao thành công</option>
                            <option value="Thất bại">Thất bại</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </form>
            </div>
        </div>
        </div>
    </div>
          </div>
</div>
@endsection