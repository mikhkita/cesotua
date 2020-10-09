<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404. Страница не найдена");
?>

<div class="b-404-content">
	<div class="b-block">
		<div class="b-404-left">
			<div class="b-404-head">404</div>
			<div class="b-404-no-found">Страница не найдена</div>
			<div class="b-text">Запрашиваемая страница не существует. Попробуйте изменить адрес или начните работу на сайте с <a href="/">главной страницы</a></div>
		</div>
		<div class="b-404-right">

		</div>
	</div>
</div>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>