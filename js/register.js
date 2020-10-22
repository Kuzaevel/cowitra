$(document).ready(function() {
    $(".validate").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            company: "required",
            email: {
                required: true,
                email: true,
                email_double: true
            },
            login:{
                required: true,
                minlength: 4,
                maxlength: 16,
                login_double: true
            },
            password:{
                required: true,
                minlength: 6,
                maxlength: 16
            },
        },
        messages: {
            first_name: "Это поле обязательно для заполнения",
            last_name: "Это поле обязательно для заполнения",
            company: "Это поле обязательно для заполнения",
            email: {
                required: "Это поле обязательно для заполнения",
                email: "Поле email должно быть заполнено в формате name@domain.com",
                email_double: "Данный email уже зарегистрирован"
            },
            login:{
                required: "Это поле обязательно для заполнения",
                minlength: "Логин должен быть минимум 4 символа",
                maxlength: "Максимальное число символов - 16",
                login_double: "Данный login уже зарегистрирован"
            },
            password:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 6 символа",
                maxlength: "Пароль должен быть максимум 16 символов"
            }
        }
    });

    jQuery.validator.addMethod("email_double", function(value, element) {
        return !is_double_email(value);
    });


    function is_double_email(email) {
        var isDouble = false;
        $.ajax({
            type: "POST",
            url: "ajax/email-check.php",
            data: {email: email},
            async: false,
            success:
                function(msg) {
                    isDouble = msg === "double" ? true : false;
                }
        });
        return isDouble;
    }

    jQuery.validator.addMethod("login_double", function(value, element) {
        return !is_double_login(value);
    });


    function is_double_login(login) {
        var isDouble = false;
        $.ajax({
            type: "POST",
            url: "ajax/login-check.php",
            data: {login: login},
            async: false,
            success:
                function(msg) {
                    isDouble = msg === "double" ? true : false;
                }
        });
        return isDouble;
    }

});