<?php
use Bitrix\Main\Localization\Loc;
?>
<!--профиль-->
<div class="modal fade" id="fl_profile" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fl_profile"><?= Loc::getMessage("TITLE_PROFILE") ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php // dump($arResult);?>
                <form id="form_profile_fl" action="/tools/change_user_fl.php?change=<?=$USER->GetID()?>" method="post" name="form_profile_fl"
                      class="form-horizontal">
                    <?=bitrix_sessid_post()?>
                    <input type="hidden" name="ID" value="<?=$USER->GetID()?>">
                    <div class="form-group">
                        <label class="control-label"><?= Loc::getMessage("USER_NAME") ?><span class="starrequired">*</span></label>
                        <input required type="text" name="NAME" maxlength="50" value="<?=$USER->GetFirstName()?> "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= Loc::getMessage("USER_LAST_NAME") ?></label>
                        <input type="text" name="LAST_NAME" maxlength="50" value="<?=$USER->GetLastName()?> "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= Loc::getMessage("USER_SECONDNAME") ?></label>
                        <input type="text" name="SECOND_NAME" maxlength="50" value="<?=$USER->GetParam('SECOND_NAME')?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail:<span class="starrequired">*</span></label>
                        <input type="text" required name="EMAIL" maxlength="50" value="<?=$USER->GetEmail()?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= Loc::getMessage("USER_PHONE") ?></label>
                        <input type="text" name="PERSONAL_PHONE" maxlength="50"
                               value="<?=$arResult['USER']['phone']?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= Loc::getMessage("USER_STREET") ?></label>
                        <input type="text" name="PERSONAL_STREET" maxlength="50"
                               value="<?=$arResult['USER']['adress']?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= Loc::getMessage("NEW_PASS") ?></label>
                        <input type="password" name="PASSWORD" maxlength="50" value="" autocomplete="off"
                               class="bx-auth-input form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= Loc::getMessage("NEW_PASS_TWO") ?></label>
                        <input type="password" name="CONFIRM_PASSWORD" maxlength="50" value="" autocomplete="off"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="save" value="Сохранить" class="btn btn-primary">&nbsp;&nbsp;

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- трек -->
<div class="modal fade" id="fl_track" data-backdrop="static" data-keyboard="false" tabindex="-1"
     role="dialog" aria-labelledby="fl_track" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fl_track_label">Отслеживание отправления - <span class="h5_sp"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm">

                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>

            </div>
        </div>
    </div>
</div>

