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
                  <a href="#">Sản phẩm </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Thêm sản phẩm</a>
                </li>
              </ul>
            </div>
             <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm sản phẩm</h4>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
               <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="mb-3">
                            <label for="category_id" class="form-label">Danh mục</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">Chọn danh mục</option>
                                @foreach ( $categories as $cate ){
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>

                                }
                                
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    
                       
                    
                        <div class="row mb-3">
                            <div class="col">
                                <label for="price" class="form-label">Giá bán</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01">
                            </div>
                            <div class="col">
                                <label for="old_price" class="form-label">Giá gốc</label>
                                <input type="number" class="form-control" id="old_price" name="old_price" step="0.01">
                            </div>
                        </div>

                    
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Ảnh</label>
                            <input type="file" class="form-control"  name="images[]" id="images" multiple  accept="image/*">

                            @error('image_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    
                        <div class="mb-3">
                            <label for="slide" class="form-label">Slide</label>
                            <select class="form-select" id="slide" name="slide">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                        </div>

                    
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Trả góp</label>
                                <select name="installment" class="form-select">
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                </select>
                            </div>
                            
                            <div class="col">
                                <label class="form-label">Giảm giá</label>
                                <select name="discounted" class="form-select">
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                </select>
                            </div>
                        </div>

                
                        <div class="mb-3">
                            <label for="desciption" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="desciption" name="desciption" rows="5"></textarea>
                        </div>

                    
                        <div class="mb-3">
                            <label for="specifications" class="form-label">Thông số kỹ thuật</label>
                            <textarea class="form-control" id="specifications" name="specifications" rows="5"></textarea>
                        </div>
                         <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select class="form-select" name="status" id="status">
                                <option value="pending">Chờ duyệt</option>
                                <option value="active">Hiển thị</option>
                                <option value="inactive">Ẩn</option>
                            </select>
                        </div>

                    
                     

                        <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
          </div>
</div>

@endsection