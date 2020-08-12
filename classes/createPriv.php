<?php

class createPriv {

	private $PATH_TO_JSON = "../inputs/priv.json";
	//private $PATH_TO_WRITE = "../outputs/priv.csv";

	public function __construct() {
		$json = $this->createObj($this->PATH_TO_JSON);
		$this->writeCSV($json);
	}

	public function createObj(String $pathToJSON) {
		$stringJson = file_get_contents("priv.json");
		return json_decode($stringJson, true); // convert to object
	}

	public function writeCSV(array $json) {
		print_r($json);
	}
}