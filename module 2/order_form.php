<?PHP
if(!isset($logged)) require 'checkauth.php';

if($logged):
// Для авторизированного покажем форму заказа
?>
		<h1 class='order_form'>Заполните данные</h1>
		<p id="forerror" style="color: red; margin:0;"></p>
		<p id="forgood" style="color: green; margin:0;"></p>
		<form class='order_form'>
			<select>
				<option value="luxe">Класс Luxe</option>
				<option value="econom" selected>Класс Econom</option>
				<option value="zero">Класс Zero</option>
			</select>
			<input placeholder="Ваши ФИО" name="fio" required="required"/>
			<input placeholder="Номер паспорта" name="passport" type="int" required="required"/>
			<input type="submit" value="Забронировать" />
		</form>
<?PHP
else:
// Для гостя форму авторизации
?>
		<h1 class='order_form'>Необходима авторизация!</h1>
		<div class='order_form'><p style="color: #666;">Для продолжения пройдите процедуру <a href="#top" style="font-weight: 600">Авторизации</a>, если вы у нас впервые, тогда вам следует <a href="reg.php" style="font-weight: 700">Зарегистрироваться</a></p></div>
<?PHP
endif;
?>