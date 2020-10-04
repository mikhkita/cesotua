<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "АвтоДром");
$APPLICATION->SetPageProperty("description", "АвтоДром");
$APPLICATION->SetTitle("АвтоДром");
?>

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

<div class="b b-2">
	<div class="b-block">
		<h2 class="b-title"><?=includeArea("b-2-title");?></h2>
		<h3 class="b-title"><?=includeArea("b-2-subtitle");?></h3>
		<div class="b-sale-list slider-cont mobile-slider">
			<div class="b-sale-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-1.svg">
				<a href="#"><h3><?=includeArea("b-2-1-title");?></h3></a>
				<div class="b-sale-item-line"></div>
				<p><?=includeArea("b-2-1-text");?></p>
			</div>
			<div class="b-sale-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-2.svg">
				<a href="#"><h3><?=includeArea("b-2-2-title");?></h3></a>
				<div class="b-sale-item-line"></div>
				<p><?=includeArea("b-2-2-text");?></p>
			</div>
			<div class="b-sale-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-3.svg">
				<a href="#"><h3><?=includeArea("b-2-3-title");?></h3></a>
				<div class="b-sale-item-line"></div>
				<p><?=includeArea("b-2-3-text");?></p>
			</div>
			<div class="b-sale-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-4.svg">
				<a href="#"><h3><?=includeArea("b-2-4-title");?></h3></a>
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

<div class="b b-4 b-review-main-page">
	<div class="b-block">
		<h2 class="b-title"><?=includeArea("b-4-title");?></h2>
		<div class="b-review-list slider-cont">
			<div class="b-review-item">
				<div class="b-review-item-top">
					<div class="b-img" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/html/i/review-1.jpg');"></div>
					<div class="b-review-item-name">
						<p class="name">Дмитрий Муленок</p>
						<p class="service">Услуга: <a href="#">помощь в продаже авто</a></p>
					</div>
				</div>
				<div class="b-review-item-text"><p>Посоветовал друг, которому делал подбор Дмитрий по параметрам. Заказал подбор авто, так как искать с опытным человеком я посчитал лучше. И не разу не прогодал. Мне нашли то, что я искал в отличном состоянии за 3 дня! Через неделю… Посоветовал друг, которому делал подбор Дмитрий по параметрам. Заказал подбор авто, так как искать с опытным человеком я посчитал лучше. И не разу не прогодал. Мне нашли то, что я искал в отличном состоянии за 3 дня! Через неделю…</p></div>
				<a href="#b-popup-review" class="fancy read-more hide">
					<span class="read-more-text">Читать подробнее</span><span class="icon-arrow-next"></span>
				</a>
			</div>
			<div class="b-review-item">
				<div class="b-review-item-top">
					<div class="b-img" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/html/i/info-1.jpg');"></div>
					<div class="b-review-item-name">
						<p class="name">Сергей Батухтин</p>
						<p class="service">Услуга: <a href="#">помощь в продаже авто</a></p>
					</div>
				</div>
				<div class="b-review-item-text"><p>Посоветовал друг, которому делал подбор Дмитрий по параметрам. Заказал подбор авто, так как искать с опытным человеком я посчитал лучше. И не разу не прогодал.</p></div>
				<a href="#b-popup-review" class="fancy read-more hide">
					<span class="read-more-text">Читать подробнее</span><span class="icon-arrow-next"></span>
				</a>
			</div>
			<div class="b-review-item">
				<div class="b-review-item-top">
					<div class="b-img" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/html/i/review-1.jpg');"></div>
					<div class="b-review-item-name">
						<p class="name">Дмитрий Муленок</p>
						<p class="service">Услуга: <a href="#">помощь в продаже авто</a></p>
					</div>
				</div>
				<div class="b-review-item-text"><p>Посоветовал друг, которому делал подбор Дмитрий по параметрам. Заказал подбор авто, так как искать с опытным человеком я посчитал лучше. И не разу не прогодал. Мне нашли то, что я искал в отличном состоянии за 3 дня! Через неделю… Посоветовал друг, которому делал подбор Дмитрий по параметрам. Заказал подбор авто, так как искать с опытным человеком я посчитал лучше. И не разу не прогодал. Мне нашли то, что я искал в отличном состоянии за 3 дня! Через неделю…</p></div>
				<a href="#b-popup-review" class="fancy read-more hide">
					<span class="read-more-text">Читать подробнее</span><span class="icon-arrow-next"></span>
				</a>
			</div>
			<div class="b-review-item">
				<div class="b-review-item-top">
					<div class="b-img" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/html/i/info-1.jpg');"></div>
					<div class="b-review-item-name">
						<p class="name">Сергей Батухтин</p>
						<p class="service">Услуга: <a href="#">помощь в продаже авто</a></p>
					</div>
				</div>
				<div class="b-review-item-text"><p>Посоветовал друг, которому делал подбор Дмитрий по параметрам. Заказал подбор авто, так как искать с опытным человеком я посчитал лучше. И не разу не прогодал.</p></div>
				<a href="#b-popup-review" class="fancy read-more hide">
					<span class="read-more-text">Читать подробнее</span><span class="icon-arrow-next"></span>
				</a>
			</div>
			<div class="b-review-item">
				<div class="b-review-item-top">
					<div class="b-img" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/html/i/review-1.jpg');"></div>
					<div class="b-review-item-name">
						<p class="name">Дмитрий Муленок</p>
						<p class="service">Услуга: <a href="#">помощь в продаже авто</a></p>
					</div>
				</div>
				<div class="b-review-item-text"><p>Посоветовал друг, которому делал подбор Дмитрий по параметрам. Заказал подбор авто, так как искать с опытным человеком я посчитал лучше. И не разу не прогодал. Мне нашли то, что я искал в отличном состоянии за 3 дня! Через неделю… Посоветовал друг, которому делал подбор Дмитрий по параметрам. Заказал подбор авто, так как искать с опытным человеком я посчитал лучше. И не разу не прогодал. Мне нашли то, что я искал в отличном состоянии за 3 дня! Через неделю…</p></div>
				<a href="#b-popup-review" class="fancy read-more hide">
					<span class="read-more-text">Читать подробнее</span><span class="icon-arrow-next"></span>
				</a>
			</div>
		</div>
		<div class="center">
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

