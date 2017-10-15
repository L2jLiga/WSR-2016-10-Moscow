<?PHP
if(!isset($logged)) require '../checkauth.php';

// Буффер для вывода
$buff = '';

if(!isset($sid))
{
	$sid = intval($_POST['id']);
}

// Достали список забитых кораблей..
$query = "SELECT `zero` FROM `shattle` WHERE `id` = " . $sid;
$res = mysqli_fetch_array(mysqli_query($link, $query));

// Разбили их на пары..
$tmp_luxe = explode(',', $res['zero']);
array_pop($tmp_luxe);
$luxe = array();
// И добили как нам надо
$tmp = array();
foreach($tmp_luxe AS $key => $value)
{	
	$tmp = explode("-", $value);
	$luxe[$tmp[0]] = $tmp[1];
}

// Ну а тут рисуем..
for($i = 0; $i < 10; $i++){
	$buff .= "<div ><span class=";
	if(isset($luxe[$i])) $buff .= '"busy" data-userid="'.$luxe[$i].'"';
	else $buff .= '"free"';
	$i++;
	$buff .= ">$i</span></div>";
	$i--;
}

echo $buff;
?>