$(document).ready(function() {
    $(".validate").validate({
        rules: {
            email: {
                required: true,
                email: true,
                email_double: true
            }
        },
        messages: {
            email: {
                required: "Это поле обязательно для заполнения",
                email: "Поле email должно быть заполнено в формате name@domain.com",
                email_double: "Данный email не зарегистрирован"
            }
        }
    });

    jQuery.validator.addMethod("email_double", function(value, element) {
        return is_double_email(value);
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

});