<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

	</div><!-- b-content -->
	<div class="b b-footer">
		<div class="border-top-right"></div>
		<div class="b-block">
			<div class="b-footer-top clearfix">
				<div class="b-footer-column">
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
					<ul class="b-social">
						<li>
							<a href="https://vk.com/ladadealerstomsk" target="_blank" class="icon-vk">Вконтакте</a>
						</li>
						<li>
							<a href="https://www.instagram.com/ladadealerstomsk/" target="_blank" class="icon-insta">Instagram</a>
						</li>
					</ul>
				</div>
				<div class="b-footer-column">
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
							"IS_FOOTER" => "Y"
						),
						false
					);?>
				</div>
				<div class="b-footer-column">
					<a href="tel:<?=includeAreaString("header-phone", true);?>"><?=includeArea("header-phone");?></a>
					<div class="b-footer-address-item">
						<div class="address-name">«<?=includeArea("footer-address-1-name");?>»:</div>
						<div class="b-footer-mark">
							<span class="icon-map"></span>
							<a href="https://2gis.ru/tomsk/geo/422848120237634?m=85.091357%2C56.511088%2F16.11" target="_blank" class="text"><?=includeArea("footer-address-1");?></a>
						</div>
					</div>
					<div class="b-footer-address-item">
						<div class="address-name">«<?=includeArea("footer-address-2-name");?>»:</div>
						<div class="b-footer-mark">
							<span class="icon-map"></span>
							<a href="https://2gis.ru/tomsk/firm/422740746053922?m=85.007652%2C56.459395%2F16.11" target="_blank" class="text"><?=includeArea("footer-address-2");?></a>
						</div>
					</div>
				</div>
			</div>
			<div class="b-footer-line"></div>
			<div class="b-footer-bottom clearfix">
				<div class="b-footer-bottom-left">
					<div class="b-copyright"><?=includeArea("footer-copyright");?></div>
					<a href="/policy.pdf">Политика конфиденциальности</a>
				</div>
				<div class="b-redder">
					<span>Разработка сайта:</span>
					<a href="//redder.pro/" class="b-redder-logo" target="_blank"></a>
				</div>
			</div>
		</div>
	</div>

	<?if($GLOBALS["isMain"] || $GLOBALS["isDetailCatalog"]):?>
		<a href="#" class="b-btn-credit <?if($GLOBALS["isDetailCatalog"]) echo "orange";?>">Рассчитать кредит</a>
	<?endif;?>

	<div class="b-menu-overlay" id="b-menu-overlay" style="display: none;"></div>
</div><!-- panel-page -->


