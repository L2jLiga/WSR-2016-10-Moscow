<?PHP
if(!isset($logged)) require 'checkauth.php';

if($logged):
// Для авторизированного покажем форму заказа
?>
	<article>
		<h1>Добавить отзыв</h1>
		<form id="addfeed" onsubmit="addfeed(event)">
			<textarea class="feedback" placeholder="Введите текст вашего отзыва"></textarea>
			<input type="submit" value="Добавить" />
		</form>
	</article>
<?PHP
endif;

$query = "SELECT `user_id`, `text`, `times` FROM `d` WHERE 1 ORDER BY `id` DESC";
$res = mysqli_query($link, $query);

$td = array();
while ($td = mysqli_fetch_assoc($res)):
?>
	<article>
		<h1><?php
		$ss = mysqli_fetch_array(mysqli_query($link, "SELECT `login` FROM `users` WHERE `id` = ". $td['user_id']));
		echo $ss[0];
		?><time><?php echo $td['times']; ?></time></h1>
		<div>
			<p><?PHP echo $td['text']; ?></p>
		</div>
	</article>
<?
endwhile;
?>