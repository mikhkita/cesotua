<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
CModule::IncludeModule("iblock");

$curPage = $APPLICATION->GetCurPage();
$urlArr = $GLOBALS["urlArr"] = explode("/", $curPage);
$GLOBALS["version"] = 21;

$GLOBALS["isMain"] = $isMain = ( $curPage == "/" )?true:false;
$GLOBALS["isCatalog"] = ($urlArr[1] == "catalog") && empty($urlArr[2]);
$GLOBALS["isAbout"] = ($urlArr[1] == "about") && empty($urlArr[2]);
$GLOBALS["isContacts"] = ($urlArr[1] == "contacts") && empty($urlArr[2]);
$GLOBALS["isPolicy"] = ($urlArr[1] == "policy") && empty($urlArr[2]);

$GLOBALS["isDetailArticle"] = ($urlArr[1] == "articles") && !empty($urlArr[2]);
$GLOBALS["isDetailCatalog"] = ($urlArr[1] == "catalog") && !empty($urlArr[2]);
$GLOBALS["isDetailServices"] = ($urlArr[1] == "services") && !empty($urlArr[2]);
$GLOBALS["is404"] = ($urlArr[1] == "404.php") || (ERROR_404 == "Y");

?>
<!DOCTYPE html>
<html>
<head>
	<title><?$APPLICATION->ShowTitle()?></title>

	<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?$APPLICATION->ShowHead();?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/reset.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/jquery.fancybox.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/slick.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/KitAnimate.css" type="text/css">
	<?/*if($GLOBALS["isMain"] && $GLOBALS["isCatalog"]):*/?>
		<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/framework7.bundle.css" type="text/css">
	<?/*endif;*/?>
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/html/css/layout.css?<?=$GLOBALS["version"]?>" type="text/css">

	<link rel="stylesheet" media="screen and (min-width: 768px) and (max-width: 1204px)" href="<?=SITE_TEMPLATE_PATH?>/html/css/layout-tablet.css?<?=$GLOBALS["version"]?>">
	<link rel="stylesheet" media="screen and (min-width: 240px) and (max-width: 767px)" href="<?=SITE_TEMPLATE_PATH?>/html/css/layout-mobile.css?<?=$GLOBALS["version"]?>">

	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/html/favicon/favicon-128.png" sizes="128x128" />
	<meta name="application-name" content=""/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="<?=SITE_TEMPLATE_PATH?>/html/favicon/mstile-144x144.png" />

	<!-- Begin LeadBack code {literal} -->
	<script>
	    var _emv = _emv || [];
	    _emv['campaign'] = 'cdb36ea731ecf2b06e14c37d';
	    
	    (function() {
	        var em = document.createElement('script'); em.type = 'text/javascript'; em.async = true;
	        em.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'leadback.ru/js/leadback.js';
	        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(em, s);
	    })();
	</script>
	<!-- End LeadBack code {/literal} -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-178921420-3"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-178921420-3');
	</script>

</head>

<body>

<?$APPLICATION->ShowPanel()?>
<div id="panel-menu" class="panel-menu slideout-menu slideout-menu-right">
	<div class="b-menu-mobile-window">
		<h2>Меню</h2>
		<div class="slideout-gray slideout-padding">
			<ul class="b-menu-mobile-list">
				
			</ul>
			<div class="slide-cont-list">
				<div class="slide-cont-overlay"></div>
			</div>
		</div>
		<div class="slideout-padding">
			<a href="tel:+73822999003" class="b-slideout-phone">+7 (3822) 999-003</a>
		</div>
		<div class="slideout-padding" style="padding-top: 0;">
			<a href="#b-get-credit" class="b-btn-mobile-credit fancy">Заявка на кредит</a>
			<a href="#b-rate-my-car" class="b-btn-mobile-appraisal fancy">Оценить авто</a>
		</div>
	</div>
</div>
<div id="panel-page" class="slideout-panel">
	<div class="b b-header <?if($GLOBALS["isMain"]) echo "b-header-main"; else echo "b-header-inner";?>">
		<div class="b-back-dark"></div>
		<div class="b-block">
			<div class="b-header-top clearfix">
				<a href="/" class="b-logo-cont">
					<div class="b-logo-head">
						<img src="<?=SITE_TEMPLATE_PATH?>/html/i/logo-car-1.svg" class="b-logo-car-1">
						<img src="<?=SITE_TEMPLATE_PATH?>/html/i/logo-car-2.svg" class="b-logo-car-2">
						<img src="<?=SITE_TEMPLATE_PATH?>/html/i/logo-car-3.svg" class="b-logo-car-3">
						<img src="<?=SITE_TEMPLATE_PATH?>/html/i/logo-car-4.svg" class="b-logo-car-4">
						<img src="<?=SITE_TEMPLATE_PATH?>/html/i/logo-car-5.svg" class="b-logo-car-5">
						<img src="<?=SITE_TEMPLATE_PATH?>/html/i/logo-car-6.svg" class="b-logo-car-6">
						<img src="<?=SITE_TEMPLATE_PATH?>/html/i/logo-car-7.svg" class="b-logo-car-7">
						<img src="<?=SITE_TEMPLATE_PATH?>/html/i/logo-car-8.svg" class="b-logo-car-8">
					</div>
					<div class="b-logo"></div>
				</a>
				<div class="b-menu-mobile">
					<span class="b-menu-button icon-menu"></span>
					<p>Меню</p>
				</div>
				<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
					"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
						"MENU_CACHE_TYPE" => "N",	// Тип кеширования
						"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
						"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
							0 => "",
						),
						"MAX_LEVEL" => "1",	// Уровень вложенности меню
						"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
						"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N",	// Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
						"IS_FOOTER" => "N"
					),
					false
				);?>
				<div class="b-header-right">
					<a href="tel:<?=includeAreaString("header-phone", true);?>" class="b-header-phone"><?=includeArea("header-phone");?></a>
				</div>
			</div>

			<?if($GLOBALS["isMain"]):?>
				<div class="b-header-content">
					<h1 class="b-title"><?$APPLICATION->ShowTitle(false);?></h1>
					<p><?=includeArea("header-text");?></p>
					<a href="/catalog/" class="pickup-car">
						<span class="pickup-car-text">Подобрать авто</span>
						<span class="icon-arrow-right right"></span>
						<div class="border-orange-div"></div>
					</a>
				</div>
				<div class="b-pickup border-orange">
					<?=includeArea("filter");?>
				</div>
			<?endif;?>
		</div>
		<div class="border-bottom-right"></div>
		<div class="border-orange-gradient">
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

	<div class="b-content <?if(!$GLOBALS["isMain"]) echo "b-content-inner";?>">
	<?if(!$GLOBALS["isMain"] && !$GLOBALS["is404"]):?>
		<div class="b-block">
			<?
				$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
					"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
					"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
					"START_FROM" => "0"	// Номер пункта, начиная с которого будет построена навигационная цепочка
				), false);
			?>
			<h1 class="b-title"><?$APPLICATION->ShowTitle(false);?><?if($GLOBALS["isDetailCatalog"]) echo " г. в Томске"?></h1>
		</div>
	<?endif;?>
