<?php
if(!isset($logged)) require '../checkauth.php';

if(!$logged):
	echo '<h3 style="text-align: center">Для работы в панеле необходимо <b>Авторизироваться</b></h3>';
	return;
endif;
?>
<div id="sheeps_list" ><h3>Список космических кораблей</h3>
<?php
// TO DO:\
// Тут мы такие подгружаем Корабли
// И выводим их
$query = "SELECT * FROM `shattle` WHERE 1 ORDER BY `time`";
$res = mysqli_query($link, $query);

while($td = mysqli_fetch_assoc($res)):
$i = $td['id']
?>
<div onclick="click_sheeps(<?php echo $i; ?>)">
	Корабрь на<br /><?php echo $td['time']; ?>
</div>
<?PHP
endwhile;
$i++
?>
	<div id="addnew" onclick="addnew(<?PHP echo $i; ?>)">
		Новый<br />Корабрь
	</div>
</div>