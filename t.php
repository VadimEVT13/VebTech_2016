<?php
	session_name("test");
	session_start();
	//----подсказка----
	echo "<br>Нельзя использовать символы \' и \\<br>";

	//----данные с прошлой формы----
	$name = $_POST['name'];
	$name = str_replace("'", "", $name);
	$name = str_replace("\\", "", $name);
	//====К сожалению только 2 ходами====

	$email = $_POST['mail'];
	$email = str_replace("'", "", $email);
	$email = str_replace("\\", "", $email);
	//====К сожалению только 2 ходами====

	$tel = $_POST['tel'];

	//----Техническое решение----
	//$male = $_POST['male'];
	//$female = $_POST['female'];

	if($_POST['sex']==1)
		$sex = 'M';
	else
	{
		if($_POST['sex']==2)
			$sex = 'F';
		else
			$sex = '';
	}

	//----бредово----

	$pass = $_POST['pass'];
	//$check = $_POST['check'];
	if(isset($_POST['check']))
		$ras = 'T';
	else
		$ras = 'F'; 
	$ras_m = $_POST['news'];

	error_reporting(0);

	$db = mysql_connect('localhost', 'Admin', 'Razer2')
			or die('В данный момент нельзя добавить пользователя');
	mysql_select_db('WEB', $db)
			or die('В данный момент нельзя добавить пользователя');

	$sql = "insert into log_tab(login, email, pass, ras, ras_meth, sex, tel) 
			values('%s','%s', '%s', '%s', '%s', '%s', '%s')";
	//%d %s
	$query = sprintf($sql, mysql_real_escape_string($name),
						   mysql_real_escape_string($email), 
						   mysql_real_escape_string($pass), 
						   mysql_real_escape_string($ras), 
						   mysql_real_escape_string($ras_m), 
						   mysql_real_escape_string($sex), 
						   mysql_real_escape_string($tel));
	echo "<br>".$query."<br>";

	$result = mysql_query($query)
			or die('<br>В данный мемент нельзя добавить пользователя:<br>');
	mysql_close($db);
	if($result)
		echo "<br>Данные пользователя добавлены<br>";
	else
		echo "<br>Данные пользователя откланены<br>";
	//общее решение
	if(!empty($tel))
	{
		if(mail_test($email)&name_test($name)&tel_test($tel)&pass_test($pass))
		{
			echo "<br>Данные введены верно";
			$_SESSION['block'] = "1";
		}
		else
		{
			echo "<br>Список ошибок: ";
			if(!mail_test($email))
				echo "<br>Ошибка ввода почты";
			if(!name_test($name))
				echo "<br>Ошибка ввода логина";
			if(!pass_test($pass))
				echo "<br>Ошибка ввода пароля";
			if(!tel_test($tel))
				echo "<br>Ошибка ввода телефона";
		}
	}
	else
	{	
		if(mail_test($email)&name_test($name)&pass_test($pass))
		{
			echo "<br>Данные введены верно";
			$_SESSION['block'] = "1";
		}
		else
			{
				echo "<br>Список ошибок: ";
				if(!mail_test($email))
					echo "<br>Ошибка ввода почты";
				if(!name_test($name))
					echo "<br>Ошибка ввода логина";
				if(!pass_test($pass))
					echo "<br>Ошибка ввода пароля";
			}
	}

	//валидация логина
	function name_test($name)
	{
		$options = array(
						"options"=>array(
											'regexp'=>'/[A-z]{3}/'
										)
						);
		if (filter_var($name, FILTER_VALIDATE_REGEXP, $options))
			return true;
		else
			return false;
	}

	//валидация номера
	function tel_test($tel)
	{
		if (filter_var($tel, FILTER_VALIDATE_REGEXP, array("options"=>array('regexp'=>'/[0-9]{11}/'))))
			return true;
		else
			return false;
	}

	//валидация почты
	function mail_test($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
			return true;
		else
			return false;
	}

	//валидация пароля
	function pass_test($pass)
	{
		$options = array(
						"options"=>array(
											'regexp'=>'/[A-z0-9]{3}/'
										)
						);
		if (filter_var($pass, FILTER_VALIDATE_REGEXP, $options))
			return true;
		else
			return false;		
	}
	echo "
		<br>
		<form method='LINK' action='index.php'>
			<input type='submit' value='Возврат'>
		</form>
	";
?>