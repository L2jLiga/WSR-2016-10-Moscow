<?PHP
// Помошник в очистке
function clean_var($var)
{
	return htmlspecialchars(stripslashes(trim($var)));
}


// Цепляемся к БД
$link = mysqli_connect('localhost','st8','2856','st8');
mysqli_set_charset($link, 'utf8');

// Тут у нас проверочка на аутентификацию
if(!isset($_POST['act']) || empty($_POST['act'])) die('Error');

$act = $_POST['act'];



// Авторизация пользователя
if($act == 'login'):

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
$query = "SELECT `id` FROM `users` WHERE `login` = '$login' AND `passwd` = '$passwd'";
$res = mysqli_fetch_assoc(mysqli_query($link, $query));
if($res && $res['id']):

// Если прошли - то ставим кукисы и заносим наш хэш в БД
setcookie('id', $res['id'], time()+10400);
setcookie('hash', $hash, time()+10400);

$query = "UPDATE `users` SET `hash` = '$hash' WHERE `id` = " . $res['id'];
mysqli_query($link, $query);

die('successful');
endif;
die('Error');



// Регистрация
else: if($act == 'register'):

$mail = $_POST['mail'];
$login = $_POST['login'];
$passwd = $_POST['passwd'];

// Чекаем мыло
if(filter_var($mail, FILTER_VALIDATE_EMAIL) == false)
{
	die('E-mail incorrect!');
}

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

// Теперь шифруем пароль
$passwd = md5(strtoupper(md5(strtolower($login))) . strrev($passwd));

// Если все успешно, то делаем запись в БД с новым пользователем
$query = "INSERT INTO `users` (`login`,`mail`,`passwd`) VALUES('$login','$mail','$passwd')";
mysqli_query($link, $query);
die('successful');



// Деавторизация
else: if($act == 'exit'):


// Очищаем кукисы и хэш из БД, чтобб наверняка не зашли
$query = "UPDATE `users` SET `hash` = NULL WHERE `id` = " . $_COOKIE['id'];
mysqli_query($link, $query);

setcookie('id', "", time()-10400);
setcookie('hash', "", time()-10400);

// Ну и вернем зверю успех
die('successful');

else:
	die('Error');
endif;
endif;
endif;

// Отцепляемся от БД
mysqli_close($link);
?>