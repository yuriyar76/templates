<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// ShowMessage($arParams["~AUTH_RESULT"]);

if ($arParams["~AUTH_RESULT"]["TYPE"] == "ERROR")
{
	?>
    <div class="alert alert-dismissable alert-danger"><?=$arParams["~AUTH_RESULT"]["MESSAGE"];?></div>
    <?
}
elseif ($arParams["~AUTH_RESULT"]["TYPE"] == "OK")
{
	?>
    <div class="alert alert-dismissable alert-success"><?=$arParams["~AUTH_RESULT"]["MESSAGE"];?></div>
    <?
}
?>
<div class="page-header">&nbsp;</div>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
    	<div class="well bs-component">
        	<div class="row">
            	<div class="col-md-10 col-md-offset-1">
                    <h4><?=GetMessage("AUTH_CHANGE_PASSWORD")?></h4>
                    <form method="post" action="<?=$arResult["AUTH_FORM"]?>" name="bform">
                        <?if (strlen($arResult["BACKURL"]) > 0): ?>
                        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                        <? endif ?>
                        <input type="hidden" name="AUTH_FORM" value="Y">
                        <input type="hidden" name="TYPE" value="CHANGE_PWD">
                        
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label class="control-label"><?=GetMessage("AUTH_LOGIN")?><span class="starrequired">*</span></label>
                                    <input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" class="form-control" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label class="control-label"><?=GetMessage("AUTH_CHECKWORD")?><span class="starrequired">*</span></label>
                                    <input type="text" name="USER_CHECKWORD" maxlength="50" value="<?=$arResult["USER_CHECKWORD"]?>" class="form-control" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label class="control-label"><?=GetMessage("AUTH_NEW_PASSWORD_REQ")?><span class="starrequired">*</span></label>
                                    <input type="password" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>" class="form-control" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label class="control-label"><?=GetMessage("AUTH_NEW_PASSWORD_CONFIRM")?><span class="starrequired">*</span></label>
                                    <input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="form-control" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        
                        <?if($arResult["USE_CAPTCHA"]):?>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <label class="control-label"><?=GetMessage("system_auth_captcha")?><span class="starrequired">*</span></label>
                                    <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
                                    <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br>
                                    <input type="text" name="captcha_word" maxlength="50" value="" class="form-control" />
                                </div>
                            </div>
                        <?endif?>
                        
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group text-center">
                                    <input type="submit" name="change_pwd" value="<?=GetMessage("AUTH_CHANGE")?>" class="btn btn-primary" />
                                </div>
                            </div>
                        </div>
                        


                    <p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
                    <p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>
                    <p class="text-center">
                    <a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a>
                    </p>

                    </form>
                </div>
			</div>
        </div>
	</div>
</div>

<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
