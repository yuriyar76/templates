var tour = new Tour({
	steps: [{
		element: "",
		title: "Добро пожаловать  в личный кабинет &laquo;Новый Партнер&raquo;!",
		content: "Данный виртуальный тур поможет Вам ознакомиться с основными функциями нашей системы",
	},{
		element: "#SetHelpIcon",
		title: "Возобновить тур",
		content: "Вы всегда можете вернуться к просмотру тура, нажав на  соответствующую иконку в панели меню",
		placement: "left",
	},{
		title: "Накладные",
		content: "В разделе &laquo;Накладные&raquo; представлен список ваших накладных",
		path: "/"
	},{
		element: "#new_btn",
		title: "Накладные",
		content: "Для оформления новой накладной нажмите соответствующую кнопку",
		path: "/"
	},{
		element: "#company_sender_id",
		title: "Накладные",
		content: "Если вы оформляете накладную впервые, первый отправитель будет создан автоматически на основе данных вашей компании",
		path: "/index.php?mode=add"
	},{
		element: "#add-btn-tour",
		title: "Накладные",
		content: "Для оформления новой накладной заполните все поля и нажмите кнопку &laquo;Создать&raquo;",
		placement: "top"
	},{
		element: "#add_customer",
		title: "Отправители",
		content: "В дальнейшем, при необходимости, вы можете добавить другие записи отправителей в соответствующем разделе",
		path: "/senders/"
	},{
		element: "#add_customer",
		title: "Получатели",
		content: "Записи получателей будут создаваться автоматически на основе заведенных накладных",
		path: "/recipients/"
	},{
		element: "#callcourier",
		title: "Услуги",
		content: "Если вам необходимо вызвать курьера, вы можете воспользоваться специальной формой непосредственно при оформлении накладной",
		placement: "bottom",
		path: "/index.php?mode=add"
	},{
		element: "#btn-call-tour",
		title: "Услуги",
		content: "А также заполнив форму вызова курьера в разделе &laquo;Услуги&raquo;",
		placement: "right",
		path: "/services/"
	},{
		element: "#last-order-tours",
		title: "Услуги",
		content: "Все оформленные заявки представлены в списке &laquo;Последние заявки&raquo;",
		placement: "left",
	},{
		element: "#btn-order-tour",
		title: "Услуги",
		content: "В этом же разделе вы можете заказать недостающие расходные материалы",
		placement: "left",
	},{
		element: "#support",
		title: "Техподдержка",
		content: "При возникновении вопросов вы можете связаться с техподдержкой",
	},{
		element: "#add_new_ticket",
		title: "Техподдержка",
		content: "Для этого создайте новое сообщение в разделе Техподдержка",
		path: "/support/",
	}],
	orphan: true,
	template: "<div class='popover tour'>"+
		"<div class='arrow'></div>"+
		"<h3 class='popover-title'></h3>"+
		"<div class='popover-content'></div>"+
		"<div class='popover-navigation'>"+
		"<div class='btn-group' role='group' aria-label='...'>"+
		"<button class='btn btn-default' data-role='prev'><span class='glyphicon glyphicon-backward' aria-hidden='true'></span></button>"+
		"<button class='btn btn-default' data-role='next'><span class='glyphicon glyphicon-forward' aria-hidden='true'></span></button>"+
		"</div>"+
		"<button class='btn btn-default' data-role='end'><span class='glyphicon glyphicon-stop' aria-hidden='true'></span></button>"+
		"</div>"+
		"</div>"
});

function StartTour()
{
	tour.init();
	tour.restart();
};

$(function () {
	tour.init();
	tour.start();
	//tour.restart();
});