<?php
require_once("header.php");
?>
<div class="container my-4">
    <div class="row text-center" style="padding-bottom: 20px">
        <div class="block-title col-lg-12">
            Восстановление пароля
        </div>
        <div class="underline"></div>
    </div>

    <!-- Page Features -->
    <div class="row">
        <div class="col-12">

            <form action="save_pass.php" method="post" class="validate">

                <div class="form-group">
                    <label>Введите новый пароль</label>
                    <input name="password" type="password" class="form-control" placeholder="Пароль" >

                </div>
                    <input name="email" type="email" hidden value='<?=$_GET["email"]?>'>
                    <input name="token" type="text" hidden value='<?=$_GET['token']?>'>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once("footer.php");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="js/new_pas.js"></script>


</body>
</html>