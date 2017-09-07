$(document).ready(function () {

    var scrollTime = 2000;

    $('html, body').animate({
        scrollTop: $("tr.latest").offset().top
    }, scrollTime, function(){
        $("html, body").animate({scrollTop: 0}, scrollTime);
    });

});