<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>

<?
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");

if($arResult["bDescPageNumbering"] === true):
	$bFirst = true;
	if ($arResult["NavPageNomer"] > 1):
?>
		<div class="catalog-preloader"><img src="<?=SITE_TEMPLATE_PATH?>/html/i/preloader.svg"></div>
		<div style="opacity: 0; visibility: hidden;" id="b-btn-ajax-load" data-href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">Показать ещё</div>
<?
	endif; 
else:
	$bFirst = true;
	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
?>
		<div class="catalog-preloader"><img src="<?=SITE_TEMPLATE_PATH?>/html/i/preloader.svg"></div>
		<div style="opacity: 0; visibility: hidden;" id="b-btn-ajax-load" data-href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">Показать ещё</div>
	<?endif; ?>
<?endif; ?>