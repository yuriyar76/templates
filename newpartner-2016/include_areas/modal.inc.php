<!-- Modal -->
<div class="modal fade color3" id="modal_calculate_cost" tabindex="-1" role="dialog" aria-labelledby="modal_calculate_cost">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
        <form id="modal_calculate_cost_form" action="" method="post">
        	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Рассчитать стоимость доставки из Москвы</h4>
            </div>
            <div class="modal-body">
            	<div class="info"></div>
				<div class="alert alert-danger display-error" style="display: none"></div>
            	<div class="form-group">
                    <label for="" class="control-label">Город назначения:*</label>
                    <input type="text" class="form-control city_autocomplete_in" value="" name="city_to">
                    <input id="city_autocomplete_id" value="0" type="hidden" name="city_autocomplete_id">
            	</div>
            	<div class="form-group">
                    <label for="" class="control-label">Вес:*</label>
                    <div class="input-group">
                        <input type="text" class="form-control"  placeholder="" name="weight" value="1">
                        <div class="input-group-addon">кг</div>
                    </div>
            	</div>
                <div class="form-group">
                	<label for="" class="control-label">Габариты:</label>
                    <div class="row">
                    	<div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control"  placeholder="" name="size1">
                                <div class="input-group-addon">см</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control"  placeholder="" name="size2">
                                <div class="input-group-addon">см</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control"  placeholder="" name="size3">
                                <div class="input-group-addon">см</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-info">
                        В случае превышения объемного веса над фактическим стоимость рассчитывается по объемному весу (1м<sup>3</sup>=200кг)
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn">Рассчитать стоимость</button>

            </div>
            </form>
        </div>
    </div>
</div>
<script>
	function changeLabels()
	{
		var ch = parseInt($('#form_radio_SIMPLE_QUESTION_971 option:selected').val(), 10);
		$("#form_dropdown_PAYER").children().removeAttr("selected");
		if (ch == 102)
		{
			$('#chLabel1').html('Город получателя');
			$('#chLabel2').html('ФИО получателя');
			$('#chLabel3').html('Адрес получателя');
			$('#chLabel4').html('Номер телефона получателя');
			$('#form_dropdown_PAYER').val(139);
		}
		if (ch == 121)
		{
			$('#chLabel1').html('Город отправителя');
			$('#chLabel2').html('ФИО отправителя');
			$('#chLabel3').html('Адрес отправителя');
			$('#chLabel4').html('Номер телефона отправителя');
			$('#form_dropdown_PAYER').val(140);
		}
	}
</script>

