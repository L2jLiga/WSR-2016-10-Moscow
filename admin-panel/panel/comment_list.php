<?php
if(!isset($logged)) require '../checkauth.php';

if(!$logged):
	echo '<h3 style="text-align: center">Для работы в панеле необходимо <b>Авторизироваться</b></h3>';
	return;
endif;

$query = "SELECT `id`, `user_id`, `text`, `times` FROM `d` WHERE 1 ORDER BY `id` DESC";
$res = mysqli_query($link, $query);

$td = array();
?><h2>Список комментариев:</h2><hr /><?
while ($td = mysqli_fetch_assoc($res)):
?>
	<article id="com<?php echo $td['id']?>">
		<h1>Автор: <?php
		$ss = mysqli_fetch_array(mysqli_query($link, "SELECT `login` FROM `users` WHERE `id` = ". $td['user_id']));
		echo $ss[0];
		?>, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Время: <time><?php echo $td['times']; ?></time></h1>
		<a onclick="comdrop(<?php echo $td['id']?>)" href="#" >Удалить комментарий</a>
		<div>Текст комментария:
			<p><?PHP echo $td['text']; ?></p>
		</div>
	</article>
<?
endwhile;
?>