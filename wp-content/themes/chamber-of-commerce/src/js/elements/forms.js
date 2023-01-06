(function () {
  let formtype = "";
  let modalType = "";
  $("a[href='#open-membership-modal']").on("click", function (e) {
    e.preventDefault();
    $("#modal").removeClass("hidden");
    modalType = "membership";
    loadModal(modalType);
  });
  $(document).on("click", ".close-mdoal", function (e) {
    e.preventDefault();
    $("#modal").addClass("hidden");
    modalType = "";
    $(".modal-content").html("");
  });
  $("#radio_yes, #radio_no").on("change", function () {
    formtype = "before-start-" + $("input[name='interest']:checked").val();
  });

  const sendingRequest = false;
  $(document).on("click", ".form-next-step", function (e) {
    e.preventDefault();
    let activeStep = $(".form-step.active").attr("data-form-step");
    activeStep = Number(activeStep);

    if (
      activeStep === 5 ||
      $(".form-step.active").attr("data-review") === "1"
    ) {
      if (document.querySelector("#accept_conditions").checked) {
        let data;
        if ($("#modal").length) {
          data = $("#modal form:not('.hidden')").serializeArray();
        } else {
          data = $("#arbitrator-modal form:not('.hidden')").serializeArray();
        }
        console.log(data);
        $.ajax({
          url: "/wp-admin/admin-ajax.php",
          type: "POST",
          data: data,
          beforeSend() {
            $(".loading").removeClass("hidden");
            filter_executing = true;
          },
          success(result) {
            $('.form-step[data-form-step="5"]').addClass("hidden");
            $('.form-step[data-form-step="thankyou"]')
              .removeClass("hidden")
              .addClass("active");
            $(".membership-nav").remove();
          },
          complete() {
            $(".loading").addClass("hidden");
            filter_executing = false;
          },
        });
      } else {
        $(".accept_conditions-cb label").addClass("!text-red-600");
      }
      return;
    }
    const nextStep = Number(activeStep) + 1;

    if (formtype === "before-start-yes" && activeStep === 0) {
      if ($(".before-you-start").hasClass("hidden")) {
        $(".step-2-selection").addClass("hidden");
        $(".before-you-start").removeClass("hidden");
        return true;
      }
    }
    if ($(".form-step.active form:not('.hidden')").valid()) {
      $(".form-step").removeClass("active");
      $(".form-step").addClass("hidden");

      $("[data-form-step= " + nextStep + "]").removeClass("hidden");
      $("[data-form-step= " + nextStep + "]").addClass("active");

      // if (activeStep >= 3 && formtype === "before-start-no") {
      //   $("#membership-" + nextStep + "-" + formtype).removeClass("hidden");
      // } else {
      //   if (activeStep === 3 && formtype === "before-start-yes") {
      //     $("#membership-" + nextStep + "-" + formtype).removeClass("hidden");
      //   } else {
      //     if (activeStep === 4 && formtype === "before-start-yes") {
      //       $("#membership-" + nextStep + "-" + formtype).removeClass("hidden");
      //     } else {
      //       $("#membership-" + nextStep).removeClass("hidden");
      //     }
      //   }
      // }

      if (
        activeStep === 4 ||
        $(".form-step.active").attr("data-review") === "1"
      ) {
        $(".form-go-to").on("click", function (e) {
          e.preventDefault();
          let goTo = $(this).attr("go-to");
          goTo = Number(goTo);
          $(".form-step").removeClass("active");
          $(".form-step").addClass("hidden");
          $("[data-form-step= " + goTo + "]").removeClass("hidden");
          $("[data-form-step= " + goTo + "]").addClass("active");
        });

        $(".fill-data").each(function () {
          if ($(this).attr("data-form") === "chamber-4") {
            function getFileName(path) {
              return path.match(/[-_\w]+[.][\w]+$/i)[0];
            }
            $("#file-name-1").html(getFileName($("#bylaws").val()));
            $("#file-name-2").html(getFileName($("#membership_list").val()));
            $("#file-name-3").html(getFileName($("#annual_report").val()));
            $("#file-name-4").html(
              getFileName($("#financial_statement").val())
            );
            return;
          }
          $(this).html("");
          const data = $("#" + $(this).attr("data-form")).serializeArray();

          if ($(this).attr("data-form") === "chamber-1") {
            data.forEach((item, index) => {
              if (item.value) {
                $($(this)).append(
                  "<p>" +
                    getLabel(item.name) +
                    ": " +
                    getLabel(item.value) +
                    "</p>"
                );
              }
            });
          } else {
            data.forEach((item, index) => {
              if (item.value) {
                $($(this)).append(
                  "<p>" +
                    getLabel(item.name) +
                    ": " +
                    (item.name === "age_range" ||
                    item.name === "province_dp" ||
                    item.name === "prefix" ||
                    item.name === "arbitrator_type"
                      ? getLabel(item.value)
                      : item.value) +
                    "</p>"
                );
              }
            });
          }
        });
      }
    }
  });

  $(document).on("click", ".form-previous-step", function (e) {
    e.preventDefault();

    const activeStep = $(".form-step.active").attr("data-form-step");
    if (Number(activeStep) === -1) {
      return true;
    }
    const nextStep = Number(activeStep) - 1;
    console.log(nextStep);
    $(".form-step").removeClass("active");
    $(".form-step").addClass("hidden");

    $("[data-form-step= " + nextStep + "]").removeClass("hidden");
    $("[data-form-step= " + nextStep + "]").addClass("active");
  });

  // $("#membership").validate({
  //   invalidHandler(form, validator) {
  //     const errors = validator.numberOfInvalids();
  //     if (errors) {
  //       console.log(errors);
  //     }
  //   },
  // });

  $(document).on("click", ".custom-label", function (e) {
    $(".custom-label").removeClass("active");

    $(".before-you-start").addClass("hidden");
    $(this).addClass("active");
    $(".step-2-selection").addClass("hidden");

    if ($(this).attr("for") === "business") {
      $(".step-2-business").removeClass("hidden");
      formtype = $(this).attr("for");

      loadTemplate("business");
    } else if ($(this).attr("for") === "association") {
      $(".step-2-association").removeClass("hidden");
      formtype = $(this).attr("for");
      loadTemplate("association");
    } else {
      $(".step-2-chambers").removeClass("hidden");
      formtype = $(this).attr("for");
      loadTemplate("association");
    }
  });
  $(document).on("click", ".specialIntrest .radio-container", function () {
    $(".loading").removeClass("hidden");

    if ($(this).attr("for") === "radio_no") {
      loadTemplate("chamberNo");
    } else if ($(this).attr("for") === "radio_yes") {
      loadTemplate("association");
    }
  });

  function loadModal(type) {
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      data: { type: type, action: "loadModal" }, // form data
      type: "POST", // POST
      dataType: "html",
      beforeSend() {
        $(".loading").removeClass("hidden");
      },
      success(data) {
        $(".loading").addClass("hidden");
        $(".modal-content").html(data);
        if (type === "membership") {
          $("#become-member-1").validate({
            errorLabelContainer: "#become-member-1-errors",
            rules: {
              member_type: "required",
            },
          });
        }
        if (type === "arbitrator") {
          arbitratorValidation();
        }
      },
    });
  }
  function loadTemplate(type) {
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      data: { type: type, action: "loadTemplate" }, // form data
      type: "POST", // POST
      dataType: "html",
      beforeSend() {
        $(".loading").removeClass("hidden");
      },
      success(data) {
        $(".loading").addClass("hidden");

        $("#partials").html(data);
        if (type === "business") {
          businessValidation();
        }
        if (type === "association") {
          associationValidation();
        }
        if (type === "chamberNo") {
          chamberValidation();
        }
      },
    });
  }
  function associationValidation() {
    $("#associations-1").validate({
      rules: {
        chamber_name: "required",
        association_address_line1: "required",
        association_city: "required",
        association_province: "required",
        association_postal: "required",
        association_telephone: "required",
      },
    });
    $("#associations-2").validate({
      rules: {
        prefix: "required",
        first_name: "required",
        last_name: "required",
        title: "required",
        email: {
          required: true,
          email: true,
        },
        telephone: {
          phoneUS: true,
          required: true,
        },
      },
    });
    $("#associations-3").validate({
      errorLabelContainer: "#associations-5-errors",
      rules: {
        interest_area: "required",
      },
    });

    $("#associations-4").validate({
      errorLabelContainer: "#associations-4-errors",
      rules: {
        industry_type: "required",
      },
    });
  }

  function businessValidation() {
    $("#business-1").validate({
      rules: {
        chamber_name: "required",
        business_address_line1: "required",
        business_city: "required",
        business_province: "required",
        business_postal: "required",
        business_telephone: "required",
      },
    });
    $("#business-2").validate({
      rules: {
        prefix: "required",
        first_name: "required",
        last_name: "required",
        title: "required",
        email: {
          required: true,
          email: true,
        },
        telephone: {
          phoneUS: true,
          required: true,
        },
      },
    });
    $("#business-3").validate({
      errorLabelContainer: "#business-3-errors",
      rules: {
        interest_area: "required",
      },
    });

    $("#business-4").validate({
      errorLabelContainer: "#business-4-errors",
      rules: {
        industry_type: "required",
      },
    });
  }

  function chamberValidation() {
    $("#chamber-1").validate({
      errorLabelContainer: "#chamber-1-errors",
      rules: {
        chamber_size: "required",
      },
    });

    $("#chamber-2").validate({
      rules: {
        chamber_name: "required",
        address_line1: "required",
        city: "required",
        province: "required",
        postal: "required",
        telephone: "required",
        prefix: "required",
        terms_office: "required",
        first_name: "required",
        last_name: "required",
        title: "required",
        email: {
          required: true,
          email: true,
        },
        telephone: {
          phoneUS: true,
          required: true,
        },
      },
    });
    $("#chamber-3").validate({
      rules: {
        senior_email: {
          email: true,
        },
        staff_member_email: {
          email: true,
        },
      },
    });
    $("#chamber-4").validate({
      rules: {
        bylaws: {
          required: true,
          filesize: 10,
        },
        membership_list: {
          required: true,
          filesize: 10,
        },
        annual_report: {
          required: true,
          filesize: 10,
        },
        financial_statement: {
          required: true,
          filesize: 10,
        },
      },
    });
  }

  // $("#membership-4-before-start-yes").validate({
  //   rules: {
  //     chamber_name: "required",
  //     association_address_line1: "required",
  //     association_city: "required",
  //     association_province: "required",
  //     association_postal: "required",
  //     association_telephone: "required",
  //   },
  // });

  // $("#membership-4-before-start-no").validate({
  //   errorLabelContainer: "#membership-4-errors-no",
  //   rules: {
  //     chamber_size: "required",
  //   },
  // });

  // $("#membership-5-before-start-yes").validate({
  //   rules: {
  //     prefix: "required",
  //     first_name: "required",
  //     last_name: "required",
  //     title: "required",
  //     email: {
  //       required: true,
  //       email: true,
  //     },
  //     telephone: {
  //       phoneUS: true,
  //       required: true,
  //     },
  //   },
  // });

  $.validator.addMethod(
    "phoneUS",
    function (phone_number, element) {
      phone_number = phone_number.replace(/\s+/g, "");
      return (
        this.optional(element) ||
        (phone_number.length > 9 &&
          phone_number.match(
            /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/
          ))
      );
    },
    "Please specify a valid phone number"
  );
  $.validator.addMethod(
    "filesize",
    function (value, element, param) {
      return this.optional(element) || element.files[0].size <= param * 1000000;
    },
    "File size must be less than {0} MB"
  );

  function getLabel(name) {
    switch (name) {
      case "chamber_name":
        return "Business Name";
        break;
      case "business_type":
        return "Doing business as";
        break;
      case "business_telephone":
        return "Telephone";
        break;
      case "business_address_line1":
        return "Address Line 1";
        break;
      case "address_line1":
        return "Address Line 1";
        break;
      case "business_address_line2":
        return "Address Line 2";
        break;
      case "address_line2":
        return "Address Line 2";
        break;
      case "business_city":
        return "City";
        break;
      case "city":
        return "City";
        break;
      case "business_province":
        return "Province/Territory";
        break;
      case "province":
        return "Province/Territory";
        break;
      case "province_dp":
        return "Province/Territory";
        break;
      case "business_postal":
        return "Postal Code";
        break;
      case "terms_office":
        return "Term of office";
        break;
      case "postal":
        return "Postal Code";
        break;
      case "association_telephone":
        return "Telephone";
        break;
      case "association_address_line1":
        return "Address Line 1";
        break;
      case "association_address_line2":
        return "Address Line 2";
        break;
      case "association_city":
        return "City";
        break;
      case "association_province":
        return "Province/Territory";
        break;
      case "association_postal":
        return "Postal Code";
        break;
      case "twitter_handle":
        return "Twitter Handle";
        break;
      case "facebookUrl":
        return "Facebook";
        break;
      case "website":
        return "Website";
        break;
      case "how_many_jobs":
        return "How many jobs do you represent?";
        break;
      case "your_yearly_financial":
        return "What is your yearly financial contribution to social and/or community programs?";
        break;
      case "prov_chamber":
        return "provincial/territorial chamber of commerce";
        break;
      case "local_chamber":
        return "local chamber of commerce";
        break;
      case "prefix":
        return "Prefix";
        break;
      case "first_name":
        return "First Name";
        break;
      case "last_name":
        return "Last Name";
        break;
      case "title":
        return "Title";
        break;
      case "telephone":
        return "Telephone";
        break;
      case "email":
        return "Email";
        break;
      case "senior_name":
        return "Senior Staff Person Name";
        break;
      case "senior_email":
        return "Senior Staff Person Email";
        break;
      case "senior_title":
        return "Senior Staff Person Title";
        break;
      case "staff_member_name":
        return "Name";
        break;
      case "staff_member_title":
        return "Title";
        break;
      case "staff_member_email":
        return "Email";
        break;
      case "chamber_size":
        return "Select number of members";
        break;
      case "interest_area":
        return "Areas of Interest";
        break;
      case "other_areas":
        return "Other areas of policy interest";
        break;
      case "area1":
        return "Country/region 1";
        break;
      case "area2":
        return "Country/region 2";
        break;
      case "area3":
        return "Country/region 3";
        break;
      case "industry_type":
        return "Type of Industry";
        break;
      case "1_99members":
        return "1- 99 Dues: $240.37";
        break;
      case "100_199members":
        return "100 - 199 Dues: $480.76";
        break;
      case "200_399members":
        return "200 - 399 Dues: $932.38";
        break;
      case "400_599members":
        return "400 - 599 Dues: $1,108.60";
        break;
      case "600_799members":
        return "600 - 199 Dues: $1,405.86";
        break;
      case "800_1199members":
        return "800 - 199 Dues: $1,857.45";
        break;
      case "1200_2999members":
        return "1200 - 199 Dues: $3,569.22";
        break;
      case "3000_3999members":
        return "3000 - 199 Dues: $7,240.41";
        break;
      case "4000_5999members":
        return "4000 - 199 Dues: $7,487.24";
        break;
      case "6000_plus":
        return "6000+ Dues: $7,561.11 + $1.00 per additional member over 5,999";
        break;
      case "arbitrator_type":
        return "Select your membership type";
        break;
      case "company_name":
        return "Organization / Firm";
        break;
      case "age_range":
        return "Age";
        break;
      case "100000000":
        return "35 and Under";
        break;
      case "100000001":
        return "36 to 45";
        break;
      case "100000002":
        return "46 to 55";
        break;
      case "100000003":
        return "56 to 65";
        break;
      case "100000004":
        return "66 and Above";
        break;
      case "803330001":
        return "Alberta";
        break;
      case "803330002":
        return "British Columbia";
        break;
      case "803330003":
        return "Manitoba";
        break;
      case "803330004":
        return "New Brunswick";
        break;
      case "803330005":
        return "Newfoundland and Labrador";
        break;
      case "803330007":
        return "Nova Scotia";
        break;
      case "803330006":
        return "Northwest Territories";
        break;
      case "803330008":
        return "Nunavut";
        break;
      case "803330009":
        return "Ontario";
        break;
      case "803330010":
        return "Quebec";
        break;
      case "803330011":
        return "Saskatchewan";
        break;
      case "803330012":
        return "Yukon";
        break;
      case "803330066":
        return "Prince Edward Island";
        break;
      case "803330065":
        return "International";
        break;

      case "100000003":
        return "Sole arbitrator or lawyer in a firm that is a member of the Canadian Chamber of Commerce.";
        break;
      case "100000004":
        return "Sole arbitrator or lawyer in a firm that is not a member of the Canadian Chamber of Commerce";
        break;
      case "100000005":
        return "Academic, government or non-profit organization lawyer";
        break;
      case "100000006":
        return "Young practitioner (Member of YCAP and less than 35 years of age. Must provide proof of YCAP membership)";
        break;
      case "100000007":
        return "In-house lawyer (corporate counsel)";
        break;
      case "803330019":
        return "Mr.";
        break;
      case "803330020":
        return "Mrs.";
        break;
      case "803330021":
        return "Ms.";
        break;
      case "803330006":
        return "Dr.";
        break;
      default:
        return name;
    }
  }

  // Arbitration Committee
  $("a[href='#become-arbitrator']").on("click", function (e) {
    e.preventDefault();
    $("#modal").removeClass("hidden");
    modalType = "arbitrator";
    loadModal(modalType);
  });

  function arbitratorValidation() {
    $("#arbitrator-1").validate({
      errorLabelContainer: "#arbitrator-1-errors",
      rules: {
        arbitrator_type: "required",
      },
    });
    $("#arbitrator-2").validate({
      rules: {
        address_line1: "required",
        city: "required",
        province_dp: "required",
        postal: "required",
        telephone: "required",
        prefix: "required",
        first_name: "required",
        last_name: "required",
        title: "required",
        age_range: "required",
        company_name: "required",
        email: {
          required: true,
          email: true,
        },
        telephone: {
          phoneUS: true,
          required: true,
        },
      },
    });
  }
})();
