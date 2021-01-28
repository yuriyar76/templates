 $(function () {
    'use strict';
    var url = '/uploading/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
			var filecount = parseInt($('#filecount').val());
			var filesize = parseInt($('#filesize').val());
			var filelist = $('#filelist').val();
            $.each(data.result.files, function (index, file) {
                $('<div class="filename"/>').text(file.name).appendTo('#files');
				++filecount;
				filesize = filesize + file.size;
				if (filelist.length > 0)
				{
					filelist = filelist + ',';
				}
				filelist = filelist + file.name;
            });
			$('#filecount').val(filecount);
			$('#filesize').val(filesize);
			$('#filelist').val(filelist);
			var f_text = decOfNum(filecount, ['файл', 'файла', 'файлов']);
			$('p#files-upload-info').html('Прикреплено: '+filecount+' '+f_text+', '+formatBytes(filesize,2));	
			if (filecount > 0)
			{
				$('.btn.btn-plus.fileinput-button').css('display','none');
			}
			console.log('filesize: ' + formatBytes(filesize,2) + ', filecount: '+filecount);
			console.log('filelist: '+filelist);
        },
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

function decOfNum(number, titles)  
{  
    cases = [2, 0, 1, 1, 1, 2];  
    return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];  
}

function formatBytes(bytes,decimals) {
   if(bytes == 0) return '0 Byte';
   var k = 1000;
   var dm = decimals + 1 || 3;
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
   var i = Math.floor(Math.log(bytes) / Math.log(k));
   return (bytes / Math.pow(k, i)).toPrecision(dm) + ' ' + sizes[i];
}

$('#modal_order_service').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var dateval = $('#input_order_service').val();
	var modal = $(this);
	modal.find('.modal-body input[name="form_text_53"]').val(dateval);
	modal.find('.form-body').show();
});

$('#modal_calculate_cost').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var dateval = $('#calculate_city_to').val();
	var modal = $(this);
	modal.find('.modal-body input[name="city_to"]').val(dateval);
	var cityid = parseInt(modal.find('.modal-body input[name="city_autocomplete_id"]').val());
	var weight = parseInt(modal.find('.modal-body input[name="weight"]').val());
	if ((cityid > 0) && (weight > 0))
	{
		$( "#modal_calculate_cost_form" ).submit();
	}
})

$('#modal_delivery_note').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var dateval = $('#input_delivery_note').val();
	var modal = $(this);
	modal.find('.modal-body input[name="delivery_note_number"]').val(dateval);
	var le = $.trim(dateval).length;
	if (le > 0)
	{
		// $( "#modal_delivery_note_form" ).submit();
		$( "#delivery_note" ).click();
	}
})

$('#modal_enter_into_contract').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var dateval = $('#contract-email').val();
	var modal = $(this);
	modal.find('.modal-body input[name="form_email_128"]').val(dateval);
})

$('#modal_order_transport').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var dateval = $('#input_order_transport').val();
	var modal = $(this);
	modal.find('.modal-body input[name="date-transport"]').val(dateval);
})

