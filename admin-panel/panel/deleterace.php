<?php
if(!isset($logged)) require '../checkauth.php';

if(!$logged):
	echo '<h3 style="text-align: center">Для работы в панеле необходимо <b>Авторизироваться</b></h3>';
	return;
endif;

$id = intval($_POST['id']);

$query = "DELETE FROM `shattle` WHERE `id` = $id";
mysqli_query($link, $query);
die();
?>