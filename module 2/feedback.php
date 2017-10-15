<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,init-scale=1.0,user-scalable=no" />
	<title>Отзывы - Покусись на Марс!</title>
	
	<link rel="stylesheet" href="res/style.css" />
	<script src="jquery-2.1.4.min.js"></script>
	<script src="jquery-ui.min.js"></script>
	<script src="myscript.js"></script>
</head>
<body>
	<!-- Меню навигации -->
	<nav>
		<a href="./" title="Перейти на главную">Главная</a>
		<a href="./#about" title="Узнайте больше о нас">О нас</a>
		<a href="./#history" title="Узнайте нашу историю">История</a>
		<a href="./#contacts" title="Свяжитесь с нами">Контакты</a>

		<form id="login">
			<?PHP include 'auth_widget.php'; ?>
		</form>
	</nav>

	<header id="feedback"></header>
	<!-- Типичные блоки,
	     TO DO: Редактирование из под админки -->
	<?PHP require 'feedback_engine.php'; ?>
	
	<!-- Подвал
	TO DO: добавить кнопки Social Media -->
	<footer>
		<div>(c) 2013-2021, Сколково</div>
	</footer>
</body>
</html>