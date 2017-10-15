
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,init-scale=1.0,user-scalable=no" />
	<title>Покусись на Марс!</title>
	
	<link rel="stylesheet" href="res/style.css" />
	<script src="jquery-2.1.4.min.js"></script>
	<script src="jquery-ui.min.js"></script>
	<script src="myscript.js"></script>
</head>
<body>
	<div id="top"></div><!-- Якорь -->
	
	<!-- Меню навигации -->
	<nav>
		<a href="#top" title="Перейти на главную">Главная</a>
		<a href="#about" title="Узнайте больше о нас">О нас</a>
		<a href="#history" title="Узнайте нашу историю">История</a>
		<a href="#contacts" title="Свяжитесь с нами">Контакты</a>
		<form id="login">
			<?PHP include 'auth_widget.php'; ?>
		</form>
	</nav>
	<!-- Шапка страницы -->
	<header>
		<h1>Покусись на Марс!</h1>
		<article>
			<div>
				<img src="res/logo.png" alt="" />
			</div>
			<div>
				<p>Красная</p>
				<p>Планета</p>
				<p>Теперь</p>
				<p>Зеленая!</p>
			</div>
		</article>
		<div>Безопасные полеты на Марс всего за один в день</div>
		<menu>
			<a href="#contacts">Контакты</a>
			<a href="order.php">Заказать</a>
			<a href="./feedback.php">Отзывы</a>
		</menu>
	</header>
	
	<!-- Типичные блоки,
	     TO DO: Редактирование из под админки -->
	<article id="about">
		<h1>О нас</h1>
		<div>
			<p>ОАО "Покусись на марс" была основана в 2013 году в Сколково. Основатели компании совершенно случайно, при попытке высадить макаку-героя на луне, наткнулись на формулу совершенно нового вида перемещения в пространстве, позволяющую обычным космиченским челнокам преодолевать расстояние от Земли до Марса за 1 день.</p>
		</div>
	</article>
	<article id="history">
		<h1>Наша история</h1>
		<div>
			<p>В 2015 году на базе ТУ214 был разработан челнок "Утконос16 - Наномарс"</p>
			<p>В 2017 была построена первая марсианская станция "Розовая булка"</p>
			<p>В 2019 году был построен экспериментальный город специалистов "Сизый Тюльпан"</p>
			<p>В 2020 году рядом с "Сизым Тюльпаном" был построен город для туристов</p>
		</div>
	</article>
	<article id="contacts">
		<h1>Контакты</h1>
		<div>
			<?php require 'getcontacts.php'; ?>
		</div>
	</article>
	
	<!-- Подвал
	TO DO: добавить кнопки Social Media -->
	<footer>
		<div>(c) 2013-2021, Сколково</div>
	</footer>
</body>
</html>