<?php
if(!isset($logged)) require '../checkauth.php';

if(!$logged):
	echo '<h3 style="text-align: center">Для работы в панеле необходимо <b>Авторизироваться</b></h3>';
	return;
endif;

$time = $_POST['time'];
$id = intval($_POST['id']);

$query = "UPDATE `shattle` SET `time` = '$time' WHERE `id` = $id";
mysqli_query($link, $query);
die();
?>