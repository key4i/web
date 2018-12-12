<?php
	$tab_active = 1;		  // Отслеживание и удерживание нажатой вкладки "авторизация" или "регистрация"
	require "db.php";		  // Подключаемся к БД
	require "login.php";  // Авторизуем пользователя
	require "signup.php"; // Регистрируем пользователя
	require "header.php"; // Шапка сайта
?>

<div class="dws-wrapper">
	<div class="dws-form">

<!-- Вкладки "авторизация" и "регистрация" -->

		<label class="tab <?php if($tab_active) echo 'active'; ?>" title="Вкладка 1">Авторизация</label><label class="tab <?php if(!$tab_active) echo 'active'; ?>" title="Вкладка 2" for="2">Регистрация</label>

<!-- Форма авторицации -->

		<form class="tab-form <?php if($tab_active) echo 'active'; ?>" action="/" method="POST">
			<input class="input" type="text" name="login" placeholder="Введите логин" value="<?php echo @$data['login']; ?>">
			<input class="input" type="password" name="password" placeholder="Введите пароль">
			<input type="submit" name="do_login" class="button" value="Войти">
		</form>

<!-- Форма регистрации -->

		<form class="tab-form <?php if(!$tab_active) echo 'active'; ?>" action="/" method="POST">
			<input class="input" type="text" placeholder="Введите логин" name="login" value="<?php echo @$data['login']; ?>">
			<input class="input" type="email" placeholder="Введите E-mail адрес" name="email" value="<?php echo @$data['email']; ?>">
			<input class="input" type="password" placeholder="Введите пароль" name="password">
			<input class="input" type="password" placeholder="Введите пароль ещё раз" name="password_2">
			<input type="submit" name="do_signup" class="button" value="Регистрация">
			
			<div class="recover">
				<input type="checkbox" id="ckbox" name="checkbox" value="1">
				<label for="ckbox">Ознакомлен(-а) и принимаю <a href="user-agreement.php" target="_blank">условия регистрации</a></label>
			</div>
		</form>
	</div>
</div>
<?php
	require "footer.php"; // Подвал сайта
?>