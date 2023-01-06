(function() { 
  $("#slick-featured-business").slick({
    autoplay: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    pauseOnFocus: false,
    pauseOnHover: false,
    dots: true,
    prevArrow: false,
    nextArrow: false,
    responsive: [
      {
        breakpoint: 960,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
})();