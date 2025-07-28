@extends('admin.layouts.admin')

@section('content_admin')
<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Danh mục</h3>
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
                  <a href="#">Thêm danh mục</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm danh mục</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục sách</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="">
                              @error('name')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                        
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                              ></input>
                              @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                          
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Chọn trạng thái</option>
                                <option value="active">active</option>
                                <option value="inactive">inactive</option>
                            </select>
                               @error('status')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
            </div>
          </div>
</div>

@endsection