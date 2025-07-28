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
                  <a href="#">Danh sách sản phẩm</a>
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
                        <h4 class="card-title">Danh sách sách</h4>
                        <a class="btn btn-success btn-round ms-auto" href="{{route('admin.products.create')}}">
                            <i class="fa fa-plus"></i>
                            Thêm
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>CATEGORY</th>
                                    <th>NAME</th>
                                    <th>PRICE</th>
                                    <th>OLD_PRICE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($productall as $pro)
                              <tr>
                                  <td>{{$pro->category_name}}</td>
                                  <td>{{ $pro->name }}</td>
                                  <td>{{ number_format($pro->price, 0, ',', '.') }}₫</td>
                                  <td>{{ number_format($pro->old_price, 0, ',', '.') }}₫</td>
                                  <td>{{ $pro->status }}</td>
                                  <td>
                                      <form action="{{ route('admin.products.destroy', $pro->id) }}" method="POST" class="d-flex align-items-center">
                                          @csrf
                                          @method('DELETE')
                                          <a class="btn btn-link btn-info btn-lg me-1" href="{{ route('admin.products.show', $pro->id) }}" title="Xem chi tiết">
                                              <i class="fa fa-eye"></i>
                                          </a>
                                          <a class="btn btn-link btn-primary btn-lg" href="{{ route('admin.products.edit', $pro->id) }}">
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