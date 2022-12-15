<?php
use App\CsvExportableDocument;
use App\HtmlDocument;
use App\Util;

require_once __DIR__.'/vendor/autoload.php';

$document = new HtmlDocument(__DIR__."/wo_for_parse.html");
$formatter = new Util();

$csv = new CsvExportableDocument();
$csv->export($document, $formatter);