$(document).ready(function() {
    /* оплата картой по номеру накладной с главной */

    $('#pay_card_submit').on('click', function(){
        let inputPayCard = $('#input_pay_card').val();
        let inputPayCardZ = $('#input_pay_card_z').val();
        if(!(inputPayCard.length || inputPayCardZ.length) ) return;
        let data = {'number': inputPayCard, 'number_z': inputPayCardZ };
        // console.log(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/payment_invoice_card/index.php",
            data: data,
            success: function(data){
                console.log(data);
                if (data.error){
                    alert(data.error);
                    return false;
                }
                if(data.Sum && data.Org){
                   $.cookie("pay_invoice", "Y");
                    window.open(`https://newpartner.ru/payment_invoice/?org_inv=${data.Org}`, '_blank');
                   return false;
                }

            }
        });


    });
    $("#btn_modal_cost").on('click', function(){
        $('.alert.alert-danger.display-error').css('display', 'none');
        $('#price_calc_p').css('display', 'block');
        let cost_from = $("#cost_from span").text();
        let cost_to = $("#cost_to span").text();
        let cost_tarif =  $("#cost_tarif span").text();
        let cost_weight = $("#cost_weight span").text();
        $('#city_to5').attr({value:cost_from, disabled: true});
        $('#city_to_hidden5').attr('value',cost_from);
        $('#city_from5').attr({value:cost_to, disabled: true});
        $('#city_from_hidden5').attr('value',cost_to);
        $('#form_text_weight').attr({value:cost_weight, disabled: true});
        $('#form_text_weight_hidden').attr('value',cost_weight);
        $('#price_calc').attr('value',cost_tarif);
        $('#price_calc_p span').text(cost_tarif);
        $('#modal_calculate_cost_new').modal('hide');
        $('#modal_order_service_pay').modal('show');

    });
    /* выбор select option в форме заявки когда пункт в ед. экз. */
    function getElId (e) {
        e.preventDefault();
        let idel = $(this).val();
        let url = "/tools/change_user_fl.php";
        let data = {
            getid: idel
        };
        $.get(
            url,
            data,
            function (data) {
                let res =  JSON.parse(data);
                if(res.TYPE_ID == '415'){
                    $("#modal_order_service_form_pay input[name=form_text_62]").val(res.NAME);
                    $("#modal_order_service_form_pay input[name=form_text_62_hidden]").val(res.NAME);
                    $("#modal_order_service_form_pay textarea[name=form_textarea_103]").val(res.ADRESS);
                    $("#modal_order_service_form_pay input[name=form_text_149]").val(res.PHONE);
                    $("#modal_order_service_form_pay input[name=form_text_149_hidden]").val(res.PHONE);

                }
                if(res.TYPE_ID == '414'){
                    $("#modal_order_service_form_pay input[name=form_text_50]").val(res.NAME);
                    $("#modal_order_service_form_pay input[name=form_text_50_hidden]").val(res.NAME);
                    $("#modal_order_service_form_pay textarea[name=form_textarea_56]").val(res.ADRESS);
                    $("#modal_order_service_form_pay input[name=form_text_51]").val(res.PHONE);
                    $("#modal_order_service_form_pay input[name=form_text_51_hidden]").val(res.PHONE);

                }
                //console.log(res);
            });
    }

    // переключение получателя-отправителя в форме заказа из калькулятора

    $('#pay_form_radio_SIMPLE_QUESTION_971').on('change', function () {
        let optSel = $("option:selected", this);
        let valSel = this.value;

        let fname102 = $('#modal_order_service_form_pay input[name=form_text_62]').val();
        let fphone102 = $('#modal_order_service_form_pay input[name=form_text_149]').val();
        let faddress102 = $('#modal_order_service_form_pay textarea[name=form_textarea_103]').val();
        let fname121 = $('#modal_order_service_form_pay input[name=form_text_50]').val();
        let fphone121 = $('#modal_order_service_form_pay input[name=form_text_51]').val();
        let faddress121 = $('#modal_order_service_form_pay textarea[name=form_textarea_56]').val();
        if (valSel == 102){

            $('#modal_order_service_form_pay input[name=form_text_50]').val(fname102);
            $('#modal_order_service_form_pay input[name=form_text_51]').val(fphone102);
            $('#modal_order_service_form_pay textarea[name=form_textarea_56]').val(faddress102);
            $('#modal_order_service_form_pay input[name=form_text_62]').val(fname121);
            $('#modal_order_service_form_pay input[name=form_text_149]').val(fphone121);
            $('#modal_order_service_form_pay textarea[name=form_textarea_103]').val(faddress121);
        }
        if (valSel == 121){

            $('#modal_order_service_form_pay input[name=form_text_62]').val(fname121);
            $('#modal_order_service_form_pay input[name=form_text_149]').val(fphone121);
            $('#modal_order_service_form_pay textarea[name=form_textarea_103]').val(faddress121);
            $('#modal_order_service_form_pay input[name=form_text_50]').val(fname102);
            $('#modal_order_service_form_pay input[name=form_text_51]').val(fphone102);
            $('#modal_order_service_form_pay textarea[name=form_textarea_56]').val(faddress102);
        }

    });

    /* проверка email в форме калькулятор */
    function valid_email_user_authorize(){
        let data = $(this).serializeArray();
        //console.log(data);
        $.ajaxSetup({cache: false});
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/tools/change_user_fl.php?usr=Y",
            data: data,
            success: function(data){
                if (data.mail == 1){
                    let cssinput = `border-color: #f70b0b;`;
                    $('#form_email_52').attr('style', cssinput);
                    $('#form_email_52_order').attr('style', cssinput);
                }else{
                    let cssinput = `border-color: none;`;
                    $('#form_email_52').attr('style', cssinput);
                    $('#form_email_52_order').attr('style', cssinput);
                }
                // если введен email существующего usera
                if (data.reqst == 1){
                    console.log(data);
                    $('#order_service_pay_user_new').attr('value',"");
                    $('#order_service_pay_user_new_order').attr('value',"");
                    $('#user_mess .modal-title').html(
                        `<h4>Здравствуйте, ${data.name}!</h4>`
                    );
                    $('#user_mess .modal-body').html(
                        `<div>
                   <p style="font-weight:bold; font-size:16px">На нашем сайте у Вас зарегистрирован 
                   <a href='http://client.newpartner.ru'>Личный кабинет</a>.<br>
                    Плюсом оформления заявок через Личный кабинет является то, что Вы сможете быстрее 
                    оформлять заявки,  отслеживать Ваши отправления, создавать адресную книгу, видеть историю заказов,
                     получать индивидуальные предложения и многое другое...</p>
                    <p  style="font-size:14px">Личный кабинет был создан автоматически при оформлении
                     Вами первой заявки на сайте <span style="font-weight:bold;">${data.data_reg}</span>. 
                    Логин (${data.login}) и временный пароль были высланы Вам на почту  <span style="font-weight:bold;">
                    ${data.login}</span>. </p>
                    <p style="font-weight:bold; font-size:14px">Если Вам необходимо еще раз получить данные 
                    Вашей учетной записи, мы вышлем Вам их 
                    повторно. Старый пароль будет сброшен!  <button onclick="setUsrPass('${data.login}'); return false;" type="button" 
                    class="btn btn-primary">Выслать доступ</button></p>
                    <div class="alertmess"></div>
                    <i style='color:red; font-weight:bold; font-size:16px'>Напоминаем, что оформляя заявку как 
                    неавторизованный пользователь, Вы не сможете 
                    воспользоваться преимуществами Личного кабинета.</i>
                </div>`
                    );
                    $('#user_mess').modal('show');
                }else{  // если введен email несуществующего usera ставим метку перехода в ЛК по кнопке Заказать
                    $('#order_service_pay_user_new').attr('value',"Y");
                    $('#order_service_pay_user_new_order').attr('value',"Y");
                }
            }
        });

    }
    $('#form_email_52').on('change', valid_email_user_authorize);
    $('#form_email_52_order').on('change', valid_email_user_authorize);


    /* проверка email в форме калькулятор end */

    $('#recipient_name_select').on('click', getElId);

    $('#sender_name_select').on('click', getElId );

    /* обработка формы калькулятора */
    $("#calc_form").submit(function( event ) {
        event.preventDefault();
        let fields = $(this).serializeArray();
        let msgerr = '';
        $('#modal_calculate_cost_new .modal-body .list-group').remove();
        $('#modal_calculate_cost_new .modal-content .display-error .messerr').remove();
        $.ajaxSetup({cache: false});
        let path = document.location.pathname;
        if (path === '/customers-lk/'){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/tools/change_user_fl.php?invoice=Y",
                data: fields,
                success: function(data){
                    console.log(data);
                    let recipients = data.recipients;
                    let senders = data.senders;
                    let select_sender = $('#sender_name_select');
                    let wrap_sender =  $("#sender_name_select_wrap");
                    let select_rec = $('#recipient_name_select');
                    let wrap_rec =  $("#recipient_name_select_wrap");

                    let nameDefaultRec = $('#modal_order_service_form_pay input[name=form_text_62]');
                    let nameDefaultRecHidden = $('#modal_order_service_form_pay input[name=form_text_62_hidden]');
                    let phoneDefaultRecHidden = $('#modal_order_service_form_pay input[name=form_text_149_hidden]');
                    let phoneDefaultRec = $('#modal_order_service_form_pay input[name=form_text_149]');
                    let adrDefaultRec = $('#modal_order_service_form_pay textarea[name=form_textarea_103]');
                    nameDefaultRec.val('');
                    phoneDefaultRec.val('');
                    adrDefaultRec.val('');
                    wrap_sender.attr('style', 'display:none');
                    wrap_rec.attr('style', 'display:none');
                    if(data.senders){
                        let col = 0;
                        let id, name;
                        select_sender.find('option').remove();
                        $.each(senders,function (index, value) {
                            id = value.ID;
                            name = value.NAME;
                            select_sender.append(`<option value="${id}">${name}</option>`);
                            col++;
                        });
                    }

                         if(data.recipients){
                        wrap_rec.attr('style', 'display:block');
                        select_rec.find('option').remove();
                        let col = 0;
                        let id, name;
                        $.each(recipients,function (index, value) {
                            id = value.ID;
                            name = value.NAME;
                            select_rec.append(`<option value="${id}">${name}</option>`);
                            col++;
                        });

                    }

                    let default_recipient = data.default_recipient;
                    if(data.default_recipient){
                        nameDefaultRec.val(default_recipient.NAME);
                        phoneDefaultRec.val(default_recipient.PHONE);
                        nameDefaultRecHidden.val(default_recipient.NAME);
                        phoneDefaultRecHidden.val(default_recipient.PHONE);
                        adrDefaultRec.val(default_recipient.ADRESS);
                        $.cookie("dr_name", default_recipient.NAME, {expires: 30,  path: '/' });
                        $.cookie("dr_phone", default_recipient.PHONE, { expires: 30, path: '/' });
                        $.cookie("dr_adr", default_recipient.ADRESS, { expires: 30, path: '/' });
                    }else{
                        $.cookie("dr_name", '');
                        $.cookie("dr_phone", '');
                        $.cookie("dr_adr", '');
                    }

                    let default_sender = data.default_sender;
                    if(data.default_sender){
                        $.cookie("ds_name", default_sender.NAME, {expires: 30,  path: '/' });
                        $.cookie("ds_phone", default_sender.PHONE, { expires: 30, path: '/' });
                        $.cookie("ds_adr", default_sender.ADRESS, { expires: 30, path: '/' });
                    }else{
                        $.cookie("ds_name", '');
                        $.cookie("ds_phone", '');
                        $.cookie("ds_adr", '');
                    }

                 //console.log(data);
                }
            });

        }

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/tools/calc.php?mode=index",
            data: fields,
            success: function(data){
                $.each(data , function (index, value){
                    if(value.ERROR){
                        $.each(value.ERROR , function (index, value){
                            msgerr+= '<span>'+value+'</span></br>';
                            let mserr = `<div class="messerr">${msgerr}</div>`;
                            console.log(mserr);
                            $('#modal_calculate_cost_new .modal-content .display-error').attr('style', 'display:block; margin-bottom:0; margin-top:25px;').append(mserr);
                            $('#modal_calculate_cost_new #payment_module').attr('style', 'display:none;');
                        });
                }else{
                        console.log(value);
                        $('#modal_calculate_cost_new .modal-content .display-error').attr('style', 'display:none');
                        $('#modal_calculate_cost_new #payment_module').attr('style', 'display:block;');
                        let messogr = `<div class="list-group-item list-group-item-action list-group-item-danger">
                             ВНИМАНИЕ! СРОКИ ДОСТАВКИ В СВЯЗИ С ЭПИДЕМИЕЙ КОРОНОВИРУСА МОГУТ БЫТЬ УВЕЛИЧЕНЫ!</div>`;
                            if (value.ID_SENDER == '8054' && value.ID_RECIPIENT == '8054'){
                                $('#modal_calculate_cost_new #payment_module').attr('style', 'display:none;');
                                let messmsk = `
                           <div class="list-group">
                 ${messogr}          
                <div class="list-group-item list-group-item-action list-group-item-info"><span style="font-size: 20px">Доставка внутри МКАД</span>, <span style="font-size: 18px; color:#000;">"тариф Стандарт"</span> </div>
                <div class="list-group-item list-group-item-action list-group-item-info">Время доставки:   <span style="font-size: 16px;">${value.TIMEDEV.STANDART}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-info">Полный вес:   <span style="font-size: 16px;">${value.FULLWEIGTH}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-info">Итого тариф:   <span style="font-size: 16px;">${value.TARIF_ITOG_MSK.STANDART} руб.</span></div></div>
                <div class="list-group">
                <div class="list-group-item list-group-item-action list-group-item-success"><span style="font-size: 20px">Доставка внутри МКАД</span>, <span style="font-size: 18px; color:#000;">"тариф Экспресс 8"</span> </div>
                <div class="list-group-item list-group-item-action list-group-item-success">Вызов курьера:   <span style="font-size: 16px;">${value.CALLCOURIER.EXPRESS_8}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-success">Время доставки:   <span style="font-size: 16px;">${value.TIMEDEV.EXPRESS_8}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-success">Полный вес:   <span style="font-size: 16px;">${value.FULLWEIGTH}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-success">Итого тариф:   <span style="font-size: 16px;">${value.TARIF_ITOG_MSK.EXPRESS_8} руб.</span></div></div>
                <div class="list-group">
                <div class="list-group-item list-group-item-action list-group-item-warning"><span style="font-size: 20px">Доставка внутри МКАД</span>, <span style="font-size: 18px; color:#000;">"тариф Экспресс 4"</span> </div>
                <div class="list-group-item list-group-item-action list-group-item-warning">Вызов курьера:   <span style="font-size: 16px;">${value.CALLCOURIER.EXPRESS_4}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-warning">Время доставки:   <span style="font-size: 16px;">${value.TIMEDEV.EXPRESS_4}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-warning">Полный вес:   <span style="font-size: 16px;">${value.FULLWEIGTH}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-warning">Итого тариф:   <span style="font-size: 16px;">${value.TARIF_ITOG_MSK.EXPRESS_4} руб.</span></div></div>
                <div class="list-group">
                <div class="list-group-item list-group-item-action list-group-item-danger"><span style="font-size: 20px">Доставка внутри МКАД</span>, <span style="font-size: 18px; color:#000;">"тариф Экспресс 2"</span> </div>
                <div class="list-group-item list-group-item-action list-group-item-danger">Вызов курьера:   <span style="font-size: 16px;">${value.CALLCOURIER.EXPRESS_2}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-danger">Время доставки:   <span style="font-size: 16px;">${value.TIMEDEV.EXPRESS_2}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-danger">Полный вес:   <span style="font-size: 16px;">${value.FULLWEIGTH}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-danger">Итого тариф:   <span style="font-size: 16px;">${value.TARIF_ITOG_MSK.EXPRESS_2} руб.</span></div></div>                    
                `;
                                $('#modal_calculate_cost_new .modal-body').append(messmsk);
                            }else{
                                let mess = `<div class="list-group">
                ${messogr}  
                <div id="cost_from" class="list-group-item list-group-item-action list-group-item-success">Откуда:   <span style="font-size: 16px;">${value.SENDER.FULLNAME}</span></div>
                <div id="cost_to" class="list-group-item list-group-item-action list-group-item-success">Куда:   <span style="font-size: 16px;">${value.RECIPIENT.FULLNAME}</span></div>
                <div class="list-group-item list-group-item-action list-group-item-success">Доставка дней:   <span style="font-size: 16px;">${value.TIMEDEV}</span></div>
                <div  id="cost_weight" class="list-group-item list-group-item-action list-group-item-success">Полный вес:   <span style="font-size: 16px;">${value.FULLWEIGTH}</span></div>
                <div id="cost_tarif" class="list-group-item list-group-item-action list-group-item-success">Итого тариф:   <span style="font-size: 18px;">${value.TARIF_ITOG} руб.</span></div></div>`;
                                $('#modal_calculate_cost_new .modal-body').append(mess);

                            }
                        }
                    });
                    $('#modal_calculate_cost_new').modal('show');
                }
            });



        });

    /* выход с перезагрузкой из первого модального окна калькулятора */
    $('#modal_calculate_cost_new_close').on('click', function () {
        location.reload();
    });
    $('#modal_order_service_pay_close').on('click', function () {
        location.reload();
    });


    // форма соискателя работы курьером
    $("#courier_mess_submit").on('click', function(){
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
    });

    $("#hr_mess_form").on('submit', function(e){
        e.preventDefault();
        var $that = $(this),
        formData = new FormData($that.get(0));
        $("#mess_err").remove();
        //let req   = $('#hr_mess_form').serialize();
        //console.log(req);
        //$.ajaxSetup({cache: false});
        $.ajax({
            contentType: false,
            processData: false,
            method: 'post',
            dataType: 'json',
            url: "/mess_hr.php?mode=new",
            data: formData,
            success: function(data){
                console.log(data);
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
                    $('#hr_mess_submit').removeAttr('disabled');
                }
                if(msgs){
                    mess = `<div id="mess_err" class="alert alert-success" role="alert">${msgs}</div>`;
                    $('#hr_mess_submit').attr('disabled', 'true');
                }
                $('#hr_mess_form').append(mess);

            }
        });
    });

});
/* функции калькулятора */
function  DeletePlace(id){
    $('#row'+id).remove();
    let t = $('table tbody tr');
    //let lastId = t.eq(-1).attr('id');
    //$('#'+lastId+' .hidden').css('display', 'block');
}
function CopyPlace(id){
    let idn = $('table tbody tr').last().attr('id');
    if(idn.length === 3 ){
        idn = idn[3];
    }else{
        idn = Number(idn.replace(/\D+/g,""))
    }

    let idnew = +idn+1;
    let info =  $('#row'+id+' td input');
    let inp = [];
    for (let i = 0; i < info.length; i++) {
        inp[i] = info[i].value;
    }
    let content = `<tr id="row${idnew}">
                    <td width="100"><input type="number" class="r1" value="${inp[0]}" name="r1[]" min="0"></td>
                    <td width="100"><input type="number" class="r2" value="${inp[1]}" name="r2[]" min="0"></td>
                    <td width="100"><input type="number" class="r3" value="${inp[2]}" name="r3[]" min="0"></td>
                    <td width="100"><input type="text" class="ves" value="${inp[3]}" name="ves[]" ></td>
                    <td  width="100" style="text-align:right;">
                       <div class="wrbt">
                           <div class="place_delete" onClick="return DeletePlace('${idnew}')" title="Удалить место">-</div>
                           <div class="place_add_copy" onClick="return CopyPlace('${idnew}')" title="Добавить копированием"> <i class="fa fa-clone" aria-hidden="true"></i></div>
                       </div>
                    </td>
                    </tr>`;
    $('table tbody').append(content);
    //console.log(inp);
}
function AddNewPlace(id)
{
    let idn = $('table tbody tr').last().attr('id');
    if(idn.length === 3 ){
        idn = idn[3];
    }else{
        idn = Number(idn.replace(/\D+/g,""))
    }
    let idnew = +idn+1;
    if(id=='1'){
        $('.place_add').css('display', 'none');
    }
    $('#row1 .wrbt .place_add').remove();
    $('#row1 .wrbt .place_add_copy').remove();
    let cont = ` <div class="place_add" onClick="return AddNewPlace('${idnew}')" title="Добавить еще место">+</div>
                     <div class="place_add_copy" onClick="return CopyPlace('${idnew}')" title="Добавить копированием"><i class="fa fa-clone" aria-hidden="true"></i></div>`;
    $('#row1 .wrbt').append(cont);
    let content = `<tr id="row${idnew}">
                    <td width="100"><input type="number" class="r1"  name="r1[]" min="0"></td>
                    <td width="100"><input type="number" class="r2"  name="r2[]" min="0"></td>
                    <td width="100"><input type="number" class="r3"  name="r3[]" min="0"></td>
                    <td width="100"><input type="text" class="ves" name="ves[]" value="1.00" ></td>
                    <td  width="100" style="text-align:right;">
                       <div class="wrbt">
                           <div class="place_delete" onClick="return DeletePlace('${idnew}')" title="Удалить место">-</div>
                           <div class="place_add_copy" onClick="return CopyPlace('${idnew}')" title="Добавить копированием"> <i class="fa fa-clone" aria-hidden="true"></i></div>
                       </div>
                    </td>
                    </tr>`;
    $('.hidden'+id).css('display', 'none');
    $('table tbody').append(content);
}
/* выслать логин - пароль зарегистрированоому useru */
function setUsrPass (login){
    console.log(login);
    $.ajaxSetup({cache: false});
    let data = {'login':login};
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/tools/change_user_fl.php?usraccesses=Y",
        data: data,
        success: function(data){
            console.log(data);
            $('#user_mess .modal-body .alertmess').html(
                `<div class="alert alert-success" role="alert">
           Доступы в Личный кабинет высланы на почту ${login}.
         </div>`
            );
        }
    });



}