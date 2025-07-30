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
                  <a href="#">Thêm sản phẩm</a>
                </li>
              </ul>
            </div>
            <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4>Thêm sản phẩm đơn hàng</h4>
            </div>
              <div class="card-body">
                  <form method="POST" action="{{route('admin.orderItems.store')}} " >
                      @csrf
                     <div class="mb-3">
                          <label class="form-label">Sản phẩm</label>
                          <select name="product_id" id="productSelect" class="form-select" required>
                            <option value="">Chọn sản phẩm</option>
                              @foreach($productall as $product)
                                  <option value="{{ $product->id }}" 
                                      data-price="{{ $product->price }}">
                                      {{ $product->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <input type="text" name="orders_id" value="{{$orderItems->id}}" hidden>

                      <div class="mb-3">
                          <label class="form-label">Giá</label>
                          <input type="number" class="form-control" id="priceInput" name="price" 
                              value="" readonly required>
                      </div>


                      <div class="mb-3">
                          <label class="form-label">Số lượng</label>
                          <input type="number" class="form-control" name="quantity" value="" required>
                      </div>

                      <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
              </div>
          </div>
        </div>
    </div>
          </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productSelect = document.getElementById('productSelect');
        const priceInput = document.getElementById('priceInput');

        function updatePrice() {
            const selected = productSelect.options[productSelect.selectedIndex];
            const price = selected.getAttribute('data-price');
            priceInput.value = price || '';
        }

        productSelect.addEventListener('change', updatePrice);
        
  
        updatePrice();
    });
</script>
@endpush
