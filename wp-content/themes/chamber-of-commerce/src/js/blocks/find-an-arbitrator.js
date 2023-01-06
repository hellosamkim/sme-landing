(function () {
  $(document).on("click",".load-arbitrator",function(e) {
    e.preventDefault()
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      type: "POST",
      data: {contact_id : $(this).attr('data-id'), action : "arbitratorprofile_filter"},
      beforeSend() {
        $("#loading").removeClass('hidden');
        filter_executing = true;
      },
      success(result) {
        $("#main-arbitrator-profile").html(result);
        $("#arbitrator-modal").removeClass("hidden");    
      },
      complete() {
        $("#loading").addClass("hidden");
        filter_executing = false;
      },
    });
  })
  $(document).on("click",".close-arbitrator-mdoal", function (e) {
    e.preventDefault();
    $("#arbitrator-modal").addClass("hidden");
  });
})();
