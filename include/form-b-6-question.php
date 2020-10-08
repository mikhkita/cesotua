<div class="b b-6 b-6-question">
	<div class="b-block clearfix">
		<div class="b-6-left">
			<h2 class="b-title"><?=includeArea("b-6-question-title");?></h2>
			<p><?=includeArea("b-6-question-subtitle");?></p>
			<div class="b-6-consultant">
				<div class="b-img"></div>
				<div class="b-6-consultant-info">
					<div class="name"><?=includeArea("b-6-question-consultant");?></div>
					<div class="post"><?=includeArea("b-6-question-consultant-post");?></div>
				</div>
			</div>
		</div>
		<div class="b-6-back"></div>
		<div class="b-6-right border-orange">
			<form class="b-form" action="/send/car-selection.php" method="POST">
				<h3><?=includeArea("b-6-form-title");?></h3>
				<p><?=includeArea("b-6-form-text");?></p>
				<div class="b-input">
					<input type="text" name="name" placeholder="Ваше имя">
				</div>
				<div class="b-input">
					<input type="text" name="phone" placeholder="Ваш телефон" required>
				</div>
				<div class="b-textarea">
					<textarea rows="1" name="question" placeholder="Какой у вас вопрос?" required></textarea>
				</div>
				<input type="text" name="MAIL" required placeholder="Ваш e-mail">
				<a href="#" class="b-btn ajax"><span>Подобрать</span></a>
				<div class="b-checkbox">
					<input id="b-6-question-checkbox" type="checkbox" name="politics" checked required>
					<label for="b-6-question-checkbox">
						<div class="b-checked icon-checked"></div>
						<p>Я принимаю условия передачи информации</p>
					</label>
				</div>
				<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
			</form>
		</div>
	</div>
</div>