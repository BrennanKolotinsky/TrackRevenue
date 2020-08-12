<?php

class createPriv {

	private $PATH_TO_JSON = "priv.json";

	public function __construct() {
		$json = $this->createObj($this->PATH_TO_JSON);
	}

	public function createObj(String $pathToJSON) {
		$stringJson = file_get_contents("priv.json");
		return json_decode($stringJson, true); // convert to object
	}
}