$(document).ready(function() {
	$('.maskdate').mask('99.99.9999');
	$('.maskphone').mask('8 (999) 999-99-99');
	$('.masktime').mask('99:99');




	$('#city_0').autocomplete({
		source: '/api.php?type=city&form=calc',
		minLength: 0,
		select: function( event, ui ) {
			$(this).val( ui.item.value);
			$('#citycode_0').val( ui.item.id);
			return false;
		}
	});
	$('#city_1').autocomplete({
		source: '/api.php?type=city&form=calc',
		minLength: 0,
		select: function( event, ui ) {
			$(this).val( ui.item.value);
			$('#citycode_1').val( ui.item.id);
			return false;
		}
	});



	$('.city_autocomplete').autocomplete({
		source: "/api.php?type=city",
		minLength: 0,
		 focus: function( event, ui ) {
			 $(this).val( ui.item.value);
			 return false;
			},
		select: function( event, ui ) {
			$(this).val( ui.item.value );
			return false;
		}
	});
	
	$('.city_autocomplete_in').autocomplete({
		source: "/api.php?type=city",
		minLength: 0,
		open: function( event, ui ) {
			$(".info").empty();
			$('#city_autocomplete_id').val(0);
			},
		 focus: function( event, ui ) {
			 $(this).val( ui.item.value);
			 $('#city_autocomplete_id').val(ui.item.id);
			 return false;
			},
		select: function( event, ui ) {
			$(this).val( ui.item.value );
			$('#city_autocomplete_id').val(ui.item.id);
			return false;
		}
	});
	
	$("#filter_city").on("keyup click input", function () {
		console.log(this.value);
		if (this.value.length > 0) {
			$(".search-city").show().filter(function () {	
				return $(this).find('.city_name').text().toLowerCase().indexOf($("#filter_city").val().toLowerCase()) == -1;
			}).hide();
		}
		else {
			$(".search-city").show();
		}
	});
	
	$('#input_delivery_note').keypress(
    	function(e){
        if (e.which == 13) {
            $('#modal_delivery_note').modal('show');
            return false;
        }
    	}
	);
	
	$('#calculate_city_to').keypress(
    	function(e){
        if (e.which == 13) {
            $('#modal_calculate_cost').modal('show');
            return false;
        }
    	}
	);
	
	$('#input_order_service').keypress(
    	function(e){
        if (e.which == 13) {
            $('#modal_order_service').modal('show');
            return false;
        }
    	}
	);
	
	$('#contract-email').keypress(
    	function(e){
        if (e.which == 13) {
            $('#modal_enter_into_contract').modal('show');
            return false;
        }
    	}
	);

	// форма соискателя работы курьером
	/*$("#courier_mess_submit").on('click', function(){

		$("#mess_err").remove();
		let req   = $('#courier_mess_form').serialize();
		//console.log(req);
		//$.ajaxSetup({cache: false});
		$.ajax({
			method: 'post',
			dataType: 'json',
			url: "/mess_courier.php?mode=new",
			data: req,
			success: function(data){
                let msg = "";
                let  msgs = "";
				let mess = "";
				$.each(data , function (index, value){
					console.log(value);
				   if(value.err){
				   	  msg += value.err+'<br>';
				   }else{
					   msgs = value;
				   }

					});
				if(msg){
					 mess = `<div id="mess_err" class="alert alert-danger" role="alert">${msg}</div>`;
					$('#courier_mess_submit').removeAttr('disabled');
				}
				if(msgs){
					 mess = `<div id="mess_err" class="alert alert-success" role="alert">${msgs}</div>`;
                     $('#courier_mess_submit').attr('disabled', 'true');
				}
				$('#courier_mess_form').append(mess);

			}
		});
	});*/

});

// Отследить отправление

