<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="teasersCarousel" class="carousel slide" data-ride="carousel">
	<?
    $i = 0;
	?>
	<ol class="carousel-indicators">
		<?foreach($arResult["ITEMS"] as $arItem):?>
        	<li data-target="#teasersCarousel" data-slide-to="<?=$i;?>" <?=($i==0) ? 'class="active"' : '';?>></li>
            <?
			$i++;
			?>
		<?endforeach;?>
	</ol>
    <?
    $i = 0;
	?>
	<div class="carousel-inner" role="listbox">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<div class="item <?=($i==0) ? 'active' : '';?>">
				<img src="<?=$arItem['DETAIL_PICTURE']['SRC']?>" alt="<?=$arItem['DETAIL_PICTURE']['DESCRIPTION']?>" class="img-responsive">
				<div class="container">
					<div class="carousel-caption"><span><?=$arItem['NAME']?></span><br><?=$arItem['PREVIEW_TEXT']?> </div>
				</div>
			</div>
            <?
			$i++;
			?>
        <?endforeach;?>
	</div>
	<a class="left carousel-control" href="#teasersCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"><?=GetMessage("PREV_BTN")?></span>
	</a>
	<a class="right carousel-control" href="#teasersCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"><?=GetMessage("NEXT_BTN")?></span>
	</a>
</div>




