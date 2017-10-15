$('document').ready(function(){

// Авторизация в админ-панеле оффлайн
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
			$("#login").html("<p style='margin: 0;'>Добро пожаловать, <b>" +  $("#ulogin").val() + "</b></p><a href='#' onclick='clicker(event);' class='login'>Завершить сеанс</a>");
			updatePanel();
		}
	});
});

});

/*
 * Подгрузка "Макета корабля" в режиме реального времени
 */
function click_sheeps(id){
	$.ajax({
		type: "POST",
		url: "./panel/sheep_info.php",
		data: {id: id}
	}).done(function(data){
		$("#sheep_info").html(data);
		
		// Тут настраиваем фишки Drag'n'Drop
		var id, type, elem;
		
		// Дропаем занятые
		$('.busy').draggable({
			drag: function()
			{
				elem = $(this);
				id = parseInt(elem.html()) - 1;
				uid = parseInt(elem.attr("data-userid"));
				type = elem.parent().parent().parent().children("p").html();
			}
		});
		
		// Возвращаем на исходную позицию
		$('body').droppable({drop: function(){
			elem.attr("style", 'position: relative;');
		}});
		
		// Удаление
		$('.delete').droppable({accept: $('.busy'), drop: function (event, whats){
			// Небольшой AJAX запрос, куда мы кидаем ID текущего места, после чего там делаем unset после
			//console.log(id);
			//console.log(type);
			$.ajax({
				type: "POST",
				url: "./panel/order_drop.php",
				data: {
					id: id,
					type: type
				}
			}).done(function(){
				// Возвращаем на место элемент
				elem.attr("style", '').attr("class", 'free');
			});
		}});
		
		// Перемещение по Zero
		$(".zero .free").droppable({
			accept: $(".zero .busy"),
			drop: function()
			{
				var el2 = $(this);
				// Чистим первую
				$.ajax({
					type: "POST",
					url: "./panel/order_drop.php",
					data: {
						id: id,
						type: type
					}
				}).done(function(){
					// Возвращаем на место элемент
					elem.attr("style", '').attr("class", 'free');
				});
				
				// Добавляем новую
				$.ajax({
					type: "POST",
					url: "./panel/order_add.php",
					data: {
						uid: uid,
						sid: parseInt(el2.html()) - 1,
						type: el2.parent().parent().parent().children("p").html()
					}
				}).done(function(){
					el2.attr("class", 'busy').attr('data-userid', uid).attr("style",'position:relative;');
					el2.draggable({
						drag: function()
						{
							elem = $(this);
							id = parseInt(elem.html()) - 1;
							uid = parseInt(elem.attr("data-userid"));
							type = elem.parent().parent().parent().children("p").html();
						}
					});
				})
				
			}
		})
		
		// Перемещение по Econom
		$(".econom .free").droppable({
			accept: $(":not(.luxe) .busy"),
			drop: function()
			{
				var el2 = $(this);
				// Чистим первую
				$.ajax({
					type: "POST",
					url: "./panel/order_drop.php",
					data: {
						id: id,
						type: type
					}
				}).done(function(){
					// Возвращаем на место элемент
					elem.attr("style", '').attr("class", 'free');
				});
				
				// Добавляем новую
				$.ajax({
					type: "POST",
					url: "./panel/order_add.php",
					data: {
						uid: uid,
						sid: parseInt(el2.html()) - 1,
						type: el2.parent().parent().parent().children("p").html()
					}
				}).done(function(){
					el2.attr("class", 'busy').attr('data-userid', uid).attr("style",'position:relative;');
					el2.draggable({
						drag: function()
						{
							elem = $(this);
							id = parseInt(elem.html()) - 1;
							uid = parseInt(elem.attr("data-userid"));
							type = elem.parent().parent().parent().children("p").html();
						}
					});
				})
				
			}
		})
		
		
		// Перемещение по Luxe
		$(".luxe .free").droppable({
			accept: $(".busy"),
			drop: function()
			{
				var el2 = $(this);
				// Чистим первую
				$.ajax({
					type: "POST",
					url: "./panel/order_drop.php",
					data: {
						id: id,
						type: type
					}
				}).done(function(){
					// Возвращаем на место элемент
					elem.attr("style", '').attr("class", 'free');
				});
				
				// Добавляем новую
				$.ajax({
					type: "POST",
					url: "./panel/order_add.php",
					data: {
						uid: uid,
						sid: parseInt(el2.html()) - 1,
						type: el2.parent().parent().parent().children("p").html()
					}
				}).done(function(){
					el2.attr("class", 'busy').attr('data-userid', uid).attr("style",'position:relative;');
					el2.draggable({
						drag: function()
						{
							elem = $(this);
							id = parseInt(elem.html()) - 1;
							uid = parseInt(elem.attr("data-userid"));
							type = elem.parent().parent().parent().children("p").html();
						}
					});
				})
				
			}
		})
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
		url: './auth.php',
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
			$("#login").html('<input id="ulogin" placeholder="Ваш логин" required="required" />\
			<input id="passwd" type="password" placeholder="Ваш пароль" required="required" />\
			<input  type="submit" value="Войти" />');
			updatePanel();
		}
	});
}

/*
 * Обновление панели администрирования при авторизации/деавторизации
 */
function updatePanel()
{
	$.ajax({
		type: "POST",
		url: "panel.php"
	}).done(function (data){
		$("#panel").html(data);
	});
}


/*
 * Обновление времени отбытия шипа
 */
function savetime(event)
{
	sid = parseInt($("#shipid").html());
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: "./panel/savetime.php",
		data: {
			id: sid,
			time: $("#save_time").val()
		}
	}).done(function (data){
		updatePanel();
		click_sheeps(sid);
	});

	return false;
}

/*
 * Добавить рейс
 */
function addnew(id)
{
	$.ajax({
		type: "POST",
		url: "./panel/addnew.php"
	}).done(function (data){
		updatePanel();
		click_sheeps(data);
	});
}

function deleterace()
{
	sid = parseInt($("#shipid").html());
	$.ajax({
		type: "POST",
		url: "./panel/deleterace.php",
		data: {
			id: sid
		}
	}).done(function (data){
		updatePanel();
	});
}


/*
 * Загрузка списка коментариев
 */
function comlist ()
{
	$.ajax({
		type: "POST",
		url: "./panel/comment_list.php"
	}).done(function(data){
		$("#sheep_info").html(data);
	});
}

function comdrop (comid)
{
	$.ajax({
		type: "POST",
		url: "./panel/comment_drop.php",
		data: {
			id: comid
		}
	}).done(function(){
		$("#com" + comid).remove();
	});
}