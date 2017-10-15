<?PHP

if(!isset($logged)) require 'checkauth.php';

// Тут у нас проверочка на аутентификацию
if(!isset($_POST['act']) || empty($_POST['act'])) die('Error');

$act = $_POST['act'];



// Авторизация пользователя
if($act == 'login'):
if($logged) die("Already logged in");
	$hash = md5(microtime());
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];

	// Чекаем логин
	clean_var($login);
	if(!$login || (strlen($login) < 4) || (strlen($login) > 40)){
		die('Login incorrect');
	}
	// Чекаем пароль
	clean_var($passwd);
	if(!$passwd || (strlen($passwd) < 4) || (strlen($passwd) > 40)){
		die('Password incorrect');
	}

	// Теперь шифруем пароль для сверки
	$passwd = md5(strtoupper(md5(strtolower($login))) . strrev($passwd));

	// Проверка на аутентификацию
	$query = "SELECT `id` FROM `admins` WHERE `login` = '$login' AND `passwd` = '$passwd'";
	$res = mysqli_fetch_assoc(mysqli_query($link, $query));

	if($res && $res['id']):
		// Если прошли - то ставим кукисы и заносим наш хэш в БД
		setcookie('admid', $res['id'], time()+10400);
		setcookie('admhash', $hash, time()+10400);

		$query = "UPDATE `admins` SET `hash` = '$hash' WHERE `id` = " . $res['id'];
		mysqli_query($link, $query);

		die('successful');
	endif;
	die('Error');
// Деавторизация
else: if($act == 'exit'):
	// Очищаем кукисы и хэш из БД, чтобб наверняка не зашли
	$query = "UPDATE `admins` SET `hash` = NULL WHERE `id` = " . $_COOKIE['admid'];
	mysqli_query($link, $query);

	setcookie('admid', "", time()-10400);
	setcookie('admhash', "", time()-10400);

	// Ну и вернем зверю успех
	die('successful');
else:
	die('Error');
endif;
endif;
?>