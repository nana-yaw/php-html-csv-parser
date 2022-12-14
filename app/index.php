<?php
use App\Util;

require_once __DIR__.'/../vendor/autoload.php';

$document = new App\HtmlDocument("../wo_for_parse.html");

Util::println($document->getTrackingNumber());
Util::println($document->getPoNumber());
$schDate = Util::formatScheduledDate($document->getScheduledDate());
Util::print($schDate);
Util::println($document->getCustomer());
Util::println($document->getTrade());
$newNte = Util::formatNte($document->getNte());
Util::print($newNte);
Util::println($document->getStoreID());
$addressDetails = Util::formatAddress($document->getAddress());
Util::print($addressDetails["street"]);
Util::print($addressDetails["city"]);
Util::print($addressDetails["state"]);
Util::print($addressDetails["zip_code"]);
$phoneNumber = Util::formatPhoneNumber($document->getPhoneNumber());
Util::print($phoneNumber);
?>