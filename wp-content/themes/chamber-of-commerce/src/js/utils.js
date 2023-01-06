(function () {
    $(".dropdown__toggle").on("click", function (e) {
        e.preventDefault();
        if (
            $(this)
                .parents(".dropdown")
                .find(".dropdown__menu")
                .hasClass("block")
        ) {
            $(".dropdown__menu").removeClass("block");
        } else {
            $(".dropdown__menu").removeClass("block");
            $(this)
                .parents(".dropdown")
                .find(".dropdown__menu")
                .toggleClass("block");
        }
    });

    $(".dropdown__item").on("click", function (e) {
        e.preventDefault();

        if ($(this).hasClass("active")) {
            $(this)
                .parents(".dropdown__menu")
                .find(".dropdown__item")
                .removeClass("active");
        } else {
            $(this)
                .parents(".dropdown__menu")
                .find(".dropdown__item")
                .removeClass("active");
            $(this).toggleClass("active");
        }
        $(".dropdown__menu").removeClass("block");
    });

    $(document).on("click", function (e) {
        var container = $(".dropdown");

        //check if the clicked area is dropDown or not
        if (container.has(e.target).length === 0) {
            $(".dropdown__menu").removeClass("block");
        }
    });
    $(".dropdown__close").on("click", function (e) {
        e.preventDefault();
        $(".dropdown__menu").removeClass("block");
        $("#product-filters").addClass("hidden");
    });
    $(".filter-dropdown-toggle").on("click", function (e) {
        e.preventDefault();
        $("#product-filters").removeClass("hidden");
    });

    $("a[data-tab]").click(function (e) {
        e.preventDefault();
        let attr = $(this).attr("data-tab");
        $(".tab-pane").addClass("hidden");
        $("#" + attr).removeClass("hidden");
    });
})();
