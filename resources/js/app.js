import './bootstrap';

 $(document).ready(function(){
    $('#slide').owlCarousel({
            loop:true,
            dots:false,
            center:false,
            margin:20,
            responsive:{
            0:{items:2},
            550:{items:3},
            1000:{items:3}
            }
        });

        $('#btn-left').click(function(){
            $('#slide').trigger('prev.owl.carousel');
        });
        $('#btn-right').click(function(){
            $('#slide').trigger('next.owl.carousel');
        });


  const click_cursor_chat = document.querySelectorAll("#cusor_chat");
  
  click_cursor_chat.forEach((btn) => {
    btn.addEventListener("click", function () {
      const container = btn.parentElement;
      const chat_box = container.querySelector("#chat_box");
      const img_dow = btn.querySelector("#img_dow");
      const h3 = btn.querySelector("h3");
      document.querySelectorAll("#chat_box").forEach((box) => {
        if (box !== chat_box) {
          box.classList.add("hidden");
          const parent = box.parentElement.querySelector("#cusor_chat");
          if (parent) {
            const otherH3 = parent.querySelector("h3");
            const otherImg = parent.querySelector("#img_dow");
            if (otherH3) {
              otherH3.classList.remove("text-[#DE0200]");
              otherH3.classList.add("text-black");
            }
            if (otherImg) {
              otherImg.classList.remove("rotate-180");
            }
          }
      }
    });
  
      chat_box.classList.toggle("hidden"); 
      img_dow.classList.toggle("rotate-180");
       if (chat_box.classList.contains("hidden")) {
        h3.classList.remove("text-[#DE0200]"); 
        h3.classList.add("text-black");        
      } else {
        h3.classList.remove("text-black");
        h3.classList.add("text-[#DE0200]");
      }
    });
  });
         
});








$(document).ready(function(){
    $('#slide_detail').owlCarousel({
            loop:true,
            dots:false,
            center:false,
            margin:19,
            responsive:{
            0:{items:2},
            550:{items:3},
            1000:{items:4}
            }
        });

        $('#btn-left').click(function(){
            $('#slide_detail').trigger('prev.owl.carousel');
        });
        $('#btn-right').click(function(){
            $('#slide_detail  ').trigger('next.owl.carousel');
        });    
});

