<?php
require "db.php";
?>


<?php // как узнать авторизаван ли пользователь
if (isset($_SESSION['logged_user']) ):
?>
    Авторизован
    Привет, <?php echo $_SESSION['logged_user']->login; ?>!
    <hr>
    <a href="/logout.php">Выйти</a>

<?php else: ?>
Вы не авторизованны
<br>
<a href="/login.php">Авторизоваться</a><br>
<a href="signup.php">Регистрация</a>

<?php endif; ?>