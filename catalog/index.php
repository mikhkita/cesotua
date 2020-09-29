<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "АвтоДром");
$APPLICATION->SetPageProperty("description", "АвтоДром");
$APPLICATION->SetTitle("Каталог");
?>
<div class="b-block">
	<div class="b-pickup">

		<?$arEnums = getEnumsUnique();?>
		<form action="/ajax/pickup.php" method="GET" class="b-pickup-form b-pickup-form-catalog">
			<input type="hidden" name="sort" value="PRICE_ASC">
			<input type="hidden" name="animation" value="Y">
			<div class="b-select-list clearfix">
				<div class="b-select">
					<select name="mark">
						<option value="">Марка</option>
						<?foreach ($arEnums["MARK"] as $key => $value):?>
							<option value="<?=$key?>" <?if(isset($_REQUEST["mark"]) && $_REQUEST["mark"] == $key) echo "selected";?>><?=mb_ucfirst_custom($value)?></option>
						<?endforeach;?>
					</select>
				</div>
				<div class="b-select">
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
								<input type="text" name="year-from" placeholder="от" class="input-number input-interval input-interval-from" maxlength="4" value="<?if(isset($_REQUEST["year-from"])) echo $_REQUEST["year-from"];?>">
							</div>
							<span class="drop-dash">-</span>
							<div class="b-input b-select-drop-input">
								<input type="text" name="year-to" placeholder="до" class="input-number input-interval input-interval-to" maxlength="4" value="<?if(isset($_REQUEST["year-to"])) echo $_REQUEST["year-to"];?>">
							</div>
							<span class="drop-value"> г.</span>
						</div>
					</div>
				</div>
				<div class="b-select mobile-filter">
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
								<input type="text" name="capacity-from" placeholder="от" class="input-number input-interval input-interval-from" maxlength="3" value="<?if(isset($_REQUEST["capacity-from"])) echo $_REQUEST["capacity-from"];?>">
							</div>
							<span class="drop-dash">-</span>
							<div class="b-input b-select-drop-input small">
								<input type="text" name="capacity-to" placeholder="до" class="input-number input-interval input-interval-to" maxlength="3" value="<?if(isset($_REQUEST["capacity-to"])) echo $_REQUEST["capacity-to"];?>">
							</div>
							<span class="drop-value"> л.с.</span>
						</div>
					</div>
				</div>
				<div class="b-select mobile-filter">
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
								<input type="text" name="volume-from" placeholder="от" class="input-number-volume input-interval input-interval-from" maxlength="7" value="<?if(isset($_REQUEST["volume-from"])) echo $_REQUEST["volume-from"];?>">
							</div>
							<span class="drop-dash">-</span>
							<div class="b-input b-select-drop-input">
								<input type="text" name="volume-to" placeholder="до" class="input-number-volume input-interval input-interval-to" maxlength="7" value="<?if(isset($_REQUEST["volume-to"])) echo $_REQUEST["volume-to"];?>">
							</div>
							<span class="drop-value"> л.</span>
						</div>
					</div>
				</div>
				<div class="b-select">
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
								<input type="text" name="price-from" class="input-number input-interval input-interval-from" placeholder="100000" value="<?if(isset($_REQUEST["price-from"])) echo $_REQUEST["price-from"];?>">
								<span class="drop-rub">руб.</span>
							</div>
							<div class="b-input b-select-drop-input-price">
								<span class="drop-from">до</span>
								<input type="text" name="price-to" class="input-number input-interval input-interval-to" placeholder="1000000" value="<?if(isset($_REQUEST["price-to"])) echo $_REQUEST["price-to"];?>">
								<span class="drop-rub">руб.</span>
							</div>
						</div>
					</div>
				</div>
				<div class="b-select mobile-filter">
					<select name="transmission">
						<option value="">КПП</option>
						<?foreach ($arEnums["TRANSMISSION"] as $key => $value):?>
							<option value="<?=$key?>" <?if(isset($_REQUEST["transmission"]) && $_REQUEST["transmission"] == $key) echo "selected";?>><?=mb_ucfirst_custom($value)?></option>
						<?endforeach;?>
					</select>
				</div>
				<div class="b-select mobile-filter">
					<select name="drive">
						<option value="">Привод</option>
						<?foreach ($arEnums["DRIVE"] as $key => $value):?>
							<option value="<?=$key?>" <?if(isset($_REQUEST["drive"]) && $_REQUEST["drive"] == $key) echo "selected";?>><?=mb_ucfirst_custom($value)?></option>
						<?endforeach;?>
					</select>
				</div>
				<div class="b-select mobile-filter">
					<select name="rudder">
						<option value="">Руль</option>
						<?foreach ($arEnums["RUDDER"] as $key => $value):?>
							<option value="<?=$key?>" <?if(isset($_REQUEST["rudder"]) && $_REQUEST["rudder"] == $key) echo "selected";?>><?=mb_ucfirst_custom($value)?></option>
						<?endforeach;?>
					</select>
				</div>
			</div>
			<div class="center b-pickup-form-bottom">
				<?
				$arFilter = array(
					"PROPERTY_MARK" => htmlspecialcharsbx($_REQUEST["mark"]),
					">=PROPERTY_YEAR" => htmlspecialcharsbx($_REQUEST["year-from"]),
					"<=PROPERTY_YEAR" => htmlspecialcharsbx($_REQUEST["year-to"]),
					">=PROPERTY_CAPACITY" => htmlspecialcharsbx($_REQUEST["capacity-from"]),
					"<=PROPERTY_CAPACITY" => htmlspecialcharsbx($_REQUEST["capacity-to"]),
					">=PROPERTY_VOLUME" => htmlspecialcharsbx($_REQUEST["volume-from"]),
					"<=PROPERTY_VOLUME" => htmlspecialcharsbx($_REQUEST["volume-to"]),
					">=PROPERTY_PRICE" => htmlspecialcharsbx($_REQUEST["price-from"]),
					"<=PROPERTY_PRICE" => htmlspecialcharsbx($_REQUEST["price-to"]),
					"PROPERTY_TRANSMISSION" => htmlspecialcharsbx($_REQUEST["transmission"]),
					"PROPERTY_DRIVE" => htmlspecialcharsbx($_REQUEST["drive"]),
					"PROPERTY_RUDDER" => htmlspecialcharsbx($_REQUEST["rudder"]),
				);
				$arFilterCnt = array_merge($arFilter, array("IBLOCK_ID" => 1, "ACTIVE" => "Y"));
				//получить количество элементов
				$cnt = CIBlockElement::GetList(
				    array(),
				    $arFilterCnt,
				    array(),
				    false,
				    array('ID', 'NAME')
				);
				$arText1 = array('вариант', 'варианта', 'вариантов');
				?>
				<div class="pickup-right">
					<a href="#" class="b-btn-mobile-filter">
						<span class="filter-text-detail">Подробно</span>
						<span class="filter-text-turn hide">Свернуть</span>
					</a>
					<a href="#" class="b-btn-reset"><span class="icon-update"></span><span class="pickup-right-text">Сбросить фильтр</span></a>
				</div>
				<div class="pickup-found"><span class="pickup-found-label">Найдено по фильтру:</span> <span class="pickup-found-count"><?=$cnt;?></span> <span class="pickup-found-text"><?=declOfNum($cnt, $arText1)?></span></div>
				<a href="#" class="b-btn b-btn-pickup b-btn-pickup-catalog"><span>Подобрать</span></a>
			</div>
		</form>
	</div>

	<?
	$animation = htmlspecialcharsbx($_REQUEST["animation"]);
	$is_ajax = htmlspecialcharsbx($_REQUEST["is_ajax"]);
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
		"NEWS_COUNT" => "32",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => "ajax",	// Шаблон постраничной навигации
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
		"SORT_BY1" => "PROPERTY_PRICE",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "ASC,NULLS",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
		"INCLUDE_AJAX" => "Y",
		"INCLUDE_SORT" => "Y",
		"SHOW_ANIMATION" => ($animation && $is_ajax) ? "Y" : "N"
	),
	false
);?>
</div>

<div class="b b-3 b-3-catalog b-3-light">
	<div class="b-block">
		<h2 class="b-title"><?=includeArea("b-3-title");?></h2>
		<div class="b-advantage-list slider-cont mobile-slider">
			<div class="b-advantage-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/b-3-img-1-light.svg">
				<h3><?=includeArea("b-3-1-title");?></h3>
				<p><?=includeArea("b-3-1-text");?></p>
			</div>
			<div class="b-advantage-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/b-3-img-2-light.svg">
				<h3><?=includeArea("b-3-2-title");?></h3>
				<p><?=includeArea("b-3-2-text");?></p>
			</div>
			<div class="b-advantage-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/b-3-img-3-light.svg">
				<h3><?=includeArea("b-3-3-title");?></h3>
				<p><?=includeArea("b-3-3-text");?></p>
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

<div class="b b-6 b-6-catalog">
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