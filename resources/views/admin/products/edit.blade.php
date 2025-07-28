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
                <div class="card-header">
                    <h4 class="card-title">Sửa sản phẩm     </h4>
                </div>
                 @if (session('success'))
                    <p class="alert alert-success" style="color: green">{{ session('success') }}</p>
                @endif
                <div class="card-body">
                  <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <strong>Đã xảy ra lỗi:</strong>
                              <ul class="mb-0">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      <div class="mb-3">
                          <label for="category_id" class="form-label">Danh mục</label>
                          <select class="form-select" id="category_id" name="category_id" required>
                              <option value="">Chọn danh mục</option>
                              @foreach ($categories as $cate)
                                  <option value="{{ $cate->id }}" {{ $product->category_id == $cate->id ? 'selected' : '' }}>
                                      {{ $cate->name }}
                                  </option>
                              @endforeach
                          </select>
                          @error('category_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="name" class="form-label">Tên sản phẩm</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                          @error('name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                      <div class="row mb-3">
                          <div class="col">
                              <label for="price" class="form-label">Giá bán</label>
                              <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                          </div>
                          <div class="col">
                              <label for="old_price" class="form-label">Giá gốc</label>
                              <input type="text" class="form-control" id="old_price" name="old_price" value="{{ $product->old_price }}">
                          </div>
                      </div>

                      <div class="mb-3">
                          <label for="image_url" class="form-label">Ảnh hiện tại</label><br>
                          @php $images = json_decode($product->image_url, true) ?? []; @endphp
                          @foreach ($images as $img)
                              <img src="{{ asset($img) }}" alt="Ảnh" width="50">
                          @endforeach
                          <br><label for="images" class="form-label">Chọn ảnh mới (nếu cần)</label>
                          <input type="file" class="form-control" name="images[]" id="images" multiple accept="image/*">
                          @error('image_url')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="slide" class="form-label">Slide</label>
                          <select class="form-select" id="slide" name="slide">
                              <option value="0" {{ $product->slide == 0 ? 'selected' : '' }}>Không</option>
                              <option value="1" {{ $product->slide == 1 ? 'selected' : '' }}>Có</option>
                          </select>
                      </div>

                      <div class="row mb-3">
                          <div class="col">
                              <label class="form-label">Trả góp</label>
                              <select name="installment" class="form-select">
                                  <option value="0" {{ $product->installment == 0 ? 'selected' : '' }}>Không</option>
                                  <option value="1" {{ $product->installment == 1 ? 'selected' : '' }}>Có</option>
                              </select>
                          </div>
                          <div class="col">
                              <label class="form-label">Giảm giá</label>
                              <select name="discounted" class="form-select">
                                  <option value="0" {{ $product->discounted == 0 ? 'selected' : '' }}>Không</option>
                                  <option value="1" {{ $product->discounted == 1 ? 'selected' : '' }}>Có</option>
                              </select>
                          </div>
                      </div>

                      <div class="mb-3">
                          <label for="desciption" class="form-label">Mô tả</label>
                          <textarea class="form-control" id="desciption" name="desciption" rows="5">{{ $product->desciption }}</textarea>
                      </div>

                      <div class="mb-3">
                          <label for="specifications" class="form-label">Thông số kỹ thuật</label>
                          <textarea class="form-control" id="specifications" name="specifications" rows="5">{{ $product->specifications }}</textarea>
                      </div>

                      <div class="mb-3">
                          <label for="slug" class="form-label">Slug</label>
                          <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}">
                      </div>

                      <div class="mb-3">
                          <label for="status" class="form-label">Trạng thái</label>
                          <select class="form-select" name="status" id="status">
                              <option value="pending" {{ $product->status == 'pending' ? 'selected' : '' }}>Chờ duyệt</option>
                              <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Hiển thị</option>
                              <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Ẩn</option>
                          </select>
                      </div>

                      <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
          </div>
</div>
@endsection