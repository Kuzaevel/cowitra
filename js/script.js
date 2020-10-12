$(document).ready(function(){
    $('.nav-item').on('click','a',function (e) {
        e.preventDefault();
        var menu = window.innerWidth >= 1200 ? 100 : 20;
        var id = $(this).attr('href');
        var target = $(id);
        $('body,html').animate({scrollTop: target.offset().top - menu }, 1000);
    });
});
