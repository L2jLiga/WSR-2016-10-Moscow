<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,init-scale=1.0,user-scalable=no" />
	<title>Отзывы - Покусись на Марс!</title>
	
	<link rel="stylesheet" href="res/style.css" />
	<link rel="stylesheet" href="res/reg.css" />
	<link rel="stylesheet" href="res/order.css" />
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

	<header>
		<h1>Покусись на Марс!</h1>
		<article>
			<div>
				<img src="res/shattl.png" alt="" />
			</div>
			<div>
				<p>Здесь вы</p>
				<p>Можете</p>
				<p>Забронировать</p>
				<p>Шаттл</p>
			</div>
		</article>
	</header>
	<!-- Типичные блоки,
	     TO DO: Редактирование из под админки -->
	<article>
		<h1>Бронирование:</h1>
	</article>
	
	<article>
		<h1>Выберите себе место</h1>
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
		<?PHP require 'order_form.php'; ?>
	</article>
	
	<!-- Подвал
	TO DO: добавить кнопки Social Media -->
	<footer>
		<div>(c) 2013-2021, Сколково</div>
	</footer>
</body>
</html>