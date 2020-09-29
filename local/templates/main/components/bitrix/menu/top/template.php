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
		<?if($arParams["IS_FOOTER"] != "Y" && $arItem["LINK"] == "/services/"):?>
			<ul class="b-submenu">
				<li><a href="#">Срочный выкуп авто</a></li>
				<li><a href="#">Trade-in</a></li>
				<li><a href="#">Помощь в продаже</a></li>
				<li><a href="#">Онлайн-оценка авто</a></li>
			</ul>
		<?endif;?>
	</li>
	
<?endforeach?>

</ul>
<?endif?>