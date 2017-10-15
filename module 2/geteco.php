<?PHP
if(!isset($logged)) require 'checkauth.php';

// Буффер для вывода
$buff = '';

// Достали список забитых кораблей..
$query = "SELECT `econom` FROM `shattle` WHERE 1 LIMIT 1";
$res = mysqli_fetch_array(mysqli_query($link, $query));

// Разбили их на пары..
$tmp_luxe = explode(',', $res['econom']);
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
for($j = 0; $j < 8; $j++)
{
	$buff .= "\t\t\t<div class=\"row\">\n";
	for($i = 0; $i < 10; $i++){
		$buff .= "\t\t\t\t<div ><span class='";
		if(isset($luxe[$i+$j*10])) 
		{
			if($luxe[$i+$j*10] == $id) $buff .= 'forYou';
			else $buff .= 'busy';
			
		}
		else $buff .= 'free';
		$tmpint = $i + $j*10 + 1;
		$buff .= "'>$tmpint</span></div>\n";
	}
	$buff .= "\t\t\t</div>\n";
}

else:
// А тут для гостей

for($j = 0; $j < 8; $j++)
{
	$buff .= "\t\t\t<div class=\"row\">\n";
	for($i = 0; $i < 10; $i++){
		$buff .= "\t\t\t\t<div ><span class='";
		if(isset($luxe[$i+$j*10])) $buff .= 'busy';
		else $buff .= 'free';
		$tmpint = $i + $j*10 + 1;
		$buff .= "'>$tmpint</span></div>\n";
	}
	$buff .= "\t\t\t</div>\n";
}

endif;
echo $buff;
?>