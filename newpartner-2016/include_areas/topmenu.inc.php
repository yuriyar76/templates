<!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">

          <a class="navbar-brand" href="/"><img src="/bitrix/templates/newpartner-2016/images/logo.png" width="237" height="66" alt="Новый Партнер"></a>
        </div>
        <div class="navbar-motto">
            Снизим ваши расходы на доставку
        </div>

		<div class="pull-right">
        	<a class="open-menu-button btn" role="button" data-toggle="collapse" href="#collapseMenu" aria-expanded="false" aria-controls="collapseExample">Открыть меню</a>
        </div>
        
        <div class="pull-right">
        	<ul class="nav navbar-nav">
            	<li class="dropdown">
                	<a href="#" class="dropdown-toggle lk-button" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Личный кабинет</a>
                    <ul class="dropdown-menu">
                    	<li><a href="http://client.newpartner.ru/" target="_blank">Личный кабинет клиента</a></li>
                    	<li role="separator" class="divider"></li>
                        <li><a href="http://agent.newpartner.ru/" target="_blank">Личный кабинет агента</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="http://dms.newpartner.ru/" target="_blank">DMS «Новый Партнер»</a></li>
					</ul>
                </li>
            </ul>
        </div>
        <?if($APPLICATION->GetCurPage()!="/offer/free.php"):?>
		 <div class="pull-right amoformbtn">
                <script>var amo_forms_params = {"id":359023,"hash":"8feec9d54efa61546d3dc95f484aa3ef","locale":"ru"};</script><script id="amoforms_script" async="async" charset="utf-8" src="https://forms.amocrm.ru/forms/assets/js/amoforms.js"></script> 
		</div>
        <?endif;?>
      </div>
    </nav>
    <!-- Static navbar -->
    <div class="collapse" id="collapseMenu">
    	<div class="container">
            <nav>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "newpartner-2016-top",
                    Array(
                        "ROOT_MENU_TYPE" => "top",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => ""
                    )
                );?>
            </nav>
        </div>
	</div>