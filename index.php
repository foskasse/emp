<?php

include_once("simple_html_dom.php");

// se t target url to crawl
$url = "https://www.einforma.pt/novas-empresas"; // change this

// op en the web page
$html = new simple_html_dom();
$html->load_file($url);

// array to store scraped links
$links = array();

// crawl the webpage for links
foreach($html->find("a") as $link){
    array_push($links, $link->href);
}

// remove duplicates from the links array
$links = array_unique($links);

// set output headers to download file
//header("Content-Type: text/csv; charset=utf-8");
//header("Content-Disposition: attachment; filename=links.csv");

// set file handler to output stream
$output = fopen("php://output", "w");
// output the scraped links

//$rest = substr("$links");
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}


$a json_encode($links);

$parsed = get_string_between($a, '[tag]', '[/tag]');

//echo $parsed; // (result = dog)
//print_r($links);
// fputcsv($output, $links, "\n");
?>