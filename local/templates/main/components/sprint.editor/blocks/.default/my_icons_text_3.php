<?/** @var $block array */
?>
<?
$params = array(
    'width' => 80,
    'height' => 100,
    'exact' => 0,
    //'jpg_quality' => 75
);

$format = end(explode(".", $block['image-1']['file']['SRC']));

if($format == "svg"){
	$image1 = $block['image-1']['file'];
}else{
	$image1 = Sprint\Editor\Blocks\Image::getImage($block['image-1'], $params);
}

$format = end(explode(".", $block['image-2']['file']['SRC']));
if($format == "svg"){
	$image2 = $block['image-2']['file'];
}else{
	$image2 = Sprint\Editor\Blocks\Image::getImage($block['image-2'], $params);
}

$format = end(explode(".", $block['image-3']['file']['SRC']));
if($format == "svg"){
	$image3 = $block['image-3']['file'];
}else{
	$image3 = Sprint\Editor\Blocks\Image::getImage($block['image-3'], $params);
}

?>

<div class="b b-3 b-services-3">
	<div class="border-top-left"></div>
	<div class="b-back-dark blue"></div>
	<div class="b-block">
		<h2 class="b-title white"><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></h2>
		<h3 class="b-title white"><?=Sprint\Editor\Blocks\Text::getValue($block['subtitle'])?></h3>
		<div class="b-advantage-list slider-cont mobile-slider">
			<div class="b-advantage-item">
				<img src="<?=$image1['SRC']?>">
				<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-1'])?></h3>
			</div>
			<div class="b-advantage-item">
				<img src="<?=$image2['SRC']?>">
				<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-2'])?></h3>
			</div>
			<div class="b-advantage-item">
				<img src="<?=$image3['SRC']?>">
				<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-3'])?></h3>
			</div>
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


