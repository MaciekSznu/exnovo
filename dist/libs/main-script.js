$ = jQuery.noConflict();
$(document).ready(function() {
  $(".single-offer-slider-img-wrapper").Chocolat({
    imageSelector: ".gallery-image",
    loop: "true",
  });

  $(".gallery-slider-js").slick({
    infinite: true,
    arrows: true,
    variableWidth: true,
    prevArrow: $(".slider-button-prev"),
    nextArrow: $(".slider-button-next"),
  });

  $(".opinions-wrapper").slick({
    arrows: true,
    centerMode: true,
    centerPadding: "0px",
    mobileFirst: true,
    prevArrow: $(".slider-button-prev"),
    nextArrow: $(".slider-button-next"),
    responsive: [
      {
        breakpoint: 708,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
    ],
  });

  if ($(window).width() < 768) {
    $(".partners-logos-slider").slick({
      mobileFirst: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 500,
      responsive: [
        {
          breakpoint: 414,
          settings: {
            slidesToShow: 2,
          },
        },
      ],
    });
  }
});
