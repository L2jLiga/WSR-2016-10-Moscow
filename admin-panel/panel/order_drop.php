<?PHP
if(!isset($logged)) require '../checkauth.php';

if($logged):

	$sid = intval($_POST['id']);
	$type = $_POST['type'];

	// Достали список забитых мест..
	$query = "SELECT `$type` FROM `shattle` WHERE 1 LIMIT 1";
	$res = mysqli_fetch_array(mysqli_query($link, $query));

	// Разбили их на пары..
	$tmp_luxe = explode(',', $res[$type]);
	$luxe = array();
	// И добили как нам надо
	$tmp = array();
	foreach($tmp_luxe AS $key => $value)
	{	
		$tmp = explode("-", $value);
		$luxe[$tmp[0]] = $tmp[1];
	}

	// Тут короче убираем то самое место..
	unset($luxe[$sid]);

	// И собираем обратно..
	$buff = '';
	foreach($luxe AS $key => $value)
	{
		$buff .= $key . '-' . $value . ',';
	}

	$query = "UPDATE `shattle` SET `$type` = '$buff' WHERE `id` = 1;";

	mysqli_query($link, $query);

	die('successful');
else:
	die('Error');
endif;
?>