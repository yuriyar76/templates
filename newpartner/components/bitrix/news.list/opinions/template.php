<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):
?>
<blockquote>
<p>
<?=$arItem['PREVIEW_TEXT']?> <strong><?=$arItem['NAME']?></strong>.</p>
<p class="date"><?=$arItem['ACTIVE_FROM']?></p>
</blockquote>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
