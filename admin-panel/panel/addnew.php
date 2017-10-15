<?php
if(!isset($logged)) require '../checkauth.php';

if(!$logged):
	echo '<h3 style="text-align: center">Для работы в панеле необходимо <b>Авторизироваться</b></h3>';
	return;
endif;

// Добавляем новый корабль в БД с текущей датой
$data = date("d.m.Y");
$query = "INSERT INTO `shattle`(`time`, `luxe`, `econom`, `zero`) VALUES ('$data','','','');";
mysqli_query($link, $query);

// Забираем и отдаем ID нового рейса
$query = "SELECT `id` FROM `shattle` ORDER BY `id` DESC LIMIT 1";
$res = mysqli_query($link, $query);
$sid = mysqli_fetch_assoc($res);
mysqli_free_result($res);

// Отдаем его админу
die($sid['id']);
?>