$(document).ready(function(){
  const thumbCarousel = $('#thumbSlider');
        thumbCarousel.owlCarousel({
            loop:true,
            dots:false,
            center:false,
            margin:19,
            responsive:{
            0:{items:2},
            550:{items:3},
            1000:{items:3}
            }
        });

        $('.button-left').click(function(){
            $('#thumbSlider').trigger('prev.owl.carousel');
        });
        $('.button-right').click(function(){
            $('#thumbSlider  ').trigger('next.owl.carousel');
        });    
          thumbCarousel.on('changed.owl.carousel', function(event) {
            var currentIndex = event.item.index;
            var currentItem = $(event.target).find('.owl-item').eq(currentIndex).find('.thumb-item');


            var imgSrc = currentItem.attr('src');
            $('.thumb-item-main').attr('src', imgSrc);
          });
          $('.thumb-item-main').click(function () {
            const img_main = $(this).attr('src');
            $('#popup img').attr('src', img_main);
              $('#overlay').fadeIn(200);
              $('#popup').fadeIn(200);
          });
            
        $('.thumb-item').click(function () {
              const imgSrc = $(this).attr('src');
              $('.thumb-item-main').attr('src', imgSrc);
              $('#popup img').attr('src', imgSrc);
              $('#overlay').fadeIn(200);
              $('#popup').fadeIn(200);
          });

          $('#overlay').click(function () {
              $('#overlay').fadeOut(200);
              $('#popup').fadeOut(200);
          });
                  
        });

  $(document).ready(function () {
    function openPopupWithImages(currentSrc) {
      $('#popupSlider').trigger('destroy.owl.carousel').html('');

      let imageSources = [];
      $('.thumb-item').each(function () {
        const src = $(this).attr('src');
        imageSources.push(src);
      });

      imageSources.forEach(function (src) {
        $('#popupSlider').append(`
          <div class="item">
            <img src="${src}" class="w-full h-auto rounded" />
          </div>
        `);
      });

      $('#overlay').removeClass('hidden');
      $('#popup').removeClass('hidden');

     $('#popupSlider').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        navText: [
          `<button class="owl-prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
              <circle cx="14" cy="14" r="14" fill="#B6B6B6"/>
              <path d="M11.058 13.5108L15.8469 8.78109C16.051 8.59121 16.051 8.31503 15.8469 8.14241C15.6427 7.95253 15.3457 7.95253 15.1601 8.14241L10.2227 12.9929C9.92575 13.2691 9.92575 13.7179 10.2227 14.0459L15.1044 18.8619C15.1972 18.9482 15.3457 19 15.4571 19C15.5684 19 15.6984 18.9482 15.8097 18.8619C16.0139 18.672 16.0139 18.3958 15.8097 18.2232L11.058 13.5108Z" fill="white"/>
            </svg>
          </button>`,
          `<button class="owl-next">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
              <circle cx="14" cy="14" r="14" transform="matrix(-1 0 0 1 28 0)" fill="#B6B6B6"/>
              <path d="M16.942 13.5108L12.1531 8.78109C11.949 8.59121 11.949 8.31503 12.1531 8.14241C12.3573 7.95253 12.6543 7.95253 12.8399 8.14241L17.7773 12.9929C18.0742 13.2691 18.0742 13.7179 17.7773 14.0459L12.8956 18.8619C12.8028 18.9482 12.6543 19 12.5429 19C12.4316 19 12.3016 18.9482 12.1903 18.8619C11.9861 18.672 11.9861 18.3958 12.1903 18.2232L16.942 13.5108Z" fill="white"/>
            </svg>
          </button>`
        ]
      });

      const index = imageSources.indexOf(currentSrc);
      if (index !== -1) {
        $('#popupSlider').trigger('to.owl.carousel', [index, 0]);
      }
    }

    $('.thumb-item').on('click', function () {
      const src = $(this).attr('src');
      openPopupWithImages(src);
    });

    $('.thumb-item-main').on('click', function () {
      const src = $(this).attr('src');
      openPopupWithImages(src);
    });

    $('#overlay').on('click', function () {
      $(this).addClass('hidden');
      $('#popup').addClass('hidden');

      $('#popupSlider').trigger('destroy.owl.carousel').html('');
    });

    $('.button-left').on('click', function () {
      $('#thumbSlider').trigger('prev.owl.carousel');
    });

    $('.button-right').on('click', function () {
      $('#thumbSlider').trigger('next.owl.carousel');
    });
    $('#thumbSlider').owlCarousel({
      items: 4,
      margin: 10,
      nav: false,
      dots: false
    });
  });



  $(document).ready(function () {

    $('#toggleContent').click(function (e) {
      e.preventDefault();
      $('#content').removeClass('hidden');  
      $('#blud').addClass('hidden');
      $(this).addClass('hidden');              
    });

  
    $('#collapseContent').click(function () { 
      $('#content').addClass('hidden');       
      $('#toggleContent').removeClass('hidden'); 
      $('#blud').removeClass('hidden');

    });
    
  });
$(document).ready(function () {
  const toggles = document.querySelectorAll('.togchat');

  toggles.forEach(function (toggle) {
    toggle.addEventListener('click', function () {
      const container = toggle.closest('li');
      const content = container.querySelector('.chatcontent');
      const h3 = toggle.querySelector('h3');
      const icon = toggle.querySelector('.icon_svg');

      const isVisible = !content.classList.contains('hidden');

      document.querySelectorAll('.chatcontent').forEach(function (el) {
        el.classList.add('hidden');
      });
      document.querySelectorAll('.togchat h3').forEach(function (el) {
        el.classList.remove('text-[#DE0200]');
        el.classList.add('text-black');
      });
      document.querySelectorAll('.togchat svg').forEach(function (el) {
        el.classList.remove('rotate-180');
      });
      if (!isVisible) {
        content.classList.remove('hidden');
        if (h3) {
          h3.classList.remove('text-black');
          h3.classList.add('text-[#DE0200]');
        }
        if (icon) {
          icon.classList.add('rotate-180');
        }
      }
    });
  });
});
// giỏ hàng 



// $(document).ready(function () {
//     const btn_right_list = document.querySelectorAll('.quantity__btn--right');
//     const btn_left_list = document.querySelectorAll('.quantity__btn--left');

