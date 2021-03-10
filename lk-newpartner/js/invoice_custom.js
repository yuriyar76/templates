$( document ).ready(function() {
	if($('#print_block').length>0) {
		$("li#service").after('<li id="print"><a href="javascript:void(0);"  id="print_btn" ><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Распечатать</a></li>');
		$('#print_btn').click(function(e) {
			var printContents = $(".bs-docs-section").html();
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents  ;
			window.focus();
			window.print();
			document.body.innerHTML = originalContents;
			window.close();
		});
	}
	
if($('a.print_btn_test').length>0) {	
	$('a.print_btn_test').click(function(e) {

	var getUrl = $(this).attr("rel");
	console.log (getUrl);
	var datares;
	$.ajax
	({
		type: "GET",
		url: getUrl,
		success: function(data)
		{

			    datares = data;
				var tempDiv = $('<div/>').html(datares).contents();

			     var svg  =  '<svg style="width: 200px; height: 35px; transform: translate(0px, 0px);" id="barcode_0" width="404px" height="80px" x="0px" y="0px" viewBox="0 0 404 80" xmlns="http://www.w3.org/2000/svg" version="1.1">\
				<rect x="0" y="0" width="404" height="80" style="fill:#ffffff;"></rect>\
				<g transform="translate(10, 10)" style="fill:#000000;">\
				<rect x="0" y="0" width="2" height="60"></rect>\
				<rect x="8" y="0" width="2" height="60"></rect>\
				<rect x="12" y="0" width="6" height="60"></rect>\
				<rect x="20" y="0" width="6" height="60"></rect>\
				<rect x="28" y="0" width="2" height="60"></rect>\
				<rect x="32" y="0" width="2" height="60"></rect>\
				<rect x="36" y="0" width="6" height="60"></rect>\
				<rect x="48" y="0" width="2" height="60"></rect>\
				<rect x="52" y="0" width="6" height="60"></rect>\
				<rect x="60" y="0" width="2" height="60"></rect>\
				<rect x="64" y="0" width="2" height="60"></rect>\
				<rect x="68" y="0" width="2" height="60"></rect>\
				<rect x="76" y="0" width="6" height="60"></rect>\
				<rect x="84" y="0" width="6" height="60"></rect>\
				<rect x="92" y="0" width="2" height="60"></rect>\
				<rect x="96" y="0" width="2" height="60"></rect>\
				<rect x="104" y="0" width="2" height="60"></rect>\
				<rect x="108" y="0" width="2" height="60"></rect>\
				<rect x="112" y="0" width="6" height="60"></rect>\
				<rect x="120" y="0" width="6" height="60"></rect>\
				<rect x="128" y="0" width="6" height="60"></rect>\
				<rect x="136" y="0" width="2" height="60"></rect>\
				<rect x="144" y="0" width="2" height="60"></rect>\
				<rect x="148" y="0" width="2" height="60"></rect>\
				<rect x="152" y="0" width="6" height="60"></rect>\
				<rect x="160" y="0" width="2" height="60"></rect>\
				<rect x="164" y="0" width="6" height="60"></rect>\
				<rect x="176" y="0" width="6" height="60"></rect>\
				<rect x="184" y="0" width="2" height="60"></rect>\
				<rect x="188" y="0" width="2" height="60"></rect>\
				<rect x="192" y="0" width="6" height="60"></rect>\
				<rect x="200" y="0" width="2" height="60"></rect>\
				<rect x="208" y="0" width="2" height="60"></rect>\
				<rect x="212" y="0" width="6" height="60"></rect>\
				<rect x="220" y="0" width="2" height="60"></rect>\
				<rect x="224" y="0" width="2" height="60"></rect>\
				<rect x="228" y="0" width="2" height="60"></rect>\
				<rect x="236" y="0" width="6" height="60"></rect>\
				<rect x="244" y="0" width="2" height="60"></rect>\
				<rect x="248" y="0" width="6" height="60"></rect>\
				<rect x="256" y="0" width="6" height="60"></rect>\
				<rect x="264" y="0" width="6" height="60"></rect>\
				<rect x="276" y="0" width="2" height="60"></rect>\
				<rect x="280" y="0" width="2" height="60"></rect>\
				<rect x="284" y="0" width="2" height="60"></rect>\
				<rect x="288" y="0" width="6" height="60"></rect>\
				<rect x="296" y="0" width="2" height="60"></rect>\
				<rect x="304" y="0" width="6" height="60"></rect>\
				<rect x="312" y="0" width="2" height="60"></rect>\
				<rect x="316" y="0" width="2" height="60"></rect>\
				<rect x="320" y="0" width="2" height="60"></rect>\
				<rect x="324" y="0" width="2" height="60"></rect>\
				<rect x="332" y="0" width="6" height="60"></rect>\
				<rect x="340" y="0" width="2" height="60"></rect>\
				<rect x="344" y="0" width="6" height="60"></rect>\
				<rect x="352" y="0" width="2" height="60"></rect>\
				<rect x="360" y="0" width="2" height="60"></rect>\
				<rect x="364" y="0" width="6" height="60"></rect>\
				<rect x="372" y="0" width="6" height="60"></rect>\
				<rect x="380" y="0" width="2" height="60"></rect></g></svg>';
			
				//datares = data;
				//var tempDiv = $('<div/>').html(datares).contents();
				
				//подцепим стили
				var links = document.createElement('link');
				links.rel = 'stylesheet';
				links.type="text/css"; 
				links.href = 'http://client.newpartner.ru/bitrix/components/black_mist/newpartner.invoice.v.2.4/templates/.default/style.css';
				var WinPrint = window.open('', '', 'left=50,top=50,toolbar=0,scrollbars=1,status=0');
				tempDiv.find("svg").html(svg);
				var printContents = tempDiv.find("div#print_block").html();
				WinPrint.document.write(printContents);
				WinPrint.document.head.appendChild(links);
				WinPrint.document.close();
				WinPrint.focus();
				WinPrint.print();
				//WinPrint.close();
				   //prtContent.innerHTML = strOldOne;
				
		},
		error: OnError
	});
	
	function OnError(xhr, errorType, exception) {
		var responseText;
		try {
			responseText = jQuery.parseJSON(xhr.responseText);
			console.log (errorType);  
			console.log (exception); 
			console.log (responseText.ExceptionType);
			console.log (responseText.StackTrace);
			console.log (responseText.Message);
		} catch (e) {
			responseText = xhr.responseText;
			console.log (responseText);
		}
	}

		//var s = JsBarcode("#barcode_0", "1234567890", {
		//format: "CODE39",
		//width: 2,
		//height: 60,
		//displayValue: false
		//});
		// вернули значение.
		//console.log(s._renderProperties[0].element.innerHTML);
		//$("div.a10").html(s._renderProperties[0].element.innerHTML);

	});
	} else {
		console.log ("none");
	}


	$(function () {
		$(window).resize(function () {
			$('#tableId').bootstrapTable('resetView');
		});
		$('#tableId').on('click', function(e){

			let el = e.target;
			let id = el.id;
			let s = id.match(/^update_\d+/i);
			if(null !== s){
				$('#update_alert').modal('show');
				var uid = $('#'+id).attr('data-uid');
				var ukid = $('#'+id).attr('data-uk');
				var inn_agent = $('#'+id).attr('data-inn');
				var data = {
					'id': id, 'uid': uid, 'uk': ukid, 'inn_agent': inn_agent,
				};
			}else{
				return;
			}

			$.ajax({
				type: "POST",
				dataType: "json",
				url: "/inapps/inapps_update.php",
				data: data,
				success: function(data){
					var tableStart = '';
					var id = data.ID;
					if(data.PROPERTY_1059){

						var dataJson = JSON.parse(data.PROPERTY_1059);

						$.each(dataJson, function (index, value) {
							let ms = Date.parse(value.Date);
							let myDate = moment(ms).format("DD-MM-YYYY HH:mm");
							// console.log(myDate);
							tableStart += `<tr>
                                        <td width="30%">${myDate}</td>
                                        <td width="35%">${value.Event}</td>
                                        <td width="35%">${value.Info}</td>
                                         </tr>`;
						});

					}else{

						tableStart = `<tr>
                                        <td width="30%">${data.PROPERTY_1061}</td>
                                        <td width="35%">${data.PROPERTY_1062}</td>
                                        <td width="35%">${data.PROPERTY_1062}</td>
                                         </tr>`;

					}
					$(`#PROPERTY_1059_MOD_${id}`).html(tableStart);
					$(`#${id} #status_${id}`).text(data.PROPERTY_1062);

					$(`#NAME_${id}`).text(data.NAME);
					$(`#PROPERTY_1023_${id}`).text(data.PROPERTY_1023);
					$(`#PROPERTY_1061_${id}`).text(data.PROPERTY_1061);
					$(`#PROPERTY_1053_${id}`).text(data.PROPERTY_1053);
					$(`#PROPERTY_1025_${id}`).text(data.PROPERTY_1025);
					$(`#PROPERTY_1026_${id}`).text(data.PROPERTY_1026);
					$(`#PROPERTY_1027_${id}`).text(data.PROPERTY_1027);
					$(`#PROPERTY_1028_${id}`).text(data.PROPERTY_1028);
					$(`#PROPERTY_1032_${id}`).text(data.PROPERTY_1032);
					$(`#PROPERTY_1033_${id}`).text(data.PROPERTY_1033);
					$(`#PROPERTY_1036_${id}`).text(data.PROPERTY_1036);
					$(`#PROPERTY_1037_${id}`).text(data.PROPERTY_1037);
					$(`#PROPERTY_1038_${id}`).text(data.PROPERTY_1038);
					$(`#PROPERTY_1039_${id}`).text(data.PROPERTY_1039);
					$(`#PROPERTY_1043_${id}`).text(data.PROPERTY_1043);
					$(`#PROPERTY_1060_${id}`).text(data.PROPERTY_1060);

					$(`#NAME_MOD_${id}`).html(`<h3>${data.NAME}</h3>`);

					$(`#PROPERTY_1023_MOD_${id}`).html(`<h3>${data.PROPERTY_1023}</h3>`);
					$(`#PROPERTY_1026_MOD_${id}`).html(`<strong>${data.PROPERTY_1026}</strong>`);
					$(`#PROPERTY_1027_MOD_${id}`).html(`<strong>${data.PROPERTY_1027}</strong>`);
					$(`#PROPERTY_1028_MOD_${id}`).html(`<strong>${data.PROPERTY_1028}</strong>`);
					$(`#PROPERTY_1029_MOD_${id}`).html(`<strong>${data.PROPERTY_1029}</strong>`);
					$(`#PROPERTY_1032_MOD_${id}`).html(`<strong>${data.PROPERTY_1032}</strong>`);
					$(`#PROPERTY_1033_MOD_${id}`).html(`<strong>${data.PROPERTY_1033}</strong>`);
					$(`#PROPERTY_1035_MOD_${id}`).html(`<strong>${data.PROPERTY_1035}</strong>`);
					$(`#PROPERTY_1038_MOD_${id}`).html(`<strong>${data.PROPERTY_1038}</strong>`);
					$(`#PROPERTY_1037_MOD_${id}`).html(`<strong>${data.PROPERTY_1037}</strong>`);
					$(`#PROPERTY_1039_MOD_${id}`).html(`<strong>${data.PROPERTY_1039}</strong>`);
					$(`#PROPERTY_1043_MOD_${id}`).html(`<strong>${data.PROPERTY_1043}</strong>`);
					$(`#PROPERTY_1040_MOD_${id}`).html(`<strong>${data.PROPERTY_1040}</strong>`);
					$(`#PROPERTY_1060_MOD_${id}`).html(`<strong>${data.PROPERTY_1060}</strong>`);
					$(`#PROPERTY_1045_MOD_${id}`).html(`<strong>${data.PROPERTY_1045}</strong>`);
					$(`#PROPERTY_1068_MOD_${id}`).html(`<strong>${data.PROPERTY_1068}</strong>`);
					$(`#PROPERTY_1069_MOD_${id}`).html(`<strong>${data.PROPERTY_1069}</strong>`);
					$(`#PROPERTY_1070_MOD_${id}`).html(`<strong>${data.PROPERTY_1070}</strong>`);
					$(`#PROPERTY_1053_MOD_${id}`).html(`<strong>${data.PROPERTY_1053}</strong>`);
					$(`#PROPERTY_1047_MOD_${id}`).html(`<strong>${data.PROPERTY_1047}</strong>`);
					$(`#PROPERTY_1071_MOD_${id}`).html(`<strong>${data.PROPERTY_1071}</strong>`);
					$(`#PROPERTY_1065_MOD_${id}`).html(`<strong>${data.PROPERTY_1065}</strong>`);
					$(`#PROPERTY_1066_MOD_${id}`).html(`<strong>${data.PROPERTY_1066}</strong>`);
					$(`#PROPERTY_1050_MOD_${id}`).html(`<strong>${data.PROPERTY_1050}</strong>`);
					$(`#PROPERTY_1067_MOD_${id}`).html(`<h4>Спец. инструкции</h4><strong>${data.PROPERTY_1067}</strong>`);
					$('#update_alert').modal('hide');
					//console.log(data);
				}
			});

		});
	});

	
});


