<?php
    require_once("header.php");
?>

<div class="container my-4">

    <div class="row text-center" style="padding-bottom: 20px">
        <div class="block-title col-lg-12">
            Регистрация
        </div>
        <div class="underline"></div>
    </div>

    <!-- Page Features -->
    <div class="row">
        <div class="col-12">

            <form action="register.php" method="post" class="validate">
                <div class="form-group">
                    <label>Имя</label>
                    <input name="first_name"  class="form-control" type="text" placeholder="Имя" >
                </div>

                <div class="form-group">
                    <label>Фамилия</label>
                    <input name="last_name" class="form-control" type="text" placeholder="Фамилия" >
                </div>

                <div class="form-group">
                    <label>Компания</label>
                    <input name="company" class="form-control" type="text" placeholder="Фамилия" >
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" placeholder="E-mail" >
                    <small id="emailHelp" class="form-text text-muted">Укажите правильный Email, так как на него будет выслано сообщение для подтверждения почты.</small>
                </div>

                <div class="form-group">
                    <label>Логин</label>
                    <input name="login" type="text" class="form-control" placeholder="login" >
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Password" >
                </div>

                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<?php
    require_once("footer.php");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="js/register.js"></script>

</body>
</html>