(function () {
  $("#slick-sponsorship-advertising").slick({
    infinite: false,
    fade: true,
    slidesToShow: 1,
    pauseOnFocus: false,
    pauseOnHover: false,
    prevArrow: false,
    nextArrow: false,
  });
  $("#slick-sponsorship-advertising").on(
    "beforeChange",
    function (event, slick, currentSlide, nextSlide) {
      $(".slick-sponsorship-advertising__bar").removeClass("active");
    }
  );
  $(".sponsorship-advertising [data-go]").on("click", function () {
    const go = $(this).attr("data-go");
    $("#slick-sponsorship-advertising").slick("slickGoTo", Number(go));
    $(this).addClass("active");
  });

  $("a").on("click", function (e) {
    if ($(this).attr("href").indexOf("#open-contact-modal") !== -1) {
      e.preventDefault();
      $("#contact-modal").removeClass("hidden");
      const urlParams = $(this).attr("href").split("=");
      if (urlParams[1]) {
        $(".subject-select select").val(urlParams[1]);
      }
    }
  });

  $("a[href='#open-contact-modal']").on("click", function (e) {
    e.preventDefault();
    $("#contact-modal").removeClass("hidden");
  });
  $(".close-contact-mdoal").on("click", function (e) {
    e.preventDefault();
    $("#contact-modal").addClass("hidden");
  });
})();
