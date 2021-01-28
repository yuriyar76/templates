<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
$host = $_SERVER['DOCUMENT_ROOT'];
    $flag = false;
    global $USER;
    $user_id = $USER->GetID();
    if($USER->Authorize($user_id)){
        $arrGr = $USER->GetUserGroupArray();
        foreach($arrGr as $value){
           if($value==29){
                $flag = true;
                break;
            }
        }
        if($flag){
            if(preg_match('/client\.newpartner\.ru$/', $host )) {
                LocalRedirect('https://newpartner.ru/customers-lk');
                exit;
            }elseif (preg_match('/agent\.newpartner\.ru$/', $host )){
                LocalRedirect('https://newpartner.ru/customers-lk');
                exit;
            }
        }
  }

?>
<!DOCTYPE html>
<html lang="ru">
<!--личный кабинет newpartner.ru-->
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
    <!--fontawesome-->
    <link href="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>//fontawesome/css/all.css" rel="stylesheet">
    <?$APPLICATION->ShowCSS();?>
    <?$APPLICATION->ShowHeadStrings()?>
    <?//$APPLICATION->ShowHeadScripts()?>
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

    <script type="text/javascript" src="/bitrix/templates/print/jquery-barcode.js"></script>
    <script type="text/javascript" src="/bitrix/templates/print/JsBarcode.code39.min.js"></script>

    <script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/invoice_custom.js"></script>
    <?$APPLICATION->ShowHeadScripts()?>
    <?
    $name_panel = 'Новый Партнер';
    if (strlen(trim($_SESSION['NAME_PANEL'])))
    {
        $name_panel = $_SESSION['NAME_PANEL'];
    }

    if ($USER->IsAuthorized())
    {


        $host = $_SERVER['HTTP_HOST'];
        if(preg_match('#^(www\.)?client\.#', $host)){
            $tel = "+7 495 663-99-18";
        }else{
            $tel = "+7 495 783-99-18";
        }

        $rsUser = CUser::GetByID($USER->GetID());
        $arUser = $rsUser->Fetch();
        if ((int)$arUser["UF_COMPANY_RU_POST"] == 0)
        {
        if (($_SERVER['HTTP_HOST'] == 'client.newpartner.ru')||($_SERVER['HTTP_HOST'] == 'www.client.newpartner.ru'))
        {
            ?>
            <script src="/bitrix/templates/<?=SITE_TEMPLATE_ID;?>/js/client.tour.start.js"></script>
        <?
        }

        }
        else
        {
        CModule::IncludeModule("iblock");
        if (($_SERVER['HTTP_HOST'] == 'client.newpartner.ru')||($_SERVER['HTTP_HOST'] == 'www.client.newpartner.ru'))
        {
        $client_type_branch = 300;
        $db_props = CIBlockElement::GetProperty(40, (int)$arUser["UF_COMPANY_RU_POST"], array("sort" => "asc"), Array("ID"=>696));
        if($ar_props = $db_props->Fetch())
        {
            $client_type_branch = (int)$ar_props["VALUE"];
        }
        if ($client_type_branch == 301)
        {
        if (((int)$_SESSION['CURRENT_BRANCH'] > 0) || ((int)$_POST['branch'] > 0))
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
        }
            if (!strlen(trim($_SESSION['NAME_PANEL'])))
            {
                $db_props = CIBlockElement::GetProperty(40, (int)$arUser["UF_COMPANY_RU_POST"], array("sort" => "asc"), Array("ID"=>211));
                if($ar_props = $db_props->Fetch())
                {
                    $comp_type = (int)$ar_props["VALUE"];
                    if ($comp_type > 0)
                    {
                        if ($comp_type == 51)
                        {
                            $uk_id = (int)$arUser["UF_COMPANY_RU_POST"];
                        }
                        else
                        {
                            $db_props2 = CIBlockElement::GetProperty(40, (int)$arUser["UF_COMPANY_RU_POST"], array("sort" => "asc"), Array("ID"=>467));
                            if($ar_props2 = $db_props2->Fetch())
                            {
                                $uk_id = (int)$ar_props2["VALUE"];
                            }
                        }
                        if ((int)$uk_id > 0)
                        {
                            $db_props2 = CIBlockElement::GetProperty(40, (int)$uk_id, array("sort" => "asc"), array("ID" => 474));
                            if ($ar_props2 = $db_props2->Fetch())
                            {
                                $sets_id = (int)$ar_props2["VALUE"];
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
<?

ini_set("soap.wsdl_cache_enabled", "0" );
ini_set("default_socket_timeout", "300");
include_once($_SERVER['DOCUMENT_ROOT']."/bitrix/components/black_mist/delivery.packages/functions.php");
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();
$agent_id = (int)$arUser["UF_COMPANY_RU_POST"];

if(empty($_SESSION['CURRENT_CLIENT'])){
    $current_client = $agent_id;
}else{
    $current_client = $_SESSION['CURRENT_CLIENT'];
}
if(!$current_client){
    $current_client = 0;
}
/* получить код партнера */
$uk_code = GetCompany($current_client);

/* if($USER->isAdmin()){

     dump($current_client);
     dump($uk_code['PROPERTY_UK_VALUE']);
 }*/
if(!empty($uk_code)){
    //$uk_code_id =  $uk_code['PROPERTY_UK_VALUE'];
    $uk_code_id = (int)trim($uk_code['PROPERTY_UK_VALUE']);
    if($USER->isAdmin()) {
        //dump($uk_code_id);
    }
    $currentport = (int)GetSettingValue(761, false, 2197189);

    $currentip = GetSettingValue(683, false, 2197189);

    if($USER->isAdmin()) {
       // dump($currentip);
    }

    $currentlink = GetSettingValue(704, false, 2197189);

    $login1c = GetSettingValue(705, false, 2197189);

    $pass1c = GetSettingValue(706, false, 2197189);
    if ($currentport > 0) {
        $url = "http://".$currentip.':'.$currentport.$currentlink;
        $client = new SoapClient($url, array('login' => $login1c,
            'password' => $pass1c,
            'proxy_host' => $currentip,
            'proxy_port' => $currentport,
            'exceptions' => false));
    }
    else {
        $url = "http://".$currentip.$currentlink;
        $client = new SoapClient($url,array('login' => $login1c,
            'password' => $pass1c,
            'exceptions' => false));
    }
    $db_props = CIBlockElement::GetProperty(40, $current_client,
        ["sort" => "asc"], ["CODE"=>"INN"]);
    if($ar_props = $db_props->Fetch())
    {
        $CURRENT_CLIENT_INN = $ar_props["VALUE"];
    }
    if(!empty($CURRENT_CLIENT_INN)){
        $arParamsJsonIdClient = array(
            'INN' =>  $CURRENT_CLIENT_INN,
        );
        $result = $client->GetClientInfo($arParamsJsonIdClient);
        $mResult = $result->return;
        $res = json_decode($mResult, true);
        $res=arFromUtfToWin($res);
        if(!empty($res['OverdueDebtSum'])){
            $DebtSum = (int) $res['OverdueDebtSum'];
        }
        if(!empty($res['LimitSumBalance'])){
            $LimitSum = (int) $res['LimitSumBalance'];
        }

        if(isset($res['СontractEndDate']) && !empty($res['СontractEndDate'])){
            $time = time();
            $ardate = explode('.',  $res['СontractEndDate']);
            $day = $ardate[0];
            $mes = $ardate[1];
            $year = $ardate[2];
            $dtime = mktime(24, 0, 0, $mes, $day, $year );
            if(($time-$dtime)>0){
                $_SESSION['СontractEndDate'] = $res['СontractEndDate'];
            }else{
                $_SESSION['СontractEndDate'] = false;
            }
         }

}

    if(isset($res['ClientsKod'])&&!empty($res['ClientsKod'])){
        $CURRENT_CLIENT_CODE_С = $res['ClientsKod'];
        $CURRENT_CLIENT_CODE_С = preg_replace('/[^0-9]/i','',  $CURRENT_CLIENT_CODE_С );
        $CURRENT_CLIENT_CODE_С = (int)$CURRENT_CLIENT_CODE_С;
    }
}
?>


<?$APPLICATION->IncludeComponent("bitrix:im.messenger", "", Array(), null, array("HIDE_ICONS" => "Y"));?>
<div class="container-fluid margntp ">
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
        <div class="navbar-collapse navbar-responsive-collapse collapse" id="navbar">
            <?
            if ($USER->IsAuthorized())
            {
                $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    ".default",
                    array(
                        "ROOT_MENU_TYPE" => "left_lk",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "0",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                );
            }
            ?>
            <ul class="nav navbar-nav navbar-right test1">
                <?
                if ($USER->IsAuthorized())
                {
                    if (($_SERVER['HTTP_HOST'] == 'client.newpartner.ru')||($_SERVER['HTTP_HOST'] == 'www.client.newpartner.ru')) :
                        ?>
                        <li id="SetHelpIcon"><a href="javascript:void(0);" onClick="StartTour();" data-toggle="tooltip" data-placement="bottom" title="Виртуальный тур"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a></li>
                        <li><a href="/upload/medialibrary/9d8/instruktsiya-lk-klienta-novyy-partner.pdf" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Инструкция по работе с ЛК"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></a></li>
                    <? endif; ?>
                    <li class="dropdown" id="user_menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$USER->GetFullName();?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/">Личный профиль</a></li>
                            <li id="company_profile_link"><a href="/company/">Профиль компании</a></li>
                            <li><a href="/account-settings/">Настройки</a></li>
                            <li class="divider"></li>
                            <li><a href="/index.php?logout=yes">Выйти</a></li>
                        </ul>
                    </li>
                    <?
                }
                else
                {
                    ?>
                    <li><a href="/index.php">Авторизация</a></li>
                    <li><a href="/registration.php">Регистрация</a></li>
                    <?
                }
                ?>
            </ul>
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
            <?if(isset($_SESSION['СontractEndDate']) && $_SESSION['СontractEndDate']!=false):?>
                <div class="row">
                    <div class="col-md-10">
                        <h2 style="color:red; font-size: 20px;">Срок договора истек <?=$_SESSION['СontractEndDate']?>. Функционал личного кабинета ограничен.</h2>
                    </div>
                </div>
            <?endif;?>
        <?if(!empty($CURRENT_CLIENT_CODE_С)):?>
            <div class="row">
                <div class="col-md-4">
                    <? if (($_SERVER['HTTP_HOST'] == 'client.newpartner.ru')||($_SERVER['HTTP_HOST'] == 'www.client.newpartner.ru')) :?>
                        <p>Ваш код Клиента - <span><?=$CURRENT_CLIENT_CODE_С;?></span></p>
                        <?if($DebtSum > 0):?>
                        <h4 style="color:orangered; font-weight: bold">Просим обратить внимание!</h4>
                        <p>Сумма просроченной задолженности составляет  <span style="color:orangered; font-weight: bold"><?=$DebtSum;?></span> руб. </p>
                        <?elseif($LimitSum > 0):?>
                            <h4 style="color:darkgreen; font-weight: bold">Просим обратить внимание!</h4>
                            <p>Остаток суммы по договору составляет  <span style="color:darkgreen; font-weight: bold"><?=$LimitSum;?></span> руб. </p>
                        <?elseif($LimitSum < 0):?>
                            <h4 style="color:orangered; font-weight: bold">Просим обратить внимание!</h4>
                            <p>Лимит исчерпан, сумма перерасхода <span style="color:orangered; font-weight: bold"><?=abs($LimitSum);?></span> руб. </p>
                        <?endif;?>
                    <?endif;?>
                    <? if (($_SERVER['HTTP_HOST'] == 'agent.newpartner.ru')||($_SERVER['HTTP_HOST'] == 'www.agent.newpartner.ru')) :?>
                        <p>Ваш код Агента - <span><?=$CURRENT_CLIENT_CODE_С;?></span></p>
                    <?endif;?>
                </div>
            </div>
        <?endif;?>
<? endif;?>

