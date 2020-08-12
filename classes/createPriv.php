<?php

class createPriv {

	private $PATH_TO_JSON = "priv.json";
	private $PATH_TO_WRITE = "outputs/priv.csv";

	public function __construct() {
		$json = $this->createObj($this->PATH_TO_JSON);
		$this->writeCSV($json, $this->PATH_TO_WRITE);
	}

	public function createObj(String $pathToJSON) {
		$stringJson = file_get_contents("priv.json");
		return json_decode($stringJson, true); // convert to object
	}

	public function writeCSV(Array $json, String $PATH_TO_WRITE) {
		print_r($json);
		$output = fopen($PATH_TO_WRITE, "w");
	}
}