<?php
// модальное окно заказа из калькулятора
?>
<div class="modal fade color2" id="modal_order_service_pay" tabindex="-1" role="dialog" aria-labelledby="modal_order_service_pay">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <form id="modal_order_service_form_pay" action="" method="post">
                <input id="order_service_pay_user_new" name="order_service_pay_user_new" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Заказать услугу</h4>
                    <p id="price_calc_p">Сумма к оплате - <span></span></p>
                    <input id="price_calc" type="hidden" class="form-control" name="price_calc">
                </div>
                <div class="modal-body">
                    <div class="info"></div>
                    <div class="alert alert-danger display-error" style="display: none"></div>
                    <div class="form-body">
                        <div class="row" style="height: 500px; overflow: auto">
                            <div class="col-xs-6">
                                <h5>Информация о заказе</h5>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Вы будете</label>
                                    <select class="form-control" name="form_radio_SIMPLE_QUESTION_971"
                                            id="pay_form_radio_SIMPLE_QUESTION_971">
                                        <option value="102" selected>Отправителем</option>
                                        <option value="121">Получателем</option>
                                    </select>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="form_email_52" class="control-label">Ваш E-mail<span
                                                class="form-required">*</span></label>
                                    <input id="form_email_52" type="text" class="form-control" name="form_email_52" required
                                           value="<?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_email_52"]);?>">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">ФИО отправителя<span
                                                class="form-required">*</span></label>
                                    <input type="text" class="form-control" name="form_text_50" required
                                           value="<?=iconv('utf-8','windows-1251',
                                               $_COOKIE["inv_form_text_50"]);?>">
                                </div>

                                <?
                                    $radio_102 = " selected";
                                    $radio_121 = "";

                                ?>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Номер телефона отправителя<span
                                                class="form-required">*</span></label>
                                    <input type="text" class="form-control" name="form_text_51" required
                                           value="<?=iconv('utf-8','windows-1251',
                                               $_COOKIE["inv_form_text_51"]);?>">
                                </div>

                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Город отправителя<span class="form-required">*</span></label>
                                    <input type="hidden"  id="city_to_hidden5" name="form_text_hidden55"
                                           value="" >
                                    <input type="text" class="form-control city_autocomplete" id="city_to5"
                                           name="form_text_55" value="">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Адрес отправителя<span class="form-required">*</span></label>
                                    <textarea class="form-control" required name="form_textarea_56"><?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_textarea_56"]);?></textarea>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Вес отправления</label>
                                    <div class="input-group">
                                        <input id="form_text_weight_hidden" type="hidden" name="form_text_hidden58">
                                        <input id="form_text_weight" type="text" class="form-control" name="form_text_58"
                                               aria-describedby="basic-addon-form_text_58">
                                        <span class="input-group-addon" id="basic-addon-form_text_58">кг</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Дата<span class="form-required">*</span></label>
                                    <div class="input-group">
                            			<span class="input-group-addon" id="basic-addon-form_text_53">
				<?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.calendar",
                    ".default",
                    array(
                        "SHOW_INPUT" => "N",
                        "FORM_NAME" => "",
                        "INPUT_NAME" => "form_text_53",
                        "INPUT_NAME_FINISH" => "",
                        "INPUT_VALUE" => "",
                        "INPUT_VALUE_FINISH" => false,
                        "SHOW_TIME" => "N",
                        "HIDE_TIMEBAR" => "Y",
                    ),
                    false
                );
                ?>
			</span>
                                        <input type="text" class="form-control maskdate" required name="form_text_53" placeholder="ДД.ММ.ГГГГ" ria-describedby="basic-addon-form_text_53">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Время</label>
                                    <input type="text" class="form-control masktime" name="form_text_54">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label"><span id="chLabel1">Город получателя</span>
                                        <span class="form-required">*</span></label>
                                    <input id="city_from_hidden5" type="hidden"  name="form_text_hidden57">
                                    <input id="city_from5" type="text" class="form-control city_autocomplete" required
                                           name="form_text_57">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label"><span id="chLabel3">Адрес получателя</span>
                                        <span class="form-required">*</span></label>
                                    <textarea class="form-control" required name="form_textarea_103"></textarea>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label"><span id="chLabel2">ФИО получателя</span>
                                        <span class="form-required">*</span></label>
                                    <input type="text" class="form-control" required name="form_text_62">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label"><span id="chLabel4">Номер телефона получателя</span>
                                        <span class="form-required">*</span></label>
                                    <input type="text" class="form-control " required name="form_text_149">
                                </div>
                                <div class="form-group form-group-sm">

                                    <label for="" class="control-label">Способ оплаты</label><br>
                                    <span id="info_service_pay" style="font-size: 96%; margin-bottom: 10px;">
                                            <i> При выборе типа оплаты "Банковской картой",
                                         Вы сможете оплатить Заявку на сайте. Если Вы
                                         планируете оплатить Заявку курьеру наличными ,
                                                выбирайте тип оплаты - "Наличными"</i>
                                    </span>
                                    <select class="form-control" name="form_dropdown_SIMPLE_QUESTION_526">
                                        <option value="61">Банковская карта (на сайте)</option>
                                        <option selected value="59">Наличные (курьеру)</option>
                                   </select>
                                </div>

                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Примечание</label>
                                    <textarea class="form-control" name="form_textarea_61"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="confirmation_order_service" required name="form_checkbox_confirmation" value="146"> Нажимая кнопку &laquo;Заказать&raquo;, я подтверждаю свою дееспособность, даю согласие на обработку своих персональных данных в соответствии с <a href="http://newpartner.ru/personal-data/" target="_blank">Условиями использования персональных данных<font color="red"><span class="form-required">*</span></font></a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><font color="red"><span class="form-required">*</span></font> - Поля, обязательные для заполнения</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-body">
                        <button  type="submit" class="btn">Заказать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
