<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
global $tel;
if (!empty($arResult)):?>
    <ul class="nav navbar-nav navbar-left">
        <?foreach($arResult as $arItem):
            if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
                continue;
            if ($arItem["PERMISSION"] > "D") :
                if($arItem["SELECTED"]):?>
                    <li class="active" <?=strlen($arItem["PARAMS"]["id"])? 'id="'.$arItem["PARAMS"]["id"].'"' : '';?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?else:?>
                    <li <?=strlen($arItem["PARAMS"]["id"])? 'id="'.$arItem["PARAMS"]["id"].'"' : '';?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?endif?>
            <?endif?>
        <?endforeach?>
		<li><a href="#"><?=$tel;?></a></li>
    </ul>
<?endif?>