<!--калькулятор-->
<div class="modal fade" id="modal_calculate_cost_new" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="modal_calculate_cost_new">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Новая заявка. <small>Стоимость и сроки доставки</small></h5>
        </div>
            <div style="margin-bottom: 0!important; display: none;" class="alert alert-danger display-error">
                <div class="messerr"></div>
            </div>
            <div class="modal-body">
                <div class="info"></div>
                <div class="list-group">

                </div>

                <div id = "payment_module" class="main_block">
                   <span style="font-size: 96%; margin-bottom: 10px;"><i> При выборе типа оплаты "Банковской картой",
                            Вы сможете оплатить Заявку на сайте. Если Вы
                        планируете оплатить Заявку наличными, выбирайте тип оплаты - "Наличными"</i></span>
                    <div class="form-group">
                        <div class="input-group">
                            <div style="width:100%" class="input-group-btn">
                                <button id="btn_modal_cost" class="btn btn-outline-primary"
                                        onclick="yaCounter50408199.reachGoal('KURIER');
                        return true;" >&nbsp;Перейти к оформлению заявки</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button id="modal_calculate_cost_new_close" type="button" class="btn btn-primary" >
                <span class="icon text-white-50">
                            <i class="fas fa-walking"></i>
                            </span>&nbsp;
                    Назад
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Новая заявка -->
<div id="modal_order_service_pay" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Новая заявка. <small>Заполнение необходимых данных</small></h5>
                <button id="modal_order_service_pay_close" type="button" class="close"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form id="modal_order_service_form_pay" action="" method="post">
                    <?=bitrix_sessid_post()?>
                    <div class="info"></div>
                    <div class="alert alert-danger display-error" style="display: none"></div>
                    <h4 id="price_calc_p">Сумма к оплате - <span></span></h4>
                    <input id="price_calc" type="hidden" class="form-control" name="price_calc">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-sm">
                                    <input type="hidden" name="name_custom" value="<?=$fullname;?>">
                                    <input type="hidden" name="phone_custom" value="<?=$phone;?>">
                                <label for="" class="control-label">Вы будете</label>
                                <select  class="form-control" name="form_radio_SIMPLE_QUESTION_971"
                                         id="pay_form_radio_SIMPLE_QUESTION_971"
                                          onchange="getval(this, <?="'$fullname', '$phone', '$adress'"?>)">
                                    <option value="102" selected>Отправителем</option>
                                    <option value="121">Получателем</option>
                                    <option value="creator">Заказчиком</option>
                                </select>
                                </div>
                                <div  class="form-group form-group-sm">
                                    <label for="" class="control-label">Ваш E-mail<span
                                                class="form-required">*</span></label>
                                    <input name="form_email_52_hidden" value="<?=$_SESSION['form_mail'];?>" type="hidden">
                                    <input disabled type="text" class="form-control" name="form_email_52" required
                                           value="<?=$_SESSION['form_mail'];?>">
                                </div>

                                <div id="sender_name_select_wrap" style="display:none" class="form-group form-group-sm">
                                    <label for="sender_name_select" class="control-label">Выбрать отправителя из
                                        адресной книги</label>
                                    <select class="form-control" disabled id="sender_name_select"
                                    name="sender_name_select"  onchange="getidval(this)">
                                    </select>
                                </div>

                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">ФИО отправителя<span
                                                class="form-required">*</span></label>
                                    <input name="form_text_50_hidden" type="hidden" value="<?=$name.' '.$lastname;?>">
                                    <input disabled type="text" class="form-control" name="form_text_50" required
                                value="<?=$name.' '.$lastname;?>">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Номер телефона отправителя<span
                                                class="form-required">*</span></label>
                                    <input type="hidden" name="form_text_51_hidden" value="<?=$phone;?>">
                                    <input disabled type="text" class="form-control" name="form_text_51" required
                                 value="<?=$phone;?>">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Город отправителя<span class="form-required">*
                                        </span></label>
                                    <input type="hidden"  id="city_to_hidden5" name="form_text_hidden55"
                                           value="">
                                    <input type="text" class="form-control city_autocomplete" id="city_to5"
                                           name="form_text_55" value="">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Адрес отправителя<span
                                                class="form-required">*</span></label>
                                    <textarea  class="form-control" required name="form_textarea_56"><?=$adress;?>
                                    </textarea>
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
                            <div class="col-md-6">
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Дата<span class="form-required">*</span></label>
                                    <div class="input-group">
                            			<span class="input-group-addon" id="basic-addon-form_text_53">
                            <?php
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
                                 <input type="text" class="form-control maskdate" required name="form_text_53"
                                        placeholder="ДД.ММ.ГГГГ" aria-describedby="basic-addon-form_text_53">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Время</label>
                                    <input type="text" class="form-control masktime" name="form_text_54">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Город получателя<span
                                                class="form-required">*</span>
                                    </label>
                                    <input id="city_from_hidden5" type="hidden"  name="form_text_hidden57">
                                    <input id="city_from5" type="text" class="form-control city_autocomplete"
                                           required name="form_text_57">
                                </div>

                                <div id="recipient_name_select_wrap" class="form-group form-group-sm">
                                <label for="recipient_name_select" class="control-label">Выбрать получателя
                                    из адресной книги</label>
                                <select class="form-control" id="recipient_name_select"
                                        name="recipient_name_select" onchange="getidval(this)">

                                </select>
                                </div>

                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">ФИО получателя<span class="form-required">*
                                        </span></label>
                                    <input type="hidden" name="form_text_62_hidden">
                                    <input type="text" class="form-control" required name="form_text_62"
                                           value="">

                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Адрес получателя<span class="form-required">*
                                        </span></label>
                                    <textarea class="form-control" required name="form_textarea_103">
                                    </textarea>

                                </div>

                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Номер телефона получателя<span
                                                class="form-required">*</span></label>
                                    <input type="hidden" name="form_text_149_hidden">
                                    <input type="text" class="form-control " required name="form_text_149"
                                           value="">

                                </div>
                                <div style="display: none" id="form_dropdown_payment_wrap" class="form-group form-group-sm">
                                    <label for="form_dropdown_payment" class="control-label">Выбор плательщика </label>
                                    <select onchange="setpayment(this)" disabled id="form_dropdown_payment"
                                            class="form-control"
                                            name="form_dropdown_payment">
                                        <option value="creator_pay" selected>Заказчик</option>
                                        <option value="sender_pay">Отправитель</option>
                                        <option value="recipient_pay">Получатель</option>
                                    </select>
                                </div>

                                <div class="form-group form-group-sm">
                                     <label for="form_dropdown_pay" class="control-label">Способ оплаты</label>
                                    <select id="form_dropdown_pay" class="form-control"
                                            name="form_dropdown_SIMPLE_QUESTION_526">
                                        <option value="61">Банковская карта</option>
                                        <option value="59" selected>Наличные</option>
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
                                    <input type="checkbox" id="confirmation_order_service" required
                                           name="form_checkbox_confirmation" value="146"> Нажимая кнопку &laquo;Заказать&raquo;, я подтверждаю свою дееспособность, даю согласие на обработку своих персональных данных в соответствии с <a href="http://newpartner.ru/personal-data/" target="_blank">Условиями использования персональных данных<font color="red"><span class="form-required">*</span></font></a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><font color="red"><span class="form-required">*</span></font> - Поля, обязательные для заполнения</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex flex-row justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-walking"></i>
                                    </span>&nbsp;
                                Заказать
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>


        </div>
    </div>