// модальное окно заказа из формы заказа
?>
<div class="modal fade color2" id="modal_order_service" tabindex="-1" role="dialog"
     aria-labelledby="modal_order_service">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="modal_order_service_form" action="" method="post">
                <input id="order_service_pay_user_new_order" name="order_service_pay_user_new_order" type="hidden">
                <input id="sumdev_data" name="sumdev_data" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Заказать услугу</h4>
                    <?=CSite::InDir('/api/')?>
                </div>
                <div class="modal-body">
                    <div class="info"></div>
                    <div class="alert alert-danger display-error" style="display: none"></div>
                    <div id="sumdev_alert" class="alert alert-warning" style="display: none"></div>
                    <div class="form-body">
                        <div class="row" style="height: 500px; overflow: auto">
                            <div class="col-xs-6">
                                <h5>Информация о заказе</h5>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Вы будете</label>
                                    <select class="form-control" name="form_radio_SIMPLE_QUESTION_971" onChange="changeLabels();" id="form_radio_SIMPLE_QUESTION_971">
                                        <option value="102" selected>Отправителем</option>
                                        <option value="121">Получателем</option>
                                    </select>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">E-mail<span class="form-required">*</span></label>
                                    <input id="form_email_52_order" type="text" class="form-control" name="form_email_52"
                                           value="<?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_email_52"]);?>">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Организация</label>
                                    <input type="text" class="form-control" name="form_text_49"
                                           value="<?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_text_49"]);?>">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">ФИО отправителя<span class="form-required">*</span></label>
                                    <input type="text" class="form-control" name="form_text_50"
                                           value="<?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_text_50"]);?>">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Номер телефона отправителя<span class="form-required">*</span></label>
                                    <input type="text" class="form-control " name="form_text_51"
                                           value="<?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_text_51"]);?>">
                                </div>

                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Город отправителя<span class="form-required">*</span></label>
                                    <input type="text" class="form-control city_autocomplete" id="city_to55"
                                           name="form_text_55" value="<?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_text_55"]);?>">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Адрес отправителя<span class="form-required">*</span></label>
                                    <textarea class="form-control" name="form_textarea_56"><?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_textarea_56"]);?></textarea>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Вес отправления</label>
                                    <div class="input-group">
                                        <input id="weight_58" type="text" class="form-control" value="1.0" name="form_text_58"
                                               aria-describedby="basic-addon-form_text_58">
                                        <span class="input-group-addon" id="basic-addon-form_text_58">кг</span>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Промокод</label>
                                    <input type="text" class="form-control" name="form_text_138">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Дата<span class="form-required">*</span></label>
                                    <div class="input-group">
                            			<span class="input-group-addon" id="basic-addon-form_text_53">
				<?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.calendar",
                    ".default",
                    array(
                        "SHOW_INPUT" => "N",
                        "FORM_NAME" => "",
                        "INPUT_NAME" => "form_text_53",
                        "INPUT_NAME_FINISH" => "",
                        "INPUT_VALUE" => "",
                        "INPUT_VALUE_FINISH" => false,
                        "SHOW_TIME" => "N",
                        "HIDE_TIMEBAR" => "Y",
                    ),
                    false
                );
                ?>
			</span>
                                        <input type="text" class="form-control maskdate" name="form_text_53" placeholder="ДД.ММ.ГГГГ" ria-describedby="basic-addon-form_text_53">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Время</label>
                                    <input type="text" class="form-control masktime" name="form_text_54">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label"><span id="chLabel1">Город получателя</span><span
                                                class="form-required">*</span></label>
                                    <input type="text" class="form-control city_autocomplete" name="form_text_57" id="city_from_57"
                                           value="<?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_text_57"]);?>">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label"><span id="chLabel3">Адрес получателя</span><span
                                                class="form-required">*</span></label>
                                    <textarea class="form-control" name="form_textarea_103"><?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_textarea_103"]);?></textarea>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label"><span id="chLabel2">ФИО получателя</span><span
                                                class="form-required">*</span></label>
                                    <input type="text" class="form-control" name="form_text_62"
                                           value="<?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_text_62"]);?>">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label"><span id="chLabel4">Номер телефона получателя</span><span
                                                class="form-required">*</span></label>
                                    <input type="text" class="form-control " name="form_text_149"
                                           value="<?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_text_149"]);?>">
                                </div>
                                <div class="form-group form-group-sm">

                                    <label for="" class="control-label">Способ оплаты</label>
                                    <select id="option_paycard" class="form-control" name="form_dropdown_SIMPLE_QUESTION_526">
                                        <option value="59">Наличные (курьеру)</option>
                                        <option value="60">Банковская карта (курьеру)</option>
                                        <option value="paycard">Банковская карта (сейчас на сайте)</option>
                                    </select>
                                </div>
                                <div id = "box_select_payer" class="form-group form-group-sm">
                                    <?
                                    $radio_139 = " selected";
                                    $radio_140 = "";
                                    $radio_141 = "";
                                    if ((int)$_COOKIE["inv_form_dropdown_PAYER"] == 140)
                                    {
                                        $radio_139 = "";
                                        $radio_140 = " selected";
                                        $radio_141 = "";
                                    }
                                    elseif ((int)$_COOKIE["inv_form_dropdown_PAYER"] == 141)
                                    {
                                        $radio_139 = "";
                                        $radio_140 = "";
                                        $radio_141 = " selected";
                                    }
                                    ?>
                                    <label for="form_dropdown_PAYER" class="control-label">Плательщик</label>
                                    <select class="form-control" name="form_dropdown_PAYER" id="form_dropdown_PAYER">
                                        <option value="139"<?=$radio_139;?>>Отправитель</option>
                                        <option value="140"<?=$radio_140;?>>Получатель</option>
                                        <option value="141"<?=$radio_141;?>>Другой</option>
                                    </select>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label">Примечание</label>
                                    <textarea class="form-control" name="form_textarea_61"><?=iconv('utf-8','windows-1251',$_COOKIE["inv_form_textarea_61"]);?></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="confirmation_order_service" name="form_checkbox_confirmation" value="146"> Нажимая кнопку &laquo;Заказать&raquo;, я подтверждаю свою дееспособность, даю согласие на обработку своих персональных данных в соответствии с <a href="http://newpartner.ru/personal-data/" target="_blank">Условиями использования персональных данных<font color="red"><span class="form-required">*</span></font></a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><font color="red"><span class="form-required">*</span></font> - Поля, обязательные для заполнения</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-body">
                        <button  type="submit" class="btn">Заказать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade color1" id="modal_enter_into_contract" tabindex="-1" role="dialog"
     aria-labelledby="modal_enter_into_contract">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
        	<form id="modal_contract_form" action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Заключить договор</h4>
                </div>
                <div class="modal-body">
                	<div class="info"></div>
					<div class="alert alert-danger display-error" style="display: none"></div>
                      <div class="form-group" id="group_form_email_128">
                        <label for="form_email_128" class="control-label">E-mail<span class="form-required">*</span></label>
                        <input type="text" class="form-control" value="" name="form_email_128" id="form_email_128">
                      </div>
                      <div class="form-group" id="group_form_text_159">
                        <label for="form_text_159" class="control-label">Номер телефона</label>
                        <input type="text" class="form-control " value="" name="form_text_159" id="form_text_159">
                      </div>
                     <div class="form-group">
                        <label for="recipient-name" class="control-label">Реквизиты</label>
                         <div class="btn btn-plus fileinput-button">
                         	Добавить файлы
                         	<input type="hidden" id="filesize" value="0">
                            <input type="hidden" id="filecount" value="0">
                            <input type="hidden" id="filelist" value="" name="filelist">
                            <input id="fileupload" type="file" name="files[]" multiple>
                        </div>
                        <p id="files-upload-info"></p>
                        <div id="files" class="files"></div>
                      </div>
                     <div class="form-group" id="group_form_radio_TAXATION">
                       <label for="" class="control-label">Ваше налогообложение<span class="form-required">*</span></label>
                       <div class="radio">
  <label for="form_checkbox_TAXATION_142">
    <input type="radio" name="form_radio_TAXATION" id="form_checkbox_TAXATION_142" value="142">
    С НДС
  </label>
