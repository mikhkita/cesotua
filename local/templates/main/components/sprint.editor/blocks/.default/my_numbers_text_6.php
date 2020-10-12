<?/** @var $block array */
?>

<div class="b b-3 b-advantage-numbers">
	<div class="border-top-left"></div>
	<div class="b-back-dark blue"></div>
	<div class="b-block">
		<h2 class="b-title white"><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></h2>
		<h3 class="b-title white"><?=Sprint\Editor\Blocks\Text::getValue($block['subtitle'])?></h3>
		<div class="b-advantage-numbers-list slider-cont mobile-slider">
			<?if(Sprint\Editor\Blocks\Text::getValue($block['text-1'])):?>
				<div class="b-advantage-numbers-item">
					<img src="/local/templates/main/html/i/1.svg">
					<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-1'])?></p>
				</div>
			<?endif;?>
			<?if(Sprint\Editor\Blocks\Text::getValue($block['text-2'])):?>
				<div class="b-advantage-numbers-item">
					<img src="/local/templates/main/html/i/2.svg">
					<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-2'])?></p>
				</div>
			<?endif;?>
			<?if(Sprint\Editor\Blocks\Text::getValue($block['text-3'])):?>
				<div class="b-advantage-numbers-item">
					<img src="/local/templates/main/html/i/3.svg">
					<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-3'])?></p>
				</div>
			<?endif;?>
			<?if(Sprint\Editor\Blocks\Text::getValue($block['text-4'])):?>
				<div class="b-advantage-numbers-item">
					<img src="/local/templates/main/html/i/4.svg">
					<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-4'])?></p>
				</div>
			<?endif;?>
			<?if(Sprint\Editor\Blocks\Text::getValue($block['text-5'])):?>
				<div class="b-advantage-numbers-item">
					<img src="/local/templates/main/html/i/5.svg">
					<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-5'])?></p>
				</div>
			<?endif;?>
			<?if(Sprint\Editor\Blocks\Text::getValue($block['text-6'])):?>
				<div class="b-advantage-numbers-item">
					<img src="/local/templates/main/html/i/6.svg">
					<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-6'])?></p>
				</div>
			<?endif;?>
		</div>
		<div class="center mobile-nav">
			<div class="b-slider-custom-nav white-nav">
				<div class="b-slider-custom-nav-slides">
					<span class="current">1</span><span class="count"></span>
				</div>
				<div class="b-slider-custom-nav-dots">
					
				</div>
			</div>
		</div>
	</div>
	<div class="border-bottom-left"></div>
	<div class="border-orange-gradient top">
		<svg width="1600" height="87" viewBox="0 0 1600 87" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M0 60L1600 0V4L0 87V60Z" fill="url(#paint0_linear)"></path>
			<defs>
				<linearGradient id="paint0_linear" x1="800" y1="-43.5" x2="790.567" y2="129.987" gradientUnits="userSpaceOnUse">
					<stop stop-color="#FFAB35"></stop>
					<stop offset="1" stop-color="#F16E2A"></stop>
				</linearGradient>
			</defs>
		</svg>
	</div>
</div>

