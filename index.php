<?php
header("Content-Type: text/html;charset=utf-8");

require_once("lib/simple_html_dom.php");

$page = 1;

$items = array();
$count = 0;

do {
	$url = "pages/page" . $page . ".html";

	$html = new simple_html_dom();
	$html = file_get_html($url);

	if ($html->innertext != '' and count($html->find('.product-grid'))) {
		foreach($html->find('div.one') as $div) {
			$items[$count]['title'] = $div->find('div.name', 0)->plaintext;
			$items[$count]['description'] = trim($div->find('div.description', 0)->plaintext);
			$items[$count]['price'] = trim($div->find('div.price', 0)->plaintext);
			$items[$count]['image'] = $div->find('div.image a', 0)->first_child()->src;
			$items[$count]['url'] = $div->find('div.image a', 0)->href;
			$items[$count]['category'] = "Шпонированные двери / Двери экошпон";

			$count++;
		}
		
		$page++;
	}

} while($page <= 2);

require("view/csv_table.php");