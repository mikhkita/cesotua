<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<div class="b-detail">
	<div class="b-block">
		<?$APPLICATION->IncludeComponent("bitrix:news.detail", "main", Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
			"ADD_ELEMENT_CHAIN" => "Y",	// Включать название элемента в цепочку навигации
			"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
			"AJAX_MODE" => "N",	// Включить режим AJAX
			"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
			"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
			"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
			"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
			"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
			"CACHE_GROUPS" => "Y",	// Учитывать права доступа
			"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
			"CACHE_TYPE" => "A",	// Тип кеширования
			"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
			"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
			"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
			"DISPLAY_DATE" => "Y",	// Выводить дату элемента
			"DISPLAY_NAME" => "Y",	// Выводить название элемента
			"DISPLAY_PICTURE" => "Y",	// Выводить детальное изображение
			"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
			"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
			"ELEMENT_CODE" => "",	// Код новости
			"ELEMENT_ID" => $_REQUEST["ID"],	// ID новости
			"FIELD_CODE" => array(	// Поля
				0 => "ID",
				1 => "CODE",
				2 => "NAME",
				3 => "PREVIEW_TEXT",
				4 => "PREVIEW_PICTURE",
				5 => "",
			),
			"IBLOCK_ID" => "1",	// Код информационного блока
			"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
			"IBLOCK_URL" => "",	// URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
			"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
			"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
			"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
			"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
			"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
			"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
			"PAGER_TITLE" => "Страница",	// Название категорий
			"PROPERTY_CODE" => array(	// Свойства
				0 => "MARK",
				1 => "YEAR",
				2 => "CAPACITY",
				3 => "VOLUME",
				4 => "PRICE",
				5 => "TRANSMISSION",
				6 => "DRIVE",
				7 => "RUDDER",
				8 => "BODY",
				9 => "DATE_CHANGE",
				10 => "ENGINE",
				11 => "COLOR",
				12 => "MILEAGE",
				13 => "GEN",
				14 => "EQUIPMENT",
				15 => "PHOTOS",
				16 => "VIN",
				17 => "STEALINGS",
				18 => "RESTRICTIONS",
				19 => "OWNERSHIP",
			),
			"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
			"SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
			"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
			"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
			"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
			"SET_STATUS_404" => "N",	// Устанавливать статус 404
			"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
			"SHOW_404" => "N",	// Показ специальной страницы
			"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа элемента
			"USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
			"USE_SHARE" => "N",	// Отображать панель соц. закладок
		),
		false
	);?>

	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>