<?php
switch($_SERVER['REQUEST_METHOD'])
{
    case 'POST':
        require_once 'data/dbinit.php';
        //Запускаем сессию
        session_start();

        $password = $_POST["password"];
        $password = md5($password."top_secret");

        $email = $_POST['email'];
        $token = md5($email.time());


        $sql = "INSERT INTO `users` (first_name, last_name, email, company, login, password, token, date_registration, email_status) 
                            VALUES (:first_name,:last_name,:email,:company,:login,:password,:token, NOW(),0)";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(
            ':first_name' => $_POST['first_name'],
            ':last_name'  => $_POST['last_name'],
            ':email'      => $email,
            ':company'    => $_POST['company'],
            ':login'      => $_POST['login'],
            ':password'   => $password,
            ':token'      => $token
        ));

        $address_site = "http://cowitra/";
        $email_admin = "info@cowitra.ru";

        //Составляем заголовок письма
        $subject = "Подтверждение почты на сайте ".$_SERVER['HTTP_HOST'];

        //Устанавливаем кодировку заголовка письма и кодируем его
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";

        //Составляем тело сообщения
        $message = 'Здравствуйте! <br/> <br/> Сегодня '.date("d.m.Y", time()).', Вы зарегистрировались на сайте cowitra.ru используя Ваш email.
                    Если это были Вы, то, пожалуйста, подтвердите адрес вашей электронной почты, перейдя по этой ссылке: <a href="'.$address_site.'activation.php?token='.$token.'&email='.$email.'">'.$address_site.'activation/'.$token.'</a> <br/> <br/> В противном случае, если это были не Вы, то, просто игнорируйте это письмо. <br/> <br/> <strong>Внимание!</strong> Ссылка действительна 24 часа. После чего Ваш аккаунт будет удален из базы.';

        //Составляем дополнительные заголовки для почтового сервиса mail.ru
        //Переменная $email_admin, объявлена в файле dbconnect.php
        $headers = "FROM: $email_admin\r\nReply-to: $email_admin\r\nContent-type: text/html; charset=utf-8\r\n";

        //Отправляем сообщение с ссылкой для подтверждения регистрации на указанную почту и проверяем отправлена ли она успешно или нет.
//        if(mail($email, $subject, $message, $headers)){

            require_once("header.php");
            echo "<div class='container my-5'><div class='row'><div class='col-12'>";
            echo "<h4 class='success_message'><strong>Регистрация прошла успешно!!!</strong></h4><p class='success_message'> Необходимо подтвердить введенный Вами адрес электронной почты.</p>
                                             <p>Для этого, перейдите по ссылке указанной в сообщении, которая была отправлена на почту ".$email." </p>"
                                             .'<p><a href="'.$address_site.'activation.php?token='.$token.'&email='.$email.'">'.$address_site.'activation/'.$token.'</a></p>';
            echo "</div></div></div>";
            require_once("footer.php");
            echo "</body></html>";
            exit();
            //Отправляем пользователя на страницу регистрации и убираем форму регистрации
//            header("HTTP/1.1 301 Moved Permanently");
//            header("Location: ".$address_site."form_register.php?hidden_form=1");

//        }

    break;

    case 'GET':
        die();
        break;
}