<?php

class createSpreadsheet {

	public function __construct() {
		$client = new \Google_Client();
		$client->setApplicationName("Track Revenue");
		$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
		$client->setAccessType('offline');
		$client->setAuthConfig(__DIR__ . '/../credentials.json');
		$service = new Google_Service_Sheets($client);
		$spreadsheetId = "1RXRDfeOa_uuVdFlx1mUzck-0NEFDUUlTBLqa7_19L3I";

		$range = "congress!D2:F8";
		$response = $service->spreadsheets_values->get($spreadsheetId, $range);
		$values  = $response->getValues();

		if (empty($values)) {
			print "No data found.\n";
		} else {
			$mask = "%10s %=10s %s\n";
			foreach ($values as $row) {
				echo sprintf($mask, $row[2], $row[1], $row[0]);
			}
		}
	}
}