<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-list-small" style="margin-left:-15px;">
	<h4><?=GetMessage("TITLE_NEWS_LIST_SMALL")?></h4>
    <?foreach($arResult["ITEMS"] as $arItem):
    ?>
        <div class="news-small">
            <div class="date"><?=$arItem['ACTIVE_FROM']?></div>
            <div class="title"><a href="/about/detail.php?ID=<?=$arItem['ID']?>"><?=$arItem['NAME']?></a></div>
            <div class="descr"><?=$arItem['PREVIEW_TEXT']?></div>
        </div>
    <?endforeach;?>
</div>
