
<?if(isset($isMain) || $isMain):?>
	<div class="b b-header b-header-main">
		<div class="b-back-dark"></div>
		<div class="b-block">
			<div class="b-header-top clearfix">
				<a href="/" class="b-logo-cont">
					<div class="b-logo-head">
						<img src="/i/logo-car-1.svg" class="b-logo-car-1">
						<img src="/i/logo-car-2.svg" class="b-logo-car-2">
						<img src="/i/logo-car-3.svg" class="b-logo-car-3">
						<img src="/i/logo-car-4.svg" class="b-logo-car-4">
						<img src="/i/logo-car-5.svg" class="b-logo-car-5">
						<img src="/i/logo-car-6.svg" class="b-logo-car-6">
						<img src="/i/logo-car-7.svg" class="b-logo-car-7">
						<img src="/i/logo-car-8.svg" class="b-logo-car-8">
					</div>
					<div class="b-logo"></div>
				</a>
				<ul class="b-menu-desktop">
					<li>
						<a href="/catalog.php">Каталог авто</a>
					</li>
					<li>
						<a href="/services.php">Услуги</a>
					</li>
					<li>
						<a href="/articles.php">Статьи</a>
					</li>
					<li>
						<a href="/about.php">О компании</a>
					</li>
					<li>
						<a href="/contacts.php">Контакты</a>
					</li>
				</ul>
				<div class="b-header-right">
					<a href="tel:+73822999200" class="b-header-phone">+7 (3822) 999-200</a>
					<div class="b-header-right-bottom">
						<span class="icon-map"></span>
						<span class="text">Томск, ул. Ивановского, д.6 А</span>
					</div>
				</div>
			</div>
			<div class="b-header-content">
				<h1>Продажа автомобилей с пробегом в Томске от официального дилера</h1>
				<p>Все автомобили салона проходят предпродажный контроль с юридическим сопровождением. Возможна оплата наличными, картой или в кредит.</p>
				<a href="#" class="pickup-car">
					<span class="pickup-car-text">Подобрать авто</span>
					<span class="icon-arrow-right right"></span>
					<div class="border-orange-img"></div>
				</a>
			</div>
			<div class="b-pickup border-orange">
				<h2 class="center">135 проверенных автомобилей в наличии</h2>
				<form action="/ajax/pickup.php" method="GET" class="b-pickup-form">
					<input type="hidden" name="sort" value="">
					<div class="b-select-list clearfix">
						<div class="b-select">
							<select name="mark">
								<option value="">Марка</option>
								<option value="1">Toyota</option>
								<option value="2">Kia</option>
								<option value="3">Nissan</option>
							</select>
						</div>
						<div class="b-select">
							<select name="year">
								<option value="">Год выпуска</option>
								<option value="1">2005</option>
								<option value="2">2006</option>

							</select>
						</div>
						<div class="b-select">
							<select name="capacity">
								<option value="">Мощность</option>
							</select>
						</div>
						<div class="b-select">
							<select name="volume">
								<option value="">Объем</option>
							</select>
						</div>
						<div class="b-select">
							<select name="price">
								<option value="">Цена</option>
							</select>
						</div>
						<div class="b-select">
							<select name="transmission">
								<option value="">КПП</option>
							</select>
						</div>
						<div class="b-select">
							<select name="drive">
								<option value="">Привод</option>
							</select>
						</div>
						<div class="b-select">
							<select name="body">
								<option value="">Руль</option>
							</select>
						</div>
					</div>
					<div class="center b-pickup-form-bottom">
						<div class="pickup-found">Найдено по фильтру: <span class="pickup-found-count">95</span> <span class="pickup-found-text">вариантов</span></div>
						<a href="#" class="b-btn b-btn-pickup">Подобрать</a>
						<a href="#" class="pickup-right b-btn-reset"><span class="icon-update"></span><span class="pickup-right-text">Сбросить фильтр</span></a>
					</div>
				</form>
			</div>
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
<?else:?>
	<div class="b b-header b-header-inner">
		<div class="b-back-dark"></div>
		<div class="b-block">
			<div class="b-header-top clearfix">
				<a href="/" class="b-logo"></a>
				<ul class="b-menu-desktop">
					<li>
						<a href="/catalog.php">Каталог авто</a>
					</li>
					<li>
						<a href="/services.php">Услуги</a>
					</li>
					<li>
						<a href="/articles.php">Статьи</a>
					</li>
					<li>
						<a href="/about.php">О компании</a>
					</li>
					<li>
						<a href="/contacts.php">Контакты</a>
					</li>
				</ul>
				<div class="b-header-right">
					<a href="tel:+73822999200" class="b-header-phone">+7 (3822) 999-200</a>
					<div class="b-header-right-bottom">
						<span class="icon-map"></span>
						<span class="text">Томск, ул. Ивановского, д.6 А</span>
					</div>
				</div>
			</div>
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
<?endif;?>
