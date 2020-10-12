<?/** @var $block array */
?>

<?
$params = array(
    'width' => 566,
    'height' => 423,
    'exact' => 0,
    //'jpg_quality' => 75
);

$image = Sprint\Editor\Blocks\Image::getImage($block['image'], $params);
?>

<div class="b-image-text">
	<div class="b-block clearfix">
		<img src="<?=$image['SRC']?>">
		<div class="b-image-text-right">
			<h3><?=Sprint\Editor\Blocks\Text::getValue($block['title'])?></h3>
			<p><?=Sprint\Editor\Blocks\Text::getValue($block['text'])?></p>
		</div>
	</div>
</div>

