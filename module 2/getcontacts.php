<?PHP
if(!isset($logged)) require 'checkauth.php';

$query = "SELECT * FROM `Contacts` WHERE 1";
$res = mysqli_query($link, $query);

while ($r2 = mysqli_fetch_assoc($res)):
	echo '<p style="font-weight: 900;">' . $r2['title'] . '</p>';
	if(!empty($r2['Adress'])) echo '<p>Адрес: ' . $r2['Adress'] . '</p>';
	if(!empty($r2['phone'])) echo '<p>Телефон: ' . $r2['phone'] . '</p>';
	if(!empty($r2['mail'])) echo '<p>E-Mail: ' . $r2['mail'] . '</p>';
endwhile;
mysqli_free_result($res);
?>