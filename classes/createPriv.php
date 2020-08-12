<?php

class createPriv {

	private $PATH_TO_JSON = "inputs/priv.json";
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
		$output = fopen($PATH_TO_WRITE, "w");
		$headersArr = $this->createHeaders();
		fputcsv($output, $headersArr);

		$headersMapping = array_flip($headersArr);
		foreach ($json as $entity => $values) {
			$row = $this->createEntityPriv($entity, $values, $headersMapping);
			fputcsv($output, $row);
		}

		fclose($output);
	}

	public function createHeaders() {
		$array = array(
    		0 => "",
    		1 => "view_grades",
    		2 => "change_grades",
    		3 => "add_grades",
    		4 => "delete_grades",
    		5 => "view_classes",
    		6 => "change_classes",
    		7 => "add_classes",
    		8 => "delete_classes",
		);

		return $array;
	}

	public function createEntityPriv(String $entity, Array $values, Array $headersMapping) {

		$createdRow = array(
			0 => $entity,
		);

		for ($i = 1; $i <= 8; $i++)
			$createdRow[$i] = 0;

		foreach ($values as $v)
			$createdRow[$headersMapping[$v]] = 1;

		return $createdRow;
	}
}