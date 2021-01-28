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
		element: "#well",
		title: "����� �������",
		content: "��� ������ ��� ���������� ������� ��� ������, ����� ���� �� ������� ����������� ��� �� �������.",
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