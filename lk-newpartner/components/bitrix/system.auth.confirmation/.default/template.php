<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if ($arResult["MESSAGE_CODE"] == "E02")
{
	?>
    <div class="alert alert-dismissable alert-success"><?=$arResult["MESSAGE_TEXT"];?></div>
    <?
}
else
{
	?>
    <div class="alert alert-dismissable alert-danger"><?=$arResult["MESSAGE_TEXT"];?></div>
    <?
}
?>
<?//here you can place your own messages
	switch($arResult["MESSAGE_CODE"])
	{
	case "E01":
		?><? //When user not found
		break;
	case "E02":
		?><? //User was successfully authorized after confirmation
		break;
	case "E03":
		?><? //User already confirm his registration
		break;
	case "E04":
		?><? //Missed confirmation code
		break;
	case "E05":
		?><? //Confirmation code provided does not match stored one
		break;
	case "E06":
		?><? //Confirmation was successfull
		break;
	case "E07":
		?><? //Some error occured during confirmation
		break;
	}
?>
<?if($arResult["SHOW_FORM"]):?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
    	<div class="well bs-component">
            <div class="row">
            	<div class="col-md-10 col-md-offset-1">
                	<h4>Подтверждение регистрации</h4>
                    <form method="post" action="<?=$arResult["FORM_ACTION"]?>" class="form-horizontal" name="form1">
                    	<div class="form-group">
                        	<label class="control-label"><?=GetMessage("CT_BSAC_LOGIN")?>:</label>
                            <input type="text" name="<?=$arParams["LOGIN"]?>" maxlength="50" value="<?=(strlen($arResult["LOGIN"]) > 0? $arResult["LOGIN"]: $arResult["USER"]["LOGIN"])?>" size="17" class="form-control">
                        </div>
                        <div class="form-group">
                        	<label class="control-label"><?=GetMessage("CT_BSAC_CONFIRM_CODE")?>:</label>
                            <input type="text" name="<?=$arParams["CONFIRM_CODE"]?>" maxlength="50" value="<?=$arResult["CONFIRM_CODE"]?>" size="17" class="form-control">
                        </div>
                        <div class="form-group">
                        	<input type="submit" value="<?echo GetMessage("CT_BSAC_CONFIRM")?>" class="btn btn-primary">
                            <input type="hidden" name="<?echo $arParams["USER_ID"]?>" value="<?echo $arResult["USER_ID"]?>" />
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>
<?elseif(!$USER->IsAuthorized()):?>
	<?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "", array());?>
<?endif?>