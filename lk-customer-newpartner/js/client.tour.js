var tour = new Tour({
	steps: [{
		element: "",
		title: "����� ����������  � ������ ������� &laquo;����� �������&raquo;!",
		content: "������ ����������� ��� ������� ��� ������������ � ��������� ��������� ����� �������",
	},{
		element: "#SetHelpIcon",
		title: "����������� ���",
		content: "�� ������ ������ ��������� � ��������� ����, ����� ��  ��������������� ������ � ������ ����",
		placement: "left",
	},{
		title: "���������",
		content: "� ������� &laquo;���������&raquo; ����������� ������ ����� ���������",
		path: "/"
	},{
		element: "#new_btn",
		title: "���������",
		content: "��� ���������� ����� ��������� ������� ��������������� ������",
		path: "/"
	},{
		element: "#company_sender_id",
		title: "���������",
		content: "���� �� ���������� ��������� �������, ������ ����������� ����� ������ ������������� �� ������ ������ ����� ��������",
		path: "/index.php?mode=add"
	},{
		element: "#add-btn-tour",
		title: "���������",
		content: "��� ���������� ����� ��������� ��������� ��� ���� � ������� ������ &laquo;�������&raquo;",
		placement: "top"
	},{
		element: "#add_customer",
		title: "�����������",
		content: "� ����������, ��� �������������, �� ������ �������� ������ ������ ������������ � ��������������� �������",
		path: "/senders/"
	},{
		element: "#add_customer",
		title: "����������",
		content: "������ ����������� ����� ����������� ������������� �� ������ ���������� ���������",
		path: "/recipients/"
	},{
		element: "#callcourier",
		title: "������",
		content: "���� ��� ���������� ������� �������, �� ������ ��������������� ����������� ������ ��������������� ��� ���������� ���������",
		placement: "bottom",
		path: "/index.php?mode=add"
	},{
		element: "#btn-call-tour",
		title: "������",
		content: "� ����� �������� ����� ������ ������� � ������� &laquo;������&raquo;",
		placement: "right",
		path: "/services/"
	},{
		element: "#last-order-tours",
		title: "������",
		content: "��� ����������� ������ ������������ � ������ &laquo;��������� ������&raquo;",
		placement: "left",
	},{
		element: "#btn-order-tour",
		title: "������",
		content: "� ���� �� ������� �� ������ �������� ����������� ��������� ���������",
		placement: "left",
	},{
		element: "#support",
		title: "������������",
		content: "��� ������������� �������� �� ������ ��������� � �������������",
	},{
		element: "#add_new_ticket",
		title: "������������",
		content: "��� ����� �������� ����� ��������� � ������� ������������",
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