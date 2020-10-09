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



<div class="b-detail-content clearfix">
	<div class="b-detail-left">
		<?if(!empty($arResult["PROPERTIES"]["PHOTOS"]["VALUE"])):?>
			<div class="b-detail-photo-main">
				<?$i = 1;
				$popupPhoto = "";?>
				<?foreach ($arResult["PROPERTIES"]["PHOTOS"]["VALUE"] as $key => $value):?>
					<?
					$fullPhoto = CFile::ResizeImageGet($value, array('width'=>1920, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
					$mainPhoto = CFile::ResizeImageGet($value, array('width'=>565*1.5, 'height'=>434*1.5), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
					if($i == 1){
						$popupPhoto = $mainPhoto["src"];
					}
					?>
					<a href="<?=$fullPhoto['src']?>" data-fancybox="gallery" class="fancy-img b-detail-photo-main-item" data-id="<?=$i?>">
						<div class="b-img" style="background-image: url(<?=$mainPhoto['src']?>)"></div>
					</a>
					<?$i++;?>
				<?endforeach;?>
			</div>
			<div class="b-detail-photo-list clearfix">
				<?$i = 1;?>
				<?foreach ($arResult["PROPERTIES"]["PHOTOS"]["VALUE"] as $key => $value):?>
					<?
					$smallPhoto = CFile::ResizeImageGet($value, array('width'=>123*1.5, 'height'=>95*1.5), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
					?>
					<div class="b-detail-photo-list-item <?if($i == 1) echo 'active'?>" data-id="<?=$i?>">
						<div class="b-img" style="background-image: url(<?=$smallPhoto['src']?>)"></div>
					</div>
					<?$i++;?>
				<?endforeach;?>
			</div>
		<?else:?>
			<div class="b-detail-photo-empty">
				<div class="b-img"></div>
			</div>
		<?endif;?>
	</div>
	<div class="b-detail-right">
		<?if($arResult["PROPERTIES"]["PRICE"]["VALUE"]):?>
			<h2 class="icon-ruble"><?=convertPrice($arResult["PROPERTIES"]["PRICE"]["VALUE"]);?></h2>
		<?else:?>
			<p class="without-price">Уточните актуальную цену в 1 клик</p>
		<?endif;?>
		<div class="b-detail-buttons">
			<div class="b-detail-inspection">
				<?if($arResult["PROPERTIES"]["PRICE"]["VALUE"]):?>
					<a href="#b-popup-inspection" class="b-btn b-btn-inspection fancy" data-id="<?=$arResult['ID']?>"><span>Записаться на осмотр</span></a>
				<?else:?>
					<a href="#b-popup-inspection" class="b-btn b-btn-inspection specify fancy" data-id="<?=$arResult['ID']?>"><span>Уточнить цену</span></a>
				<?endif;?>
				<div style="display: none;" class="b-detail-inspection-info">
					<div class="b-catalog-item-img-cont">
						<?if($popupPhoto):?>
							<div class="b-catalog-item-img" style="background-image: url(<?=$popupPhoto?>);"></div>
						<?else:?>
							<div class="b-catalog-item-img b-img-empty"></div>
						<?endif;?>
					</div>
					<div class="b-catalog-item-info">
						<h4><?=$arResult["NAME"]?></h4>
						<p><?
							if($arResult["PROPERTIES"]["VOLUME"]["VALUE"]){
								echo $arResult["PROPERTIES"]["VOLUME"]["VALUE"]." л ";
							}
							if($arResult["PROPERTIES"]["CAPACITY"]["VALUE"]){
								echo "(".$arResult["PROPERTIES"]["CAPACITY"]["VALUE"]." л.c.), ";
							}
							if($arResult["PROPERTIES"]["ENGINE"]["VALUE"]){
								echo $arResult["PROPERTIES"]["ENGINE"]["VALUE"].", ";
							}
							if($arResult["PROPERTIES"]["TRANSMISSION"]["VALUE"]){
								echo $arResult["PROPERTIES"]["TRANSMISSION"]["VALUE"].", ";
							}
							if($arResult["PROPERTIES"]["DRIVE"]["VALUE"]){
								echo $arResult["PROPERTIES"]["DRIVE"]["VALUE"];
							}
						?></p>
						<div class="b-catalog-item-price">
							<?if($arResult["PROPERTIES"]["PRICE"]["VALUE"]):?>
								<div class="current-price icon-ruble"><?=convertPrice($arResult["PROPERTIES"]["PRICE"]["VALUE"])?></div>
							<?endif;?>
						</div>
					</div>
				</div>
			</div>
			<? if($arResult["PROPERTIES"]["PRICE"]["VALUE"]): ?>
			<a href="#b-popup-credit" class="pickup-car fancy b-detail-credit-btn">
				<span class="pickup-car-text">В кредит от <span id="start-credit-sum">5 340</span> в месяц</span>
				<span class="icon-arrow-right right"></span>
				<div class="border-orange-div"></div>
			</a>
			<? endif; ?>
		</div>
		<ul class="b-detail-characteristics">
			<?if($arResult["PROPERTIES"]["ENGINE"]["VALUE"]):?>
			<li>
				<span class="characteristic">Двигатель:</span>
				<?
				$volumeStr = "";
				$volume = $arResult["PROPERTIES"]["VOLUME"]["VALUE"];
				if($arResult["PROPERTIES"]["VOLUME"]["VALUE"]){
					$volume = $arResult["PROPERTIES"]["VOLUME"]["VALUE"];
					$volumeStr = ", ".$volume." л";
				}
				?>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["ENGINE"]["VALUE"].$volumeStr?></span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["CAPACITY"]["VALUE"]):?>
			<li>
				<span class="characteristic">Мощность:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["CAPACITY"]["VALUE"]?> л.с.</span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["TRANSMISSION"]["VALUE"]):?>
			<li>
				<span class="characteristic">Трансмиссия:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["TRANSMISSION"]["VALUE"]?></span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["DRIVE"]["VALUE"]):?>
			<li>
				<span class="characteristic">Привод:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["DRIVE"]["VALUE"]?></span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["BODY"]["VALUE"]):?>
			<li>
				<span class="characteristic">Тип кузова:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["BODY"]["VALUE"]?></span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["COLOR"]["VALUE"]):?>
			<li>
				<span class="characteristic">Цвет:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["COLOR"]["VALUE"]?></span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["MILEAGE"]["VALUE"]):?>
			<li>
				<span class="characteristic">Пробег:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["MILEAGE"]["VALUE"]?> км</span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["RUDDER"]["VALUE"]):?>
			<li>
				<span class="characteristic">Руль:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["RUDDER"]["VALUE"]?></span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["GEN"]["VALUE"]):?>
			<li>
				<span class="characteristic">Поколение:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["GEN"]["VALUE"]?></span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["EQUIPMENT"]["VALUE"]):?>
			<li>
				<span class="characteristic">Комплектация:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["EQUIPMENT"]["VALUE"]?></span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["STEALINGS"]["VALUE"]):?>
			<li>
				<span class="characteristic">В розыске:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["STEALINGS"]["VALUE"]?></span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["RESTRICTIONS"]["VALUE"]):?>
			<li>
				<span class="characteristic">Ограничения:</span>
				<span class="characteristic-val"><?=$arResult["PROPERTIES"]["RESTRICTIONS"]["VALUE"]?></span>
			</li>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["OWNERSHIP"]["VALUE"]):?>
				<?
				$arOwnership = json_decode($arResult["PROPERTIES"]["OWNERSHIP"]["~VALUE"], true);
				$arText = array('запись', 'записи', 'записей');
				?>
				<?if(!empty($arOwnership) && $arOwnership["count"] > 0):?>
				<li>
					<span class="characteristic">Периоды регистрации:</span>
					<span class="characteristic-val"><a href="#" class="ownership-btn"><?=$arOwnership["count"]?> <?=declOfNum($arOwnership["count"], $arText)?></a></span>
					<div class="ownership-list">
						<?
						foreach ($arOwnership["items"] as $key => $value) {
							$dateStart = "с ".date('d.m.Y', strtotime($value["date"]["start"]));
							$dateEnd = "";
							if(isset($value["date"]["end"])){
								$dateEnd = " по ".date('d.m.Y', strtotime($value["date"]["end"]));
							}elseif(array_keys($arOwnership["items"])[count($arOwnership["items"])-1] == $key){//если это последний элемент
								$dateEnd = " по настоящее время";
							}
							$ownership = ($value["owner"]["type"] == "PERSON") ? "физ. лицо" : "юр. лицо";
							echo "<div class='ownership-item'>".$dateStart.$dateEnd.", ".$ownership."</div>";
						}
						?>
					</div>
				</li>
				<?endif;?>
			<?endif;?>
		</ul>
		<?if($arResult["PREVIEW_TEXT"]):?>
			<div class="b-detail-right-add">
				<p>Дополнительно:</p>
				<div class="b-text"><?=$arResult["PREVIEW_TEXT"];?></div>
			</div>
		<?endif;?>
	</div>
