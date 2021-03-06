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
<div class="b-useful-info-list slider-cont mobile-slider">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 271*2, "height" => 180*2), BX_RESIZE_IMAGE_PROPORTIONAL, false, false );

	?>

	<div class="b-useful-info-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="b-img" style="background-image: url(<?=$img['src']?>)">
			<div class="border-orange-div"></div>
			<div class="b-useful-read-more">Читать подробнее</div>
		</a>
		<div class="date"><?=getRusDate($arItem["DATE_CREATE"])?></div>
		<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><h4><?=$arItem["NAME"]?></h4></a>
		<p><?=$arItem["PREVIEW_TEXT"]?></p>
	</div>

<?endforeach;?>
</div>
<div class="center mobile-nav">
	<div class="b-slider-custom-nav">
		<div class="b-slider-custom-nav-slides">
			<span class="current">1</span><span class="count"></span>
		</div>
		<div class="b-slider-custom-nav-dots">
			
		</div>
	</div>
</div>
<div class="b-5-line"></div>
