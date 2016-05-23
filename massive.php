<?php
	$massiv['name'] = "<div class='box'>
				<label for='name' class='text'>Ввод логина: </label>
				<input type='text' name='name' id='name' required pattern='[A-z]{3,}' placeholder='Более 3 букв англ.' />
			</div>";
	$massiv['mail'] = "<div class='box'>
				<label for='mail' class='text'>Ввод почты: </label>
			    <input type='email' placeholder='Example@gmail.com' name='mail' id='mail' required pattern='^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$'/>
			</div>";
	$massiv['tel'] = "<div class='box'>
				<label for='tel' class='text'>Ввод телефона: </label> 
				<input type='tel' placeholder='89503335465' name='tel' id='tel' pattern='[0-9]{11}' maxlength='11' />
			</div>";
	$massiv['sex'] = "<div class='box'>
				<label for='male' class='text'>Мужской пол: </label>
				<input type='radio' name='sex' id='male' value='1'>
			</div>
			
			<div class='box'>
				<label for='female' class='text'>Женский пол: </label>
				<input type='radio' name='sex' id='female' value='2'>
			</div>";
	$massiv['pass'] = "<div class='box'>
				<label for='pass' class='text'>Пароль: </label>
				<input type='password' name='pass' id='pass' required pattern='[A-z0-9]{3,}'>
			</div>";
	$massiv['ras'] = "<div class='box'>
				<label for='check' class='text'>Включить рассылку? </label>
				<input type='checkbox' name='check' id='check'>
			</div>";
	$massiv['ras_meth'] = "
			<select name='news' name='ras' id='ras'>
				<option value='mail'>Почта</option>
				<option value='msg'>Сообщение</option>
			</select>";
?>