</div>

<?if($arResult["PROPERTIES"]["ADDRESS"]["VALUE"]):?>
	<?
	$arFilter = Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "ID" => $arResult["PROPERTIES"]["ADDRESS"]["VALUE"]);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), Array());
	?>
	<?if($ob = $res->GetNextElement()):?>
		<?
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		$img = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>371*2, 'height'=>247*2), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
		?>
		<h2 class="b-title">Автомобиль представлен в автосалоне</h2>
		<div class="b-detail-address">
			<div class="b-detail-address-left" style="background-image: url(<?=$img['src']?>)"></div>
			<div class="b-detail-address-center">
				<a href="/contacts/#<?=$arFields['ID']?>" class="b-btn"><span>Смотреть на карте</span></a>
			</div>
			<div class="b-detail-address-right">
				<h3>«<?=$arFields["NAME"]?>»</h3>
				<ul>
					<li>
						<span class="contacts-icon contacts-icon-tip" style="background-image: url(/local/templates/main/html/i/icon-tip.svg)"></span>
						<span class="b-contacts-item-text"><?=$arProps["ADDRESS"]["VALUE"]?></span></li>
					<li>
						<span class="contacts-icon contacts-icon-phone" style="background-image: url(/local/templates/main/html/i/icon-phone.svg)"></span>
						<a href="tel:<?=preg_replace("/[^0-9+]/", '', $arProps["PHONE"]["VALUE"])?>" class="b-contacts-item-text"><?=$arProps["PHONE"]["VALUE"]?></a>
					</li>
					<li>
						<span class="contacts-icon contacts-icon-mail" style="background-image: url(/local/templates/main/html/i/icon-mail.svg)"></span>
						<a href="mailto:<?=$arProps["EMAIL"]["VALUE"]?>" class="b-contacts-item-text b-contacts-email"><?=$arProps["EMAIL"]["VALUE"]?></a>
					</li>
					<li>
						<span class="contacts-icon contacts-icon-time" style="background-image: url(/local/templates/main/html/i/icon-time.svg)"></span>
						<span class="b-contacts-item-text"><?=$arProps["TIME"]["VALUE"]?></span>
					</li>
				</ul>
			</div>
			<div class="b-detail-address-mobile">

			</div>
		</div>
	<?endif;?>
