<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
<div class="list-group noborder">
<?
foreach ($arResult as $arItem)
{
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
	?>
	<a href="<?=$arItem["LINK"]?>" class="list-group-item"><?=$arItem["TEXT"];?></a>
	<?
}
?>
</div>
<?endif?>