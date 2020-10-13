<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';
$strReturn .= '<ul class="b-breadcrumbs clearfix" itemscope itemtype="https://schema.org/BreadcrumbList">';

$itemSize = count($arResult);

for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if(($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)){
		$strReturn .= '<li id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item"><span itemprop="name">'.$title.'</span></a><meta itemprop="position" content="'.($index+1).'" /></li>';
	}else{
		// if($GLOBALS["isDetailArticle"]){
		// 	$strReturn .= '<li id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item"><span itemprop="name">'.$title.'</span></a><meta itemprop="position" content="'.($index+1).'" /></li><li></li>';
		// }else{
			$strReturn .= '<li><span>'.$title.'</span></li>';
		// }
		
	}
}

$strReturn .= '</ul>';

return $strReturn;