<?endif;?>

<h2 class="b-title">Похожие автомобили</h2>
<?
$GLOBALS["arFilter"] = "";
$randSort = false;

if($arResult["PROPERTIES"]["PRICE"]["VALUE"]){

	$IDs = array();

	//Получить авто дороже
	$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE"=>"Y", "!ID" => $arResult["ID"], ">=PROPERTY_PRICE" => $arResult["PROPERTIES"]["PRICE"]["VALUE"]);
	$res = CIBlockElement::GetList(Array("property_PRICE" => "ASC"), $arFilter, false, Array("nPageSize"=>4), Array());
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		if($arFields["ID"] != $arResult["ID"]){
			$IDs[$arFields["ID"]] = $arProps["PRICE"]["VALUE"];
		}
	}
	//Получить авто дешевле
	$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE"=>"Y", "!ID" => $arResult["ID"], "<=PROPERTY_PRICE" => $arResult["PROPERTIES"]["PRICE"]["VALUE"]);
	$res = CIBlockElement::GetList(Array("property_PRICE" => "DESC"), $arFilter, false, Array("nPageSize"=>4), Array());
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		if($arFields["ID"] != $arResult["ID"]){
			$IDs[$arFields["ID"]] = $arProps["PRICE"]["VALUE"];
		}
	}

	function comparison($a, $b)
	{
	    if ($a == $b) {
	        return 0;
	    }
	    return ($a < $b) ? -1 : 1;
	}

	uasort($IDs, "comparison");
	$IDs = array_slice($IDs, 0, 4, TRUE);
	$IDs = array_keys($IDs);
	$GLOBALS["arFilter"] = array("ID" => $IDs);

}else{
	$randSort = true;
}
?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "main", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arFilter",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "1",	// Код информационного блока
		"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "4",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "YEAR",
			1 => "DATE_CHANGE",
			2 => "ENGINE",
			3 => "EQUIPMENT",
			4 => "TRANSMISSION",
			5 => "MARK",
			6 => "CAPACITY",
			7 => "VOLUME",
			8 => "GEN",
			9 => "DRIVE",
			10 => "MILEAGE",
			11 => "RUDDER",
			12 => "LINK_DROM",
			13 => "BODY",
			14 => "COLOR",
			15 => "PRICE",
			16 => "",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => ($randSort) ? "RAND" : "ID",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
	false
);?>

