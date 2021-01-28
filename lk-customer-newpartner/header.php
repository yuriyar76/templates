<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="<?=LANG_CHARSET;?>">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?$APPLICATION->ShowMeta("keywords")?>
		<?$APPLICATION->ShowMeta("description")?>
		<title><?$APPLICATION->ShowTitle()?></title>
		<!-- Bootstrap -->
        <link href="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/cerulean.css" type="text/css" rel="stylesheet" />
        <link href="/bitrix/templates/portal/autocomplete/jquery-ui-1.9.2.custom.css" type="text/css" rel="stylesheet" />
        <link href="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/bootstrap-table.css" type="text/css" rel="stylesheet" />
        <link href="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/bootstrap-tour.css" type="text/css" rel="stylesheet" />
        <link href="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/bootstrap-select.min.css" type="text/css" rel="stylesheet" />
        <?$APPLICATION->ShowCSS();?>
        <?$APPLICATION->ShowHeadStrings()?>
		<?$APPLICATION->ShowHeadScripts()?>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
        <script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/jquery.js"></script>
        <script type="text/javascript" src="/bitrix/templates/portal/js/jquery-ui-1.9.2.custom.js"></script>
        <script type="text/javascript" src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/jquery.maskedinput-1.4.1.js"></script>
		<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/bootstrap.min.js"></script>
        <script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/bootstrap-table.js"></script>
        <script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/bootstrap-table-ru-RU.js"></script>
        <script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/bootstrap-tour.js"></script>
        <script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/bootstrap-select.min.js"></script>
        <script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/bootstrap-select-ru-RU.js"></script>
		<? 
		$name_panel = 'Новый Партнер';
		if (strlen(trim($_SESSION['NAME_PANEL'])))
		{
			$name_panel = $_SESSION['NAME_PANEL'];
		}
		if ($USER->IsAuthorized())
		{
			$rsUser = CUser::GetByID($USER->GetID());
			$arUser = $rsUser->Fetch();
			if (intval($arUser["UF_COMPANY_RU_POST"]) == 0)
			{
				echo '<script src="/bitrix/templates/'.SITE_TEMPLATE_ID.'>/js/client.tour.start.js"></script>';
			}
			else
			{
				CModule::IncludeModule("iblock");


					$client_type_branch = 300;
					$db_props = CIBlockElement::GetProperty(40, intval($arUser["UF_COMPANY_RU_POST"]), array("sort" => "asc"), Array("ID"=>696));
					if($ar_props = $db_props->Fetch())
					{
						$client_type_branch = intval($ar_props["VALUE"]);
					}
					if ($client_type_branch == 301)
					{
						if ((intval($_SESSION['CURRENT_BRANCH']) > 0) || (intval($_POST['branch']) > 0))
						{
							?>
							<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/client.tour.js"></script>
							<?
						}
						else
						{
							?>
							<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/client.tour.branch.js"></script>
							<?
						}
					}
					else
					{
						?>
						<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/client.tour.js"></script>
						<?
					}

				if (!strlen(trim($_SESSION['NAME_PANEL'])))
				{
					$db_props = CIBlockElement::GetProperty(40, intval($arUser["UF_COMPANY_RU_POST"]), array("sort" => "asc"), Array("ID"=>211));
					if($ar_props = $db_props->Fetch())
					{
						$comp_type = intval($ar_props["VALUE"]);
						if ($comp_type > 0)
						{
							if ($comp_type == 51)
							{
								$uk_id = intval($arUser["UF_COMPANY_RU_POST"]);
							}
							else
							{
								$db_props2 = CIBlockElement::GetProperty(40, intval($arUser["UF_COMPANY_RU_POST"]), array("sort" => "asc"), Array("ID"=>467));
								if($ar_props2 = $db_props2->Fetch())
								{
									$uk_id = intval($ar_props2["VALUE"]);
								}
							}
							if (intval($uk_id) > 0)
							{
								$db_props2 = CIBlockElement::GetProperty(40, intval($uk_id), array("sort" => "asc"), array("ID" => 474));
								if ($ar_props2 = $db_props2->Fetch())
								{
									$sets_id = intval($ar_props2["VALUE"]);
									if ($sets_id > 0)
									{
										$res = CIBlockElement::GetList(
											array("id" => "ASC"), 
											array("IBLOCK_ID"=>47,"ID" => $sets_id), 
											false, 
											false, 
											array("ID","PROPERTY_LOGO","PROPERTY_NAME_PANEL")
										);
										if($ob = $res->GetNextElement())
										{
											$arr = $ob->GetFields();
											if (strlen(trim($arr['PROPERTY_NAME_PANEL_VALUE'])))
											{
												$name_panel = trim($arr['PROPERTY_NAME_PANEL_VALUE']);
												$_SESSION['NAME_PANEL'] = $name_panel;
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		?>
	</head>
	<body>
    	<? $APPLICATION->ShowPanel(); ?>
    	<?$APPLICATION->IncludeComponent("bitrix:im.messenger", "", Array(), null, array("HIDE_ICONS" => "Y"));?>
    	<div class="container-fluid margntp">
    		<div class="navbar navbar-default">
				<div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Свернуть меню</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					<a class="navbar-brand" href="/"><?=$name_panel;?></a>
				</div>
				<div  id="navbar">
					<?
					$APPLICATION->IncludeComponent(
					"bitrix:menu", 
					"bootstrap_v4", 
					array(
					"ROOT_MENU_TYPE" => "top",
					"MENU_CACHE_TYPE" => "A",
					"MENU_CACHE_TIME" => "36000000",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_THEME" => "site",
					"CACHE_SELECTED_ITEMS" => "N",
					"MENU_CACHE_GET_VARS" => array(
					),
					"MAX_LEVEL" => "4",
					"CHILD_MENU_TYPE" => "left",
					"USE_EXT" => "Y",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N",
					"COMPONENT_TEMPLATE" => "bootstrap_v4",
					"COMPOSITE_FRAME_MODE" => "A",
					"COMPOSITE_FRAME_TYPE" => "AUTO"
					),
					false
					);
                    ?>  

				</div>
			</div>
            
            <div class="bs-docs-section">
            <? if ($USER->IsAuthorized()) : ?>
           <div class="row">
			   <div class="col-md-12">
				   <div class="alert alert-info alert-small text-center" role="alert">
					   <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong>Пользователи Личного Кабинета!</strong> Напоминаем: связь по <strong><i>техническим</i></strong> вопросам осуществляется в разделе <a href="/support/" class="alert-link">Техподдержка</a>, а также по почте <a href="mailto:help@newpartner.ru" class="alert-link">help@newpartner.ru</a>.
					</div>
				   <div class="alert alert-warning alert-small text-center" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> При возникновении проблем с преждевременным завершением сессии (форма ввода логина и пароля), рекомендуется очистить кеш и cookies в браузере, затем повторить авторизацию.
					</div>
				</div>
			</div>
  <? endif;?>