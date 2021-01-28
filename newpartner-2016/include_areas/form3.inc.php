<div class="main_block color2">
	<p>Заказать услугу</p>
	<div class="form-group">
		<label for="input_order_service">Вызвать курьера на дату:</label>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon-1">
				<?
				$APPLICATION->IncludeComponent(
					"bitrix:main.calendar",
					".default",
					array(
						"SHOW_INPUT" => "N",
						"FORM_NAME" => "",
						"INPUT_NAME" => "input_order_service",
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
			<input type="text" class="form-control maskdate" id="input_order_service" placeholder="ДД.ММ.ГГГГ" name="input_order_service" aria-describedby="basic-addon-1">
			<div class="input-group-btn">
				<button class="btn btn-default " data-toggle="modal" onclick="yaCounter50408199.reachGoal('KURIER'); return true;" data-target="#modal_order_service">&nbsp;</button>
			</div>
		</div>
	</div>
    <?
	/*
	
	<div class="form-group">
		<label for="input_order_transport">Заказать транспортные услуги на дату:</label>
		<div class="input-group">
			<span class="input-group-addon" id="addon-order-transport">
				<?
				$APPLICATION->IncludeComponent(
					"bitrix:main.calendar",
					".default",
					array(
						"SHOW_INPUT" => "N",
						"FORM_NAME" => "",
						"INPUT_NAME" => "input_order_transport",
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
			<input type="text" class="form-control maskdate" id="input_order_transport" placeholder="ДД.ММ.ГГГГ" name="input_order_transport" aria-describedby="addon-order-transport">
			<div class="input-group-btn">
				<button class="btn btn-default" data-toggle="modal" data-target="#modal_order_transport">&nbsp;</button>
			</div>
		</div>
    </div>
	*/
	?>
</div>