$( "#delivery_note" ).click(function( event ) {
	
	// event.preventDefault();
	
	form_name = "#modal_delivery_note_form";
	
	$(form_name + ' .form-group').removeClass('has-error');
	$(form_name + ' .info').html('');
	$(form_name + ' .display-error').html('');
	
		
	var fields = $( form_name ).serializeArray();
	
	jsonObj = [];
	
	checkResult = false;
					
	$.each( fields, function( i, field ) {
		
		ardata = {};
		
		switch(field.name) {

			case 'delivery_note_number': 
				
				ardata['field_name'] =  field.name;
				ardata['value'] = field.value;			
				ardata['check'] = 'noempty';
				ardata['err_msg']    = 'Укажите номер накладной';
				jsonObj.push(ardata);		
				break;
				
		}	

		
			
	});		

	jsonString = JSON.stringify(jsonObj);
	
	var posting =$.ajax({
		url: "/validation_form.php",
		type: "POST",
		data: jsonString,
		contentType: "application/json",
		dataType: "json",
		async: false, 
		success: function(data, textStatus, jqXHR)
		{
				if (data.code == 200){
		
				checkResult = true;
			
				$(form_name + ' .display-error').html('');
				$(form_name + ' .display-error').css("display","none");
		
				} 
				else 
				{
		
					checkResult = false;
			
					$(form_name + ' .display-error').html(data.msg);
					$(form_name + ' .display-error').css("display","block");
		
					$.each( data.err_fld, function(fld_name ) {
		
						$(form_name + ' input[name="'+fld_name+'"]').parent(".form-group").addClass('has-error');
						$(form_name + ' input[name="'+fld_name+'"]').parent(".input-group").parent(".form-group").addClass('has-error');
						$(form_name + ' textarea[name="'+ fld_name +'"]').parent(".form-group").addClass('has-error');
					});
				}
		}
	});
			
	posting.fail( function(xhr, status, error) { alert(xhr.responseText + '|\n' + status + '|\n' +error) } );
			
			
	if (checkResult)
	{
		$('#modal_delivery_note_form .loadergif').css('display','block');
		$('#modal_delivery_note_form #delivery_note_info').html('');
        var numberval = $.trim($('#modal_delivery_note_form input[name="delivery_note_number"]').val());
        $.ajax({
            data: { "f001":numberval, "json":"Y", "pdf":"Y", "tracking":"Y" },
            type: "GET",
            url: "/api.php",
            dataType: 'json'
        }).done(function(data){
            var entertext = '';
            var items = [];
            $.each( data, function( key, val ) {

                if (val.length > 0)
                {
                    entertext = entertext + '<table class="table table-striped table-bordered"><tr><td colspan="3" align="center"><strong> Трек отправления ' + key + '</strong></td></tr>';
                    items.push( '<tr><td colspan="3" align="center"><strong> Трек отправления ' + key + '</strong></td></tr>' );

                    $.each( val, function( key_2, val_2 ) {
                        entertext = entertext + '<tr><td width="33%">' + val_2['DateEvent'] + '</td><td width="33%">'+ val_2['Event']+'</td><td>'+val_2['InfoEvent']+'</td></tr>';
                        items.push( '<tr><td width="33%">' + val_2['DateEvent'] + '</td><td width="33%">'+ val_2['Event']+'</td><td>'+val_2['InfoEvent']+'</td></tr>' );

                    });
                    entertext = entertext + '</table>';
                }
                else
                {
                    entertext = entertext + '<p class="text-center text-danger">Накладная ' + key + ' не найдена</p>';
                }
            });
            $('#modal_delivery_note_form #delivery_note_info').append(entertext);
        }).always( function(){
            $('#modal_delivery_note_form .loadergif').css('display','none');
		});
  	}
	


});

