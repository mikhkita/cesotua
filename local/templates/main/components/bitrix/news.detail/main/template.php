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
				<?$i = 1;?>
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
					<a href="#b-popup-inspection" class="b-btn b-btn-inspection fancy"><span>Записаться на осмотр</span></a>
				<?else:?>
					<a href="#b-popup-inspection" class="b-btn b-btn-inspection specify fancy"><span>Уточнить цену</span></a>
				<?endif;?>
				<div style="display: none;" class="b-detail-inspection-info">
					<div class="b-catalog-item-img-cont">
						<div class="b-catalog-item-img" style="background-image: url(<?=$popupPhoto?>);"></div>
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
				<p>на Ивановского, д.6 А</p>
			</div>
			<a href="#" class="pickup-car">
				<span class="pickup-car-text">В кредит от 5 340 в месяц</span>
				<span class="icon-arrow-right right"></span>
				<div class="border-orange-div"></div>
			</a>
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
