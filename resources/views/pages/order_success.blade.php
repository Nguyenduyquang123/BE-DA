@extends('home')

@section('title','Thành công')

@section('content')

<div class="min-h-screen flex flex-col items-center justify-center bg-white p-4">
  <div class="text-green-500 mb-6">
    <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
  </div>

  <div class="text-center">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">ĐẶT HÀNG THÀNH CÔNG!</h2>
    
    <p class="text-gray-600 mb-6">
      Cảm ơn bạn đã đặt hàng. Vui lòng giữ máy, chúng tôi đã nhận được thông tin và sẽ liên hệ sớm với bạn.
    </p>

    <a href=" {{route('home')}} " class="inline-block px-6 py-2 bg-cyan-500 text-white font-semibold rounded hover:bg-cyan-600 transition">
      Tiếp tục mua hàng
    </a>
  </div>
</div>




@endsection