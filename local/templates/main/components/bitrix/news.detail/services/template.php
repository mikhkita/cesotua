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

<div class="b-services-detail">
	<div class="b b-services-1">
		<div class="b-block b-text">
			<p><?=$arResult["PREVIEW_TEXT"];?></p>
		</div>
		<div class="border-bottom-left"></div>
	</div>

	<?$APPLICATION->IncludeComponent(
	    "sprint.editor:blocks",
	    ".default",
	    Array(
	        "ELEMENT_ID" => $arResult["ID"],
	        "IBLOCK_ID" => $arResult["IBLOCK_ID"],
	        "PROPERTY_CODE" => "EDITOR",
	    ),
	    $component,
	    Array(
	        "HIDE_ICONS" => "Y"
	    )
	);?>
</div>

