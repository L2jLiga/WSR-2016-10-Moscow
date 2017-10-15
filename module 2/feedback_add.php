<?PHP
if(!isset($logged)) require 'checkauth.php';

if($logged):
	// Добавляем Feedback
	$user_id = $id;
	$text = trim(nl2br(stripslashes(htmlspecialchars($_POST['txt']))));
	$times = date("m.d.y g:i");
	
	$query = "INSERT INTO `d` (`user_id`, `text`, `times`) VALUES ('$user_id','$text','$times');";
	mysqli_query($link, $query);
else:
	die('Error');
endif;
?>