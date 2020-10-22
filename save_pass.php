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
            if(isset($_POST['token']) && !empty($_POST['token'])){
                $token = $_POST['token'];
            }else{
                echo "<p><strong>Ошибка!</strong> Отсутствует проверочный код.</p>";
                echo "</div></div></div>";
                require_once("footer.php");
                echo "</body></html>";
                exit();
            }

            if(isset($_POST['email']) && !empty($_POST['email'])){
                $email = $_POST['email'];
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
                $password = $_POST["password"];
                $password = md5($password."top_secret");

                $sql = "UPDATE `users` SET `password` = :password where email=:email";
                $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $stmt->execute(array(
                    ':email' => $email,
                    ':password' => $password
                ));
                ?>
                <h5 class="success_message text_center">Пароль успешно изменен!</h5>
                <p class="text_center">Теперь Вы можете войти в свой аккаунт.</p>
                <p class="text_center"><a href="index.php?login=1">Войти</a></p>

                <?php
            }else{ //if($token == $row['token'])
                echo $token; echo "<br>";
                echo $res; echo "<br>";

                echo ("<p><strong>Ошибка!</strong> Неправильный проверочный код.</p>");
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