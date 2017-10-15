<?PHP
if (!isset($logged)) require 'checkauth.php';
if($logged):
?>
	<p style="margin: 0;">Добро пожаловать, <b><?PHP echo $res['login'] ?></b></p>
	<div onclick="comlist()" style="cursor:pointer;display: block;">Управление комментариями</div>
	<a href="#" onclick="clicker(event);" class="login">Завершить сеанс</a>
<?php
else:
?>
	<input id="ulogin" placeholder="Ваш логин" required="required"/>
	<input id="passwd" type="password"  placeholder="Ваш пароль" required="required"/>
	<input type="submit" value="Войти" />
<?PHP endif;?>