function form_data(form_name, data){
	$(form_name + ' .form-group').removeClass('has-error');
	$(form_name + ' .info').html('');
	$(form_name + ' .display-error').html('');
	$(form_name + ' .checkbox').removeClass('has-error');

	var fields = $( data ).serializeArray();
	let fl = fields[14].value;
	//console.log(fields);

		jsonObj = [];
		checkResult = false;
		$.each( fields, function( i, field ) {
			ardata = {};
			switch(field.name) {

				case 'form_email_52':
					ardata['field_name'] =  field.name;
					ardata['value'] = field.value;
					ardata['check'] = 'email';
					ardata['err_msg']    = 'Неправильный адрес электронной почты';
					jsonObj.push(ardata);
					break;
				case 'form_text_50':
					ardata['field_name'] =  field.name;
					ardata['value'] = field.value;
					ardata['check'] = 'noempty';
					ardata['err_msg']    = 'Укажите контактное лицо';
					jsonObj.push(ardata);
					break;
				case 'form_text_51':
					ardata['field_name'] =  field.name;
					ardata['value'] = field.value;
					ardata['check'] = 'noempty';
					ardata['err_msg']    = 'Укажите номер телефона';
					jsonObj.push(ardata);
					break;
				case 'form_text_55':
					ardata['field_name'] =  field.name;
					ardata['value'] = field.value;
					ardata['check'] = 'city_in_dictionary';
					ardata['err_msg']    = 'Выберите ваш город из справочника';
					jsonObj.push(ardata);
					break;
				case 'form_textarea_56':
					ardata['field_name'] =  field.name;
					ardata['value'] = field.value;
					ardata['check'] = 'noempty';
					ardata['err_msg']    = 'Укажите ваш адрес';
					jsonObj.push(ardata);
					break;
				case 'form_text_53':
					ardata['field_name'] =  field.name;
					ardata['value'] = field.value;
					ardata['check'] = 'date';
					ardata['err_msg']    = 'Неверная дата заказа';
					jsonObj.push(ardata);
					break;
				case 'form_text_57':
					ardata['field_name'] =  field.name;
					ardata['value'] = field.value;
					ardata['check'] = 'city_in_dictionary';
					ardata['err_msg']    = 'Выберите город получателя из справочника';
					jsonObj.push(ardata);
					break;
				case 'form_textarea_103':
					ardata['field_name'] =  field.name;
					ardata['value'] = field.value;
					ardata['check'] = 'noempty';
					ardata['err_msg']    = 'Укажите адрес получателя';
					jsonObj.push(ardata);
					break;
				case 'form_text_62':
					ardata['field_name'] =  field.name;
					ardata['value'] = field.value;
					ardata['check'] = 'noempty';
					ardata['err_msg']    = 'Укажите фамилию получателя';
					jsonObj.push(ardata);
					break;
				case 'form_text_149':
					ardata['field_name'] =  field.name;
					ardata['value'] = field.value;
					ardata['check'] = 'noempty';
					ardata['err_msg']    = 'Укажите телефон получателя';
					jsonObj.push(ardata);
					break;
			}
		});
		jsonString = JSON.stringify(jsonObj);
		var posting =$.ajax({
			url: "/validation_form.php",
			type: "POST",
			data: jsonString,
			contentType: "application/json",
			dataType: "json",
			async: false,
			success: function(data, textStatus, jqXHR)
			{
				if (data.code == 200){

					checkResult = true;

					$(form_name + ' .display-error').html('');
					$(form_name + ' .display-error').css("display","none");
				}
				else
				{
					checkResult = false;

					$(form_name + ' .display-error').html(data.msg);
					$(form_name + ' .display-error').css("display","block");

					$.each( data.err_fld, function(fld_name ) {

						$(form_name + ' input[name="'+fld_name+'"]').parent(".form-group").addClass('has-error');
						$(form_name + ' input[name="'+fld_name+'"]').parent(".input-group").parent(".form-group").addClass('has-error');
						$(form_name + ' textarea[name="'+ fld_name +'"]').parent(".form-group").addClass('has-error');
					});
				}
			}
		});
		posting.fail( function(xhr, status, error) { alert(xhr.responseText + '|\n' + status + '|\n' +error) } );
	if (fl === '61'){
		$.each( fields, function( i, field ) {
			$.cookie("pay_"+field.name, field.value, { expires: 30, path: '/' });
		});
		window.location.href = "/payment/";
		return false;
	}else{
		if ( checkResult && $(form_name + " #confirmation_order_service").prop('checked'))	{
			$.each( fields, function( i, field ) {
				$.cookie("np_"+field.name, field.value, { expires: 30, path: '/' });
			});
			let type_pay = "";
            if(form_name == "#modal_order_service_form_pay"){
            	type_pay = 'cash';
			}

			$.post(`/api.php?ordering=Y&type_pay=${type_pay}`,$.param(fields),
				function(data)
				{
					console.log(data);
					if(data)
					{
						$(form_name + '.display-pay').css({"display":"flex", "flex-direction":"row",
							"justify-content":"center"});

						$(form_name + ' .info').html('<p class="bg-success">Заявка № <b>'+data+'' +
							'</b> успешно отправлена.<br>После ее обработки наши менеджеры свяжутся с вами ' +
							'по указанному Вами номеру телефона для уточнения деталей.</p>');


						/*$('#modal_order_service_form .display-pay').html(`<a type="button" target="_blank" class="btn btn-warning"
                      href="https://3dsec.sberbank.ru/shortlink/RqyHmgKk">Оплатить</a>`);*/
						$(form_name + ' input').val('');
						$(form_name + ' textarea').val('');
						$(form_name + ' #confirmation_order_service').prop("checked", false);
						$(form_name + ' #confirmation_order_service').hide();
						$(form_name + ' .form-body').hide();
					}

					else
					{
						$(form_name + ' .info').html('<p class="bg-warning">Что-то пошло не так...</p>' ) ;
					}
				}
			);
		}
	}



}

 function form_data_fl(form_name, data){
	 $(form_name + ' .form-group').removeClass('has-error');
	 $(form_name + ' .info').html('');
	 $(form_name + ' .display-error').html('');
	 $(form_name + ' .checkbox').removeClass('has-error');

	 var fields = $( data ).serializeArray();
	 let fl = fields[14].value;
	 console.log(fields);
     return false;
	 jsonObj = [];
	 checkResult = false;
	 $.each( fields, function( i, field ) {
		 ardata = {};
		 switch(field.name) {

			 case 'form_email_52':
				 ardata['field_name'] =  field.name;
				 ardata['value'] = field.value;
				 ardata['check'] = 'email';
				 ardata['err_msg']    = 'Неправильный адрес электронной почты';
				 jsonObj.push(ardata);
				 break;
			 case 'form_text_50':
				 ardata['field_name'] =  field.name;
				 ardata['value'] = field.value;
				 ardata['check'] = 'noempty';
				 ardata['err_msg']    = 'Укажите контактное лицо';
				 jsonObj.push(ardata);
				 break;
			 case 'form_text_51':
				 ardata['field_name'] =  field.name;
				 ardata['value'] = field.value;
				 ardata['check'] = 'noempty';
				 ardata['err_msg']    = 'Укажите номер телефона';
				 jsonObj.push(ardata);
				 break;
			 case 'form_text_55':
				 ardata['field_name'] =  field.name;
				 ardata['value'] = field.value;
				 ardata['check'] = 'city_in_dictionary';
				 ardata['err_msg']    = 'Выберите ваш город из справочника';
				 jsonObj.push(ardata);
				 break;
			 case 'form_textarea_56':
				 ardata['field_name'] =  field.name;
				 ardata['value'] = field.value;
				 ardata['check'] = 'noempty';
				 ardata['err_msg']    = 'Укажите ваш адрес';
				 jsonObj.push(ardata);
				 break;
			 case 'form_text_53':
				 ardata['field_name'] =  field.name;
				 ardata['value'] = field.value;
				 ardata['check'] = 'date';
				 ardata['err_msg']    = 'Неверная дата заказа';
				 jsonObj.push(ardata);
				 break;
			 case 'form_text_57':
				 ardata['field_name'] =  field.name;
				 ardata['value'] = field.value;
				 ardata['check'] = 'city_in_dictionary';
				 ardata['err_msg']    = 'Выберите город получателя из справочника';
				 jsonObj.push(ardata);
				 break;
			 case 'form_textarea_103':
				 ardata['field_name'] =  field.name;
				 ardata['value'] = field.value;
				 ardata['check'] = 'noempty';
				 ardata['err_msg']    = 'Укажите адрес получателя';
				 jsonObj.push(ardata);
				 break;
			 case 'form_text_62':
				 ardata['field_name'] =  field.name;
				 ardata['value'] = field.value;
				 ardata['check'] = 'noempty';
				 ardata['err_msg']    = 'Укажите фамилию получателя';
				 jsonObj.push(ardata);
				 break;
			 case 'form_text_149':
				 ardata['field_name'] =  field.name;
				 ardata['value'] = field.value;
				 ardata['check'] = 'noempty';
				 ardata['err_msg']    = 'Укажите телефон получателя';
				 jsonObj.push(ardata);
				 break;
		 }
	 });
	 jsonString = JSON.stringify(jsonObj);
	 var posting =$.ajax({
		 url: "/validation_form.php",
		 type: "POST",
		 data: jsonString,
		 contentType: "application/json",
		 dataType: "json",
		 async: false,
		 success: function(data, textStatus, jqXHR)
		 {
			 if (data.code == 200){

				 checkResult = true;

				 $(form_name + ' .display-error').html('');
				 $(form_name + ' .display-error').css("display","none");
			 }
			 else
			 {
				 checkResult = false;

				 $(form_name + ' .display-error').html(data.msg);
				 $(form_name + ' .display-error').css("display","block");

				 $.each( data.err_fld, function(fld_name ) {

					 $(form_name + ' input[name="'+fld_name+'"]').parent(".form-group").addClass('has-error');
					 $(form_name + ' input[name="'+fld_name+'"]').parent(".input-group").parent(".form-group").addClass('has-error');
					 $(form_name + ' textarea[name="'+ fld_name +'"]').parent(".form-group").addClass('has-error');
				 });
			 }
		 }
	 });
	 posting.fail( function(xhr, status, error) { alert(xhr.responseText + '|\n' + status + '|\n' +error) } );

	 if (fl === '61'){

	 }else{

	 }



 }



