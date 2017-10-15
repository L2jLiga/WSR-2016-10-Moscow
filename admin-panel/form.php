<?PHP
// Помошник в очистке
function clean_var($var)
{
	return htmlspecialchars(stripslashes(trim($var)));
}

// Коннект с БД
$link = mysqli_connect('localhost','st8','2856','st8');
mysqli_set_charset($link, 'utf8');

if(isset($_COOKIE['admhash']) && isset($_COOKIE['admid']))
{
	$hash = $_COOKIE['admhash'];
	$id = $_COOKIE['admid'];
}
else
{
	$hash = '';
	$id = '';
}
// Проверка на аутентификацию
$query = "SELECT `login` FROM `admins` WHERE `hash` = '$hash' AND `id` = '$id'";
$res = mysqli_fetch_assoc(mysqli_query($link, $query));
if($res && $res['login']) $logged = 1;
else $logged = 0;

// Дальнейшая проверка идет по переменной $logged, если она установлена, то мы зашли
?>