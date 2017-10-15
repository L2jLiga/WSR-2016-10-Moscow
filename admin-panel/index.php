<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Админ-панель</title>
	<link rel="stylesheet" href="style.css" />
	<script src="jquery-2.1.4.min.js"></script>
	<script src="jquery-ui.min.js"></script>
	<script src="myscript.js"></script>
</head>
<body>
<div id="form">
	<form id="login">
	<?PHP
	require 'auth_widget.php';
	?>
	</form>
</div>
<div id="panel">
<?php require 'panel.php'; ?>
</div>
</body>
</html>