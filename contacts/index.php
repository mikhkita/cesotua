<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<div class="b-contacts">
	<div class="b-block">
		<div class="b-contacts-item clearfix">
			<div class="b-contacts-item-left">
				<h3>«АвтоДром на Ивановского»</h3>
				<div class="b-img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/contacts-1.jpg)">
					<div class="border-orange-div"></div>
				</div>
				<ul>
					<li>
						<span class="contacts-icon contacts-icon-tip" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-tip.svg)"></span>
						<span class="b-contacts-item-text">634040, г.&nbsp;Томск, ул.&nbsp;Ивановского,&nbsp;6б</span></li>
					<li>
						<span class="contacts-icon contacts-icon-phone" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-phone.svg)"></span>
						<a href="tel:+73822999003" class="b-contacts-item-text">+7 (3822) 999-003</a>
					</li>
					<li>
						<span class="contacts-icon contacts-icon-mail" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-mail.svg)"></span>
						<a href="mailto:info@tradeintomsk.ru" class="b-contacts-item-text b-contacts-email">info@tradeintomsk.ru</a>
					</li>
					<li>
						<span class="contacts-icon contacts-icon-time" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-time.svg)"></span>
						<span class="b-contacts-item-text">Ежедневно c 08-00 до 20-00</span>
					</li>
				</ul>
			</div>
			<div class="b-contacts-item-right b-contacts-map-1" id="b-contacts-map-1">

			</div>
		</div>
		<div class="b-contacts-item clearfix">
			<div class="b-contacts-item-left">
				<h3>«АвтоДром на Ломоносова»</h3>
				<div class="b-img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/contacts-2.jpg)">
					<div class="border-orange-div"></div>
				</div>
				<ul>
					<li>
						<span class="contacts-icon contacts-icon-tip" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-tip.svg)"></span>
						<span class="b-contacts-item-text">634033, г.&nbsp;Томск, ул.&nbsp;Ломоносова,&nbsp;42</span></li>
					<li>
						<span class="contacts-icon contacts-icon-phone" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-phone.svg)"></span>
						<a href="tel:+73822999003" class="b-contacts-item-text">+7 (3822) 999-003</a>
					</li>
					<li>
						<span class="contacts-icon contacts-icon-mail" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-mail.svg)"></span>
						<a href="mailto:info@tradeintomsk.ru" class="b-contacts-item-text b-contacts-email">info@tradeintomsk.ru</a>
					</li>
					<li>
						<span class="contacts-icon contacts-icon-time" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/html/i/icon-time.svg)"></span>
						<span class="b-contacts-item-text">Ежедневно c 08-00 до 20-00</span>
					</li>
				</ul>
			</div>
			<div class="b-contacts-item-right b-contacts-map-2" id="b-contacts-map-2">

			</div>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>