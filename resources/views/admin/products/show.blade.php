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
                <div class="card-header">
                    <h4 class="card-title">Chi tiết sản phẩm</h4>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Danh mục:</strong> {{ $product->category_name ?? 'Không có' }}
                    </div>

                    <div class="mb-3">
                        <strong>Tên sản phẩm:</strong> {{ $product->name }}
                    </div>

                    <div class="mb-3">
                        <strong>Giá bán:</strong> {{ number_format($product->price, 0, ',', '.') }} đ
                    </div>

                    <div class="mb-3">
                        <strong>Giá gốc:</strong> {{ number_format($product->old_price, 0, ',', '.') }} đ
                    </div>

                    <div class="mb-3">
                        <strong>Ảnh sản phẩm:</strong><br>
           
                        @foreach (json_decode($product->image_url, true) as $image)
                            <img src="{{ asset(  $image) }}" alt="Ảnh sản phẩm" class="img-thumbnail me-2 mb-2" width="150">
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <strong>Slide:</strong> {{ $product->slide ? 'Có' : 'Không' }}
                    </div>

                    <div class="mb-3">
                        <strong>Trả góp:</strong> {{ $product->installment ? 'Có' : 'Không' }}
                    </div>

                    <div class="mb-3">
                        <strong>Giảm giá:</strong> {{ $product->discounted ? 'Có' : 'Không' }}
                    </div>

                    <div class="mb-3">
                        <strong>Mô tả:</strong>
                        <p>{!! nl2br(e($product->desciption)) !!}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Thông số kỹ thuật:</strong>
                        <p>{!! nl2br(e($product->specifications)) !!}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Slug:</strong> {{ $product->slug }}
                    </div>

                    <div class="mb-3">
                        <strong>Trạng thái:</strong>
                  
                        @if ($product->status == 'active')
                            <span class="badge bg-success">{{$product->status}}</span>
                        @elseif ($product->status == 'inactive')
                            <span class="badge bg-secondary">{{$product->status}}</span>
                        @else
                            <span class="badge bg-warning">{{$product->status}}</span>
                        @endif
                    </div>

                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
          </div>
</div>

@endsection