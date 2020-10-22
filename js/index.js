$(document).ready(function(){

    $('.nav-item').click(function (){
        if(!$(this).hasClass('active')) {
            $('.nav-item').each(function () {
                $(this).removeClass('active');
            });
            $(this).addClass('active');
        }
    })

    $('.nav-item').on('click','a',function (e) {
        e.preventDefault();
        var menu = window.innerWidth >= 1200 ? 100 : 20;
        var id = $(this).attr('href');
        var target = $(id);
        $('body,html').animate({scrollTop: target.offset().top - menu }, 1000);
    });

    // $('.registration').on('click', function(){
    //     $('#openLoginModal').modal('hide');
    //     // $('#openRegisterModal').modal('show');
    //     $('#exampleModalLong').modal('show');
    // })

    $(".validate").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password:{
                required: true,
                minlength: 6,
                maxlength: 16
            }
        },
        messages: {
            email: {
                required: "Это поле обязательно для заполнения",
                email: "Поле email должно быть заполнено в формате name@domain.com"
            },
            password:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 6 символа",
                maxlength: "Пароль должен быть максимум 16 символов",
            }
        }
    });


});
