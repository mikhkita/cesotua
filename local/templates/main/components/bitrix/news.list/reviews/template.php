<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>
<div class="b-review-list slider-cont">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 72*2, "height" => 72*2), BX_RESIZE_IMAGE_PROPORTIONAL, false, false );
	
	?>
	<div class="b-review-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="b-review-item-top">
			<div class="b-img" style="background-image: url(<?=$img['src']?>);"></div>
			<div class="b-review-item-name">
				<p class="name"><?=$arItem["NAME"]?></p>
				<?if(isset($arItem["SERVICE_INFO"])):?>
					<p class="service">Услуга: <a href="<?=$arItem["SERVICE_INFO"]["DETAIL_PAGE_URL"]?>"><?=$arItem["SERVICE_INFO"]["NAME"]?></a></p>
				<?endif;?>
			</div>
		</div>
		<div class="b-review-item-text">
			<p><?=$arItem["PREVIEW_TEXT"]?></p>
		</div>
		<a href="#b-popup-review" class="fancy read-more hide">
			<span class="read-more-text">Читать подробнее</span><span class="icon-arrow-next"></span>
		</a>
	</div>
<?endforeach;?>
</div>
<div class="center">
	<div class="b-slider-custom-nav">
		<div class="b-slider-custom-nav-slides">
			<span class="current">1</span><span class="count"></span>
		</div>
		<div class="b-slider-custom-nav-dots">
			
		</div>
	</div>
</div>
