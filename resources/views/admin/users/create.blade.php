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
                  <a href="#">Người dùng</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Thêm người dùng</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm người dùng</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.store') }}"  enctype="multipart/form-data">
                        @csrf
                      @method('POST')
                        <div class="mb-3">
                            <label for="name" class="form-label">Fullname</label>
                            <input type="text" class="form-control" id="name" name="fulllname"
                                value="">
                              @error('fulllname')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                        
                        </div>
                          <div class="mb-3">
                            <label for="description" class="form-label">gender</label>
                            <input type="text" class="form-control" id="slug" name="gender"
                              ></input>
                              @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror 
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="slug" name="phone"
                              ></input>
                              @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                          
                        </div>
                          <div class="mb-3">
                            <label for="description" class="form-label">Email</label>
                            <input type="text" class="form-control" id="slug" name="Email"
                              ></input>
                              @error('Email')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                          
                        </div>
                                
                        <div class="mb-3">
                          <label for="description" class="form-label">Address</label>
                          <input type="text" class="form-control" id="slug" name="address"
                            ></input>
                            @error('address')
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