<?php
include_once('classes/createPriv.php'); // this will convert our JSON into a CSV
require __DIR__ . "/vendor/autoload.php"; // load in Google API code
include_once("classes/createSpreadsheet.php"); // prep to write to the API

$createPriv = new createPriv();
$googleClient = new createSpreadsheet();
$googleClient->writeToApi($createPriv->getFinishedCSV()); // pass the CSV data (in the form of an array)
$googleClient->readAPIData();