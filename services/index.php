<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Услуги автосалона подержанных автомобилей «Авто Дром»");
?>

<div class="b-services-page">
	<div class="b b-services-1">
		<div class="b-block b-text">
			<p><?=includeArea("services-text");?></p>
		</div>
		<div class="border-bottom-left"></div>
	</div>
	<div class="b b-2 b-services-2">
		<div class="b-block">
			<h2 class="b-title"><?=includeArea("services-2-title");?></h2>
			<h3 class="b-title"><?=includeArea("services-2-subtitle");?></h3>
			<div class="b-sale-list slider-cont mobile-slider">
				<div class="b-sale-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-1.svg">
					<h3><?=includeArea("services-sale-1-title");?></h3>
					<div class="b-sale-item-line"></div>
					<p><?=includeArea("services-sale-1-text");?></p>
				</div>
				<div class="b-sale-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-2.svg">
					<h3><?=includeArea("services-sale-2-title");?></h3>
					<div class="b-sale-item-line"></div>
					<p><?=includeArea("services-sale-2-text");?></p>
				</div>
				<div class="b-sale-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-3.svg">
					<h3><?=includeArea("services-sale-3-title");?></h3>
					<div class="b-sale-item-line"></div>
					<p><?=includeArea("services-sale-3-text");?></p>
				</div>
				<div class="b-sale-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-4.svg">
					<h3><?=includeArea("services-sale-4-title");?></h3>
					<div class="b-sale-item-line"></div>
					<p><?=includeArea("services-sale-4-text");?></p>
				</div>
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
		</div>
	</div>
	<div class="b b-3 b-services-3">
		<div class="border-top-left"></div>
		<div class="b-back-dark blue"></div>
		<div class="b-block">
			<h2 class="b-title white"><?=includeArea("services-3-title");?></h2>
			<h3 class="b-title white"><?=includeArea("services-3-subtitle");?></h3>
			<div class="b-advantage-list slider-cont mobile-slider">
				<div class="b-advantage-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/b-3-img-1.svg">
					<h3><?=includeArea("services-3-1");?></h3>
				</div>
				<div class="b-advantage-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/b-3-img-2.svg">
					<h3><?=includeArea("services-3-2");?></h3>
				</div>
				<div class="b-advantage-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/b-3-img-3.svg">
					<h3><?=includeArea("services-3-3");?></h3>
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
		<div class="border-orange-gradient top">
			<svg width="1600" height="87" viewBox="0 0 1600 87" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M0 60L1600 0V4L0 87V60Z" fill="url(#paint0_linear)"/>
				<defs>
					<linearGradient id="paint0_linear" x1="800" y1="-43.5" x2="790.567" y2="129.987" gradientUnits="userSpaceOnUse">
						<stop stop-color="#FFAB35"/>
						<stop offset="1" stop-color="#F16E2A"/>
					</linearGradient>
				</defs>
			</svg>
		</div>
	</div>

	<div class="b b-2 b-services-4" id="b-services-anchor">
		<div class="b-block">
			<h2 class="b-title"><?=includeArea("b-2-title");?></h2>
			<h3 class="b-title"><?=includeArea("b-2-subtitle");?></h3>
			<div class="b-sale-list slider-cont mobile-slider">
				<div class="b-sale-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-1.svg">
					<a href="/services/vykup-avto-v-kompanii-avtodrom-bystro-prosto-i-vygodno/"><h3><?=includeArea("b-2-1-title");?></h3></a>
					<div class="b-sale-item-line"></div>
					<p><?=includeArea("b-2-1-text");?></p>
				</div>
				<div class="b-sale-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-2.svg">
					<a href="/services/trade-in-v-salone-avtodrom-vozmozhnost-vygodnoy-pokupki/"><h3><?=includeArea("b-2-2-title");?></h3></a>
					<div class="b-sale-item-line"></div>
					<p><?=includeArea("b-2-2-text");?></p>
				</div>
				<div class="b-sale-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-3.svg">
					<a href="/services/komissiya-avto/"><h3><?=includeArea("b-2-3-title");?></h3></a>
					<div class="b-sale-item-line"></div>
					<p><?=includeArea("b-2-3-text");?></p>
				</div>
				<div class="b-sale-item">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-4.svg">
					<a href="/services/usluga-avtosalona-poderzhannykh-avtomobiley-onlayn-otsenka-avtomobiley/"><h3><?=includeArea("b-2-4-title");?></h3></a>
					<div class="b-sale-item-line"></div>
					<p><?=includeArea("b-2-4-text");?></p>
				</div>
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
		</div>
	</div>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>