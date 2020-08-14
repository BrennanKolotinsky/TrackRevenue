<?php

class createSpreadsheet {

	private $client;

	public function __construct() {
		// setup and authorize client
		$this->client = new \Google_Client();
		$this->client->setApplicationName("Track Revenue");
		$this->client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
		$this->client->setAccessType('offline');
		$this->client->setAuthConfig(__DIR__ . '/../credentials.json'); // grab the associated email to authorize
	}

	public function writeToApi(Array $data) {
		
		$service = new Google_Service_Sheets($this->client);
		$spreadsheetId = "1BRDfN0gsa99X_xxcRUT7kDSFTmu3vm_jHaVdcyLzGbo"; // ID from the spreadsheet

		$range = "permissions"; // spreadsheet name -- optional parameters to target specified rows/cols
		$body = new Google_Service_Sheets_ValueRange([
			'values' => $data
		]);
		$params = [
			'valueInputOption' => 'RAW'
		];

		$result = $service->spreadsheets_values->update(
			$spreadsheetId,
			$range,
			$body,
			$params
		);

		echo "Successfully wrote to API\n";
	}

	public function readAPIData() {
		$range = "permissions";
		$service = new Google_Service_Sheets($this->client);
		$spreadsheetId = "1BRDfN0gsa99X_xxcRUT7kDSFTmu3vm_jHaVdcyLzGbo"; // ID from the spreadsheet

		$response = $service->spreadsheets_values->get($spreadsheetId, $range);
		$values  = $response->getValues();

		if (empty($values)) {
			print "No data found.\n";
		} else {
			$mask = "%s %s %s %s %s %s %s %s %s\n";
			foreach ($values as $row) {
				echo sprintf($mask, $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
			}
		}
	}

	public function testConn() {
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
			$mask = "%s %s %s\n";
			foreach ($values as $row) {
				echo sprintf($mask, $row[2], $row[1], $row[0]);
			}
		}
	}
}