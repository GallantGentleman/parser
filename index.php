<?php
header("Content-Type: text/html;charset=utf-8");

require_once("simple_html_dom.php");

$url = "page1.html";

$html = new simple_html_dom();
$html = file_get_html($url);

$items = array();
$count = 0;

if ($html->innertext != '' and count($html->find('.product-grid'))) {
	foreach($html->find('div.one') as $div) {
		$items[$count]['title'] = $div->find('div.name', 0)->plaintext;
		$items[$count]['description'] = trim($div->find('div.description', 0)->plaintext);
		$items[$count]['price'] = trim($div->find('div.price', 0)->plaintext);
		$items[$count]['image'] = $div->find('div.image a', 0)->first_child()->src;
		$items[$count]['url'] = $div->find('div.image a', 0)->href;

		$count++;
	}

} else {
	echo "Can't find element";
} 

echo "<pre>";
echo print_r($items);
echo "</pre>";