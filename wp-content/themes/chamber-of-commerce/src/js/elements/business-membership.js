(function ($) {
  $('#filter_sidebar_form input').on('change',function() {
    $("#filter_sidebar_form").submit()
  })

  $("#filter_sidebar_form").off("submit");
  let filter_executing = false;

  $(document).on("submit", "#filter_sidebar_form", function (e) {
    e.preventDefault();

    if (filter_executing) {
      return;
    }

    const formConvertedData = convertData("#filter_sidebar_form");
    let sendData;
    let alpha_filter = null;
    const alpha_selector = $("#selected_alpha");

    if (alpha_selector.length) {
      alpha_filter = alpha_selector.val();
    }

    if (
      $("#post_type").val() === "chamber" ||
      $("#post_type").val() === "business"
    ) {
      sendData = $.extend(
        {
          action: "arbitrator_member_filter",
          security: $('input[name="check_nonce"]').val(),
          last_name_filter: alpha_filter,
        },
        formConvertedData
      );
    } else if ($("#post_type").val() === "association") {
      sendData = $.extend(
        {
          action: "association_filter",
          security: $('input[name="check_nonce"]').val(),
          last_name_filter: alpha_filter,
        },
        formConvertedData
      );
    } else if ($("#post_type").val() === "arbitrator") {
      sendData = $.extend(
        {
          action: "arbitrator_filter",
          security: $('input[name="check_nonce"]').val(),
          last_name_filter: alpha_filter,
        },
        formConvertedData
      );
    } else if ($("#post_type").val() === "account") {
      formConvertedData.sort = $("#account_sort").val();
      sendData = $.extend(
        {
          action: "accounts_filter",
          security: $('input[name="check_nonce"]').val(),
          account_filter: alpha_filter,
        },
        formConvertedData
      );
    } else {
      sendData = $.extend(
        {
          action: "custom_post_type_filter",
          security: $('input[name="check_nonce"]').val(),
        },
        formConvertedData
      );
    }

    const filter = $("#filter_sidebar_form");
    $.ajax({
      url: filter.attr("action"),
      type: "POST",
      data: sendData,
      beforeSend() {
        $("#loading").removeClass('hidden');
        filter_executing = true;
      },
      success(result) {
        $("#list_container").html(result);
        $(".summary_col").show();
        $("#text_count").html($("#input_count").val());
        $("#text_total").html($("#input_total").val());
        $('.pagination-show').removeClass('hidden');
      },
      complete() {
        $("#loading").addClass('hidden');
        filter_executing = false;
      },
    });
  });
})($);
const getQueryParams = (params, url) => {
  const href = url;
  //this expression is to get the query strings
  const reg = new RegExp("[?&]" + params + "=([^&#]*)", "i");
  const queryString = reg.exec(href);
  return queryString ? queryString[1] : null;
};
$(document).on("click", ".pagination a.page-numbers", function (e) {
  e.preventDefault();
  const page = getQueryParams("page", $(this).prop("href"));
  $("#paged").val(page);
  $("#filter_sidebar_form").trigger("submit");
});

$(".alphabet-filter a").on("click", function (a) {
  a.preventDefault();

  const dataValue = $(this).data("alpha-value");
  $("#selected_alpha").val(dataValue);

  $(".alphabet-filter a").removeClass("selected");
  $(this).addClass("selected");

  $("#filter_sidebar_form").trigger("submit");
});

$(window).on("load", function () {
  $(".alphabet-filter a:first-child").addClass("selected");
  $("#filter_sidebar_form").trigger("submit");
});

function convertData(form) {
  const formArray = jQuery(form).serializeArray();
  const result = {};
  for (let i = 0; i < formArray.length; i++) {
    if (result.hasOwnProperty(formArray[i].name)) {
      if (Array.isArray(result[formArray[i].name])) {
        result[formArray[i].name].push(formArray[i].value);
      } else {
        result[formArray[i].name] = [
          result[formArray[i].name],
          formArray[i].value,
        ];
      }
    } else {
      result[formArray[i].name] = formArray[i].value;
    }
  }
  return result;
}
