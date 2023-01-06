jQuery(document).ready(function ($) {
    var btnClick =function (e) {
        $(e.currentTarget).parents(".faq_item").find(".faq_content").toggle("slow");
        $(e.currentTarget).parents(".faq_item").toggleClass("faq_active");
    };
    $(".faq_title").on("click",btnClick);
});