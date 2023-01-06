(function () {
  $("#slick-ads").slick({
    infinite: true,
    fade: false,
    slidesToShow: 2,
    pauseOnFocus: false,
    pauseOnHover: false,
    prevArrow: false,
    nextArrow: false,
    dots: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      }
    ]
  });
})();