// Вызов курьера
 $( "#modal_order_service_form" ).submit(function( event ) {
	 event.preventDefault();
	 let form_name = "#modal_order_service_form";
     let data = this;
     form_data(form_name, data);
 });

 // Вызов курьера из калькулятора
 $( "#modal_order_service_form_pay" ).submit(function( event ) {
	 event.preventDefault();
	 let form_name = "#modal_order_service_form_pay";
	 let data = this;
	 let path = document.location.pathname;
	 if (path === '/customers-lk/'){
		 let fields = $(data).serializeArray();
		 $.ajax({
			 type: "POST",
			 dataType: "json",
			 url: "/tools/change_user_fl.php?sprav=Y",
			 data: fields,
			 success: function(data)
			 {
                console.log(data);
			 }
		 });
		 form_data_fl(form_name, data);
		 return false;
	}
	 form_data(form_name, data);
 });
// Расчет стоимости доставки
 
$("#modal_calculate_cost_form").submit(function( event ) {
	
	event.preventDefault();
	
	let form_name = "#modal_calculate_cost_form";


    $(form_name + ' .form-group').removeClass('has-error');
	$(form_name + ' .info').html('');
	$(form_name + ' .display-error').html('');
	
		
	var fields = $( this ).serializeArray();
	
	jsonObj = [];
	
	checkResult = false;
					
	$.each( fields, function( i, field ) {
		
		ardata = {};
		
		switch(field.name) {

			case 'city_to': 
				
				ardata['field_name'] =  field.name;
				ardata['value'] = field.value;			
				ardata['check'] = 'city_in_dictionary';
				ardata['err_msg']    = 'Выберите город получателя из справочника';
				jsonObj.push(ardata);		
				break;
	
			case 'weight': 
				
				ardata['field_name'] =  field.name;
				ardata['value'] = field.value;
				ardata['check'] = 'positive_number';
				ardata['err_msg']    = 'Неправильный вес';
				jsonObj.push(ardata);
				break;
				
		}	

		
			
	});		

	jsonString = JSON.stringify(jsonObj);
	
	
		var posting =$.ajax({
		url: "/validation_form.php",
		type: "POST",
		data: jsonString,
		contentType: "application/json",
		dataType: "json",
		async: false, 
		success: function(data, textStatus, jqXHR)
		{
				if (data.code == 200){
		
				checkResult = true;
			
				$(form_name + ' .display-error').html('');
				$(form_name + ' .display-error').css("display","none");
		
				} 
				else 
				{
		
					checkResult = false;
			
					$(form_name + ' .display-error').html(data.msg);
					$(form_name + ' .display-error').css("display","block");
		
					$.each( data.err_fld, function(fld_name ) {
		
						$(form_name + ' input[name="'+fld_name+'"]').parent(".form-group").addClass('has-error');
						$(form_name + ' input[name="'+fld_name+'"]').parent(".input-group").parent(".form-group").addClass('has-error');
						$(form_name + ' textarea[name="'+ fld_name +'"]').parent(".form-group").addClass('has-error');
					});
				}
		}
	});
			
	posting.fail( function(xhr, status, error) { alert(xhr.responseText + '|\n' + status + '|\n' +error) } );
			

	if (checkResult)
	{
		var city = $.trim($('#modal_calculate_cost_form  input[name="city_autocomplete_id"]').val());
		// var city = $.trim($('#modal_calculate_cost_form  input[name="city_to"]').val());
		var weight = $.trim($('#modal_calculate_cost_form  input[name="weight"]').val());
		var size_1 = $.trim($('#modal_calculate_cost_form  input[name="size1"]').val());
		var size_2 = $.trim($('#modal_calculate_cost_form  input[name="size2"]').val());
		var size_3 = $.trim($('#modal_calculate_cost_form  input[name="size3"]').val());
		$.ajax({
				type: "GET",
				url: "/api.php",
				data: "action=get_cost&city_id="+city+"&weight="+weight+"&size_1="+size_1+"&size_2="+size_2+"&size_3="+size_3+"&kobw=5000&typedelivery=express",
				success: function(html){
					html = $.parseJSON(html);
					if (html.success == 1)
					{
						var text = '';
						$.each( html.deliveries, function( key, value ) {
							$dop_txt = (value.ob_weight === true) ? 'Объемный вес: <strong>' + value.weight.toFixed(2) +' кг</strong><br>' : '';
							text = text + '<p class="bg-success">Тип доставки: <strong>'+value.TYPE_DELIVERY+'</strong><br>'+
							'Срок доставки, дней: <strong>'+value.DAYS+'</strong><br>'+$dop_txt+
							'Стоимость доставки: <strong>'+value.COST+' рублей</strong>'+'</p>';
						});
						$("#modal_calculate_cost_form .info").html(text);
					}
					else
					{
						$("#modal_calculate_cost_form .info").html(html.errors);
					}
					return false;
				}
			});
	}

});



