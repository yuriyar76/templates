<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<blockquote>
<p><?=$arItem['PREVIEW_TEXT']?></p>
<footer><?=$arItem['NAME']?>, <?=substr($arItem['ACTIVE_FROM'],0,10)?></footer>
</blockquote>
<?endforeach;?>

