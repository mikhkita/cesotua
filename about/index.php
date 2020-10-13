<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?>

<div class="b-about">
	<div class="b-block b-text">
		<p><?=includeArea("services-text");?></p>
	</div>

	<div class="b b-3">
		<div class="border-top-left"></div>
		<div class="b-back-dark blue"></div>
		<div class="b-block">
			<h2 class="b-title white"><?=includeArea("b-3-title");?></h2>
			<div class="b-advantage-list slider-cont mobile-slider">
				<div class="b-advantage-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/b-3-img-1.svg">
					<h3><?=includeArea("b-3-1-title");?></h3>
					<p><?=includeArea("b-3-1-text");?></p>
				</div>
				<div class="b-advantage-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/b-3-img-2.svg">
					<h3><?=includeArea("b-3-2-title");?></h3>
					<p><?=includeArea("b-3-2-text");?></p>
				</div>
				<div class="b-advantage-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/b-3-img-3.svg">
					<h3><?=includeArea("b-3-3-title");?></h3>
					<p><?=includeArea("b-3-3-text");?></p>
				</div>
			</div>
			<div class="center mobile-nav">
				<div class="b-slider-custom-nav white-nav">
					<div class="b-slider-custom-nav-slides">
						<span class="current">1</span><span class="count"></span>
					</div>
					<div class="b-slider-custom-nav-dots">
						
					</div>
				</div>
			</div>
		</div>
		<div class="border-bottom-left"></div>
	</div>

	<div class="b-block">
		<div class="b-pickup b-pickup-about">
			<?=includeArea("filter");?>
		</div>
	</div>

<div class="b-about-address">
	<div class="b-block">
		<h2 class="b-title">Наши автосалоны подержанных автомобилей</h2>
		<?
		$arFilter = Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, Array());
		?>
		<?while($ob = $res->GetNextElement()):?>
			<?
			$arFields = $ob->GetFields();
			$arProps = $ob->GetProperties();
			$img = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>371*2, 'height'=>247*2), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
			?>
			<div class="b-detail-address">
				<div class="b-detail-address-left" style="background-image: url(<?=$img['src']?>)"></div>
				<div class="b-detail-address-center">
					<a href="/contacts/#<?=$arFields['ID']?>" class="b-btn"><span>Смотреть на карте</span></a>
				</div>
				<div class="b-detail-address-right">
					<h3>«<?=$arFields["NAME"]?>»</h3>
					<ul>
						<li>
							<span class="contacts-icon contacts-icon-tip" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-tip.svg)"></span>
							<span class="b-contacts-item-text"><?=$arProps["ADDRESS"]["VALUE"]?></span></li>
						<li>
							<span class="contacts-icon contacts-icon-phone" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-phone.svg)"></span>
							<a href="tel:<?=preg_replace("/[^0-9+]/", '', $arProps["PHONE"]["VALUE"])?>" class="b-contacts-item-text"><?=$arProps["PHONE"]["VALUE"]?></a>
						</li>
						<li>
							<span class="contacts-icon contacts-icon-mail" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-mail.svg)"></span>
							<a href="mailto:<?=$arProps["EMAIL"]["VALUE"]?>" class="b-contacts-item-text b-contacts-email"><?=$arProps["EMAIL"]["VALUE"]?></a>
						</li>
						<li>
							<span class="contacts-icon contacts-icon-time" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-time.svg)"></span>
							<span class="b-contacts-item-text"><?=$arProps["TIME"]["VALUE"]?></span>
						</li>
					</ul>
				</div>
				<div class="b-detail-address-mobile">

				</div>
			</div>
		<?endwhile;?>
	</div>
</div>


</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>