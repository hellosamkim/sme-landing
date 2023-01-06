(function () {
  $('#posts-filter input[type="checkbox"]').on("click", function () {
    $("#posts-filter").submit();
  });
  $("#posts-filter").on("submit", function (e) {
    e.preventDefault();

    filterPost(1);
  });
  $(".mobile-drawer-toggle").on("click", function (e) {
    e.preventDefault();

    $(".mobile-drawer").toggleClass("!translate-x-0");
  });

  $("#filter-reset").on("click", function () {
    $('#posts-filter input[type="checkbox"]').prop("checked", false);
  });

  $(document).on("click", ".pagination a.page-numbers", function (e) {
    e.preventDefault();

    const page = getQueryParams("page", $(this).prop("href"));

    filterPost(page);
  });

  function filterPost(page = 1) {
    $('#posts-filter [name="current_page"]').val(page);

    const filter = $("#posts-filter");

    $.ajax({
      url: filter.attr("action"),
      data: filter.serialize(), // form data
      type: filter.attr("method"), // POST
      dataType: "html",
      beforeSend() {
        // filter.find('button').text('Processing...'); // changing the button label
      },
      success(data) {
        // filter.find('button').text('Apply filter'); // changing the button label back
        $("#results").html(data);
      },
    });
    return false;
  }

  const getQueryParams = (params, url) => {
    const href = url;
    //this expression is to get the query strings
    const reg = new RegExp("[?&]" + params + "=([^&#]*)", "i");
    const queryString = reg.exec(href);
    return queryString ? queryString[1] : null;
  };
})();
