<?php
	$massive[] = array(
							$n = '"name"',
							$t = '"text"',
							$r = 'required',
							$pa = '"[A-z]{3,}"',
							$pl = '"Более 3 букв англ."',
							$text = 'Логин'
						);
	$massive[] = array(
							$n = '"mail"',
							$t = '"email"',
							$r = "required",
							$pa = '"^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$"',
							$pl = '"Example@gmail.com"',
							$text = "Почта"
						);
	$massive[] = array(
							$n = '"tel"',
							$t = '"tel"',
							$r = "",
							$pa = '"[0-9]{11}"',
							$pl = '"89503335465"',
							$text = "Телефон"
						);
	$massive[] = array(
							$n = '"pass"',
							$t = '"password"',
							$r = "required",
							$pa = '"[A-z0-9]{3,}"',
							$pl = '"mypass222"',
							$text = "Пароль"
						);
	$massive[] = array(
							$n = '"sex"',
							$t = '"radio"',
							$r = "",
							$pa = "",
							$pl = "",
							$text = "Мужчина",
							$v = "value='1'"
						);
	$massive[] = array(
							$n = '"sex"',
							$t = '"radio"',
							$r = "",
							$pa = "",
							$pl = "",
							$text = "Женщина",
							$v = "value='2'"
						);
?>