<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$APPLICATION->AddHeadScript($this->GetFolder() . '/script.js');
?>
<?=ShowError($arResult["ERROR_MESSAGE"]);?>

<h2 class="partner">
	<?if (empty($arResult["TICKET"])):?>
		<?=GetMessage("SUP_NEW");?>
	<?else:?>
    	<?=GetMessage("SUP_TITLE_NEW", array("#ID#" => $arResult["TICKET"]["ID"]));?>
	<?endif?>
</h2>


<?
/*$hkInst=CHotKeys::getInstance();
$arHK = array("B", "I", "U", "QUOTE", "CODE", "TRANSLIT");
foreach($arHK as $n => $s)
{		
	$arExecs = $hkInst->GetCodeByClassName("TICKET_EDIT_$s");
	echo $hkInst->PrintJSExecs($arExecs);
}*/

if (!empty($arResult["TICKET"])):
?>


<?
	if (!empty($arResult["ONLINE"]))
	{
?>
<p>
	<?$time = intval($arResult["OPTIONS"]["ONLINE_INTERVAL"]/60)." ".GetMessage("SUP_MIN");?>
	<?=str_replace("#TIME#",$time,GetMessage("SUP_USERS_ONLINE"));?>:<br />
	<?foreach($arResult["ONLINE"] as $arOnlineUser):?>
	<small>(<?=$arOnlineUser["USER_LOGIN"]?>) <?=$arOnlineUser["USER_NAME"]?> [<?=FormatDate($DB->DateFormatToPHP(CSite::GetDateFormat('FULL')), MakeTimeStamp($arOnlineUser["TIMESTAMP_X"]))?>]</small><br />
	<?endforeach?>
</p>
<?
	}
?>

<h3><?=$arResult["TICKET"]["TITLE"]?></h3>






