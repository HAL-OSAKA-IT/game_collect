$(".button").click(function () {
    $(this).parents('.game').children('.ranking_wrapper').addClass('panelactive');
    // $(".ranking_wrapper").addClass('panelactive');
    $(".layer").addClass('panelactive');
});

$(".back").click(function () {
    $(".ranking_wrapper").removeClass('panelactive');
    $(".layer").removeClass('panelactive');
});