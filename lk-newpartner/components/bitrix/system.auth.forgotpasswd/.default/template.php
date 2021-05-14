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
                	<h4><?=GetMessage("AUTH_GET_CHECK_STRING")?></h4>
                	<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="form-horizontal">
                    	<?
						if (strlen($arResult["BACKURL"]) > 0)
						{
							?>
							<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
							<?
						}
						?>
                        <input type="hidden" name="AUTH_FORM" value="Y">
						<input type="hidden" name="TYPE" value="SEND_PWD">
                        <p><?=GetMessage("AUTH_FORGOT_PASSWORD_1")?></p>
                        <div class="form-group">
							<div class="row">
                            	<div class="col-md-8 col-md-offset-2">
                        			<label class="control-label"><?=GetMessage("AUTH_LOGIN")?></label>
                            		<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" class="form-control">
                            	</div>
                            </div>
                        </div>
						<p class="text-center"><?=GetMessage("AUTH_OR")?></p>
                        <div class="form-group">
							<div class="row">
                            	<div class="col-md-8 col-md-offset-2">
                        			<label class="control-label"><?=GetMessage("AUTH_EMAIL")?></label>
                            		<input type="text" name="USER_EMAIL" maxlength="255" class="form-control">
								</div>
							</div>
                        </div>
                        <div class="form-group">
                        	<div class="text-center">
                            	<input type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
			</div>
        </div>
	</div>
</div>

<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
