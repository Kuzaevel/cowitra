<?php
    require_once("header.php");
    require_once 'data/dbinit.php';
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">

<?php
    if(isset($_GET['token']) && !empty($_GET['token'])){
        $token = $_GET['token'];
    }else{
        echo "<p><strong>Ошибка!</strong> Отсутствует проверочный код.</p>";
        echo "</div></div></div>";
        require_once("footer.php");
        echo "</body></html>";
        exit();
    }

    if(isset($_GET['email']) && !empty($_GET['email'])){
        $email = $_GET['email'];
    }else{
        echo("<p><strong>Ошибка!</strong> Отсутствует адрес электронной почты.</p>");
        echo "</div></div></div>";
        require_once("footer.php");
        echo "</body></html>";
        exit();
    }

    $sql = "SELECT token from users where email=:email";
    $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array(
        ':email'      => $email
    ));

    $res = $stmt->fetch(PDO::FETCH_ASSOC)['token'];

    if($token == $res){
        $sql = "UPDATE `users` SET `email_status` = 1 where email=:email";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(
            ':email' => $email
        ));
?>
            <h5 class="success_message text_center">Почта успешно подтверждена!</h5>
            <p class="text_center">Теперь Вы можете войти в свой аккаунт.</p>
            <p class="text_center"><a href="index.php?login=1">Войти</a></p>

<?php
    }else{ //if($token == $row['token'])
        echo ("<p><strong>Ошибка!</strong> Неправильный проверочный код.</p>");
    }
?>

        </div>
    </div>
</div>
<?php
    require_once("footer.php");
?>

</body>
</html>