</div>

<!-- Новый Отправитель -->
<div id="add_modal_sender" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Новый Отправитель</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="err_sender"></div>
                <form id="add_modal_sender_form"
                      action="/tools/change_user_fl.php?newsender=<?=$USER->GetID()?>&sender_add=Y" method="post">
                    <?=bitrix_sessid_post()?>
                    <div class="info"></div>
                    <div class="alert alert-danger display-error" style="display: none"></div>
                     <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">ФИО отправителя<span
                                                class="form-required">*</span></label>
                                    <input type="text" class="form-control" name="NAME" required value="">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Номер телефона отправителя<span
                                                class="form-required">*</span></label>
                                    <input type="text" class="form-control" name="PHONE" required
                                           value="">
                                </div>
                                <div class="form-group form-group-sm">
                                    <input name="CITY_ID" id="citycode_0" type="hidden">
                                    <label for="city_0" class="control-label">Город отправителя<span
                                                class="form-required">*</span></label>
                                    <input id="city_0" type="text" name="CITY"
                                           class="form-control autocity ui-autocomplete-input"
                                           required value="">
                                    <small>Начинайте воодить название города, выберете из выпадающего списка</small>
                                </div>

                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Адрес отправителя<span class="form-required">*</span></label>
                                    <textarea class="form-control" required name="ADRESS"></textarea>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex flex-row justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                  <span class="icon text-white-50">
                                   <i class="fas fa-save"></i>
                                    </span>&nbsp;
                                Сохранить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>


        </div>
    </div>
</div>

<!-- Новый получатель -->
<div id="add_modal_recipient" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Новый Получатель</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="err_recipient"></div>
                <form id="add_modal_recipient_form"
                      action="/tools/change_user_fl.php?newsender=<?=$USER->GetID()?>&recipient_add=Y" method="post">
                    <?=bitrix_sessid_post()?>
                    <div class="info"></div>
                    <div class="alert alert-danger display-error" style="display: none"></div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">ФИО получателя<span
                                                class="form-required">*</span></label>
                                    <input type="text" class="form-control" name="NAME" required value="">
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Номер телефона получателя<span
                                                class="form-required">*</span></label>
                                    <input type="text" class="form-control" name="PHONE" required
                                           value="">
                                </div>
                                <div class="form-group form-group-sm">
                                    <input name="CITY_ID" id="citycode_1" type="hidden">
                                    <label for="city_1" class="control-label">Город получателя<span
                                                class="form-required">*</span></label>
                                    <input id="city_1" type="text" name="CITY"
                                           class="form-control autocity ui-autocomplete-input"  required value="">
                                    <small>Начинайте вводить название города, выберете из выпадающего списка</small>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="" class="control-label">Адрес получателя<span class="form-required">*</span></label>
                                    <textarea class="form-control" required name="ADRESS"></textarea>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex flex-row justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                  <span class="icon text-white-50">
                                   <i class="fas fa-save"></i>
                                    </span>&nbsp;
                                Сохранить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

