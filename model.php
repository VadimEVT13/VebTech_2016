<?php
	include "user.php";
	class Model
	{
		public function save(user $user)
		{
			if(($user->getName()!="NULL")&&($user->getEmail()!="NULL")&&($user->getPass()!="NULL"))
			{
				$sql = "Insert into log_tab(login, email, pass, tel, sex, ras, ras_meth) 
					values('".$user->getName()."', '".$user->getEmail()."', '".$user->getPass()."'";
				if($user->getTel()!="NULL")
				{
					$sql = $sql.", '".$user->getTel()."'";
				}
				else
					$sql = $sql.", ''";

				if($user->getSex()!="NULL")
				{
					$sql = $sql.", '".$user->getSex()."'";
				}
				else
					$sql = $sql.", ''";

				if($user->getRas()!="NULL")
				{
					$sql = $sql.", '".$user->getRas()."'";
				}
				else
					$sql = $sql.", ''";

				if($user->getRas_meth()!="NULL")
				{
					$sql = $sql.", '".$user->getRas_meth()."'";
				}
				else
					$sql = $sql.", ''";

				$sql = $sql.")";

				if(Model::DBSql($sql))
				{
					echo "<br>Пользователь сохранён<br>";
					return 1;
				}
				else
				{
					echo "<br>Пользователь не сохранён<br>";
					return 0;
				}
			}
			else
			{
				echo "Login: ".$user->getName();
				echo "Email: ".$user->getEmail();
				echo "Pass: ".$user->getPass();
			}
		}

		public function delete(user $user)
		{
			if(Model::DBSql("Delete from log_tab where login='".$user->getName()."'"))
				echo "<br>Пользователь удалён<br>";
			else
				echo "<br>Пользователь не удалён<br>";
		}

		public function get($id=null)
		{
			if(isset($id))
			{
				//выборка по id
				$result = Model::DBSql("Select * from log_tab where id = '".$id."'");
				while($row = mysql_fetch_array($result))
				{
					$arr = array($row['login'], $row['email'], $row['pass'], $row['tel'], 
						$row['sex'], $row['ras'], $row['ras_meth']);
					$u = new user(implode(";", $arr).";");
					return $u;
				}
			}
			else
			{
				$result = Model::DBSql("Select * from log_tab");				
				while($row = mysql_fetch_array($result))
				{
					$arr = array($row['login'], $row['email'], $row['pass'], $row['tel'], 
						$row['sex'], $row['ras'], $row['ras_meth']);					
					$u = new user(implode(";", $arr).";");
					$ulist[] = $u;
				}
				return $ulist;
			}
		}

		public function update(user $user1, user $user2)
		{
			//сама форма не даст сделать update
		}

		public function DBSql($sql)
		{
			$db = mysql_connect('localhost', 'Admin', 'Razer2');
			mysql_select_db('WEB', $db);			
			$res = mysql_query($sql);
			mysql_close();

			return $res;
		}	
	}
?>