(function () {
  $("a[href='#open-contact-modal']").on("click", function (e) {
    e.preventDefault();
    $("#arbitrator-modal").removeClass("hidden");
  });
  $(".close-contact-mdoal").on("click", function (e) {
    e.preventDefault();
    $("#arbitrator-modal").addClass("hidden");
  });
})();