<table class="table table-bordered">

	<tr>
		<th><?=GetMessage("SUP_TICKET")?></th>
	</tr>

	<tr>
		<td bgcolor="#fff">
		
		<?=GetMessage("SUP_SOURCE")." / ".GetMessage("SUP_FROM")?>:

			<?if (strlen($arResult["TICKET"]["SOURCE_NAME"])>0):?>
				[<?=$arResult["TICKET"]["SOURCE_NAME"]?>]
			<?else:?>
				[web]
			<?endif?>

			<?if (strlen($arResult["TICKET"]["OWNER_SID"])>0):?>
				<?=$arResult["TICKET"]["OWNER_SID"]?>
			<?endif?>

			<?if (intval($arResult["TICKET"]["OWNER_USER_ID"])>0):?>
				[<?=$arResult["TICKET"]["OWNER_USER_ID"]?>] 
				(<?=$arResult["TICKET"]["OWNER_LOGIN"]?>) 
				<?=$arResult["TICKET"]["OWNER_NAME"]?>
			<?endif?>
		<br />

		
		<?=GetMessage("SUP_CREATE")?>: <?=FormatDate($DB->DateFormatToPHP(CSite::GetDateFormat('FULL')), MakeTimeStamp($arResult["TICKET"]["DATE_CREATE"]))?>

		<?if (strlen($arResult["TICKET"]["CREATED_MODULE_NAME"])<=0 || $arResult["TICKET"]["CREATED_MODULE_NAME"]=="support"):?>
			[<?=$arResult["TICKET"]["CREATED_USER_ID"]?>] 
			(<?=$arResult["TICKET"]["CREATED_LOGIN"]?>) 
			<?=$arResult["TICKET"]["CREATED_NAME"]?>
		<?else:?>
			<?=$arResult["TICKET"]["CREATED_MODULE_NAME"]?>
		<?endif?>
		<br />

		
		<?if ($arResult["TICKET"]["DATE_CREATE"]!=$arResult["TICKET"]["TIMESTAMP_X"]):?>
				<?=GetMessage("SUP_TIMESTAMP")?>: <?=FormatDate($DB->DateFormatToPHP(CSite::GetDateFormat('FULL')), MakeTimeStamp($arResult["TICKET"]["TIMESTAMP_X"]))?>

				<?if (strlen($arResult["TICKET"]["MODIFIED_MODULE_NAME"])<=0 || $arResult["TICKET"]["MODIFIED_MODULE_NAME"]=="support"):?>
					[<?=$arResult["TICKET"]["MODIFIED_USER_ID"]?>] 
					(<?=$arResult["TICKET"]["MODIFIED_BY_LOGIN"]?>) 
					<?=$arResult["TICKET"]["MODIFIED_BY_NAME"]?>
				<?else:?>
					<?=$arResult["TICKET"]["MODIFIED_MODULE_NAME"]?>
				<?endif?>

				<br />
		<?endif?>

		
		<? if (strlen($arResult["TICKET"]["DATE_CLOSE"])>0): ?>
			<?=GetMessage("SUP_CLOSE")?>: <?=FormatDate($DB->DateFormatToPHP(CSite::GetDateFormat('FULL')), MakeTimeStamp($arResult["TICKET"]["DATE_CLOSE"]))?>
		<?endif?>

		
		<?if (strlen($arResult["TICKET"]["STATUS_NAME"])>0) :?>
				<?=GetMessage("SUP_STATUS")?>: <span title="<?=$arResult["TICKET"]["STATUS_DESC"]?>"><?=$arResult["TICKET"]["STATUS_NAME"]?></span><br />
		<?endif;?>

		
		<?if (strlen($arResult["TICKET"]["CATEGORY_NAME"]) > 0):?>
				<?=GetMessage("SUP_CATEGORY")?>: <span title="<?=$arResult["TICKET"]["CATEGORY_DESC"]?>"><?=$arResult["TICKET"]["CATEGORY_NAME"]?></span><br />
		<?endif?>

		
		<?if(strlen($arResult["TICKET"]["CRITICALITY_NAME"])>0) :?>
				<?=GetMessage("SUP_CRITICALITY")?>: <span title="<?=$arResult["TICKET"]["CRITICALITY_DESC"]?>"><?=$arResult["TICKET"]["CRITICALITY_NAME"]?></span><br />
		<?endif?>

		
		<?if (intval($arResult["TICKET"]["RESPONSIBLE_USER_ID"])>0):?>
			<?=GetMessage("SUP_RESPONSIBLE")?>: [<?=$arResult["TICKET"]["RESPONSIBLE_USER_ID"]?>]
			(<?=$arResult["TICKET"]["RESPONSIBLE_LOGIN"]?>) <?=$arResult["TICKET"]["RESPONSIBLE_NAME"]?><br />
		<?endif?>

		
		<?if (strlen($arResult["TICKET"]["SLA_NAME"])>0) :?>
			<?=GetMessage("SUP_SLA")?>: 
			<span title="<?=$arResult["TICKET"]["SLA_DESCRIPTION"]?>"><?=$arResult["TICKET"]["SLA_NAME"]?></span>
		<?endif?>


		</td>
	</tr>


	<tr>
		<th><?=GetMessage("SUP_DISCUSSION")?></th>
	</tr>


	<tr>
		<td>
	<?=$arResult["NAV_STRING"]?>

	<?foreach ($arResult["MESSAGES"] as $arMessage):?>
		<div class="ticket-edit-message">

		<div class="support-float-quote">[&nbsp;<a href="#postform" OnMouseDown="javascript:SupQuoteMessage('quotetd<? echo $arMessage["ID"]; ?>')" title="<?=GetMessage("SUP_QUOTE_LINK_DESCR");?>"><?echo GetMessage("SUP_QUOTE_LINK");?></a>&nbsp;]</div>

		
		<div align="left"><b><?=GetMessage("SUP_TIME")?></b>: <?=FormatDate($DB->DateFormatToPHP(CSite::GetDateFormat('FULL')), MakeTimeStamp($arMessage["DATE_CREATE"]))?></div>
		<b><?=GetMessage("SUP_FROM")?></b>:

		
		<?=$arMessage["OWNER_SID"]?>

		<?if (intval($arMessage["OWNER_USER_ID"])>0):?>
			[<?=$arMessage["OWNER_USER_ID"]?>] 
			(<?=$arMessage["OWNER_LOGIN"]?>) 
			<?=$arMessage["OWNER_NAME"]?>
		<?endif?>
		<br />

		
		<?
		$aImg = array("gif", "png", "jpg", "jpeg", "bmp");
		foreach ($arMessage["FILES"] as $arFile):
		?>
		<div class="support-paperclip"></div>
		<?if(in_array(strtolower(GetFileExtension($arFile["NAME"])), $aImg)):?>
			<a title="<?=GetMessage("SUP_VIEW_ALT")?>" href="<?=$componentPath?>/ticket_show_file.php?hash=<?echo $arFile["HASH"]?>&amp;lang=<?=LANG?>"><?=$arFile["NAME"]?></a> 
		<?else:?>
			<?=$arFile["NAME"]?>
		<?endif?>
		(<? echo CFile::FormatSize($arFile["FILE_SIZE"]); ?>)
		[ <a title="<?=str_replace("#FILE_NAME#", $arFile["NAME"], GetMessage("SUP_DOWNLOAD_ALT"))?>" href="<?=$componentPath?>/ticket_show_file.php?hash=<?=$arFile["HASH"]?>&amp;lang=<?=LANG?>&amp;action=download"><?=GetMessage("SUP_DOWNLOAD")?></a> ]
		<br class="clear" />
		<?endforeach?>

		
		<br /><div id="quotetd<? echo $arMessage["ID"]; ?>"><?=$arMessage["MESSAGE"]?></div>

		</div>
	<?endforeach?>

	<?=$arResult["NAV_STRING"]?>

		</td>

	</tr>
</table>



<br />
<?endif;?> 

<form name="support_edit" method="post" action="<?=$arResult["REAL_FILE_PATH"]?>" enctype="multipart/form-data" class="form-horizontal">
<?=bitrix_sessid_post()?>
<input type="hidden" name="set_default" value="Y" />
<input type="hidden" name="ID" value=<?=(empty($arResult["TICKET"]) ? 0 : $arResult["TICKET"]["ID"])?> />
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="edit" value="1" />


<div class="row">
	<div class="col-md-6 col-sm-12">
    	<div class="row">
        	<div class="col-lg-12">
            	<?if (empty($arResult["TICKET"])):?>
                	<div class="form-group">
                    	<label class="col-sm-3 control-label"><span class="starrequired">*</span><?=GetMessage("SUP_TITLE")?>:</label>
                        <div class="col-sm-9">
                        	<input type="text" name="TITLE" value="<?=htmlspecialcharsbx($_REQUEST["TITLE"])?>" size="48" maxlength="255" class="form-control" />
                        </div>
                    </div>
                <?else:?>
                	<h3><?=GetMessage("SUP_ANSWER")?></h3>
                <?endif?>
            </div>
        </div>
        <? if (strlen($arResult["TICKET"]["DATE_CLOSE"]) <= 0):?>
			<div class="row">
				<div class="col-xs-12">
                	<div class="form-group">
                    	<label class="col-sm-3 control-label"><span class="starrequired">*</span><?=GetMessage("SUP_MESSAGE")?>:</label>
                        <div class="col-sm-9">
                            <div class="btn-group" role="group" aria-label="...">
								<input accesskey="b" type="button" value="<?=GetMessage("SUP_B")?>" onClick="insert_tag('B', document.forms['support_edit'].elements['MESSAGE'])"  name="B" id="B" title="<? echo GetMessage("SUP_B_ALT"); ?>" class="btn btn-default" />
                                <input accesskey="i" type="button" value="<?=GetMessage("SUP_I")?>" onClick="insert_tag('I', document.forms['support_edit'].elements['MESSAGE'])" name="I" id="I" title="<? echo GetMessage("SUP_I_ALT"); ?>" class="btn btn-default" />
                                <input accesskey="u" type="button" value="<?=GetMessage("SUP_U")?>" onClick="insert_tag('U', document.forms['support_edit'].elements['MESSAGE'])" name="U" id="U" title="<? echo GetMessage("SUP_U_ALT"); ?>" class="btn btn-default" />
                                <input accesskey="q" type="button" value="<?=GetMessage("SUP_QUOTE")?>" onClick="insert_tag('QUOTE', document.forms['support_edit'].elements['MESSAGE'])" name="QUOTE" id="QUOTE" title="<? echo GetMessage("SUP_QUOTE_ALT"); ?>"  class="btn btn-default"/>
                                <input accesskey="c" type="button" value="<?=GetMessage("SUP_CODE")?>" onClick="insert_tag('CODE', document.forms['support_edit'].elements['MESSAGE'])" name="CODE" id="CODE" title="<? echo GetMessage("SUP_CODE_ALT");?>"  class="btn btn-default"/>
                                <?if (LANG == "ru"):?>
                                <input accesskey="t" type="button" accesskey="t" value="<?=GetMessage("SUP_TRANSLIT")?>" onClick="translit(document.forms['support_edit'].elements['MESSAGE'])" name="TRANSLIT" id="TRANSLIT" title="<? echo GetMessage("SUP_TRANSLIT_ALT"); ?>" class="btn btn-default" />
                                <?endif?>
                            </div>
                            <textarea name="MESSAGE" id="MESSAGE" rows="20" cols="45" wrap="virtual" class="form-control"><?=htmlspecialcharsbx($_REQUEST["MESSAGE"])?></textarea>
                        </div>
                    </div>
                </div>
            </div>
         	<div class="row">
            	<div class="col-xs-12">
                	<div class="form-group">
                    	<label class="col-sm-3 control-label">
							<?=GetMessage("SUP_ATTACH")?><br />
                            (max - <?=$arResult["OPTIONS"]["MAX_FILESIZE"]?> <?=GetMessage("SUP_KB")?>):
                            <input type="hidden" name="MAX_FILE_SIZE" value="<?=($arResult["OPTIONS"]["MAX_FILESIZE"]*1024)?>">
                        </label>
                        <div class="col-sm-9">
							<input name="FILE_0" size="30" type="file" /> <br />
                            <input name="FILE_1" size="30" type="file" /> <br />
                            <input name="FILE_2" size="30" type="file" /> <br />
                            <span id="files_table_2"></span>
                            <input type="button" value="<?=GetMessage("SUP_MORE")?>" OnClick="AddFileInput('<?=GetMessage("SUP_MORE")?>')" class="btn btn-default"/>
                            <input type="hidden" name="files_counter" id="files_counter" value="2" />
                        </div>
                    </div>
                </div>
            </div>   
        <? endif; ?>
        <div class="row">
        	<div class="col-xs-12">
            	<div class="form-group">
                	<label class="col-sm-3 control-label"><?=GetMessage("SUP_CRITICALITY")?>:</label>
                    <div class="col-sm-9">
						<?
						if (empty($arResult["TICKET"]) || strlen($arResult["ERROR_MESSAGE"]) > 0 )
						{
							if (strlen($arResult["DICTIONARY"]["CRITICALITY_DEFAULT"]) > 0 && strlen($arResult["ERROR_MESSAGE"]) <= 0)
								$criticality = $arResult["DICTIONARY"]["CRITICALITY_DEFAULT"];
							else
								$criticality = htmlspecialcharsbx($_REQUEST["CRITICALITY_ID"]);
						}
						else
							$criticality = $arResult["TICKET"]["CRITICALITY_ID"];
						?>
						<select name="CRITICALITY_ID" id="CRITICALITY_ID" class="form-control">
							<option value="">&nbsp;</option>
						<?foreach ($arResult["DICTIONARY"]["CRITICALITY"] as $value => $option):?>
							<option value="<?=$value?>" <?if($criticality == $value):?>selected="selected"<?endif?>><?=$option?></option>
						<?endforeach?>
						</select>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
        	<div class="col-xs-12">
            	<div class="form-group">
                    <?if (empty($arResult["TICKET"])):?>
                    	<label class="col-sm-3 control-label"><?=GetMessage("SUP_CATEGORY")?>:</label>
                        <div class="col-sm-9">
							<?
							if (strlen($arResult["DICTIONARY"]["CATEGORY_DEFAULT"]) > 0 && strlen($arResult["ERROR_MESSAGE"]) <= 0)
								$category = $arResult["DICTIONARY"]["CATEGORY_DEFAULT"];
							else
								$category = htmlspecialcharsbx($_REQUEST["CATEGORY_ID"]);
							?>
							<select name="CATEGORY_ID" id="CATEGORY_ID" class="form-control">
								<option value="">&nbsp;</option>
							<?foreach ($arResult["DICTIONARY"]["CATEGORY"] as $value => $option):?>
								<option value="<?=$value?>" <?if($category == $value):?>selected="selected"<?endif?>><?=$option?></option>
							<?endforeach?>
							</select>
                        </div>
                    <?else:?>
                    	<label class="col-sm-3 control-label"><?=GetMessage("SUP_MARK")?>:</label>
                        <div class="col-sm-9">
							<?$mark = (strlen($arResult["ERROR_MESSAGE"]) > 0 ? htmlspecialcharsbx($_REQUEST["MARK_ID"]) : $arResult["TICKET"]["MARK_ID"]);?>
                            <select name="MARK_ID" id="MARK_ID" class="form-control">
                                <option value="">&nbsp;</option>
                            <?foreach ($arResult["DICTIONARY"]["MARK"] as $value => $option):?>
                                <option value="<?=$value?>" <?if($mark == $value):?>selected="selected"<?endif?>><?=$option?></option>
                            <?endforeach?>
                            </select>
                        </div>
                    <?endif?>
        		</div>
			</div>
		</div>
		<div class="row">
        	<div class="col-xs-12">
            	<div class="form-group">
                	<div class="col-sm-offset-3 col-sm-9">
                        <?if (strlen($arResult["TICKET"]["DATE_CLOSE"])<=0):?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="CLOSE" value="Y" <?if($arResult["TICKET"]["CLOSE"] == "Y"):?>checked="checked" <?endif?>/> <?=GetMessage("SUP_CLOSE_TICKET")?>
                                </label>
                            </div>
                        <?else:?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="OPEN" value="Y" <?if($arResult["TICKET"]["OPEN"] == "Y"):?>checked="checked" <?endif?>/> <?=GetMessage("SUP_OPEN_TICKET")?>
                                </label>
                            </div>
                        <?endif;?>
                    </div>
                </div>
			</div>
		</div>
        <?if ($arParams['SHOW_COUPON_FIELD'] == 'Y' && $arParams['ID'] <= 0){?>
			<div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                    	<label class="col-sm-3 control-label"><?=GetMessage("SUP_COUPON")?>:</label>
                        <div class="col-sm-9">
                        	<input type="text" name="COUPON" value="<?=htmlspecialcharsbx($_REQUEST["COUPON"])?>" size="48" maxlength="255"  class="form-control"/>
                        </div>
                    </div>
				</div>
			</div>
        <?}?>
        
	<?
		global $USER_FIELD_MANAGER;
		if( isset( $arParams["SET_SHOW_USER_FIELD_T"] ) )
		{
			foreach( $arParams["SET_SHOW_USER_FIELD_T"] as $k => $v )
			{
				$v["ALL"]["VALUE"] = $arParams[$k];
				echo '
				<div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
				<label class="col-sm-3 control-label">' . htmlspecialcharsbx( $v["NAME_F"] ) . ':</label>
				<div class="col-sm-9">';
				$APPLICATION->IncludeComponent(
						'bitrix:system.field.edit',
						$v["ALL"]['USER_TYPE_ID'],
						array(
							'arUserField' => $v["ALL"],
						),
						null,
						array('HIDE_ICONS' => 'Y')
				);
				echo '</div>
				</div>
				</div>
				</div>';
			}
		}
	?>
    
    <div class="row">
       <div class="col-sm-offset-3 col-sm-9">
            <div class="btn-group" role="group" aria-label="...">
                <input type="submit" name="save" value="<?=GetMessage("SUP_SAVE")?>" class="btn btn-primary" />
                <input type="submit" name="apply" value="<?=GetMessage("SUP_APPLY")?>"  class="btn btn-default" />
                <input type="reset" value="<?=GetMessage("SUP_RESET")?>"  class="btn btn-default"/>
            </div>
            <input type="hidden" value="Y" name="apply" />
       </div>
    </div>
	<div class="row">
		<div class="col-sm-offset-3 col-sm-9">
        	<p><br><span class="starrequired">*</span><?=GetMessage("SUP_REQ")?><br></p>
		</div>
	</div>



    </div>
</div>


<script type="text/javascript">
BX.ready(function(){
	var buttons = BX.findChildren(document.forms['support_edit'], {attr:{type:'submit'}});
	for (i in buttons)
	{
		BX.bind(buttons[i], "click", function(e) {
			setTimeout(function(){
				var _buttons = BX.findChildren(document.forms['support_edit'], {attr:{type:'submit'}});
				for (j in _buttons)
				{
					_buttons[j].disabled = true;
				}

			}, 30);
		});
	}
});
</script>

</form>

