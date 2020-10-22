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

            <form action="restore.php" method="post" class="validate">

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" placeholder="E-mail" >
                    <small id="emailHelp" class="form-text text-muted">Укажите правильный Email, так как на него будет выслано сообщение для подтверждения почты.</small>
                </div>

                <button type="submit" class="btn btn-primary">Восстановить</button>
            </form>
        </div>
    </div>
</div>

<?php
    require_once("footer.php");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="js/restore_pass.js"></script>


    </body>
</html>