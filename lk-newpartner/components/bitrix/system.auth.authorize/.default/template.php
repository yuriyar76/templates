<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?
// ShowMessage($arParams["~AUTH_RESULT"]);
// ShowMessage($arResult['ERROR_MESSAGE']);

if ($arParams["~AUTH_RESULT"]["TYPE"] == "ERROR")
{
	?>
    <div class="alert alert-dismissable alert-danger"><?=$arParams["~AUTH_RESULT"]["MESSAGE"];?></div>
    <?
	if ((intval($USER->GetParam("UF_COMPANY_RU_POST")) == 0) && ($USER->IsAuthorized()))
	{
		LocalRedirect("/company/");
	}
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
	<div class="col-md-2 col-md-offset-5">
    	<div class="well bs-component">
        	<div class="row">
            	<div class="col-md-10 col-md-offset-1">
                    <form class="form-horizontal" name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
                        <input type="hidden" name="AUTH_FORM" value="Y" />
                        <input type="hidden" name="TYPE" value="AUTH" />
                        <?if (strlen($arResult["BACKURL"]) > 0):?>
                        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                        <?endif?>
                        <?foreach ($arResult["POST"] as $key => $value):?>
                        <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                        <?endforeach?>
                        <div class="form-group">
                            <label class="control-label"><?=GetMessage("AUTH_LOGIN")?></label>
                            <input class="bx-auth-input form-control" type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><?=GetMessage("AUTH_PASSWORD")?></label>
                            <input class="bx-auth-input form-control" type="password" name="USER_PASSWORD" maxlength="255" />
                            <?if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>
                                <noindex>
                                    <p class="text-right">
                                        <small>
                                            <a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
                                        </small>
                                    </p>
                                </noindex>
                            <?endif?>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                            <input type="submit" name="Login" value="<?=GetMessage("AUTH_AUTHORIZE")?>" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>

<script type="text/javascript">
<?if (strlen($arResult["LAST_LOGIN"])>0):?>
try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<? else:?>
try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>
</script>
