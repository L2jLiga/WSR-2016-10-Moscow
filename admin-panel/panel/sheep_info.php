<?php
if(!isset($logged)) require '../checkauth.php';

if(!$logged):
	echo '<h3 style="text-align: center">Для работы в панеле необходимо <b>Авторизироваться</b></h3>';
	return;
endif;

// Достаем служебную информацию
$sid = intval($_POST['id']);

$query = "SELECT `time` FROM `shattle` WHERE `id` = " .$sid;
$stime = mysqli_fetch_assoc(mysqli_query($link, $query));
$stime = $stime['time'];
?>

<h2>Инфа о корабле с ID <span id="shipid"><?PHP echo $sid; ?></span>:</h2>

<hr/>
<form onsubmit="savetime(event);return false;">
	<input id="save_time" value="<?PHP echo $stime;?>" pattern="[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{4}" required='required'/>
	<input type="submit" value="Обновить время" />
</form>
<button onclick="deleterace()">Удалить рейс</button>
<div class="luxe">
	<p align="center">Luxe</p>
	<div class="row">
		<?PHP require 'getluxe.php'; ?>
	</div>
</div>
<div class="econom">
	<p align="center">Econom</p>
	<?PHP require 'geteco.php'; ?>
</div>
<div class="zero">
	<p align="center">Zero</p>
	<div class="row">
		<?PHP require 'getzero.php'; ?>
	</div>
</div>
<div class="delete">X</div>