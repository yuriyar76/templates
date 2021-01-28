<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die(); 

if (strlen($arResult["strProfileError"]))
{
	?>
    <div class="alert alert-dismissable alert-danger"><?=$arResult["strProfileError"];?></div>
    <?
}

if ($arResult['DATA_SAVED'] == 'Y')
{
	?>
    <div class="alert alert-dismissable alert-success"><?=GetMessage('PROFILE_DATA_SAVED');?></div>
    <?
}
?>



<div class="row">
	<div class="col-md-4 col-md-offset-4">
    	<div class="well bs-component">
            <div class="row">
            	<div class="col-md-10 col-md-offset-1">
                	<h4><?=GetMessage('REG_SHOW_HIDE');?></h4>
                	<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" class="form-horizontal">
						<?=$arResult["BX_SESSION_CHECK"]?>
                        <input type="hidden" name="lang" value="<?=LANG?>" >
                        <input type="hidden" name="ID" value=<?=$arResult["ID"]?> >
                        <input type="hidden" name="PERSONAL_PROFESSION" value="<?=$arResult["arUser"]["PERSONAL_PROFESSION"]?>">
                        <input type="hidden" name="PERSONAL_WWW" value="<?=$arResult["arUser"]["PERSONAL_WWW"]?>">
                        <input type="hidden" name="PERSONAL_ICQ" value="<?=$arResult["arUser"]["PERSONAL_ICQ"]?>">
                        <input type="hidden" name="PERSONAL_GENDER" value="<?=$arResult["arUser"]["PERSONAL_GENDER"];?>">
                        <input type="hidden" name="PERSONAL_BIRTHDAY" value="<?=$arResult["arUser"]["PERSONAL_BIRTHDAY"];?>">
                        <input type="hidden" name="PERSONAL_FAX" value="<?=$arResult["arUser"]["PERSONAL_FAX"]?>">
                        <input type="hidden" name="PERSONAL_MOBILE" value="<?=$arResult["arUser"]["PERSONAL_MOBILE"]?>">
                        <input type="hidden" name="PERSONAL_PAGER" value="<?=$arResult["arUser"]["PERSONAL_PAGER"]?>">
                        <input type="hidden" name="PERSONAL_STATE" value="<?=$arResult["arUser"]["PERSONAL_STATE"]?>">
                        <input type="hidden" name="PERSONAL_CITY" value="<?=$arResult["arUser"]["PERSONAL_CITY"]?>">
                        <input type="hidden" name="PERSONAL_ZIP" value="<?=$arResult["arUser"]["PERSONAL_ZIP"]?>">
                        <input type="hidden" name="PERSONAL_STREET" value="<?=$arResult["arUser"]["PERSONAL_STREET"]?>">
                        <input type="hidden" name="PERSONAL_MAILBOX" value="<?=$arResult["arUser"]["PERSONAL_MAILBOX"]?>">
                        <input type="hidden" name="PERSONAL_NOTES" value="<?=$arResult["arUser"]["PERSONAL_NOTES"]?>">
                        
                        <input type="hidden" name="WORK_COMPANY" value="<?=$arResult["arUser"]["WORK_COMPANY"]?>">
                        <input type="hidden" name="WORK_WWW" value="<?=$arResult["arUser"]["WORK_WWW"]?>">
                        <input type="hidden" name="WORK_DEPARTMENT" value="<?=$arResult["arUser"]["WORK_DEPARTMENT"]?>">
                        <input type="hidden" name="WORK_POSITION" value="<?=$arResult["arUser"]["WORK_POSITION"]?>">
                        <input type="hidden" name="WORK_PROFILE" value="<?=$arResult["arUser"]["WORK_PROFILE"]?>">
                        <input type="hidden" name="WORK_PHONE" value="<?=$arResult["arUser"]["WORK_PHONE"]?>">
                        <input type="hidden" name="WORK_FAX" value="<?=$arResult["arUser"]["WORK_FAX"]?>">
                        <input type="hidden" name="WORK_PAGER" value="<?=$arResult["arUser"]["WORK_PAGER"]?>">
                        <input type="hidden" name="WORK_STATE" value="<?=$arResult["arUser"]["WORK_STATE"]?>">
                        <input type="hidden" name="WORK_CITY" value="<?=$arResult["arUser"]["WORK_CITY"]?>">
                        <input type="hidden" name="WORK_ZIP" value="<?=$arResult["arUser"]["WORK_ZIP"]?>">
                        <input type="hidden" name="WORK_STREET" value="<?=$arResult["arUser"]["WORK_STREET"]?>">
                        <input type="hidden" name="WORK_MAILBOX" value="<?=$arResult["arUser"]["WORK_MAILBOX"]?>">
                        <input type="hidden" name="WORK_NOTES" value="<?=$arResult["arUser"]["WORK_NOTES"]?>">
                        <div class="form-group">
                        	<label class="control-label"><?=GetMessage('NAME')?></label>
                            <input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" class="form-control">
                        </div>
						<div class="form-group">
                        	<label class="control-label"><?=GetMessage('LAST_NAME')?></label>
                            <input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" class="form-control">
                        </div>
						<div class="form-group">
                        	<label class="control-label"><?=GetMessage('SECOND_NAME')?></label>
                            <input type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" class="form-control">
                        </div>
						<div class="form-group">
                        	<label class="control-label"><?=GetMessage('EMAIL')?><?if($arResult["EMAIL_REQUIRED"]):?><span class="starrequired">*</span><?endif?></label>
                            <input type="text" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" class="form-control">
                        </div>
						<div class="form-group">
                        	<label class="control-label"><?=GetMessage('USER_PHONE')?></label>
                            <input type="text" name="PERSONAL_PHONE" maxlength="50" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>" class="form-control">
                        </div>
						<div class="form-group">
                        	<label class="control-label"><?=GetMessage('LOGIN')?><span class="starrequired">*</span></label>
                            <input type="text" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>" class="form-control">
                        </div>
                        <? if($arResult["arUser"]["EXTERNAL_AUTH_ID"] == ''):?>
                            <div class="form-group">
                                <label class="control-label"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
                                <input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input form-control">
                                <?if($arResult["SECURE_AUTH"]):?>
                                                <span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
                                                    <div class="bx-auth-secure-icon"></div>
                                                </span>
                                                <noscript>
                                                <span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
                                                    <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                                                </span>
                                                </noscript>
                                <script type="text/javascript">
                                document.getElementById('bx_auth_secure').style.display = 'inline-block';
                                </script>
                                
                                <?endif?>
                            </div>
							<div class="form-group">
                                <label class="control-label"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></label>
                                <input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" class="form-control">
                            </div>
                        <? endif; ?>
                        <div class="form-group">
                        	<input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>" class="btn btn-primary">&nbsp;&nbsp;
                            <input type="reset" value="<?=GetMessage('MAIN_RESET');?>" class="btn btn-default">
                        </div>
					</form>
                </div>
            </div>
        </div>
    </div><!--col-->
    <div class="col-md-3 col-md-offset-1">
    	<div class="well bs-component">
            <?$APPLICATION->IncludeComponent(
                "bitrix:subscribe.simple",
                "",
                Array(
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "N",
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_HIDDEN" => "N"
                )
            );?>
        </div><!--well->
    </div><!--col-->
</div><!--row-->