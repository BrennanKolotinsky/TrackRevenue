<?php
include_once('classes/createPriv.php'); // this will convert our JSON into a CSV
require __DIR__ . "/vendor/autoload.php"; // load in Google API code
include_once("classes/createSpreadsheet.php"); // prep to write to the API

// Create the google client!
$createPriv = new createPriv();
$googleClient = new createSpreadsheet();
// var_dump($createPriv->getFinishedCSV());