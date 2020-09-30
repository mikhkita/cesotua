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

if(count($arResult["ITEMS"])): ?>
	<div class="b-calc-checkboxes">
		<? foreach($arResult["ITEMS"] as $key => $arItem): ?>

			<? $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")); ?>
			<? $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>

			<label class="b-calc-checkbox-item b-radio-item">
				<input 
					type="radio" 
					name="bank" 
					value="<?=$arItem['ID']?>" 
					rate='<?=$arItem['CODE']?>' 
					<?= ($key == 0 ? 'checked' : '') ?> >
				<div class="b-checkbox-text">
					<span class="name"><?=$arItem['NAME']?></span>
					<span class="rate">Ставка: от <?=$arItem['CODE']?>%</span>
				</div>
			</label>
			
		<? endforeach; ?>
	</div>
<? endif; ?>