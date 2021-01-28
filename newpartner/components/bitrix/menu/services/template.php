<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?
$i = 0;
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<a class="article" href="<?=$arItem["LINK"]?>" id="article-<?=$i;?>">
<h3><?=$arItem["TEXT"]?></h3>
<?=$arItem["PARAMS"]["PAGE_PREVIEW"];?>
</a>
	<?
	$i++;
	?>
<?endforeach?>


<?endif?>