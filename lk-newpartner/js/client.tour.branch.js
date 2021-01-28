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
		element: "#well",
		title: "Выбор филиала",
		content: "Для начала вам необходимо выбрать ваш филиал, после чего вы сможете возобновить тур по системе.",
		path: "/choice-branch/",
		placement: "left"
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