<div style="display: none;">
	<div class="b-popup b-popup-review" id="b-popup-review">
		<div id="b-popup-review-content" class="b-popup-bottom-padding">
			
		</div>
	</div>
	<div class="b-popup b-popup-inspection" id="b-popup-inspection">
		<div class="b-popup-top-padding">
			<h2>
				<span class="inspection-text">Заявка на осмотр</span>
				<span class="specify-text hide">Уточнить цену</span>
			</h2>
		</div>
		<div class="b-popup-inspection-auto">

		</div>
		<div class="b-popup-bottom-padding">
			<p class="b-popup-form-text">
				<span class="inspection-text">Заполните простую форму, продавец-консультант свяжется с вами и предложит вам удобное время для осмотра</span>
				<span class="specify-text hide">Заполните простую форму, продавец-консультант свяжется с вами и сообщит вам актуальную цену автомобиля</span>
			</p>
			<form class="b-form" action="/send/inspection.php" method="POST">
				<div class="b-input">
					<input type="text" name="name" placeholder="Ваше имя">
				</div>
				<div class="b-input">
					<input type="text" name="phone" placeholder="Ваш телефон" required>
				</div>
				<input type="text" name="MAIL" required placeholder="Ваш e-mail">
				<input type="hidden" name="autoID">
				<div class="center">
					<a href="#" class="b-btn ajax">
						<span class="inspection-text">Оставить заявку</span>
						<span class="specify-text hide">Уточнить цену</span>
					</a>
					<div class="b-checkbox">
						<input id="b-6-inspection-checkbox" type="checkbox" name="politics" checked required>
						<label for="b-6-inspection-checkbox">
							<div class="b-checked icon-checked"></div>
							<p>Я принимаю условия передачи информации</p>
						</label>
					</div>
				</div>
				<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
			</form>
		</div>
	</div>

	<div class="b-popup b-popup-inspection" id="b-popup-credit">
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
								<input class="b-calc-input-rub" readonly type="text" id="sum" oninput="this.value = this.value.replace(/\D/g, '')" value="250 000" name="sum">
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
								<input class="b-calc-input-month" readonly type="text" id="date" oninput="this.value = this.value.replace(/\D/g, '')" value="4" name="loan-term"/>
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
				<span class="inspection-text">Заполните простую форму, продавец-консультант свяжется с вами и предложит вам удобное время для осмотра</span>
			</p>
			<form class="b-form" action="/send/inspection.php" method="POST">
				<div class="b-input">
					<input type="text" name="name" placeholder="Ваше имя">
				</div>
				<div class="b-input">
					<input type="text" name="phone" placeholder="Ваш телефон" required>
				</div>
				<input type="text" name="MAIL" required placeholder="Ваш e-mail">
				<input type="hidden" name="autoID">
				<div class="center">
					<a href="#" class="b-btn ajax">
						<span class="inspection-text">Оставить заявку</span>
					</a>
					<div class="b-checkbox">
						<input id="b-6-credit-checkbox" type="checkbox" name="politics" checked required>
						<label for="b-6-credit-checkbox">
							<div class="b-checked icon-checked"></div>
							<p>Я принимаю условия передачи информации</p>
						</label>
					</div>
				</div>
				<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
			</form>
		</div>
	</div>

	<div class="b-thanks b-popup" id="b-popup-success">
		<div class="b-text b-popup-bottom-padding">
			<h2>Спасибо!</h2>
			<p>Ваша заявка успешно отправлена. <br>Наш продавец-консультант свяжется с Вами в&nbsp;ближайшее&nbsp;время.</p>
			<a href="#" class="b-btn" onclick="$.fancybox.close(); return false;">
				<span>Закрыть</span>
			</a>
		</div>
	</div>
	<a href="#b-popup-error" class="b-error-link fancy" style="display:none;"></a>
	<div class="b-thanks b-popup" id="b-popup-error">
		<div class="b-text b-popup-bottom-padding">
			<h2>Ошибка отправки!</h2>
			<p>Пожалуйста, попробуйте отправить Вашу заявку позже или позвоните нам по телефону: <a href="tel:<?=includeAreaString("header-phone", true);?>"><?=includeArea("header-phone");?></a></p>
			<a href="#" class="b-btn" onclick="$.fancybox.close(); return false;">
				<span>Закрыть</span>
			</a>
		</div>
	</div>
</div>

<script src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?apikey=dcf82496-06b7-476e-b6f8-0078e5d46b67&amp;load=package.standard&amp;lang=ru-RU&amp;onload=yandexMapInit"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery.fancybox.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery.validate.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/slick.min.js"></script>

<script src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery-ui.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery-ui.touch-punch.min.js"></script>

<? if( !(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!==false || strpos($_SERVER['HTTP_USER_AGENT'],'rv:11.0')!==false) ): ?>
	<script src="<?=SITE_TEMPLATE_PATH?>/html/js/imask.min.js"></script>
<? else: ?>
	<script src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery.maskedinput.min.js"></script>
<? endif; ?>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery.maskedinput.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/imask.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/slideout.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery.matchHeight.js"></script>
<?/*if($GLOBALS["isMain"] && $GLOBALS["isCatalog"]):*/?>
	<script src="<?=SITE_TEMPLATE_PATH?>/html/js/framework7.bundle.min.js"></script>
<?/*endif;*/?>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/KitSend.js?<?=$GLOBALS["version"]?>"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/main.js?<?=$GLOBALS["version"]?>"></script>

</body>
</html>