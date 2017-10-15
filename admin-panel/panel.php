<?php
if(!isset($logged)) require 'checkauth.php';

if(!$logged):
	echo '<h3 style="text-align: center">Для работы в панеле необходимо <b>Авторизироваться</b></h3>';
	return;
endif;

// TO DO:\
// Тут мы такие подгружаем Корабли
// И выводим их
require 'panel/sheeps.php';
?>

<div id="sheep_info"></div>
