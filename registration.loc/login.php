<?php
// Авторизуем пользователя

	$data = $_POST;
	// если пользователь нажал "авторизоваться"
	if( isset($data['do_login']) )
	{
		$errors = array(); //массив под ошибки
		$user = R::findOne('users', 'login = ?', array($data['login'])); // берём данные из БД
		if($user)
		{
			//логин существует, про
			if( password_verify($data['password'], $user->password))
			{
				//всё хорошо, логиним пользователя (используем сессии) и открываем страницу с его данными
				$_SESSION['logged_user'] = $user;
				header('Location:user-info.php');
				exit;
			} else
			{
				$errors[] = 'Неверно введён пароль';
			}
		} else
		{
			$errors[] = 'Пользователь с таким логином не найден';
		}
		if( ! empty($errors) )
		{
			echo '<div class="button" style="color: #000;">'.array_shift($errors).'</div>';
		}
	}
?>