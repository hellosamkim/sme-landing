(function() {
  $("#slick-tabbed-content").slick({
    infinite: false,
    fade: true,
    slidesToShow: 1,
    pauseOnFocus: false,
    pauseOnHover: false,
    prevArrow: false,
    nextArrow: false,
  });
  $("#slick-tabbed-content").on(
      "beforeChange",
      function (event, slick, currentSlide, nextSlide) {
          $(".slick-tabbed-content__bar").removeClass("active");
      }
  );
  $(".tabbed-content [data-go], .tabbed-content-text [data-go]").on("click", function () {
      var go = $(this).attr("data-go");
      $("#slick-tabbed-content").slick("slickGoTo", Number(go));
      $(this).addClass('active')
      $('.tabbed-type').addClass('!hidden')
      $('.tabbed-type.' + $(this).attr('data-type')).removeClass('!hidden')
  });
})();