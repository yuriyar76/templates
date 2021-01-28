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
	

	$('#city_to').autocomplete({
		source: "/api.php?type=city",
		minLength: 0,
		open: function( event, ui ) {
			$("#inser").empty();
			},
		 focus: function( event, ui ) {
			 $(this).val( ui.item.value);
			 $('#city_id').val(ui.item.id);
			 return false;
			},
		select: function( event, ui ) {
			$(this).val( ui.item.value );
			$('#city_id').val(ui.item.id);
			return false;
		}
	});
	
	$('#number_city').autocomplete({
		source: "/api.php?type=city",
		minLength: 0,
		 focus: function( event, ui ) {
			 $(this).val( ui.item.value);
			 $('#number_city_id').val(ui.item.id);
			 return false;
			},
		select: function( event, ui ) {
			$(this).val( ui.item.value );
			$('#number_city_id').val(ui.item.id);
			return false;
		}
	});

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
		modalWindow.width = 650;
		modalWindow.height = 350;
		modalWindow.content = "<iframe width='650' height='350' frameborder='0' scrolling='auto' allowtransparency='true' src='" + source + "&" + name_input +"=" + vv +"&conv=true'>&lt/iframe>";
		modalWindow.open();
	};

var openMyModal_2 = function(source,id_input,name_input)
	{
		var vv = $('#' + id_input).val();
		modalWindow.windowId = "myModal_2";
		modalWindow.width = 825;
		modalWindow.height = 620;
		modalWindow.content = "<iframe width='825' height='620' frameborder='0' scrolling='no' allowtransparency='true' src='" + source + "&" + name_input +"=" + vv +"'>&lt/iframe>";
		modalWindow.open();
	};
	
$(function() {
	$("#draggable" ).draggable({ cursor: "move" });
});

$(function() {
	 $("#accordion" ).accordion({
		 collapsible: true,
		 heightStyle: "content",
		 active: false
	});
});

function ShowBlock(block_id,link_id) {
	$('.into_block').css('display','none');
	$('.in_to_link').css('border-bottom-style','dashed');
	$('#'+block_id).css('display','block');
	$('#'+link_id).css('border-bottom-style','none');
}



 $(function() {
        $( "input[type=submit], button, [type=reset], a.button_a" )
            .button()
			/*
            .click(function( event ) {
                event.preventDefault();
            });
			*/
    });
 
	
	$(function() {
        $( "#number_date" ).datepicker({ dateFormat: "dd.mm.yy", minDate: 0});
    });
	
	$(function() {
	$( "#tabs" ).tabs();
});

	