$( "#modal_mess_form" ).submit(function( event ) {
	$("#modal_mess_form .form-group").removeClass('has-error');
	$("#modal_mess_form .checkbox").removeClass('has-error');
	$('#modal_mess_form .info').html('');
	var fields_to_error = ['form_text_74','form_email_75','form_textarea_76'];
	var fields = $( this ).serializeArray();
	send = true;
	$.each( fields, function( i, field ) {
		var inar = jQuery.inArray( field.name, fields_to_error );
		if (inar === -1) {}
		else 
		{
			var le = $.trim(field.value).length;
			if ($.trim(field.value).length == 0)
			{
				$('#modal_mess_form input[name="'+field.name+'"]').parent(".form-group").addClass('has-error');
				$('#modal_mess_form textarea[name="'+field.name+'"]').parent(".form-group").addClass('has-error');
				send = false;
			}
			else
			{
				if (field.name == 'form_email_75')
				{
					var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					b = regex.test(field.value);
					if (b){}
					else
					{
						$('#modal_mess_form input[name="'+field.name+'"]').parent(".form-group").addClass('has-error');
						send = false;
					}
				}
			}
		}
    });
	
		
	if (!$("#modal_mess_form #confirmation_mess").prop('checked'))
	{
		$('#modal_mess_form #confirmation_mess').parent("label").parent(".checkbox").addClass('has-error');
		send = false;
	}
	if (send)
	{
		$.cookie("np_form_text_50", $('#modal_mess_form input[name="form_text_74"]').val(), { expires: 30, path: '/' });
		$.cookie("np_form_email_52", $('#modal_mess_form input[name="form_email_75"]').val(), { expires: 30, path: '/' });
		$.post("/api.php?ordering=Y",$.param(fields),
			function(data)
			{
			  if(parseInt(data) > 0)

			  {
				  $('#modal_mess_form .info').html('<p class="bg-success">Сообщение № <b>'+data+'</b> успешно отправлено</b>.<br>После его обработки наши менеджеры обязательноы свяжутся с вами.</p>');
				  //$('#modal_mess_form input').val('');
				  $('#modal_mess_form textarea').val('');
				  $('#modal_mess_form #confirmation_mess').prop("checked", false);
				}
				else 
				{
					$('#modal_mess_form .info').html('<p class="bg-warning">Что-то пошло не так...</p>' ) ;

				} 
			}
		);
	}

  event.preventDefault();
});

