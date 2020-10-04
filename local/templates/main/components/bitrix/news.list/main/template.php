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

<?if(isset($arParams["INCLUDE_SORT"]) && $arParams["INCLUDE_SORT"] == "Y"):?>
	<div class="b-catalog-sort">
		<p>Сортировка: </p>
		<div class="b-select">
			<select name="sort">
				<option value="PRICE_ASC" checked>По возрастанию цены</option>
				<option value="PRICE_DESC">По убыванию цены</option>
				<option value="YEAR_ASC">Сначала старые</option>
				<option value="YEAR_DESC">Сначала новые</option>
				<option value="MILEAGE_ASC">По возрастанию пробега</option>
				<option value="MILEAGE_DESC">По убыванию пробега</option>
			</select>
		</div>
	</div>
<?endif;?>
<div class="b-catalog-list clearfix">
	<div class="b-catalog-items" data-count="<?=count($arResult["ITEMS"])?>">
		<?if(count($arResult["ITEMS"])):?>
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				//print_r($arItem["PROPERTIES"]["PHOTOS"]);
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				$renderImage = CFile::ResizeImageGet($arItem["PROPERTIES"]["PHOTOS"]["VALUE"][0], Array("width" => 271*2, "height" => 205*2), BX_RESIZE_IMAGE_PROPORTIONAL, false, false );
				?>
				<div class="b-catalog-item <?if(!isset($arParams["SHOW_ANIMATION"]) || $arParams["SHOW_ANIMATION"] == "N") echo "show";?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="b-catalog-item-back"></div>
					<div class="b-catalog-item-content">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="b-catalog-item-info">
							<div class="b-catalog-item-img-cont">
								<?if(!$renderImage):?>
									<div class="b-catalog-item-img b-img-empty" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/car-empty.svg);"></div>
								<?else:?>
									<div class="b-catalog-item-img" style="background-image: url(<?=$renderImage['src']?>);"></div>
								<?endif;?>
							</div>
							<div class="b-catalog-item-info">
								<h4><?=$arItem["NAME"]?></h4>
								<p><?
									if($arItem["PROPERTIES"]["VOLUME"]["VALUE"]){
										echo $arItem["PROPERTIES"]["VOLUME"]["VALUE"]." л ";
									}
									if($arItem["PROPERTIES"]["CAPACITY"]["VALUE"]){
										echo "(".$arItem["PROPERTIES"]["CAPACITY"]["VALUE"]." л.c.), ";
									}
									if($arItem["PROPERTIES"]["ENGINE"]["VALUE"]){
										echo $arItem["PROPERTIES"]["ENGINE"]["VALUE"].", ";
									}
									if($arItem["PROPERTIES"]["TRANSMISSION"]["VALUE"]){
										echo $arItem["PROPERTIES"]["TRANSMISSION"]["VALUE"].", ";
									}
									if($arItem["PROPERTIES"]["DRIVE"]["VALUE"]){
										echo $arItem["PROPERTIES"]["DRIVE"]["VALUE"];
									}
								?></p>
								<div class="b-catalog-item-price">
									<?if($arItem["PROPERTIES"]["PRICE"]["VALUE"]):?>
										<div class="current-price icon-ruble"><?=convertPrice($arItem["PROPERTIES"]["PRICE"]["VALUE"])?></div>
									<?endif;?>
								</div>
							</div>
						</a>
						<a href="#b-popup-inspection" class="b-btn-inspection b-btn-tr fancy" data-id="<?=$arItem['ID']?>">Оставить заявку</a>
					</div>
				</div>
			<?endforeach;?>
		<?else:?>
			<div class="center">
				<p class="b-catalog-empty">Автомобили не найдены</p>
			</div>
		<?endif;?>
	</div>
	<?if(isset($arParams["INCLUDE_AJAX"]) && $arParams["INCLUDE_AJAX"] == "Y"):?>
		<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
            <?=$arResult["NAV_STRING"];?>
        <?endif;?>
	<?endif;?>
</div>
