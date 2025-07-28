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
                  <a href="#">Danh mục</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">sửa danh mục</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sửa danh mục</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{$category->name}}">
                              @error('name')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                        
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$category->slug}}"></input>
                              @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                          
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select class="form-select" id="status" name="status">
                              <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Hiển thị</option>
                              <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Ẩn</option>
                            </select>
                               @error('status')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
            </div>
          </div>
</div>

@endsection