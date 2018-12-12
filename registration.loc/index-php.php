<?php
	require "db.php";
?>
<?php	if(isset($_SESSION['logged_user'])) : ?>
	Авторизован!<br>
	Привет, <?php echo $_SESSION['logged_user']->login; ?>!
	<hr>
	<a href="logout.php">Выйти</a><br>
<?php else : ?>
	Вы не авторизонаны!<br>
	<a href="login.php">Авторизоваться</a><br>
	<a href="signup.php">Регистрация</a>
<?php endif; ?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>