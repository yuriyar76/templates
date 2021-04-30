

<div style="height: 242px" class="main_block color6">
    <p>Оплатить заказ</p>

        <div class="form-group">
            <label for="input_pay_card">Номер накладной / трека:</label>
            <div class="input-group">
                <input style='width:122%' type="text" class="form-control" id="input_pay_card"  placeholder="">
            </div>
            <div style=" height: 15px;
             display: flex;
             flex-direction: row;
             justify-content: center;
             align-items: center;
             margin-top: 16px;">
                <p style="text-align: center; font-weight: normal">и / или</p>
            </div>
            <label for="input_pay_card_z">Номер заявки:</label>
            <div class="input-group">
                <input style='width:122%' type="text" class="form-control" id="input_pay_card_z"  placeholder="">
            </div>
            <div style="width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: flex-end;">
                <button style="margin-top: 9px;" id="pay_card_submit" class="btn btn-default">&nbsp;</button>
            </div>
        </div>

</div>
<div id="modal_pay_invoice" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 style="color: #25a0e6;" class="modal-title">Укажите Вашу почту куда выслать чек</h4>
            </div>
            <form id="form_user_name" name="form_user_name" >
                <div class="modal-body">
                    <div class="input-group">
                      <span class="input-group-btn">
                        <button class="btn btn-success" type="button">Отправить</button>
                      </span>
                        <input id="number_z" type="hidden" name="number_z">
                        <input id="user_phone" type="hidden" name="user_phone">
                        <input id="user_email" type="text" class="form-control" name="user_email" placeholder="Ваш email">
                    </div><!-- /input-group -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">К оплате</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal_pay_invoice_alert" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="color: #25a0e6;" class="modal-title">Ошибка ввода данных</h5>
            </div>
            <div class="modal-body">
                  <div class="alert alert-danger" role="alert">
                      Введите номер накладной/заявки!
                  </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->