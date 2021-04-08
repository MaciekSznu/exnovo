$ = jQuery.noConflict();
$(document).ready(function() {
  // function smoothScrollTo(target, distance) {
  //     if (target.length) {
  //         $('html').animate({
  //             scrollTop: target.offset().top - distance,
  //         }, 500);
  //     }
  // }

  // $('a[href*=\\#]:not([href=\\#])').click(function(e) {
  //     if (location.pathname.replace(/^\//,'').replace(/\/$/, '') == this.pathname.replace(/^\//,'').replace(/\/$/, '')
  //         && location.hostname == this.hostname){
  //         e.preventDefault();
  //         smoothScrollTo($(this.hash), 100);
  //     }
  // });

  // if(window.location.hash && $(window.location.hash).length){
  //     smoothScrollTo($(window.location.hash), 100);
  // }

  // $('input, textarea, select').on('keyup change', function(){
  //     $(this).removeClass('error');
  //     $(this).removeClass('wpcf7-not-valid');
  //     $(this).parent().find('.wpcf7-not-valid-tip').remove();
  // });

  // $(window).scroll(function(event){
  //     var st = $(this).scrollTop();
  //     if (st > 1){
  //         $('.header').addClass('fixed');
  //     }
  //     else{
  //         $('.header').removeClass('fixed');
  //     }
  // }).scroll();

  // $('.gallery-js').Chocolat({
  //     imageSelector: '.gallery-image'
  // });

  $(".single-offer-slider-img-wrapper").Chocolat({
    imageSelector: ".gallery-image",
  });

  $(".gallery-slider-js").slick({
    infinite: true,
    arrows: true,
    dots: true,
    swipe: true,
    prevArrow: $(".slider-button-prev"),
    nextArrow: $(".slider-button-next"),
    // asNavFor: '.thumbs-slider-js'
  });
  // $('.thumbs-slider-js').slick({
  //     infinite: true,
  //     arrows: true,
  //     dots: false,
  //     slidesToShow: 6,
  //     slidesToScroll: 1,
  //     asNavFor: '.gallery-slider-js',
  //     focusOnSelect: true
  // });

  // $(document).on('click', '.hamburger-js', function(){
  //     $(this).toggleClass('is-active');
  //     $('.menu-js, .logo-js').toggleClass('active');
  // })

  // if($('.blocks-js').length){
  //     $(document).on('mouseenter', '.blocks-js .item', function(){
  //         $('.blocks-content-js .item').removeClass('active');
  //         $('#block-' + $(this).data('id')).addClass('active');
  //     });
  // };
});