</div>
<div class="radio">
  <label for="form_checkbox_TAXATION_143">
    <input type="radio" name="form_radio_TAXATION" id="form_checkbox_TAXATION_143" value="143">
    Без НДС
  </label>
</div>
                        </div>
                      <div class="form-group">
                        <label for="form_text_131" class="control-label">Промо-код</label>
                        <input type="text" class="form-control" value="" name="form_text_131" id="form_text_131">
                      </div>
					<div class="checkbox">
						<label>
							<input type="checkbox" id="confirmation_contract_form" name="form_checkbox_confirmation" value="147"> Нажимая кнопку &laquo;Отправить&raquo;, я подтверждаю свою дееспособность, даю согласие на обработку своих персональных данных в соответствии с <a href="http://newpartner.ru/personal-data/" target="_blank">Условиями использования персональных данных<font color="red"><span class="form-required">*</span></font></a>
						</label>
					</div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade color6" id="modal_delivery_note" tabindex="-1" role="dialog" aria-labelledby="modal_delivery_note">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="modal_delivery_note_form" onkeypress="return event.keyCode != 13;">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Отследить отправление</h4>
                </div>
				<div class="alert alert-danger display-error" style="display: none"></div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="recipient-name" class="control-label">Номер накладной:</label>
                      <input type="text" class="form-control" name="delivery_note_number" value="">
                    </div>
                    <div class="loadergif"></div>
                  <div id="delivery_note_info">
                  </div>
                </div>
                <div class="modal-footer">
  				  <input id="delivery_note" class="btn" type="button" value="Проверить" />

                </div>
		</form>
		</div>
	</div>
