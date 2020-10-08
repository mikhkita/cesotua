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
<div class="b-article-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 371*2, "height" => 247*2), BX_RESIZE_IMAGE_PROPORTIONAL, false, false );

	?>
	<div class="b-article-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="b-img" style="background-image: url(<?=$img['src']?>)"></a>
		<div class="b-article-item-right">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><h2><?=$arItem["NAME"]?></h2></a>
			<div class="b-article-item-date"><?=getRusDate($arItem["DATE_CREATE"])?></div>
			<p><?=$arItem["PREVIEW_TEXT"]?></p>
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="read-more">
				<span class="read-more-text">Читать подробнее</span><span class="icon-arrow-next"></span>
			</a>
		</div>
	</div>
<?endforeach;?>
</div>
