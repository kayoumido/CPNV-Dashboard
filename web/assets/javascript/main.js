$('.platform').click(function() {
    let platform = $(this).data("platform");

    $(".platform-data").addClass("platform-data--hidden");
    $(".platform-data--" + platform).removeClass("platform-data--hidden");
});
