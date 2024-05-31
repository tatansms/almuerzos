jQuery(function($) {
  $(window).on('scroll', function() {
  if ($(this).scrollTop() >= 200) {
    $('.navbar').addClass('fixed-top');
  } else if ($(this).scrollTop() == 0) {
    $('.navbar').removeClass('fixed-top');
  }
});

function adjustNav() {
  var winWidth = $(window).width(),
    dropdown = $('.dropdown'),
    dropdownMenu = $('.dropdown-menu');
  
  if (winWidth >= 768) {
    dropdown.on('mouseenter', function() {
      $(this).addClass('show')
        .children(dropdownMenu).addClass('show');
    });
    
    dropdown.on('mouseleave', function() {
      $(this).removeClass('show')
        .children(dropdownMenu).removeClass('show');
    });
  } else {
    dropdown.off('mouseenter mouseleave');
  }
}

$(window).on('resize', adjustNav);

adjustNav();
}); 


var swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 3200,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});