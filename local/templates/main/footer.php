<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

		<?if($GLOBALS["isMain"]):?>
			<?echo includeArea("form-b-6");?>
		<?elseif($GLOBALS["isCatalog"] || $GLOBALS["isDetailCatalog"]):?>
			<div class="b-6-catalog">
				<?echo includeArea("form-b-6");?>
			</div>
		<?elseif(!$GLOBALS["is404"] && !$GLOBALS["isAbout"]):?>
			<?echo includeArea("form-b-6-question");?>
		<?endif;?>

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

	<a href="#b-get-credit" class="b-btn-fixed b-btn-credit orange fancy">Заявка на кредит</a>
	<a href="#b-rate-my-car" class="b-btn-fixed b-btn-appraisal fancy">Оценить авто</a>

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
				<input type="hidden" id="autoID" name="autoID">
				<div class="center">
					<div class="ajax-wrap">
						<a href="#" class="b-btn ajax">
							<span class="inspection-text">Оставить заявку</span>
							<span class="specify-text hide">Уточнить цену</span>
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
			</form>
		</div>
	</div>

	<div class="b-popup" id="b-get-credit">
		<div class="b-popup-bottom-padding">
			<h2>
				<span class="inspection-text">Заявка на кредит</span>
			</h2>
			<p class="b-popup-form-text">
				<span class="inspection-text">Заполните простую форму, продавец-консультант свяжется с вами для рассчета кредита</span>
			</p>
			<form class="b-form" method="POST" action="/send/get-credit.php">
				<div class="b-input">
					<input type="text" name="name" placeholder="Ваше имя">
				</div>
				<div class="b-input">
					<input type="text" name="phone" placeholder="Ваш телефон" required>
				</div>
				<div class="b-input">
					<input type="text" name="mark" placeholder="Марка">
				</div>
				<div class="b-input">
					<input type="text" name="model" placeholder="Модель">
				</div>
				<div class="b-textarea">
					<textarea name="description" placeholder="Комментарий"></textarea>
				</div>
				<input type="text" name="MAIL" required placeholder="Ваш e-mail">
				<div class="center">
					<div class="ajax-wrap">
						<a href="#" class="b-btn ajax">
							<span class="inspection-text">Оставить заявку</span>
						</a>
						<div class="ajax-preloader"></div>
					</div>
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

	<div class="b-popup" id="b-rate-my-car">
		<div class="b-popup-bottom-padding">
			<h2>
				<span class="inspection-text">Оценить мой автомобиль</span>
			</h2>
			<p class="b-popup-form-text">
				<span class="inspection-text">Заполните простую форму, продавец-консультант свяжется с вами для оценки вашего автомобиля</span>
			</p>
			<form id="b-rate-car-form" class="b-form b-attach-form" method="POST" action="/send/rate-car.php">
				<div class="b-input">
					<input type="text" name="name" placeholder="Ваше имя">
				</div>
				<div class="b-input">
					<input type="text" name="phone" placeholder="Ваш телефон" required>
				</div>
				<div class="b-input">
					<input type="text" name="mark" placeholder="Марка" required>
				</div>
				<div class="b-input">
					<input type="text" name="model" placeholder="Модель" required>
				</div>
				<div class="b-textarea">
					<textarea name="description" placeholder="Описание вашего автомобиля"></textarea>
				</div>
				<div class="b-attach-block">
					<div id="attach-photo">
						<a href="javascript:;" id="pickfiles" class="b-attach-link">
							<span class="b-attach-text">Прикрепите фотографии автомобиля и&nbsp;документы (ПТС либо СТС)</span>
							<div class="b-attach-preloader">
								<img src="<?=SITE_TEMPLATE_PATH?>/html/i/preloader.svg">
							</div>
						</a>
					</div>
					<div id="b-attach-preview" class="b-attach-preview">
						
					</div>
				</div>
				<input type="text" name="MAIL" required placeholder="Ваш e-mail">
				<div class="center">
					<div class="ajax-wrap">
						<a href="#" class="b-btn ajax">
							<span class="inspection-text">Оставить заявку</span>
						</a>
						<div class="ajax-preloader"></div>
					</div>
					<div class="b-checkbox">
						<input id="b-6-rate-checkbox" type="checkbox" name="politics" checked required>
						<label for="b-6-rate-checkbox">
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
		<div class="b-popup-bottom-padding">
			<h2>Спасибо!</h2>
			<p>Ваша заявка успешно отправлена. <br>Наш продавец-консультант свяжется с Вами в&nbsp;ближайшее&nbsp;время.</p>
			<a href="#" class="b-btn" onclick="$.fancybox.close(); return false;">
				<span>Закрыть</span>
			</a>
		</div>
	</div>
	<a href="#b-popup-error" class="b-error-link fancy" style="display:none;"></a>
	<div class="b-thanks b-popup" id="b-popup-error">
		<div class="b-popup-bottom-padding">
			<h2>Ошибка отправки!</h2>
			<p>Пожалуйста, попробуйте отправить Вашу заявку позже или позвоните нам по телефону: <a href="tel:<?=includeAreaString("header-phone", true);?>" class="b-thanks-phone"><?=includeArea("header-phone");?></a></p>
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

<script src="<?=SITE_TEMPLATE_PATH?>/html/js/moxie.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/plupload.full.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/html/js/autosize.min.js"></script>

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