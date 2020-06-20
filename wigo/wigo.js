var toggleUp = (color) => {
    $(".slide-up").hide();
    $(".slide-up").removeClass("invisible");
    $(".fade-body").addClass("dark");
    if (color.length === 1) {
        $("#slide-up-heading").text("Join " + color).css("background-color", "rgb(47, 177, 209)");
    } else {
        $("#slide-up-heading").text("Join " + color).css("background-color", color);
    }
    $(".slide-up").slideDown("fast");

};

$(".close-btn").on("click", () => {
    $(".slide-up").fadeOut();
    $(".fade-body").removeClass("dark");
});
$(".jClass").click(function(){
    // console.log($(this).html());
    $('#category').val($(this).attr("data-value"));
    $('#room').val($("ul.nav-tabs li a.active").attr("data-value"));
});


