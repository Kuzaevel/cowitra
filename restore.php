<?php
switch($_SERVER['REQUEST_METHOD'])
{
    case 'POST':
        require_once("header.php");
        require_once 'data/dbinit.php';
?>
<div class="container my-5">
    <div class="row">
        <div class="col-12">

<?php

        $address_site = "http://cowitra/";
        $email_admin = "info@cowitra.ru";

            if(isset($_POST["email"])) {
                $email = $_POST["email"];
                $token = md5($email . time());
                $link_reset_password = $address_site . "set_new_password.php?email=$email&token=$token";
                $subject = "Восстановление пароля от сайта " . $_SERVER['HTTP_HOST'];
                $subject = "=?utf-8?B?" . base64_encode($subject) . "?=";
                $message = 'Здравствуйте! <br/> <br/> Для восстановления пароля от сайта <a href="http://' . $_SERVER['HTTP_HOST'] . '"> ' . $_SERVER['HTTP_HOST'] . ' </a>, перейдите по этой <a href="' . $link_reset_password . '">ссылке</a>.';
                $headers = "FROM: $email_admin\r\nReply-to: $email_admin\r\nContent-type: text/html; charset=utf-8\r\n";
                if (mail($email, $subject, $message, $headers)) {
                    echo "<p class='success_message' >Ссылка на страницу установки нового пароля, была отправлена на указанный E-mail ($email) </p>";
                    echo $message;
                }

                $sql = "UPDATE `users` SET token = :token WHERE email = :email";
                $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $stmt->execute(array(
                    ':email'      => $email,
                    ':token'      => $token
                ));

            }
?>

        </div>
    </div>
</div>

<?php
    require_once("footer.php");
    break;
?>
</body>
</html>

<?php
case 'GET':
die();
break;
}