</div>



<div class="modal fade color7" tabindex="-1" role="dialog" id="modal_mess" aria-labelledby="modal_mess">
	<div class="modal-dialog">
		<div class="modal-content">
            <form id="modal_mess_form" action="" method="post">
                <div class="modal-header">
                  <button aria-label="Закрыть" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Напишите нам</h4>
                </div>
                <div class="modal-body">
                    <div class="info"></div>
                    <div class="form-group">
                      <label for="">Имя<span class="form-required">*</span></label>
                      <input type="text" placeholder=""  class="form-control" name="form_text_74" value="<?=iconv('utf-8','windows-1251',$_COOKIE["np_form_text_50"]);?>">
                    </div>
                      <div class="form-group">
                      <label for="">Email<span class="form-required">*</span></label>
                      <input type="text" placeholder=""  class="form-control" name="form_email_75" value="<?=iconv('utf-8','windows-1251',$_COOKIE["np_form_email_52"]);?>">
                    </div>
                      <div class="form-group">
                      <label for="">Текст сообщения<span class="form-required">*</span></label>
                      <textarea class="form-control" name="form_textarea_76"></textarea>
                    </div>
					<div class="checkbox">
						<label>
							<input type="checkbox" id="confirmation_mess" name="form_checkbox_confirmation" value="144"> Нажимая кнопку &laquo;Отправить&raquo;, я подтверждаю свою дееспособность, даю согласие на обработку своих персональных данных в соответствии с <a href="http://newpartner.ru/personal-data/" target="_blank">Условиями использования персональных данных<font color="red"><span class="form-required">*</span></font></a>
						</label>
					</div>
                    <p><font color="red"><span class="form-required">*</span></font> - Поля, обязательные для заполнения</p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="submit">Отправить</button>
                </div>
            </form>
		</div>
	</div>
</div>


