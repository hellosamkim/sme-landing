(function () {
  if (document.querySelector(".page-template-page-dashboard") == null) {
    return;
  }

  const action = new URL(window.location.href).searchParams.get("action");

  if (!action) {
    $("#dashboard").removeClass("hidden");
  } else {
    $("#" + action).removeClass("hidden");
  }
  // ClassicEditor.create(document.querySelector("#editor"), {
  //   toolbar: [
  //     "bold",
  //     "italic",
  //     "link",
  //     "undo",
  //     "redo",
  //     "numberedList",
  //     "bulletedList",
  //   ],
  // }).catch((error) => {
  //   console.error(error);
  // });

  document.querySelector("#profile-photo").addEventListener("change", (e) => {
    e.preventDefault();

    let formData = document.getElementById("user-form");
    formData = new FormData(formData);

    console.log(formData);

    $.ajax({
      type: "post",
      url: $("#user-form").attr("action"),
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      beforeSend() {},

      success(json) {
        console.log(json.data.url);
        if (json.data.status) {
          $("#user-img").attr("src", json.data.url);
        }
      },
    });
  });
})();
