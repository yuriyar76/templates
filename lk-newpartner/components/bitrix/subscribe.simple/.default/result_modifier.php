<?php
CModule::IncludeModule("iblock");
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();
$agent_id = intval($arUser["UF_COMPANY_RU_POST"]);
$db_props = CIBlockElement::GetProperty(40, $agent_id, array("sort" => "asc"), Array("CODE"=>"TYPE"));
if($ar_props = $db_props->Fetch())
    $arResult['AGENT_TYPE'] = $ar_props["VALUE"];
else
    $arResult['AGENT_TYPE'] = false;
?>