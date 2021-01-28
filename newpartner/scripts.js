$(document).ready(function() {
	$('.date_format').mask('99.99.9999');
	$('.maskphone').mask('(999) 999-99-99');
    $('.accordion').accordion2({defaultOpen: 'some_id'});
	$('#slider').easySlider();
	$('.left_menu ul li a').hover(
		function() {
			$(this).animate({paddingRight:'50'},200);
	},
	function() {
			$(this).animate({paddingRight:'10'},200);
	})
});


var openMyModal = function(source,w,h)
	{
		modalWindow.windowId = "myModal";
		modalWindow.width = w;
		modalWindow.height = h;
		modalWindow.content = "<iframe width='" + w + "' height='" + h +"' frameborder='0' scrolling='no' allowtransparency='true' src='" + source + "'>&lt/iframe>";
		modalWindow.open();
	};

var openMyModal_1 = function(source,id_input,name_input)
	{
		var vv = $('#' + id_input).val();
		modalWindow.windowId = "myModal_1";
		modalWindow.width = 600;
		modalWindow.height = 350;
		modalWindow.content = "<iframe width='600' height='350' frameborder='0' scrolling='no' allowtransparency='true' src='" + source + "&" + name_input +"=" + vv +"&conv=true'>&lt/iframe>";
		modalWindow.open();
	};

var openMyModal_2 = function(source,id_input,name_input)
	{
		var vv = $('#' + id_input).val();
		modalWindow.windowId = "myModal_2";
		modalWindow.width = 800;
		modalWindow.height = 695;
		modalWindow.content = "<iframe width='600' height='695' frameborder='0' scrolling='no' allowtransparency='true' src='" + source + "&" + name_input +"=" + vv +"'>&lt/iframe>";
		modalWindow.open();
	};
	
$(function() {
	$("#draggable" ).draggable({ cursor: "move" });
});

$(function() {
	$( "#tabs" ).tabs();
});
	
$(function() {
	 $("#accordion" ).accordion({
		 collapsible: true,
		 heightStyle: "content",
		 active: false
	});
});


/*
 $(function() {
        $( "input[type=submit].ui_btn, button.ui_btn" )
            .button()
            .click(function( event ) {
                event.preventDefault();
            });
    });
*/
 
	
	$(function() {
        $( "#number_date" ).datepicker({ dateFormat: "dd.mm.yy", minDate: 0});
    });