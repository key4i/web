<?php
// Выход из сессии, переход на главную страницу

	require "db.php";
	unset($_SESSION['logged_user']);
	header('Location: /');
?>