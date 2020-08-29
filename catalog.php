<!DOCTYPE html>
<html lang="ru">
<head>

	<title></title>
	<meta name="keywords" content=''>
	<meta name="description" content=''>

	<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
	<meta name="format-detection" content="telephone=no">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css">
	<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css">
	<link rel="stylesheet" href="css/slick.css" type="text/css">
	<link rel="stylesheet" href="css/KitAnimate.css?" type="text/css">
	<link rel="stylesheet" href="css/layout.css?" type="text/css">

	<!-- <link rel="stylesheet" media="screen and (min-width: 768px) and (max-width: 1024px)" href="css/layout-tablet.css"> -->
	<!-- <link rel="stylesheet" media="screen and (min-width: 240px) and (max-width: 767px)" href="css/layout-mobile.css"> -->

</head>
<body>

	<?include "header.php"?>

	<div class="b-content b-content-inner">
		<div class="b-block">
			<ul class="b-breadcrumbs clearfix">
				<li><a href="/">Главная</a></li>
				<li><span>Каталог авто</span></li>
			</ul>
			<h1>Каталог авто</h1>
			<div class="b-pickup">
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
								<option value="">Тип кузова</option>
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
			<div class="b-catalog-sort">
				<p>Сортировка: </p>
				<ul class="b-catalog-sort-list">
					<li class="b-catalog-sort-item">
						<input type="radio" id="sort-price" name="sort" value="price" checked>
						<label for="sort-price">цена</label>
					</li>
					<li class="b-catalog-sort-item">
						<input type="radio" id="sort-year" name="sort" value="year">
						<label for="sort-year">год</label>
					</li>
					<li class="b-catalog-sort-item">
						<input type="radio" id="sort-mileage" name="sort" value="mileage">
						<label for="sort-mileage">пробег</label>
					</li>
				</ul>
			</div>
			<div class="b-catalog-list clearfix">
				<div class="b-catalog-items">
					<div class="b-catalog-item">
						<div class="b-catalog-item-back"></div>
						<div class="b-catalog-item-content">
							<div class="flowers-img-cont">
								<div class="flowers-img" style="background-image: url('i/catalog-1.jpg');"></div>
							</div>
							<h4>BMW X5, 2010</h4>
							<p>3.0 л (272 л.с.), бензин, автомат, 4WD</p>
							<div class="b-catalog-item-price">
								<div class="current-price icon-ruble">1 150 000</div>
							</div>
							<a href="#" class="b-btn-tr">Оставить заявку</a>
						</div>
					</div>
					<div class="b-catalog-item">
						<div class="b-catalog-item-back"></div>
						<div class="b-catalog-item-content">
							<div class="flowers-img-cont">
								<div class="flowers-img" style="background-image: url('i/catalog-1.jpg');"></div>
							</div>
							<h4>Land Rover Range Rover Sport, 2018</h4>
							<p>3.0 л (249 л.с.), дизель, автомат, 4WD</p>
							<div class="b-catalog-item-price">
								<div class="current-price icon-ruble">7 500 000</div>
							</div>
							<a href="#" class="b-btn-tr">Оставить заявку</a>
						</div>
					</div>
					<div class="b-catalog-item">
						<div class="b-catalog-item-back"></div>
						<div class="b-catalog-item-content">
							<div class="flowers-img-cont">
								<div class="flowers-img" style="background-image: url('i/catalog-1.jpg');"></div>
							</div>
							<h4>Mitsubishi Outlander, 2007</h4>
							<p>3.0 л (220 л.с.), бензин, автомат, 4WD</p>
							<div class="b-catalog-item-price">
								<div class="current-price icon-ruble">1 800 000</div>
							</div>
							<a href="#" class="b-btn-tr">Оставить заявку</a>
						</div>
					</div>
					<div class="b-catalog-item">
						<div class="b-catalog-item-back"></div>
						<div class="b-catalog-item-content">
							<div class="flowers-img-cont">
								<div class="flowers-img" style="background-image: url('i/catalog-1.jpg');"></div>
							</div>
							<h4>Nissan Juke, 2012</h4>
							<p>1.6 л (117 л.с.), бензин, автомат, передний</p>
							<div class="b-catalog-item-price">
								<div class="current-price icon-ruble">1 230 000</div>
							</div>
							<a href="#" class="b-btn-tr">Оставить заявку</a>
						</div>
					</div>
					<div class="b-catalog-item">
						<div class="b-catalog-item-back"></div>
						<div class="b-catalog-item-content">
							<div class="flowers-img-cont">
								<div class="flowers-img" style="background-image: url('i/catalog-1.jpg');"></div>
							</div>
							<h4>Toyota RAV4, 2014</h4>
							<p>3.0 л (272 л.с.), бензин, автомат, 4WD</p>
							<div class="b-catalog-item-price">
								<div class="current-price icon-ruble">1 150 000</div>
							</div>
							<a href="#" class="b-btn-tr">Оставить заявку</a>
						</div>
					</div>
					<div class="b-catalog-item">
						<div class="b-catalog-item-back"></div>
						<div class="b-catalog-item-content">
							<div class="flowers-img-cont">
								<div class="flowers-img" style="background-image: url('i/catalog-1.jpg');"></div>
							</div>
							<h4>Hyundai Creta, 2017</h4>
							<p>2.0 л (149 л.с.), бензин, автомат, 4WD</p>
							<div class="b-catalog-item-price">
								<div class="current-price icon-ruble">1 150 000</div>
							</div>
							<a href="#" class="b-btn-tr">Оставить заявку</a>
						</div>
					</div>
					<div class="b-catalog-item">
						<div class="b-catalog-item-back"></div>
						<div class="b-catalog-item-content">
							<div class="flowers-img-cont">
								<div class="flowers-img" style="background-image: url('i/catalog-1.jpg');"></div>
							</div>
							<h4>Opel Corsa, 2011</h4>
							<p>1.4 л (100 л.с.), бензин, автомат, передний</p>
							<div class="b-catalog-item-price">
								<div class="current-price icon-ruble">1 150 000</div>
							</div>
							<a href="#" class="b-btn-tr">Оставить заявку</a>
						</div>
					</div>
					<div class="b-catalog-item">
						<div class="b-catalog-item-back"></div>
						<div class="b-catalog-item-content">
							<div class="flowers-img-cont">
								<div class="flowers-img" style="background-image: url('i/catalog-1.jpg');"></div>
							</div>
							<h4>Chevrolet Cruze, 2013</h4>
							<p>1.6 л (109 л.с.), бензин, автомат, передний</p>
							<div class="b-catalog-item-price">
								<div class="current-price icon-ruble">1 150 000</div>
							</div>
							<a href="#" class="b-btn-tr">Оставить заявку</a>
						</div>
					</div>
				</div>
				<div class="catalog-preloader"><img src="i/preloader.svg"></div>
				<div style="opacity: 0; visibility: hidden;" id="b-btn-ajax-load" data-href="/ajax/catalog.php?PAGEN_1=2">Показать ещё</div>
			</div>
		</div>
	</div>

	<?include "footer.php"?>

	<div style="display: none;">
		<div class="b-popup" id="b-popup-review">
			
		</div>
		<div class="b-thanks b-popup" id="b-popup-success">
			<div class="b-popup-padding b-text">
				<h2>Спасибо!</h2>
				<p>Ваша заявка успешно отправлена. <br>Наш&nbsp;менеджер свяжется с Вами в ближайшее время.</p>
				<a href="#" class="b-btn-orange" onclick="$.fancybox.close(); return false;">
					<span>Закрыть</span>
				</a>
			</div>
		</div>
		<a href="#b-popup-error" class="b-error-link fancy fancy-binded" style="display:none;"></a>
		<div class="b-thanks b-popup" id="b-popup-error">
			<div class="b-popup-padding b-text">
				<h2>Ошибка отправки!</h2>
				<p>Пожалуйста, попробуйте отправить Вашу заявку позже или позвоните нам по телефону: <a href="tel:+79205783725">+7 (920) 578 37 25</a></p>
				<a href="#" class="b-btn-orange" onclick="$.fancybox.close(); return false;">
					<span>Закрыть</span>
				</a>
			</div>
		</div>
	</div>
	
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery.fancybox.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/slick.min.js"></script>
	<? if( !(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!==false || strpos($_SERVER['HTTP_USER_AGENT'],'rv:11.0')!==false) ): ?>
		<script type="text/javascript" src="js/imask.min.js"></script>
	<? else: ?>
		<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
	<? endif; ?>
	<script src="js/KitSend.js"></script>
	<script src="js/main.js"></script>
	
</body>
</html>