<div style="display: none;">
	<div class="b-popup b-popup-inspection" id="b-popup-credit">
		<form class="b-form" action="/send/calc-credit.php" method="POST">
			<div class="b-popup-top-padding">
				<h2>
					<span class="inspection-text">Заявка на кредит</span>
				</h2>
			</div>
			<div class="b-popup-inspection-auto">

			</div>
			<div class="b-popup-credit b-popup-top-padding">

				<div class="b-block-calc b-block-calc-sliders">
					<div class="b-calc-slider-block clearfix">
						<div class="b-calc-slider">
							<div class="b-calc-slider-top">
								<label for="sum">Первоначальный взнос</label>
								<div class="b-calc-input-cont icon-ruble">
									<input class="b-calc-input-rub slider-input" readonly type="text" id="sum" oninput="this.value = this.value.replace(/\D/g, '')" value="250 000" name="sum">
								</div>
							</div>
							<div class="b-slider-range" data-input-id="sum" data-range-from="50000" data-range-to="1000000"></div>
						</div>
					</div>
					<div class="b-calc-slider-block clearfix">
						<div class="b-calc-slider">
							<div class="b-calc-slider-top">
								<label for="date">Срок кредита</label>
								<div class="b-calc-input-cont b-calc-input-month-cont">
									<input class="b-calc-input-month slider-input" readonly type="text" id="date" oninput="this.value = this.value.replace(/\D/g, '')" value="4" name="loan-term"/>
									<span id="calc-month-text" class="bold"></span>
								</div>
							</div>
							<div class="b-slider-range" data-input-id="date" data-range-to="4"></div>
						</div>
					</div>
				</div>

				<div class="b-block-calc">
					<?$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"banks",
						Array(
							"ACTIVE_DATE_FORMAT" => "d.m.Y",
							"ADD_SECTIONS_CHAIN" => "Y",
							"AJAX_MODE" => "N",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "Y",
							"CACHE_FILTER" => "N",
							"CACHE_GROUPS" => "Y",
							"CACHE_TIME" => "36000000",
							"CACHE_TYPE" => "A",
							"CHECK_DATES" => "Y",
							"DETAIL_URL" => "",
							"DISPLAY_BOTTOM_PAGER" => "N",
							"DISPLAY_DATE" => "N",
							"DISPLAY_NAME" => "N",
							"DISPLAY_PICTURE" => "N",
							"DISPLAY_PREVIEW_TEXT" => "N",
							"DISPLAY_TOP_PAGER" => "N",
							"FIELD_CODE" => array("",""),
							"FILTER_NAME" => "",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"IBLOCK_ID" => "2",
							"IBLOCK_TYPE" => "content",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"INCLUDE_SUBSECTIONS" => "N",
							"MESSAGE_404" => "",
							"NEWS_COUNT" => "100",
							"PAGER_BASE_LINK_ENABLE" => "N",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "N",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_TEMPLATE" => ".default",
							"PAGER_TITLE" => "Новости",
							"PARENT_SECTION" => "",
							"PARENT_SECTION_CODE" => "",
							"PREVIEW_TRUNCATE_LEN" => "",
							"PROPERTY_CODE" => array("",""),
							"SET_BROWSER_TITLE" => "N",
							"SET_LAST_MODIFIED" => "N",
							"SET_META_DESCRIPTION" => "N",
							"SET_META_KEYWORDS" => "N",
							"SET_STATUS_404" => "N",
							"SET_TITLE" => "N",
							"SHOW_404" => "N",
							"SORT_BY1" => "ACTIVE_FROM",
							"SORT_BY2" => "SORT",
							"SORT_ORDER1" => "DESC",
							"SORT_ORDER2" => "ASC",
							"STRICT_SECTION_CHECK" => "N"
						)
					);?>
				</div>

				<div class="b-block-calc b-calc-result">
					<span class="calc-result-text">Ежемесячный платеж:</span>
					<span id="calc-sum" class="icon-ruble">7 460</span>
				</div>

			</div>
			<div class="b-popup-bottom-padding">
				<p class="b-popup-form-text">
					<span class="inspection-text">Заполните простую форму, продавец-консультант свяжется с вами и расскажет подробнее про покупку авто в кредит</span>
				</p>
				<div>
					<div class="b-input">
						<input type="text" name="name" placeholder="Ваше имя">
					</div>
					<div class="b-input">
						<input type="text" name="phone" placeholder="Ваш телефон" required>
					</div>
				</div>
				<input type="text" name="MAIL" required placeholder="Ваш e-mail">
				<input type="hidden" name="autoID" value="<?=$arResult['ID']?>">
				<input type="hidden" name="autoName" value="<?=$arResult['NAME']?>">
				<input type="hidden" name="autoPrice" value="<?=convertPrice($arResult["PROPERTIES"]["PRICE"]["VALUE"])?>">
				<input type="hidden" id="monthly-payment" name="monthlyPayment">
				<div class="center">
					<div class="ajax-wrap">
						<a href="#" class="b-btn ajax">
							<span class="inspection-text">Оставить заявку</span>
						</a>
						<div class="ajax-preloader"></div>
					</div>
					<div class="b-checkbox">
						<input id="b-6-inspection-checkbox" type="checkbox" name="politics" checked required>
						<label for="b-6-inspection-checkbox">
							<div class="b-checked icon-checked"></div>
							<p>Я принимаю условия передачи информации</p>
						</label>
					</div>
				</div>
				<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
			</div>
		</form>
	</div>
</div>

