<?php
	$data = $_POST;
	// echo var_dump($data);
	//здесь проеряем и авторизуем
	if( isset($data['do_login']) )
	{
		$errors = array();
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if($user)
		{
			//логин существует
			if( password_verify($data['password'], $user->password))
			{
				//всё хорошо, логиним пользователя (используем сессии или кукисы)
				$_SESSION['logged_user'] = $user;
				header('Location:user-info.php');
				exit;
				// echo '<div style="color: green;">Вы авторизованы!<br>Можете перейти на <a href="/user-info.php">страницу пользователя</a></div><hr>';
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