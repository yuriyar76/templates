<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>
<h4><?=GetMessage('CT_BSS_TITLE');?></h4>
<?if(count($arResult["ERRORS"]) > 0):?>
	<?foreach($arResult["ERRORS"] as $strError):?>
		<div class="alert alert-dismissable alert-danger"><?echo $strError?></div>
	<?endforeach?>
	<?$this->setFrameMode(false);?>
<?elseif(count($arResult["RUBRICS"]) <= 0):?>
	<<div class="alert alert-dismissable alert-danger"><?echo GetMessage("CT_BSS_NO_RUBRICS_FOUND")?></div>
	<?$this->setFrameMode(false);?>
<?else:?>
	<?$frame=$this->createFrame()->begin();?>
	<?if($arResult["MESSAGE"]):?>
		<div class="alert alert-dismissable alert-success"><?echo $arResult["MESSAGE"]?></div>
	<?endif?>
	<form method="POST" action="<?echo $arResult["FORM_ACTION"]?>">
		 <div class="form-group">
					<?foreach($arResult["RUBRICS"] as $arRubric):
                        if (in_array($arRubric['ID'],$arParams['ID_HIDDENS'])) :
                            if (in_array($arResult['AGENT_TYPE'],$arParams['TYPES_TO_SHOW_HIDDEN'])) :
                            ?>
                            <div class="checkbox">
                                <label for="RUB_<?echo $arRubric["ID"]?>">
                                    <input name="RUB_ID[]" value="<?echo $arRubric["ID"]?>" id="RUB_<?echo $arRubric["ID"]?>" type="checkbox" <? if($arRubric["CHECKED"]) echo "checked";?>>
                                    <?echo $arRubric["NAME"]?>		
                                </label>
                            </div>
                            <?
                            endif;
                        else :
                        ?>
                    	<div class="checkbox">
                        	<label for="RUB_<?echo $arRubric["ID"]?>">
								<input name="RUB_ID[]" value="<?echo $arRubric["ID"]?>" id="RUB_<?echo $arRubric["ID"]?>" type="checkbox" <? if($arRubric["CHECKED"]) echo "checked";?>>
                                <?echo $arRubric["NAME"]?>		
							</label>
                        </div>
					<?
                        endif;
                        endforeach;
             ?>
        </div>
                    <div class="form-group">
						<input name="FORMAT" value="text" id="FORMAT_text" type="radio" <?if($arResult["FORMAT"] === "text") echo "checked";?>><label for="FORMAT_text"><?echo GetMessage("CT_BSS_TEXT")?></label>
					&nbsp;/&nbsp;
						<input name="FORMAT" value="html" id="FORMAT_html" type="radio" <?if($arResult["FORMAT"] === "html") echo "checked";?>><label for="FORMAT_html"><?echo GetMessage("CT_BSS_HTML")?></label>
                    </div>
					<?echo bitrix_sessid_post();?>
                    <div class="form-group">
						<input type="submit" name="Update" value="<?echo GetMessage("CT_BSS_FORM_BUTTON")?>"  class="btn btn-primary">
                    </div>

	</form>
	<?$frame->beginStub();?>
	<form method="POST" action="<?echo $arResult["FORM_ACTION"]?>">
		<table class="data-table">
			<tbody>
			<tr>
				<td>
					<?foreach($arResult["RUBRICS"] as $arRubric):?>
						<input name="RUB_ID[]" value="<?echo $arRubric["ID"]?>" id="RUB_<?echo $arRubric["ID"]?>" type="checkbox"><label for="RUB_<?echo $arRubric["ID"]?>"><?echo $arRubric["NAME"]?></label><br>
					<?endforeach?>
					<br>
					<input name="FORMAT" value="text" id="FORMAT_text" type="radio"><label for="FORMAT_text"><?echo GetMessage("CT_BSS_TEXT")?></label>
					&nbsp;/&nbsp;
					<input name="FORMAT" value="html" id="FORMAT_html" type="radio"><label for="FORMAT_html"><?echo GetMessage("CT_BSS_HTML")?></label>
				</td>
			</tr>
			</tbody>
			<tfoot>
			<tr>
				<td>
					<input type="submit" name="Update" value="<?echo GetMessage("CT_BSS_FORM_BUTTON")?>" class="btn btn-primary">
				</td>
			</tr>
			</tfoot>
		</table>
	</form>
	<?$frame->end();?>
<?endif?>
