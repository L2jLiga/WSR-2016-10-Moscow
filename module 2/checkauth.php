<?PHP
$link = mysqli_connect('localhost','st8','2856','st8');
mysqli_set_charset($link, 'utf8');

if(isset($_COOKIE['hash']) && isset($_COOKIE['id']))
{
	$hash = $_COOKIE['hash'];
	$id = $_COOKIE['id'];
}
else
{
	$hash = '';
	$id = '';
}
// Проверка на аутентификацию
$query = "SELECT `login` FROM `users` WHERE `hash` = '$hash' AND `id` = '$id'";
$res = mysqli_fetch_assoc(mysqli_query($link, $query));
if($res && $res['login']) $logged = 1;
else $logged = 0;

?>