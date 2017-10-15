<?PHP
if(!isset($logged)) require 'checkauth.php';

if($logged):
?>
			<p style="margin: 0;color: white;">Добро пожаловать, <b><?PHP echo $res['login'] ?></b></p>
			<a href="#" onclick="clicker(event);" class="login">Завершить сеанс</a>
<?PHP
else:
	// Очищаем кукисы и продолжаем работу скрипта
	setcookie('id', "", time()-10400);
	setcookie('hash', "", time()-10400);
	$hash = null;
	$id = null;
?>
			<input id="ulogin" placeholder="Ваш логин" required="required"/>
			<input id="passwd" type="password"  placeholder="Ваш пароль" required="required"/>
			<input type="submit" value="Войти" />
			<a href="./reg.php">Регистрация</a>
<?PHP
endif;
?>