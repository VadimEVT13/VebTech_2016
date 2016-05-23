<?php
	session_name("test");
	session_start();

	if(!isset($_SESSION['start']))
		$_SESSION['start'] = time();
	$time_limit = 10;
	if (time() > $_SESSION['start']+$time_limit)
	{
		session_destroy();
	}
	else
	{
		//вот это глуповато, это значит,
		//что пользователь будет много раз обновлять,
		//а ничего не изменится
		//$_SESSION['start'] = time();
	}

	//error_reporting(0);
?>


<html>
	<head>
		<title>Моя страница</title> 		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="css/style.css"/>
	</head>		
	
	<body>
		
		<!-- Заголовок начальной страницы-->
		<header><p class="title">Регистрация</p></header>
		
		<!-- Форма, данные будут передаватся методом POST. В этой работе ничего не передается -->
		<?php
			if (isset($_SESSION['block']))
			{
				echo "<p style='margin-left:20%;
						padding-left:5%;
						border: 1px solid black;
						border-radius: 20px;
						width: 55%;
						background-color: red;'>
						Вы слишком часто создаете пользователя</p>";
			}
			include "user.php";
			$f = user::getForm();
			echo $f;
		?>
		<!--
		<section>
		
		<form name="test" action="t2.php" method="POST">	
		
			<div class="box">
				<label for="name" class="text">Ввод логина: </label>
				<input type="text" name="name" id="name" required pattern="[A-z]{3,}" placeholder="Более 3 букв англ." />
			</div>
			
			<div class="box">
				<label for="mail" class="text">Ввод почты: </label>
			    <input type="email" placeholder="Example@gmail.com" name="mail" id="mail" required pattern="^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$"/>
			</div>
			
			<div class="box">
				<label for="tel" class="text">Ввод телефона: </label> 
				<input type="tel" placeholder="89503335465" name="tel" id="tel" pattern="[0-9]{11}" maxlength="11" />
			</div>
			
			<div class="box">
				<label for="male" class="text">Мужской пол: </label>
				<input type="radio" name="sex" id="male" value="1">
			</div>
			
			<div class="box">
				<label for="female" class="text">Женский пол: </label>
				<input type="radio" name="sex" id="female" value="2">
			</div>
			
			<div class="box">
				<label for="pass" class="text">Пароль: </label>
				<input type="password" name="pass" id="pass" required pattern="[A-z0-9]{3,}">
			</div>
			
			<div class="box">
				<label for="check" class="text">Включить рассылку? </label>
				<input type="checkbox" name="check" id="check">
			</div>
			
			<?php
				//$_SESSION['key']=md5(session_id());
				//echo "<input type='hidden' id='identif' value='".$_SESSION['key']."'>";
			?>
			
				<select name="news" name="ras" id="ras">
					<option value="mail">Почта</option>
					<option value="msg">Сообщение</option>
				</select>
			</section>
			-->
			<?php
				//if(!isset($_SESSION['block']))
				//{
				//	echo "<input type='submit' name='sub' value='Отправить данные'' class='last'>";
				//}				
			?>
		</form>
	</body>

</html>