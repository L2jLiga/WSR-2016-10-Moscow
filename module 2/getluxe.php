<?PHP
if(!isset($logged)) require 'checkauth.php';

// Буффер для вывода
$buff = '';

// Достали список забитых кораблей..
$query = "SELECT `luxe` FROM `shattle` WHERE 1 LIMIT 1";
$res = mysqli_fetch_array(mysqli_query($link, $query));

// Разбили их на пары..
$tmp_luxe = explode(',', $res['luxe']);
array_pop($tmp_luxe);
$luxe = array();
// И добили как нам надо
$tmp = array();
foreach($tmp_luxe AS $key => $value)
{	
	$tmp = explode("-", $value);
	$luxe[$tmp[0]] = $tmp[1];
}
// Сверяем, а в системе ли мы (от этого зависит просмотр наших заказов)
if($logged):
// Тут если мы в системе

// Ну а тут рисуем..
for($i = 0; $i < 10; $i++){
	$buff .= "<div ><span class='";
	if(isset($luxe[$i])) 
	{
		if($luxe[$i] == $id) $buff .= 'forYou';
		else $buff .= 'busy';
		
	}
	else $buff .= 'free';
	$i++;
	$buff .= "'>$i</span></div>";
	$i--;
}


else:
// А тут для гостей

for($i = 0; $i < 10; $i++){
	$buff .= "<div ><span class='";
	if(isset($luxe[$i])) $buff .= 'busy';
	else $buff .= 'free';
	$i++;
	$buff .= "'>$i</span></div>";
	$i--;
}

endif;
echo $buff;
?>