<?php
	require "db.php";
	require "header.php";
?>
<?php
	if( isset($_SESSION['logged_user']) )
	{
		echo '<div class="button" style="color: #fff;">Привет, '.$_SESSION['logged_user']->login.'</div>'
?>
<div class="dws-wrapper">
	<div class="dws-form">
		<div class="tab-form active">
			<?php
				$user = R::findOne('users', 'login = ?', array($_SESSION['logged_user']->login));
				echo 'Логин: '.$user->login.'<br><br>'; 
				echo 'E-mail: '.$user->email.'<br><br>'; 
				echo 'Дата регистрации:<br>'.$user->regdate;
			?>
		</div>
		<a href="logout.php" class="button">ВЫЙТИ</a>
	</div>
</div>
<?php
	}
	else echo '<div class="button" style="color: #fff;"><a href="/">Авторизуйтесь или зарегестрируйтесь</a></div>'
?>
<?php
	require "footer.php";
?>