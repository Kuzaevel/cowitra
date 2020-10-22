<?php
session_start();
require_once("data/dbinit.php");

if(isset($_POST["email"]) && isset($_POST["password"])) {

    $email = trim($_POST["email"]);

    if (!empty($email)) {
        $email = htmlspecialchars($email, ENT_QUOTES);
    }

    $password = trim($_POST["password"]);

    if(!empty($password)) {
        $password = htmlspecialchars($password, ENT_QUOTES);
        $password = md5($password . "top_secret");
    }

    $sql = 'SELECT count(*) as passed from users where email = :email and password=:password and email_status = 1 and active = 1';

    $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array(
        ':email'    => $email,
        ':password' => $password
    ));

    $res =  $stmt->fetch(PDO::FETCH_ASSOC);
    $passed = $res['passed'];

    if ($passed) {

        $sql = "UPDATE users SET lastlogin = NOW() " .
            "WHERE email = :email " .
            "AND email_status = 1 AND active = 1 ";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(
            ':email' => $email
        ));

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        //Возвращаем пользователя на главную страницу
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: pult.html");
    } else {
        require_once("header.php");
    ?>
        <div class="container my-5">
            <div class="row">
                <div class="col-12">
<?php
                    echo "<p><strong>Ошибка!</strong> Неверный логин или пароль</p>";
                    echo "<p class='text_center'><a href='index.php?login=1'>Войти</a></p>";
                    echo "</div></div></div>";
        require_once("footer.php");
        echo "</body></html>";
        exit();
    }
}
