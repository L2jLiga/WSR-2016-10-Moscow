<?PHP
if(!isset($logged)) require 'checkauth.php';

if($logged):
	// Добавляем Feedback
	$user_id = $id;
	$fio = trim(stripslashes(htmlspecialchars($_POST['FIO'])));
	$type = $_POST['type'];
	$passport = intval($_POST['passport']);
	
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

	// Тут короче нужно подсчитать сколько уже у клиента заказов, если больше трех,то шиш ему
	
	
	// Теперб добавили нового..
	if($type == 'econom')
	{
		for($i = 0; $i < 80; $i++)
		{
			if(!$luxe[$i]) {
				$luxe[$i] = $user_id;
				$i = 99;
				$have_seat = 1;
			}
		}
		if(!$have_seat) die("noavail");
	}
	else
	{
		for($i = 0; $i < 10; $i++)
		{
			if(!$luxe[$i]) {
				$luxe[$i] = $user_id;
				$i = 99;
				$have_seat = 1;
			}
		}
		if(!$have_seat) die("noavail");
	}
	
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