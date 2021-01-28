<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET;?>" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
<META NAME="ROBOTS" content="all">
<?$APPLICATION->ShowMeta("keywords")?>
<?$APPLICATION->ShowMeta("description")?>
<title><?$APPLICATION->ShowTitle()?></title>

<link rel="stylesheet" href="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/jquery-ui.css" type="text/css">
<?$APPLICATION->ShowCSS();?>
<?$APPLICATION->ShowHeadStrings()?>
<?$APPLICATION->ShowHeadScripts()?>
<?$APPLICATION->SetAdditionalCSS("/bitrix/templates/".SITE_TEMPLATE_ID."/layout.css");?>
<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/jquery.js"></script>
<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/jquery-ui-new.js"></script>
<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/jquery.maskedinput-1.2.2.js"></script>
<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/jquery.accordion.js"></script>
<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/jquery.cookie.js"></script>
<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/slider.js"></script>
<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/modal.js"></script>
<?
if (isset($_GET['modalWin']))
{
	$types = array('type1','type2','type3','type4','type5');
	$type_v = array();
	// $type_v['type1'][0] = "'http://delivery-russia.ru/forms/form2.php?page=newpartner.ru&step=2'";
	$type_v['type1'][0] = "'http://newpartner.ru/forms/form2.php?page=newpartner.ru&step=2&f001=".$_GET['f001']."'";
	$type_v['type1'][1] = "'number_nukl'";
	$type_v['type1'][2] = "'f001_2'";
	
	$type_v['type2'][0] = "'http://delivery-russia.ru/forms/form5.php?page=newpartner.ru&step=2'";
	$type_v['type2'][1] = "'number_city'";
	$type_v['type2'][2] = "'city_to'";
	$type_v['type3'][0] = "'http://delivery-russia.ru/forms/form4.php?page=newpartner.ru&step=2'";
	$type_v['type3'][1] = "'number_phone'";
	$type_v['type3'][2] = "'form_text_64'";
	$type_v['type4'][0] = "'http://delivery-russia.ru/forms/form3.php?page=newpartner.ru&step=2'";
	$type_v['type4'][1] = "'number_date'";
	$type_v['type4'][2] = "'form_text_53'";
	$type_v['type5'][0] = "'http://delivery-russia.ru/forms/form6.php?page=newpartner.ru&step=2'";
	$type_v['type5'][1] = "'email'";
	$type_v['type5'][2] = "'form_email_128'";
	if (in_array($_GET['type'],$types))
	{
		if ($_GET['type'] == 'type4')
		{
			$func = 'openMyModal_2';
		}
		else
		{
			$func = 'openMyModal_1';
		}
		?>
		<script>
			$(document).ready(function()
			{
				<?=$func;?>(<?=$type_v[$_GET['type']][0];?>,<?=$type_v[$_GET['type']][1];?>,<?=$type_v[$_GET['type']][2];?>);
			});
		</script>
		<?
	}
}
?>
<script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/scripts.js"></script>
</head>

<body id="<?=$APPLICATION->ShowProperty("SECTION_INDEX");?>">
<?  $APPLICATION->ShowPanel(); ?>
<div id="header">
	<a href="/" class="logo" id="index_m_m"><img src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/images/logo.png" width="237" height="66" alt="" /></a>
<div class="info" itemscope itemtype="http://schema.org/Organization">
<span itemprop="telephone"><span>+7 495</span> 663-99-18</span><br />
<span itemprop="email"><a href="mailto:info@newpartner.ru" target="_blank">info<span>@</span>newpartner.ru</a></span>
<!--end of .info--></div>

<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	".default",
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
<!--#header--></div>
<div class="outer">

<?
if ($APPLICATION->GetProperty("SECTION_INDEX") != 'user')
{
	?>
    <div id="draggable" class="ui-widget-content left_menu">
        <div id="accordion">
        
            <h3>Отследить отправление</h3>
            <div class="block_online" id="block_online_1">
            <form action="" method="get">
            <label for="">Номер накладной:</label> <input type="text" name="" value="" id="number_nukl"/>
            <input type="submit" name="" value="далее" onclick="openMyModal_1('http://newpartner.ru/forms/form2.php?page=newpartner.ru&step=2','number_nukl','f001'); return false;" />
            </form>
            </div>
            
            <h3>Рассчитать стоимость</h3>
            <div class="block_online last" id="block_online_2">
            <form action="/tools/count.php" method="post">
            <label for="">Город назначения:</label> <input type="text" name="city_to" value="" id="number_city"/>
            <input type="hidden" name="city_id" value="" id="number_city_id">
            <input type="hidden" name="weight" value="1">
            <input type="submit" name="" value="далее"/>
            </form>
            </div>
            
            <h3>Обратный звонок</h3>
            <div class="block_online" id="block_online_3">
            <form action="" method="get">
            <label for="number_phone">Номер телефона:</label> <input type="text" name="" value="" id="number_phone" class="maskphone"/>
            <input type="submit" name="" value="далее" onclick="openMyModal_1('http://delivery-russia.ru/forms/form4.php?page=newpartner.ru&step=2','number_phone','form_text_64'); return false;" />
            </form>
            </div>
            
            <h3>Заказать услугу</h3>
            <div class="block_online last" id="block_online_4">
            <form action="" method="get">
            <label for="number_date">Вызвать курьера на дату:</label> <input type="text" name="" value="" id="number_date" class="date_format"/>
            <input type="submit" name="" value="далее" onclick="openMyModal_2('http://delivery-russia.ru/forms/form3.php?page=newpartner.ru&step=2','number_date','form_text_53'); return false;" />
            </form>
            </div>
            
            <h3>Заключить договор</h3>
            <div class="block_online last" id="block_online_5">
            <form action="" method="get">
            <label for="number_date">E-mail:</label> <input type="text" name="" value="" id="email"/>
            <input type="submit" name="" value="далее" onclick="openMyModal_1('http://delivery-russia.ru/forms/form6.php?page=newpartner.ru&step=2','email','form_email_128'); return false;" />
            </form> 
            </div>
        
        </div>
        <div class="descr"><b>*</b>Зажмите левую кнопку мыши для перемещения панели</div>
    </div>
    <?
}
?>



<? /*echo ($APPLICATION->GetCurPage() == '/index.php') ? '<div id="pc1"></div><div id="pc2"></div><div id="pc3"></div>' : ''; */ ?>

<div class="in">

<? if (($APPLICATION->GetCurPage() == '/index.php') != 'index') {
	echo '<h1>';
	echo $APPLICATION->ShowTitle();
	echo '</h1>';
}
?>