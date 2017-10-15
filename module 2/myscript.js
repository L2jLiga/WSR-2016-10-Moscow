$('document').ready(function(){

// AJAX - регистрация
$("#reg").bind("submit", function(event)
{
	// Отменяем отправку
	event.preventDefault();
	
	$.ajax({
		type: "POST",
		url: 'auth.php',
		data: {
			act: 'register',
			mail: $("input[name=mail]").val(),
			login: $("input[name=login]").val(),
			passwd: $("input[name=passwd]").val()
		}
	}).done(function(data){
		if(data == 'E-mail incorrect!')
		{
			$("#reg p").html("Неправильно введен E-mail");
		}
		else if (data == 'Login incorrect')
		{
			$("#reg p").html("Логин должен иметь длину от 4 до 40 символов и не содержать в себе спецсимволы");
		}
		else if (data == 'Password incorrect')
		{
			$("#reg p").html("Пароль должен иметь длину от 4 до 40 символов");
		}
		else if(data == 'successful')
		{
			$("article").html("<h1>Регистрация</h1><div>Регистрация пользователя <b>" + $("input[name=login]").val() + "</b> успешно завершена!</div>")
		}
		else
			$("#reg p").html("Произошла непредвиденная ошибка, попробуйте позже");
	});
});

$("#login").bind("submit", function(event){
	event.preventDefault();
	
	$.ajax({
		type: "POST",
		url: 'auth.php',
		data: {
			act: 'login',
			login: $("#ulogin").val(),
			passwd: $("#passwd").val()
		}
	}).done(function(data){
		if (data == 'Error')
		{
			
		}
		else if (data == 'Login incorrect')
		{
			$("#reg p").html("Логин должен иметь длину от 4 до 40 символов и не содержать в себе спецсимволы");
		}
		else if (data == 'Password incorrect')
		{
			$("#reg p").html("Пароль должен иметь длину от 4 до 40 символов");
		}
		else
		{
			$("#login").html("<p style='margin: 0;color: white;'>Добро пожаловать, <b>" +  $("#ulogin").val() + "</b></p><a href='#' onclick='clicker(event);' class='login'>Завершить сеанс</a>");
			updateRows();
		}
	});
});


// Бронирование поездки
$("form.order_form").bind("submit", function(event){
	event.preventDefault();
	
	$.ajax({
		type: "POST",
		url: 'order_add.php',
		data: {
			FIO: $("input[name=fio]").val(),
			passport: parseInt($("input[type=int]").val()),
			type: $("form.order_form select").val()
		}
	}).done(function(data){
		console.log(data);
		if (data == 'Error')
		{
			$("#forerror").html("Неизвестная ошибка! Попробуйте позднее");
		}
		else if(data == 'Used')
		{
			$("#forerror").html("На данного человека уже оформлен билет");
		}
		else if(data == 'noavail')
		{
			$("#forerror").html("В выбранном классе закончились места");
		}
		else if(data == 'successful')
		{
			$("#forgood").html("Место успешно забронировано");
			updateRows();
		}
	});
});
});

// Добавление Фида
function addfeed (event){
	event.preventDefault();
	
	$.ajax({
		type: "POST",
		url: 'feedback_add.php',
		data: {
			txt: $("textarea.feedback").val()
		}
	}).done(function(data){
		if(data !== 'Error')
		updateRows();
	});
}

/*
 * Функция для AJAX-деавторизации, т.е. без перезагрузки
 */
function clicker(event)
{
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: 'auth.php',
		data: {
			act: 'exit'
		}
	}).done(function(data){
		if(data == 'Error')
		{
			$("#login").html("<p style='color: red;'>Операция не успешно, обновите страницу</p>");
		}
		else if (data == 'successful')
		{
			$("#login").html('<input xmlns="http://www.w3.org/1999/xhtml" id="ulogin" placeholder="Ваш логин" required="required" />\
			<input xmlns="http://www.w3.org/1999/xhtml" id="passwd" type="password" placeholder="Ваш пароль" required="required" />\
			<input xmlns="http://www.w3.org/1999/xhtml" type="submit" value="Войти" />\
			<a xmlns="http://www.w3.org/1999/xhtml" href="./reg.xhtml">Регистрация</a>');
			updateRows();
		}
	});
}

/*
 * Функция для обновления параметров мониторинга рейса
 */ 
function updateRows()
{
	if($(".row").html() !== undefined)
	{
		$.ajax({
			type: 'POST',
			url: 'getluxe.php'
		}).done(function(data){
			$('.luxe .row').html(data);
		});
		$.ajax({
			type: 'POST',
			url: 'geteco.php'
		}).done(function(data){
			$('.econom').html('<p align="center">Econom</p>' + data);
		});
		$.ajax({
			type: 'POST',
			url: 'getzero.php'
		}).done(function(data){
			$('.zero .row').html(data);
		});
		$.ajax({
			type: 'POST',
			url: 'order_form.php'
		}).done(function(data){
			$(".order_form").remove();
			$(data).insertAfter('.zero');
		});
	}
	if($("#feedback").html() !== undefined)
	{
		$.ajax({
			type: 'POST',
			url: 'feedback_engine.php'
		}).done(function(data){
			$("article").remove();
			$(data).insertAfter('#feedback');
		});
	}
}