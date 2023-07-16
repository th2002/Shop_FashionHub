$(document).ready(function(){
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 2000,
        fade: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
    });
  });
$(document).ready(function(){
    $('.slider-popular').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 2000,
        fade:false,
        infinite: true,
        arrows: false,
    });
  });