<div class="b b-5">
	<div class="b-block">
		<h2 class="b-title"><?=includeArea("b-5-title");?></h2>
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "articles-main", Array(
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
			0 => "ID",
			1 => "CODE",
			2 => "NAME",
			3 => "PREVIEW_TEXT",
			4 => "PREVIEW_PICTURE",
			5 => "DETAIL_TEXT",
			6 => "DETAIL_PICTURE",
			7 => "DATE_CREATE",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "5",	// Код информационного блока
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
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
		"SORT_BY2" => "ID",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
		
	</div>
</div>

<div class="b b-6">
	<div class="b-block clearfix">
		<div class="b-6-left">
			<h2 class="b-title"><?=includeArea("b-6-title");?></h2>
			<p><?=includeArea("b-6-subtitle");?></p>
		</div>
		<div class="b-6-back"></div>
		<div class="b-6-right border-orange">
			<form class="b-form" action="/send/inspection.php" method="POST">
				<h3><?=includeArea("b-6-form-title");?></h3>
				<p><?=includeArea("b-6-form-text");?></p>
				<div class="b-input">
					<input type="text" name="name" placeholder="Ваше имя">
				</div>
				<div class="b-input">
					<input type="text" name="phone" placeholder="Ваш телефон" required>
				</div>
				<div class="b-input">
					<input type="text" name="auto" placeholder="Какой автомобиль вам нужен?" required>
				</div>
				<input type="text" name="MAIL" required placeholder="Ваш e-mail">
				<a href="#" class="b-btn ajax"><span>Подобрать</span></a>
				<div class="b-checkbox">
					<input id="b-6-checkbox" type="checkbox" name="politics" checked required>
					<label for="b-6-checkbox">
						<div class="b-checked icon-checked"></div>
						<p>Я принимаю условия передачи информации</p>
					</label>
				</div>
				<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
			</form>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>