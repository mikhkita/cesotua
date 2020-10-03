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

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 371*2, "height" => 247*2), BX_RESIZE_IMAGE_PROPORTIONAL, false, false );
	?>
	<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-contacts-item clearfix">
		<div id="<?=$arItem['ID']?>">
			<div class="b-contacts-item-left">
				<h3>«<?=$arItem["NAME"]?>»</h3>
				<div class="b-img" style="background-image: url(<?=$img['src']?>)">
					<div class="border-orange-div"></div>
				</div>
				<ul>
					<li>
						<span class="contacts-icon contacts-icon-tip" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-tip.svg)"></span>
						<span class="b-contacts-item-text"><?=$arItem["PROPERTIES"]["ADDRESS"]["VALUE"]?></span></li>
					<li>
						<span class="contacts-icon contacts-icon-phone" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-phone.svg)"></span>
						<a href="tel:+73822999003" class="b-contacts-item-text"><?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?></a>
					</li>
					<li>
						<span class="contacts-icon contacts-icon-mail" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-mail.svg)"></span>
						<a href="mailto:<?=$arItem["PROPERTIES"]["EMAIL"]["VALUE"]?>" class="b-contacts-item-text b-contacts-email"><?=$arItem["PROPERTIES"]["EMAIL"]["VALUE"]?></a>
					</li>
					<li>
						<span class="contacts-icon contacts-icon-time" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-time.svg)"></span>
						<span class="b-contacts-item-text"><?=$arItem["PROPERTIES"]["TIME"]["VALUE"]?></span>
					</li>
				</ul>
			</div>
			<div class="b-contacts-item-right b-contacts-map" id="b-contacts-map-<?=$arItem['ID']?>" data-coords="<?=$arItem["PROPERTIES"]["COORDS"]["VALUE"]?>"></div>
		</div>
	</div>
<?endforeach;?>
