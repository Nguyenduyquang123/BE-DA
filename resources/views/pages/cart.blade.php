@extends('home')

@section('title','Giỏ hàng')

@section('content')
<div class="w-full max-w-7xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Giỏ hàng</h1>
       
 
        @foreach ($cart as $item )

        <div class="shopping-cart__list divide-y divide-gray-300" data-id="{{ $item['id'] }}">
          <hr>
          <div class="flex flex-col sm:flex-row items-center justify-between py-4 gap-6">
            <div class="flex items-center gap-6 w-full sm:w-1/2">
              <img class="md:w-[330px] md:h-[271px] sm:w-[250px] lg:w-[330px] " src="{{$item['image']}}" alt="">
              <h5 class="text-lg font-bold"> {{$item['name']}} </h5>
            </div>
            <div class="flex items-center justify-center gap-2 w-full sm:w-auto">
              <button class="quantity__btn--left cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                      <mask id="mask0_0_8891" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="30" height="30">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H30V30H0V0Z" fill="white"/>
                      </mask>
                      <g mask="url(#mask0_0_8891)">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0135 2.32986C8.03918 2.31217 2.35729 7.97871 2.32986 14.9791C2.30262 21.9456 7.96816 27.6332 14.9719 27.6702C21.9442 27.707 27.662 22.0046 27.6701 15.0063C27.6783 8.02242 22.0123 2.34768 15.0135 2.32986ZM14.1211 0H15.8789C15.9543 0.016582 16.0289 0.0428906 16.105 0.0482812C18.4514 0.214102 20.6463 0.885 22.6494 2.1123C26.5358 4.49367 28.9259 7.92809 29.7664 12.4192C29.8716 12.9814 29.9234 13.5536 30 14.1211V15.8789C29.976 16.0897 29.9517 16.3004 29.9282 16.5112C29.5695 19.7392 28.3356 22.5863 26.1606 25.0006C23.8512 27.5641 20.989 29.164 17.5837 29.7667C17.0194 29.8666 16.4474 29.9234 15.8789 30H14.1211C14.0457 29.9835 13.9711 29.9572 13.895 29.9518C11.5486 29.786 9.3535 29.1153 7.35064 27.8877C3.46488 25.5059 1.07262 22.073 0.233555 17.5808C0.128555 17.0186 0.076582 16.4464 0 15.8789V14.1211C0.0239648 13.9103 0.0483398 13.6996 0.0717773 13.4888C0.430723 10.2609 1.66354 7.41357 3.83924 4.99939C6.14912 2.43627 9.01102 0.836016 12.4163 0.23332C12.9806 0.133418 13.5526 0.0766992 14.1211 0Z" fill="#8C8C8C"/>
                      </g>
                      <g filter="url(#filter0_d_0_8891)">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1505 13.8467H16.5296C17.8806 13.8467 19.2314 13.8485 20.5824 13.8457C21.0446 13.8448 21.444 13.9758 21.7012 14.3834C21.9355 14.7544 21.956 15.149 21.7466 15.5395C21.5318 15.9403 21.1847 16.1451 20.7335 16.1469C19.3248 16.1525 17.9159 16.1494 16.5072 16.1497C16.4022 16.1497 16.2972 16.1497 16.1505 16.1497C16.1505 16.2685 13.8442 16.1497 13.8442 16.1497C13.712 16.1497 13.6086 16.1497 13.5052 16.1497C12.0867 16.1493 10.6682 16.1549 9.24978 16.1458C8.65526 16.142 8.19799 15.723 8.11772 15.1465C8.04451 14.6208 8.36804 14.0855 8.88322 13.9256C9.07261 13.8669 9.2814 13.8509 9.48151 13.85C10.8131 13.8436 12.1447 13.8467 13.4763 13.8467H13.8442" fill="#8C8C8C"/>
                      </g>
                      <defs>
                      <filter id="filter0_d_0_8891" x="4.10742" y="13.8457" width="21.7832" height="10.3564" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                      <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                      <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                      <feOffset dy="4"/>
                      <feGaussianBlur stdDeviation="2"/>
                      <feComposite in2="hardAlpha" operator="out"/>
                      <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                      <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_8891"/>
                      <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_8891" result="shape"/>
                      </filter>
                      </defs>
                  </svg>
              </button>
              <div class="relative">
                <input type="text" class="quantity__input w-8 text-center text-lg text-[#1C2E3D] text-[18px] border-none " value="{{ $item['quantity'] }}">
                <a href=" {{route('cart.remove', $item['id']) }}" class="delete-button clear-cart-item absolute top-full left-1/2 -translate-x-1/2 text-sm text-[#8C8C8C] cursor-pointer"
                data-id="{{ $item['id'] }}">xóa</a>
              </div>
              <button class="quantity__btn--right cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                      <mask id="mask0_0_8877" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="30" height="30">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H30V30H0V0Z" fill="white"/>
                      </mask>
                      <g mask="url(#mask0_0_8877)">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0135 2.32986C8.03918 2.31217 2.35729 7.97871 2.32986 14.9791C2.30262 21.9456 7.96816 27.6332 14.9719 27.6702C21.9442 27.707 27.662 22.0046 27.6701 15.0063C27.6783 8.02242 22.0123 2.34768 15.0135 2.32986ZM14.1211 0H15.8789C15.9543 0.016582 16.0289 0.0428906 16.105 0.0482812C18.4514 0.214102 20.6463 0.885 22.6494 2.1123C26.5358 4.49367 28.9259 7.92809 29.7664 12.4192C29.8716 12.9814 29.9234 13.5536 30 14.1211V15.8789C29.976 16.0897 29.9517 16.3004 29.9282 16.5112C29.5695 19.7392 28.3356 22.5863 26.1606 25.0006C23.8512 27.5641 20.989 29.164 17.5837 29.7667C17.0194 29.8666 16.4474 29.9234 15.8789 30H14.1211C14.0457 29.9835 13.9711 29.9572 13.895 29.9518C11.5486 29.786 9.3535 29.1153 7.35064 27.8877C3.46488 25.5059 1.07262 22.073 0.233555 17.5808C0.128555 17.0186 0.076582 16.4464 0 15.8789V14.1211C0.0239648 13.9103 0.0483398 13.6996 0.0717773 13.4888C0.430723 10.2609 1.66354 7.41357 3.83924 4.99939C6.14912 2.43627 9.01102 0.836016 12.4163 0.23332C12.9806 0.133418 13.5526 0.0766992 14.1211 0Z" fill="#8C8C8C"/>
                      </g>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1505 13.8465H16.5296C17.8806 13.8465 19.2314 13.8484 20.5824 13.8455C21.0446 13.8446 21.444 13.9756 21.7012 14.3832C21.9355 14.7542 21.956 15.1488 21.7466 15.5393C21.5318 15.9401 21.1847 16.1449 20.7335 16.1467C19.3248 16.1523 17.9159 16.1492 16.5072 16.1495C16.4022 16.1495 16.2972 16.1495 16.1505 16.1495C16.1505 16.2683 16.1505 16.3699 16.1505 16.4717C16.1505 17.8628 16.1537 19.2537 16.149 20.6448C16.1466 21.3622 15.6923 21.8695 15.0496 21.8914C14.3551 21.915 13.8497 21.4086 13.8462 20.6624C13.8397 19.2714 13.8443 17.8803 13.8442 16.4893V16.1495C13.712 16.1495 13.6086 16.1495 13.5052 16.1495C12.0867 16.1491 10.6682 16.1547 9.24978 16.1456C8.65526 16.1418 8.19799 15.7228 8.11772 15.1463C8.04451 14.6206 8.36804 14.0853 8.88322 13.9254C9.07261 13.8667 9.2814 13.8507 9.48151 13.8498C10.8131 13.8434 12.1447 13.8465 13.4763 13.8465H13.8442V13.5028C13.8442 12.1214 13.8416 10.74 13.8455 9.35872C13.8472 8.73298 14.1821 8.27522 14.717 8.14447C15.4684 7.96084 16.1396 8.49781 16.1473 9.3121C16.1585 10.4905 16.1504 11.6691 16.1505 12.8476C16.1505 13.1652 16.1505 13.4827 16.1505 13.8465Z" fill="#8C8C8C"/>
                  </svg>
              </button>
            </div>
            <p class="shopping-cart__list--price text-lg font-bold text-right text-[20px]" data-price="1290000">{{ number_format($item['price'] * $item['quantity']) }}<span>đ</span></p>
          </div>

        
        </div>
      
        @endforeach
      
       
        <div class="bg-white p-6 mt-2">
          <hr class="text-gray-300">
          <div class="flex justify-between text-lg font-bold pt-7">
            <p class="text-[20px]">Tạm tính</p>
            <p class="provisional-cart__title--price font-bold text-[20px]">
            @php $total = 0; @endphp
            @foreach ($cart as $prices)
                @php $total += $prices['price'] * $prices['quantity']; @endphp
            @endforeach
            {{ number_format($total, 0, ',', '.') }}

            </p>
          </div>
          <div class="flex flex-col sm:flex-row justify-between items-center my-4 gap-4">
            <p class="flex gap-1 md:gap-[30px]  items-center  font-bold text-lg leading-0 text-[20px]">Khuyến mại 
              <span class="flex gap-[6px] items-center font-light  text-[#0066C2] text-base">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                      <mask id="mask0_0_8930" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="17" height="17">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H17V17H0V0Z" fill="white"/>
                      </mask>
                      <g mask="url(#mask0_0_8930)">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33054 4.16397C7.33337 4.40939 7.36503 4.59793 7.4407 4.77641C7.57939 5.1035 7.80522 5.33774 8.1638 5.41232C8.74481 5.53321 9.34397 5.20982 9.5661 4.65036C9.7333 4.22912 9.72283 3.80693 9.46072 3.4296C9.04318 2.82868 8.17938 2.86694 7.74963 3.23733C7.45295 3.493 7.34368 3.8353 7.33054 4.16397ZM6.69 7.97065C6.69956 7.96591 6.70596 7.96459 6.70965 7.96072C6.89858 7.76001 7.14003 7.66487 7.40372 7.61244C7.5393 7.58548 7.60777 7.62075 7.62464 7.75843C7.63981 7.88216 7.64305 8.01 7.63071 8.13397C7.58442 8.59684 7.48889 9.05156 7.38917 9.50537C7.22521 10.252 7.05855 10.998 6.90357 11.7464C6.82728 12.1147 6.78744 12.4889 6.82583 12.8665C6.8717 13.318 7.0913 13.6507 7.51333 13.831C8.01929 14.0472 8.54046 14.0927 9.07492 13.9441C9.46737 13.835 9.81698 13.6549 10.0911 13.346C10.2554 13.1607 10.3786 12.9476 10.5 12.7338C10.583 12.5878 10.6582 12.4374 10.7387 12.2856C10.5713 12.1649 10.4107 12.0491 10.2446 11.9293C10.2263 11.9761 10.2118 12.0136 10.1969 12.051C10.0752 12.3586 9.93216 12.6538 9.70483 12.9002C9.60179 13.0118 9.48308 13.0987 9.33549 13.1422C9.17847 13.1884 9.09433 13.1445 9.03728 12.9917C8.94603 12.7472 8.91313 12.4933 8.90706 12.2343C8.89904 11.8889 8.95987 11.552 9.03117 11.2165C9.18167 10.5085 9.3332 9.80089 9.48412 9.09307C9.56472 8.71528 9.61953 8.33609 9.59668 7.94693C9.56497 7.4067 9.36827 6.94001 9.00337 6.54308C8.77202 6.29139 8.48486 6.17249 8.14236 6.18744C7.85687 6.19995 7.6022 6.30028 7.36948 6.45982C7.02369 6.69688 6.72964 6.99099 6.45154 7.30205C6.38872 7.3723 6.32867 7.44501 6.26523 7.519C6.41003 7.67293 6.55026 7.82208 6.69 7.97065ZM8.50473 0C13.205 8.30925e-05 17.009 3.81116 17 8.52642C16.991 13.213 13.1829 17.0158 8.47024 16.9999C3.77643 16.9841 -0.018315 13.1713 0.000133481 8.46572C0.0184158 3.78806 3.81079 0.00220195 8.50473 0Z" fill="#0066C2"/>
                      </g>
                  </svg>
              Ưu đãi dành cho bạn</span>
          </p>
            <div class="flex ">
              <input type="text" class="bg-[#F5F5F5] px-3 py-2 text-[#9E9E9E]" placeholder="Nhập mã giảm giá">
              <button class="bg-primary text-white px-4 py-2">Áp dụng</button>
            </div>
          </div>
          <div class="flex justify-between text-xl font-bold">
            <p>Tổng tiền</p>
            <p class="provisional-cart__total--price text-primary font-bold text-[24px]"> 
              @php $total = 0; @endphp
              @foreach ($cart as $prices)
                  @php $total += $prices['price'] * $prices['quantity']; @endphp
              @endforeach
              {{ number_format($total, 0, ',', '.') }}

              </p>
          </div>
        </div>

        <form action="{{ route('order.store') }}" method="POST">
        @csrf
          <div class="bg-[#F4F4F4] p-6 mt-6">
            <h3 class="text-xl font-bold mb-4">Thông tin khách hàng</h3>
          
            <div class="flex gap-4 text-lg text-gray-700 mb-4 ">
              <label><input type="radio" name="gender" value="Anh" checked > Anh</label>
              <label><input type="radio" name="gender" value="Chị"> Chị</label>
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
              <input type="text" name="fulllname" value="{{ old('fullname') }}" placeholder="Họ và tên" class="w-full sm:w-1/2 px-4 py-2 border border-[#B6B6B6]  bg-white">
              <input type="text" name="phone" placeholder="Số điện thoại" class="w-full sm:w-1/2 px-4 py-2 border  border-[#B6B6B6]  bg-white">
            </div>
            <h3 class="text-xl font-bold mb-4 mt-[35px]">Phương thức thanh toán</h3>
            <div class="flex gap-4 text-lg text-gray-700 mb-4">
              <label><input type="radio" name="ship" value="Giao hàng tận nơi" checked> Giao hàng tận nơi</label>
              <label><input type="radio" name="ship" value="Nhận tại showroom"> Nhận tại showroom</label>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 mb-4">
            <select name="city" class="w-full sm:w-1/2 px-4 py-2 border border-[#B6B6B6] bg-white">
                <option value="">Chọn tỉnh / Thành phố</option>
                <option value="An Giang">An Giang</option>
                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                <option value="Bắc Giang">Bắc Giang</option>
                <option value="Bắc Kạn">Bắc Kạn</option>
                <option value="Bạc Liêu">Bạc Liêu</option>
                <option value="Bắc Ninh">Bắc Ninh</option>
                <option value="Bến Tre">Bến Tre</option>
                <option value="Bình Định">Bình Định</option>
                <option value="Bình Dương">Bình Dương</option>
                <option value="Bình Phước">Bình Phước</option>
                <option value="Bình Thuận">Bình Thuận</option>
                <option value="Cà Mau">Cà Mau</option>
                <option value="Cần Thơ">Cần Thơ</option>
                <option value="Cao Bằng">Cao Bằng</option>
                <option value="Đà Nẵng">Đà Nẵng</option>
                <option value="Đắk Lắk">Đắk Lắk</option>
                <option value="Đắk Nông">Đắk Nông</option>
                <option value="Điện Biên">Điện Biên</option>
                <option value="Đồng Nai">Đồng Nai</option>
                <option value="Đồng Tháp">Đồng Tháp</option>
                <option value="Gia Lai">Gia Lai</option>
                <option value="Hà Giang">Hà Giang</option>
                <option value="Hà Nam">Hà Nam</option>
                <option value="Hà Nội">Hà Nội</option>
                <option value="Hà Tĩnh">Hà Tĩnh</option>
                <option value="Hải Dương">Hải Dương</option>
                <option value="Hải Phòng">Hải Phòng</option>
                <option value="Hậu Giang">Hậu Giang</option>
                <option value="Hòa Bình">Hòa Bình</option>
                <option value="Hưng Yên">Hưng Yên</option>
                <option value="Khánh Hòa">Khánh Hòa</option>
                <option value="Kiên Giang">Kiên Giang</option>
                <option value="Kon Tum">Kon Tum</option>
                <option value="Lai Châu">Lai Châu</option>
                <option value="Lâm Đồng">Lâm Đồng</option>
                <option value="Lạng Sơn">Lạng Sơn</option>
                <option value="Lào Cai">Lào Cai</option>
                <option value="Long An">Long An</option>
                <option value="Nam Định">Nam Định</option>
                <option value="Nghệ An">Nghệ An</option>
                <option value="Ninh Bình">Ninh Bình</option>
                <option value="Ninh Thuận">Ninh Thuận</option>
                <option value="Phú Thọ">Phú Thọ</option>
                <option value="Phú Yên">Phú Yên</option>
                <option value="Quảng Bình">Quảng Bình</option>
                <option value="Quảng Nam">Quảng Nam</option>
                <option value="Quảng Ngãi">Quảng Ngãi</option>
                <option value="Quảng Ninh">Quảng Ninh</option>
                <option value="Quảng Trị">Quảng Trị</option>
                <option value="Sóc Trăng">Sóc Trăng</option>
                <option value="Sơn La">Sơn La</option>
                <option value="Tây Ninh">Tây Ninh</option>
                <option value="Thái Bình">Thái Bình</option>
                <option value="Thái Nguyên">Thái Nguyên</option>
                <option value="Thanh Hóa">Thanh Hóa</option>
                <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                <option value="Tiền Giang">Tiền Giang</option>
                <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                <option value="Trà Vinh">Trà Vinh</option>
                <option value="Tuyên Quang">Tuyên Quang</option>
                <option value="Vĩnh Long">Vĩnh Long</option>
                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                <option value="Yên Bái">Yên Bái</option>
            </select>

              <input type="text" name="address" placeholder="Địa chỉ" class="w-full sm:w-1/2 px-4 py-2 border border-[#B6B6B6]  bg-white">
            </div>
            <textarea rows="4" placeholder="Yêu cầu khác (không bắt buộc)" class="w-full px-4 py-2 border border-[#B6B6B6]  bg-white"></textarea>
          </div>
            @foreach ($cart as $item)
              <input type="hidden" name="products[{{ $item['id'] }}][product_id]" value="{{ $item['id'] }}">
              <input type="hidden" name="products[{{ $item['id'] }}][quantity]" value="{{ $item['quantity'] }}">
              <input type="hidden" name="products[{{ $item['id'] }}][price]" value="{{ $item['price'] }}">
            @endforeach
          <input type="hidden" name="payment_method" id="payment_method">
          <div class="flex flex-col sm:flex-row justify-center gap-6 mt-8 mb-4">
            <button type="button" onclick="submitPayment('Cash on Delivery')"  class="cursor-pointer w-full sm:w-1/3 bg-gradient-to-b from-[#FA5754] to-[#DE0200] text-white font-bold px-4 py-4 rounded shadow-md">
              THANH TOÁN KHI NHẬN HÀNG<br><span class="font-normal text-base">Kiểm tra hàng trước khi trả tiền</span>
            </button>
            <button type="button" onclick="submitPayment('Online Payment')" class="cursor-pointer w-full sm:w-1/3 bg-gradient-to-b from-[#FA5754] to-[#DE0200] text-white font-bold px-4 py-4 rounded shadow-md">
              THANH TOÁN ONLINE<br><span class="font-normal text-base">Bằng thẻ Visa, master, JCB</span>
            </button>
            <button type="button" onclick="submitPayment('Installment')" class="cursor-pointer w-full sm:w-1/3 bg-gradient-to-b from-[#6BA8F7] to-[#1B76EB] text-white font-bold px-4 py-4 rounded shadow-md">
              THANH TOÁN TRẢ GÓP<br><span class="font-normal text-base">Công ty Tài chính Hoặc qua thẻ tín dụng</span>
            </button>
          </div>
        </form>

        <a href="#" class="text-center block underline underline-offset-4 text-lg text-gray-700 mb-10">Mua thêm sản phẩm khác</a>
