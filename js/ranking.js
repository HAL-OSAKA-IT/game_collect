$("#button1").click(function () {
    $(this).toggleClass('active');
    $("#game1_ranking_container").toggleClass('panelactive');
    $("body").toggleClass('panelactive');
});

$("#button2").click(function () {
    $(this).toggleClass('active');
    $("#game2_ranking_container").toggleClass('panelactive');
    $("body").toggleClass('panelactive');
});

$("#button3").click(function () {
    $(this).toggleClass('active');
    $("#game3_ranking_container").toggleClass('panelactive');
    $("body").toggleClass('panelactive');
});

$("#button4").click(function () {
    $(this).toggleClass('active');
    $("#game4_ranking_container").toggleClass('panelactive');
    $("body").toggleClass('panelactive');
});

$(".back").click(function () {
    $(".button").removeClass('active');
    $("#game1_ranking_container").removeClass('panelactive');
    $("#game2_ranking_container").removeClass('panelactive');
    $("#game3_ranking_container").removeClass('panelactive');
    $("#game4_ranking_container").removeClass('panelactive');
    $("body").removeClass('panelactive');
});