<?php
	//здесь проеряем и регистрируем
	if( isset($data['do_signup']))
	{
		$tab_active = 0; // удерживаем нажатым таб
		$errors = array();
		if( trim($data['login']) == '')
		{
			$errors[] = 'Введите логин';
		}
		if( trim($data['email']) == '')
		{
			$errors[] = 'Введите e-mail';
		}
		if( $data['password'] == '')
		{
			$errors[] = 'Введите пароль';
		}
		if( (strlen($data['password']) < 8) )
		{
			$errors[] = 'Длина пароля должна быть не менее 8 символов';
		}
		if( $data['password_2'] != $data['password'])
		{
			$errors[] = 'Повторный пароль введён не верно!';
		}
		if( R::count('users', "login = ?", array($data['login'])) > 0 )
		{
			$errors[] = 'Пользователь с таким логином уже существует';
		}
		if( R::count('users', "email = ?", array($data['email'])) > 0 )
		{
			$errors[] = 'Пользователь с таким e-mail уже существует';
		}
		if( $data['checkbox'] == '')
		{
			$errors[] = 'Примите условия регистрации';
		}

		if( empty($errors) )
		{
			//всё хорошо, регистрируем
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->regdate = date('Y-m-d H:i:s');
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<div class="button" style="color: #000;">Вы успешно зарегестрированы</div>';
			$tab_active = 1;
		} else
		{
			echo '<div class="button" style="color: #000;">'.array_shift($errors).'</div>';
		}

	}
?>