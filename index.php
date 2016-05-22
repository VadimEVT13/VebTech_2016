
	<head>
		<title>Моя страница</title> 		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="css/ui.reformed.css"/>
		<link rel="stylesheet" href="css/ie_fieldset_fix.css"/>
		<link rel="stylesheet" href="css/uniform.aristo.css"/>
		<script href="js/jquery.ui.reformed.js"></script>
		<script href="js/jquery.ui.reformed.min.js"></script>
		<script href="js/jquery.uniform.min.js"></script>
		<script href="js/jquery.validate.js"></script>
		<script href="js/jquery.validate.min.js"></script>
	</head>	
<div class="reformed-form">
	<form method="post" name="Registration" id="Registration" action="t2.php">
		<dl>
			<dt>
				<label for="name">Логин</label>
			</dt>
			<dd><input type="text" id="name" class="required  lettersonly" name="name" min="3" /></dd>
		</dl>
		<dl>
			<dt>
				<label for="email">Почта</label>
			</dt>
			<dd><input type="text" id="email" class="required  email" name="mail" /></dd>
		</dl>
		<dl>
			<dt>
				<label for="tel">Телефон</label>
			</dt>
			<dd><input type="text" id="tel" class="alphanumunderscorehyphen" name="tel" /></dd>
		</dl>
		<dl>
			<dt>
				<label for="sex">Пол</label>
			</dt>
			<dd>
				<ul>
					<li><input type="radio" id="sex" name="sex" value="M" checked="checked" />
						<label>Мужской</label>
					</li>
					<li><input type="radio" id="sex" name="sex" value="F" />
						<label>Женский</label>
					</li>
				</ul>
						</dd>
		</dl>
		<dl>
			<dt>
				<label for="pass">Пароль</label>
			</dt>
			<dd><input type="password" id="pass" class="required" name="pass" min="3" /></dd>
		</dl>
		<dl>
			<dt>
				<label for="ras">Рассылка</label>
			</dt>
			<dd>
				<ul>
					<li><input type="radio" id="ras" name="ras" value="ras" />
						<label>Включить</label>
					</li>
				</ul>
						</dd>
		</dl>
		<dl>
			<dt>
				<label for="ras_meth">Выбор</label>
			</dt>
			<dd>
				<select size="1" name="ras_meth" id="ras_meth">
					<optgroup label="news">
						<option value="mail">Почта</option>
						<option value="msg">Сообщение</option>
					</optgroup>
				</select>
			</dd>
		</dl>
		<div id="submit_buttons">
			<button type="submit">Зарегистрировать</button>
		</div>
		</form>
</div>