//     function formatPrice(value) {
//         return value.toLocaleString('vi-VN');
//     }

//     function updateTotalCart() {
//         const priceList = document.querySelectorAll('.shopping-cart__list--price');
//         let total = 0;

//         priceList.forEach(priceElement => {
//             const priceText = priceElement.textContent.replace(/[^\d]/g, '');
//             const price = parseInt(priceText);
//             total += price;
//         });

//         const totalElement = document.querySelector('.provisional-cart__total--price');
//         const tprice = document.querySelector('.provisional-cart__title--price');
//         totalElement.textContent = `${formatPrice(total)} đ`;
//         tprice.textContent = `${formatPrice(total)} đ`;
//     }

//     btn_right_list.forEach(btn => {
//         btn.addEventListener('click', () => {
//             const parent = btn.closest('.shopping-cart__list');
//             const input = parent.querySelector('.quantity__input');
//             const priceElement = parent.querySelector('.shopping-cart__list--price');

//             let value = parseInt(input.value);
//             value++;
//             input.value = value;

//             const unitPrice = parseInt(priceElement.getAttribute('data-price'));
//             const totalPrice = unitPrice * value;

//             priceElement.innerHTML = `${formatPrice(totalPrice)} <span>đ</span>`;
//             updateTotalCart();
//         });
//     });

//     btn_left_list.forEach(btn => {
//         btn.addEventListener('click', () => {
//             const parent = btn.closest('.shopping-cart__list');
//             const input = parent.querySelector('.quantity__input');
//             const priceElement = parent.querySelector('.shopping-cart__list--price');

//             let value = parseInt(input.value);
//             value = value > 0 ? value - 1 : 0;
//             input.value = value;

//             const unitPrice = parseInt(priceElement.getAttribute('data-price'));
//             const totalPrice = unitPrice * value;

//             priceElement.innerHTML = `${formatPrice(totalPrice)} <span>đ</span>`;
//             updateTotalCart();
//         });
//     });

//     // Gán sự kiện xoá sản phẩm
//     const deleteButtons = document.querySelectorAll('.delete-button');
//     deleteButtons.forEach(btn => {
//         btn.addEventListener('click', function () {
//             deleteParent(this);
//         });
//     });

//     // Gọi cập nhật tổng lần đầu
//     updateTotalCart();
// });

  function deleteParent(btn) {
    const cartItem = btn.closest('.shopping-cart__list');
    if (!cartItem) return;

    cartItem.remove();

    let newTotal = 0;
    document.querySelectorAll('.shopping-cart__list').forEach(item => {
      const quantity = parseInt(item.querySelector('.quantity__input')?.value || '1');
      const unitPrice = parseInt(item.querySelector('.shopping-cart__list--price')?.getAttribute('data-price') || '0');
      newTotal += quantity * unitPrice;
    });

    const totalElement = document.querySelector('.provisional-cart__total--price');
    const tpriceElement = document.querySelector('.provisional-cart__title--price');

    totalElement.textContent = `${formatPrice(newTotal)} đ`;
    tpriceElement.textContent = `${formatPrice(newTotal)} đ`;
  }

  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-button').forEach(btn => {
      btn.addEventListener('click', function () {
        deleteParent(this);
      });
    });
  });


  // nav mobile

 document.addEventListener('DOMContentLoaded', function () {
    const navMobile = document.getElementById('nav_mobile');
    const menuMobile = document.getElementById('menu_mobile');
    const exitMobile = document.getElementById('exit_mobile');
    const overlayMobile = document.getElementById('overlay_mobile');

    // Mở menu khi bấm nút menu
    navMobile.addEventListener('click', function () {
      menuMobile.classList.remove('hidden');
      overlayMobile.classList.remove('hidden');
    });

    // Đóng menu khi bấm dấu X
    exitMobile.addEventListener('click', function () {
      menuMobile.classList.add('hidden');
      overlayMobile.classList.add('hidden');
    });

    // Đóng menu khi bấm vào vùng overlay mờ
    overlayMobile.addEventListener('click', function () {
      menuMobile.classList.add('hidden');
      overlayMobile.classList.add('hidden');
    });
  });
const productId = parent.getAttribute('data-id');

// Gửi AJAX lên Laravel để cập nhật session
fetch('/update-cart', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({
        id: productId,
        quantity: value
    })
});