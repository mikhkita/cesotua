<?/** @var $block array */
?>
<?
$params = array(
    'width' => 90,
    'height' => 80,
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

$format = end(explode(".", $block['image-4']['file']['SRC']));
if($format == "svg"){
	$image4 = $block['image-4']['file'];
}else{
	$image4 = Sprint\Editor\Blocks\Image::getImage($block['image-4'], $params);
}

$format = end(explode(".", $block['image-5']['file']['SRC']));
if($format == "svg"){
	$image5 = $block['image-5']['file'];
}else{
	$image5 = Sprint\Editor\Blocks\Image::getImage($block['image-5'], $params);
}

?>

<div class="b b-advantage-services">
	<div class="b-block">
		<h2 class="b-title"><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></h2>
		<h3 class="b-title"><?=Sprint\Editor\Blocks\Text::getValue($block['subtitle'])?></h3>
		<div class="b-advantage-services-list slider-cont mobile-slider">
			<div class="b-advantage-services-item">
				<img src="<?=$image1['SRC']?>">
				<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-1'])?></h3>
				<div class="b-advantage-item-line"></div>
				<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-1'])?></p>
			</div>
			<div class="b-advantage-services-item">
				<img src="<?=$image2['SRC']?>">
				<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-2'])?></h3>
				<div class="b-advantage-item-line"></div>
				<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-2'])?></p>
			</div>
			<div class="b-advantage-services-item">
				<img src="<?=$image3['SRC']?>">
				<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-3'])?></h3>
				<div class="b-advantage-item-line"></div>
				<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-3'])?></p>
			</div>
			<div class="b-advantage-services-item">
				<img src="<?=$image4['SRC']?>">
				<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-4'])?></h3>
				<div class="b-advantage-item-line"></div>
				<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-4'])?></p>
			</div>
			<div class="b-advantage-services-item">
				<img src="<?=$image5['SRC']?>">
				<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title-5'])?></h3>
				<div class="b-advantage-item-line"></div>
				<p><?=Sprint\Editor\Blocks\Text::getValue($block['text-5'])?></p>
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