</div>
<script>
function submitPayment(method) {
    document.getElementById('payment_method').value = method;
    document.querySelector('form').submit();
}
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
        function formatPrice(price) {
      return Number(price).toLocaleString('vi-VN');
    }

    document.querySelectorAll('.shopping-cart__list').forEach(item => {
        const id = item.getAttribute('data-id');
        const minusBtn = item.querySelector('.quantity__btn--left');
        const plusBtn = item.querySelector('.quantity__btn--right');
        const input = item.querySelector('.quantity__input');
        const priceEl = item.querySelector('.shopping-cart__list--price');

        function updateQuantity(type) {
            fetch('{{ route('cart.update') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id, type })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    if (data.quantity === 0) {
                        item.remove();
                    } else {
                        input.value = data.quantity;
                        priceEl.innerHTML = `${formatPrice(data.price)}<span> đ</span>`;
                    }

                    updateTotalPrice(data.total);
                }
            });
        }

        plusBtn.addEventListener('click', () => updateQuantity('plus'));
        minusBtn.addEventListener('click', () => updateQuantity('minus'));
    });

  

  function updateTotalPrice(total) {
      const totalPrice = document.querySelector('.provisional-cart__total--price');
      const topPrice = document.querySelector('.provisional-cart__title--price');
      const formatted = formatPrice(total);
      if (totalPrice) totalPrice.textContent = `${formatted} đ`;
      if (topPrice) topPrice.textContent = `${formatted} đ`;
  }
  
})

</script>



@endsection
    


  
  