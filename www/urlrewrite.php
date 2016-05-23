<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/examples/my-components/news/#",
		"RULE" => "",
		"ID" => "demo:news",
		"PATH" => "/examples/my-components/news_sef.php",
	),
	array(
		"CONDITION" => "#^/e-store/books/reviews/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/e-store/books/reviews/index.php",
	),
	array(
		"CONDITION" => "#^/e-store/xml_catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/e-store/xml_catalog/index.php",
	),
	array(
		"CONDITION" => "#^/content/articles/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/content/articles/index.php",
	),
	array(
		"CONDITION" => "#^/e-store/books/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/e-store/books/index.php",
	),
	array(
		"CONDITION" => "#^/content/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/content/news/index.php",
	),
	array(
		"CONDITION" => "#^/content/faq/#",
		"RULE" => "",
		"ID" => "bitrix:support.faq",
		"PATH" => "/content/faq/index.php",
	),
);

?>