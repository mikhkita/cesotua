<?/** @var $block array */
?>

<div class="b b-2">
	<div class="b-block">
		<h2 class="b-title"><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></h2>
		<h3 class="b-title"><?=Sprint\Editor\Blocks\Text::getValue($block['subtitle'])?></h3>
		<div class="b-sale-list slider-cont mobile-slider">
			<div class="b-sale-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-1.svg">
				<?if(!empty(Sprint\Editor\Blocks\Text::getValue($block['link-1']))):?>
					<a href="<?=Sprint\Editor\Blocks\Text::getValue($block['link-1'])?>">
						<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-1'])?></h3>
					</a>
				<?else:?>
					<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-1'])?></h3>
				<?endif;?>
				<div class="b-sale-item-line"></div>
				<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-1'])?></p>
			</div>
			<div class="b-sale-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-2.svg">
				<?if(!empty(Sprint\Editor\Blocks\Text::getValue($block['link-2']))):?>
					<a href="<?=Sprint\Editor\Blocks\Text::getValue($block['link-2'])?>">
						<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-2'])?></h3>
					</a>
				<?else:?>
					<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-2'])?></h3>
				<?endif;?>
				<div class="b-sale-item-line"></div>
				<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-2'])?></p>
			</div>
			<div class="b-sale-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-3.svg">
				<?if(!empty(Sprint\Editor\Blocks\Text::getValue($block['link-3']))):?>
					<a href="<?=Sprint\Editor\Blocks\Text::getValue($block['link-3'])?>">
						<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-3'])?></h3>
					</a>
				<?else:?>
					<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-3'])?></h3>
				<?endif;?>
				<div class="b-sale-item-line"></div>
				<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-3'])?></p>
			</div>
			<div class="b-sale-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/number-4.svg">
				<?if(!empty(Sprint\Editor\Blocks\Text::getValue($block['link-4']))):?>
					<a href="<?=Sprint\Editor\Blocks\Text::getValue($block['link-4'])?>">
						<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-4'])?></h3>
					</a>
				<?else:?>
					<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-4'])?></h3>
				<?endif;?>
				<div class="b-sale-item-line"></div>
				<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-4'])?></p>
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