$("#modal_call_form").submit(function( event ) {
	$("#modal_call_form .form-group").removeClass('has-error');
	$("#modal_call_form .checkbox").removeClass('has-error');
	$('#modal_call_form .info').html('');
	var fields_to_error = ['form_text_63','form_text_64','form_text_65','form_email_66'];
	var fields = $( this ).serializeArray();
	send = true;
	$.each( fields, function( i, field ) {
		var inar = jQuery.inArray( field.name, fields_to_error );
		if (inar === -1) {}
		else 
		{
			var le = $.trim(field.value).length;
			if ($.trim(field.value).length == 0)
			{
				$('#modal_call_form input[name="'+field.name+'"]').parent(".form-group").addClass('has-error');
				send = false;
			}
			else
			{
				if (field.name == 'form_email_66')
				{
					var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					b = regex.test(field.value);
					if (b){}
					else
					{
						$('#modal_call_form input[name="'+field.name+'"]').parent(".form-group").addClass('has-error');
						send = false;
					}
				}
			}
		}
    });
	if (!$("#modal_call_form #confirmation_call").prop('checked'))
	{
		$('#modal_call_form #confirmation_call').parent("label").parent(".checkbox").addClass('has-error');
		send = false;
	}
	if (send)
	{
		$.cookie("np_form_text_55", $('#modal_call_form input[name="form_text_63"]').val(), { expires: 30, path: '/' });
		$.cookie("np_form_text_51", $('#modal_call_form input[name="form_text_64"]').val(), { expires: 30, path: '/' });
		$.cookie("np_form_text_50", $('#modal_call_form input[name="form_text_65"]').val(), { expires: 30, path: '/' });
		$.cookie("np_form_email_52", $('#modal_call_form input[name="form_email_66"]').val(), { expires: 30, path: '/' });
		$.post("/api.php?ordering=Y",$.param(fields),
			function(data)
			{
			  if(parseInt(data) > 0)
			  {
				  $('#modal_call_form .info').html('<p class="bg-success">Заказ обратного звонка № <b>'+data+'</b> успешно оформлен</b>.<br>После его обработки наши менеджеры обязательноы свяжутся с вами.</p>');
				  //$('#modal_call_form input').val('');
				  $('#modal_call_form #confirmation_call').prop("checked", false);
				}
				else 
				{
					$('#modal_call_form .info').html('<p class="bg-warning">Что-то пошло не так...</p>' ) ;
				} 
			}
		);
	}

  event.preventDefault();
});

