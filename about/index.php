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

<div class="b b-1">
	<div class="b-block">
		<h2 class="b-title"><?=includeArea("b-1-title");?></h2>
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
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "1",	// Код информационного блока
		"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "8",	// Количество новостей на странице
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
		"SORT_BY1" => "ID",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
	false
);?>
		<div class="center">
			<a href="/catalog/" class="b-btn"><span>Смотреть все авто</span></a>
		</div>
	</div>
	<div class="border-bottom-left"></div>
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