<div class="b b-6">
	<div class="b-block clearfix">
		<div class="b-6-left">
			<h2 class="b-title"><?=includeArea("b-6-title");?></h2>
			<p><?=includeArea("b-6-subtitle");?></p>
		</div>
		<div class="b-6-back"></div>
		<div class="b-6-right border-orange">
			<form class="b-form" action="/send/car-selection.php" method="POST" data-goal="car_selection">
				<h3><?=includeArea("b-6-form-title");?></h3>
				<p><?=includeArea("b-6-form-text");?></p>
				<div class="b-input">
					<input type="text" name="name" placeholder="Ваше имя">
				</div>
				<div class="b-input">
					<input type="text" name="phone" placeholder="Ваш телефон" required>
				</div>
				<div class="b-input">
					<input type="text" name="auto" placeholder="Какой автомобиль вам нужен?">
				</div>
				<input type="text" name="MAIL" required placeholder="Ваш e-mail">
				<div class="ajax-wrap">
					<a href="#" class="b-btn ajax">
						<span>Подобрать</span>
					</a>
					<div class="ajax-preloader"></div>
				</div>
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