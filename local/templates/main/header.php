<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
CModule::IncludeModule("iblock");

$curPage = $APPLICATION->GetCurPage();
$urlArr = $GLOBALS["urlArr"] = explode("/", $curPage);
$GLOBALS["version"] = 9;

$GLOBALS["isMain"] = $isMain = ( $curPage == "/" )?true:false;
$GLOBALS["isCatalog"] = ($urlArr[1] == "catalog") && empty($urlArr[2]);

$GLOBALS["isDetailArticle"] = ($urlArr[1] == "articles") && !empty($urlArr[2]);
$GLOBALS["isDetailCatalog"] = ($urlArr[1] == "catalog") && !empty($urlArr[2]);
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
					<h1><?=includeArea("header-h1");?></h1>
					<p><?=includeArea("header-text");?></p>
					<a href="/catalog/" class="pickup-car">
						<span class="pickup-car-text">Подобрать авто</span>
						<span class="icon-arrow-right right"></span>
						<div class="border-orange-div"></div>
					</a>
				</div>
				<div class="b-pickup border-orange">
					<?
					$cnt = CIBlockElement::GetList(
					    array(),
					    array("IBLOCK_ID" => 1, "ACTIVE" => "Y"),
					    array(),
					    false,
					    array('ID', 'NAME')
					);
					$arText1 = array('проверенный', 'проверенных', 'проверенных');
					$arText2 = array('автомобиль', 'автомобиля', 'автомобилей');
					?>
					<h2 class="center"><?=$cnt;?> <?=declOfNum($cnt, $arText1)?> <?=declOfNum($cnt, $arText2)?> в наличии</h2>

					<?$arEnums = getEnumsUnique();?>
					<form action="/catalog/" method="POST" class="b-pickup-form b-pickup-form-main">
						<input type="hidden" name="sort" value="PRICE_ASC">
						<input type="hidden" name="filter-applied" value="Y">
						<div class="b-select-list clearfix">
							<div class="b-select">
								<label>Марка</label>
								<select name="mark">
									<option value=""></option>
									<?foreach ($arEnums["MARK"] as $key => $value):?>
										<option value="<?=$key?>"><?=mb_ucfirst_custom($value)?></option>
									<?endforeach;?>
								</select>
							</div>
							<div class="b-select framework7-cont">
								<div class="b-input framework7-input">
									<input type="text" name="year" readonly>
									<label>Год выпуска</label>
								</div>
								<div class="b-select-div">
									<div class="b-select-div-name">Год выпуска</div>
									<div class="b-select-div-values hide">
										<span class="values-from-cont hide">от <span class="values-from"></span></span>
										<span class="values-to-cont hide"> до <span class="values-to"></span></span>
									</div>
								</div>
								<div class="b-select-drop-cont">
									<div class="b-select-drop">
										<div class="b-input b-select-drop-input">
											<input type="text" name="year-from" placeholder="от" class="input-number input-interval input-interval-from" maxlength="4">
										</div>
										<span class="drop-dash">-</span>
										<div class="b-input b-select-drop-input">
											<input type="text" name="year-to" placeholder="до" class="input-number input-interval input-interval-to" maxlength="4">
										</div>
										<span class="drop-value"> г.</span>
									</div>
								</div>
							</div>
							<div class="b-select mobile-filter framework7-cont">
								<div class="b-input framework7-input">
									<input type="text" name="capacity" readonly>
									<label>Мощность</label>
								</div>
								<div class="b-select-div">
									<div class="b-select-div-name">Мощность</div>
									<div class="b-select-div-values hide">
										<span class="values-from-cont hide">от <span class="values-from"></span></span>
										<span class="values-to-cont hide"> до <span class="values-to"></span></span>
									</div>
								</div>
								<div class="b-select-drop-cont">
									<div class="b-select-drop">
										<div class="b-input b-select-drop-input small">
											<input type="text" name="capacity-from" placeholder="от" class="input-number input-interval input-interval-from" maxlength="3">
										</div>
										<span class="drop-dash">-</span>
										<div class="b-input b-select-drop-input small">
											<input type="text" name="capacity-to" placeholder="до" class="input-number input-interval input-interval-to" maxlength="3">
										</div>
										<span class="drop-value"> л.с.</span>
									</div>
								</div>
							</div>
							<div class="b-select mobile-filter framework7-cont">
								<div class="b-input framework7-input">
									<input type="text" name="volume" readonly>
									<label>Объем</label>
								</div>
								<div class="b-select-div">
									<div class="b-select-div-name">Объем</div>
									<div class="b-select-div-values hide">
										<span class="values-from-cont hide">от <span class="values-from"></span></span>
										<span class="values-to-cont hide"> до <span class="values-to"></span></span>
									</div>
								</div>
								<div class="b-select-drop-cont">
									<div class="b-select-drop">
										<div class="b-input b-select-drop-input">
											<input type="text" name="volume-from" placeholder="от" class="input-number-volume input-interval input-interval-from" maxlength="5">
										</div>
										<span class="drop-dash">-</span>
										<div class="b-input b-select-drop-input">
											<input type="text" name="volume-to" placeholder="до" class="input-number-volume input-interval input-interval-to" maxlength="5">
										</div>
										<span class="drop-value"> л.</span>
									</div>
								</div>
							</div>
							<div class="b-select b-select-price">
								<div class="price-mobile-cont">
									<label>Стоимость</label>
									<input type="text" name="price-mobile-from" placeholder="Стоимость" class="price-mobile price-mobile-from">
									<span class="price-mobile-dash">-</span>
									<input type="text" name="price-mobile-to" placeholder="до" class="price-mobile price-mobile-to">
								</div>
								<div class="b-select-div">
									<div class="b-select-div-name">Цена</div>
									<div class="b-select-div-values hide">
										<span class="values-from-cont hide">от <span class="values-from"></span></span>
										<span class="values-to-cont hide"> до <span class="values-to"></span></span>
									</div>
								</div>
								<div class="b-select-drop-cont">
									<div class="b-select-drop">
										<div class="b-input b-select-drop-input-price">
											<span class="drop-from">от</span>
											<input type="text" name="price-from" class="input-number input-interval input-interval-from" placeholder="100000">
											<span class="drop-rub">руб.</span>
										</div>
										<div class="b-input b-select-drop-input-price">
											<span class="drop-from">до</span>
											<input type="text" name="price-to" class="input-number input-interval input-interval-to" placeholder="1000000">
											<span class="drop-rub">руб.</span>
										</div>
									</div>
								</div>
							</div>
							<div class="b-select mobile-filter">
								<label>КПП</label>
								<select name="transmission">
									<option value=""></option>
									<?foreach ($arEnums["TRANSMISSION"] as $key => $value):?>
										<option value="<?=$key?>"><?=mb_ucfirst_custom($value)?></option>
									<?endforeach;?>
								</select>
							</div>
							<div class="b-select mobile-filter">
								<label>Привод</label>
								<select name="drive">
									<option value=""></option>
									<?foreach ($arEnums["DRIVE"] as $key => $value):?>
										<option value="<?=$key?>"><?=mb_ucfirst_custom($value)?></option>
									<?endforeach;?>
								</select>
							</div>
							<div class="b-select mobile-filter">
								<label>Руль</label>
								<select name="rudder">
									<option value=""></option>
									<?foreach ($arEnums["RUDDER"] as $key => $value):?>
										<option value="<?=$key?>"><?=mb_ucfirst_custom($value)?></option>
									<?endforeach;?>
								</select>
							</div>
						</div>
						<div class="center b-pickup-form-bottom">
							<div class="pickup-right">
								<a href="#" class="b-btn-mobile-filter">
									<span class="filter-text-detail">Подробно</span>
									<span class="filter-text-turn hide">Свернуть</span>
								</a>
								<a href="#" class="b-btn-reset"><span class="icon-update"></span><span class="pickup-right-text">Сбросить фильтр</span></a>
							</div>
							<a href="#" class="b-btn b-btn-pickup b-btn-pickup-main"><span>Подобрать</span></a>
						</div>
					</form>
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
	<?if(!$GLOBALS["isMain"]):?>
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
