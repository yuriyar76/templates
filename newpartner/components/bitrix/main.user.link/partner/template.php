<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="user_info">
	<?
    if(strlen($arResult["FatalError"])>0)
    {
        ?>
        <span class='errortext'><?=$arResult["FatalError"]?></span><br /><br />
        <?
    }
    else
    {
		$anchor_id = RandString(8);
		if (strlen($arResult["User"]["DETAIL_URL"]) > 0 && $arResult["CurrentUserPerms"]["Operations"]["viewprofile"]):	
			?>
            <table cellspacing="0" cellpadding="0" border="0" id="anchor_<?=$anchor_id?>" class="bx-user-info-anchor"><?
		else:
			?>
            <table cellspacing="0" cellpadding="0" border="0" id="anchor_<?=$anchor_id?>" class="bx-user-info-anchor-nolink"><?
		endif;
			?>
				<tr>
					<?
					if ($arParams["USE_THUMBNAIL_LIST"] == "Y"):
						?>
						<td class="bx-user-info-anchor-cell" rowspan="2">
                        	<div class="bx-user-info-thumbnail" align="center" valign="middle" <?if (intval($arParams["THUMBNAIL_LIST_SIZE"]) > 0): echo 'style="width: '.intval($arParams["THUMBNAIL_LIST_SIZE"]).'px; height: '.intval($arParams["THUMBNAIL_LIST_SIZE"]+2).'px;"'; endif;?>>
                <? if (strlen($arResult["User"]["HREF"]) > 0):?>
                    <a href="<?=$arResult["User"]["HREF"]?>"<?=($arParams["SEO_USER"] == "Y" ? ' rel="nofollow"' : '')?>><?=$arResult["User"]["PersonalPhotoImgThumbnail"]?></a>
                <? elseif (strlen($arResult["User"]["DETAIL_URL"]) > 0 && $arResult["CurrentUserPerms"]["Operations"]["viewprofile"]):?>
                    <a href="<?=$arResult["User"]["DETAIL_URL"]?>"<?=($arParams["SEO_USER"] == "Y" ? ' rel="nofollow"' : '')?>><?=$arResult["User"]["PersonalPhotoImgThumbnail"]?></a>
                <?else:?>
                    <?=$arResult["User"]["PersonalPhotoImgThumbnail"]?>
                <?endif?>
                </div></td>
            <? endif; ?>
            <td class="bx-user-info-anchor-cell" valign="top">

              
				<a href="/partner/"><?=$arResult["User"]["NAME_FORMATTED"]?></a>


            </td>
            </tr>
            <tr>
            	<td class="bx-user-info-anchor-cell"><a href="/partner/index.php?logout=yes">Выйти</a></td>
            </tr>
            </table>
            <?

    }
    
    ?>
</div>
<br class="clear">