$("#modal_contract_form").submit(function( event ) {
    event.preventDefault();
	$("#modal_contract_form .form-group").removeClass('has-error');
	$("#modal_contract_form .checkbox").removeClass('has-error');
	$('#modal_contract_form .info').html('');
	var fields_to_error = ['form_email_128','form_radio_TAXATION'];
	var fields = $( this ).serializeArray();
    var obj = {};
    obj["name"] = 'form_radio_TAXATION';
    obj["value"] = $('input[name="form_radio_TAXATION"]:checked').val();
    fields.push(obj);
	send = true;
	$.each( fields, function( i, field ) {
        
		var inar = jQuery.inArray( field.name, fields_to_error );
		if (inar === -1) {}
		else 
		{
			var le = $.trim(field.value).length;
			if ($.trim(field.value).length == 0)
			{
                //
				//$('#modal_contract_form input[name="'+field.name+'"]').parent(".form-group").addClass('has-error');
                $('#modal_contract_form #group_'+field.name).addClass('has-error');
				send = false;
			}
			else
			{
				if (field.name == 'form_email_128')
				{
					var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					b = regex.test(field.value);
					if (b){}
					else
					{
						//$('#modal_contract_form input[name="'+field.name+'"]').parent(".form-group").addClass('has-error');
                        $('#modal_contract_form #group_'+field.name).addClass('has-error');
						send = false;
					}
				}
			}
		}
    });
	
	
	if (!$("#modal_contract_form #confirmation_contract_form").prop('checked'))
	{
		$('#modal_contract_form #confirmation_contract_form').parent("label").parent(".checkbox").addClass('has-error');
		send = false;
	}
	if (send)
	{
		$.post("/api.php?ordering=Y",$.param(fields),
			function(data)
			{
			  if(parseInt(data) > 0)
			  {
				  $('#modal_contract_form .info').html('<p class="bg-success">Заявка на заключение договора № <b>'+data+'</b> успешно отправлена</b>.<br>После её обработки наши менеджеры обязательноы свяжутся с вами.</p>');
				  $('#modal_contract_form input').val('');
                  $('#modal_contract_form input[name="form_radio_TAXATION"]').prop("checked", false);
				  $('#modal_contract_form input#filesize').val(0);
				  $('#modal_contract_form input#filecount').val(0);
				  $('#modal_contract_form #confirmation_contract_form').prop("checked", false);
				  $('#modal_contract_form  #files').html('');
				  $('#modal_contract_form  #files-upload-info').html('');
				  $('#modal_contract_form .btn.btn-plus.fileinput-button').css('display','block');
				}
				else 
				{
					$('#modal_contract_form .info').html('<p class="bg-warning">Что-то пошло не так...</p>' ) ;
				} 
			}
		);
	}

  event.preventDefault();
});


$("#modal_order_transport_form").submit(function( event ) {
  event.preventDefault();
});