<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="<?if(isset($arParams["IS_FOOTER"]) && $arParams["IS_FOOTER"] == "Y") echo "b-footer-menu"; else echo "b-menu-desktop";?>">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<li>
		<a href="<?=$arItem["LINK"]?>" class="<?if($arItem["SELECTED"]) echo 'selected';?>"><?=$arItem["TEXT"]?></a>
		<?if($arParams["IS_FOOTER"] != "Y" && $arItem["PARAMS"]["submenu"] == "Y"):?>
			<ul class="b-submenu">
				<?
				$arFilter = Array("IBLOCK_ID" => 6, "ACTIVE" => "Y");
				$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, Array());
				?>
				<?while($ob = $res->GetNextElement()):?>
					<?
					$arFields = $ob->GetFields();
					$arProps = $ob->GetProperties();
					?>
					<li><a href="<?=$arFields["DETAIL_PAGE_URL"]?>"><?
						if($arProps["TITLE_MENU"]["VALUE"]){
							echo $arProps["TITLE_MENU"]["VALUE"];
						}else{
							echo $arFields["NAME"];
						}
					?></a></li>
				<?endwhile;?>
			</ul>
		<?endif;?>
	</li>
	
<?endforeach?>

</ul>
<?endif?>