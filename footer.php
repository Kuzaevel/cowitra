
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Регистрация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="register1.php" method="post">
                    <input class="d-block" type="text" name="firstname" placeholder="Имя" required>
                    <input class="d-block" type="text" name="secondname" placeholder="Фамилия" required>
                    <input class="d-block" type="text" name="company" placeholder="Компания" required>
                    <input class="d-block" type="email" name="email" placeholder="E-mail" required>
                    <input class="d-block" type="text" name="login" placeholder="Логин" required>
                    <input class="d-block" type="password" name="password" placeholder="Пароль" required>
                    <!--          <button class="d-block" type="submit">Зарегистрироваться</button>-->
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary">Зарегистрироваться</button>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pl-5 pt-4 pt-sm-5 pl-md-1 column">
                <h5>
                    Контакты
                </h5>
                <p class="first">
                    +7 (900) 000-00-00
                </p>
                <p class="second">
                    e-mai: cowitra@mail.ru
                </p>
                <p class="third">
                    <u>Отзывы</u>
                </p>
            </div>

            <div class="col-md-4 pl-5 pt-3 pl-md-1 pt-md-5 column">
                <h5>
                    <div id="contacts">
                        Возникли вопросы?
                    </div>
                </h5>
                <form class="question-form">
                    <input class="d-block" type="text" placeholder="Ваше Имя">
                    <input class="d-block" type="text" placeholder="E-mail">
                    <textarea class="d-block" rows="4" placeholder = "Сообщение"></textarea>
                    <button class="d-block" type="button">Отправить сообщение</button>
                </form>
            </div>

            <div class="col-md-4 pl-5 pt-4 pl-md-5 pt-md-5 column">
                <h5>
                    Документы
                </h5>
                <p class="first">
                    <u>Условия оказания услуг</u>
                </p>
                <p class="second">
                    <u>Шаблоны и бланки документов</u>
                </p>
                <p class="third">
                    Мобильные приложения:
                <p>
                    <img src="img/mobile_icons.png">
                </p>
                </p>
            </div>
        </div>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