<div class="modal fade color7" tabindex="-1" role="dialog" id="modal_call" aria-labelledby="modal_call">
	<div class="modal-dialog">
		<div class="modal-content">
        	<form id="modal_call_form" action="" method="post">
 				<div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Заказать обратный звонок</h4>
                </div>
                <div class="modal-body">
                	<div class="info"></div>
					<div class="alert alert-danger display-error" style="display: none"></div>
                    <div class="form-group">
                      <label for="">Город<span class="form-required">*</span></label>
                      <input type="text" class="form-control city_autocomplete"  placeholder="" name="form_text_63" value="<?=iconv('utf-8','windows-1251',$_COOKIE["np_form_text_55"]);?>">
                    </div>
                      <div class="form-group">
                      <label for="">Номер телефона<span class="form-required">*</span></label>
                      <input type="text" class="form-control "  placeholder="" name="form_text_64" value="<?=iconv('utf-8','windows-1251',$_COOKIE["np_form_text_51"]);?>">
                    </div>
                    <div class="form-group">
                      <label for="">Контактное лицо<span class="form-required">*</span></label>
                      <input type="text" class="form-control"  placeholder="" name="form_text_65" value="<?=iconv('utf-8','windows-1251',$_COOKIE["np_form_text_50"]);?>">
                    </div>
                      <div class="form-group">
                      <label for="">Email<span class="form-required">*</span></label>
                      <input type="text" class="form-control"  placeholder="" name="form_email_66" value="<?=iconv('utf-8','windows-1251',$_COOKIE["np_form_email_52"]);?>">
                    </div>
					<div class="checkbox">
						<label>
							<input type="checkbox" id="confirmation_call" name="form_checkbox_confirmation" value="148"> Нажимая кнопку &laquo;Отправить&raquo;, я подтверждаю свою дееспособность, даю согласие на обработку своих персональных данных в соответствии с <a href="http://newpartner.ru/personal-data/" target="_blank">Условиями использования персональных данных<font color="red"><span class="form-required">*</span></font></a>
						</label>
					</div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Отправить</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade color2" tabindex="-1" role="dialog" id="modal_order_transport" aria-labelledby="modal_order_transport">
	<div class="modal-dialog">
		<div class="modal-content">
        	<form id="modal_order_transport_form" action="" method="post">
 				<div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Заказать транспортные услуги</h4>
                </div>
                <div class="modal-body">
                	<div class="info"></div>
					<div class="alert alert-danger display-error" style="display: none"></div>

<div class="form-group">
                        	<label for="" class="control-label">Дата</label>
                            <div class="input-group">
                            			<span class="input-group-addon" id="basic-addon-date-transport">
				<?
				$APPLICATION->IncludeComponent(
					"bitrix:main.calendar",
					".default",
					array(
						"SHOW_INPUT" => "N",
						"FORM_NAME" => "",
						"INPUT_NAME" => "date-transport",
						"INPUT_NAME_FINISH" => "",
						"INPUT_VALUE" => "",
						"INPUT_VALUE_FINISH" => false,
						"SHOW_TIME" => "N",
						"HIDE_TIMEBAR" => "Y",
					),
					false
				);
				?>
			</span>
                            <input type="text" class="form-control maskdate" name="date-transport" placeholder="ДД.ММ.ГГГГ" ria-describedby="basic-addon-date-transport">
                            </div>
                        </div>

                      <div class="form-group">
                      <label for="">Номер телефона<span class="form-required">*</span></label>
                      <input type="text" class="form-control "  placeholder="" name="">
                    </div>
                              <div class="form-group">
                      <label for="">Контактное лицо<span class="form-required">*</span></label>
                      <input type="text" class="form-control"  placeholder="" name="">
                    </div>
                      <div class="form-group">
                      <label for="">Email<span class="form-required">*</span></label>
                      <input type="text" class="form-control"  placeholder="" name="">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Отправить</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade color3" id="modal_calculate_cost_new" tabindex="-1" role="dialog"
     aria-labelledby="modal_calculate_cost_new">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Расчет стоимости доставки</h4>
            </div>
            <div style="margin-bottom: 0!important; display: none;" class="alert alert-danger display-error">
                <div class="messerr"></div>
            </div>
            <div class="modal-body">
                <div class="info"></div>
             <div class="list-group">

             </div>

             <div id = "payment_module" class="main_block color2">
                    <p>Заказать услугу</p>
                     <div class="form-group">
                         <div class="input-group">
			             <div class="input-group-btn">
                        <button id="btn_modal_cost" class="btn btn-default "
                                onclick="yaCounter50408199.reachGoal('KURIER');
                        return true;" >&nbsp;</button>
                       </div>
                       </div>
                     </div>
            </div>

        </div>
    </div>
</div>
</div>

    <div id="user_mess" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Вернуться в форму</button>
                    <a href="http://client.newpartner.ru"  type="button" class="btn btn-success">Продолжить в Личном кабинете</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




