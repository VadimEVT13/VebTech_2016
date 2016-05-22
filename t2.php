<?php
	session_name("test");
	session_start();
	include "model.php";
	//----подсказка----

	//if($_SESSION['key']==md5(session_id()))
	//{
		echo "<br>Нельзя использовать символы \' и \\<br>";

		if($_POST['sex']==1)
			$sex = 'M';
		else
		{
			if($_POST['sex']==2)
				$sex = 'F';
			else
				$sex = '';
		}

		if(isset($_POST['check']))
			$ras = 'T';
		else
			$ras = 'F'; 




		$u = new user($_POST['name'].";".$_POST['mail'].";".$_POST['pass'].";".$_POST['tel'].
			";".$sex.";".$ras,$_POST['news'].";");
		$u->getStr();
		$model = new Model();
		if($model->save($u)==1)			
			$_SESSION['block'] = "1";


		echo 
		"
			<br>
			<form method='LINK' action='index.php'>
				<input type='submit' value='Возврат'>
			</form>
		";
	//}
?>