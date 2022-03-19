<?php
// Uncomment the three lines below for error reporting

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// Get query from post variable

$query = $_GET['term'];

// Get content of JSON object

$string = file_get_contents("../cdc_dataset.json");

// Decode JSON object and store in variable $json

$json = json_decode($string, true);

// Declare data variable and iterate through $json
// to return titles matching the keyword search i  $query

$data = array();

for($i=0; $i<count($json['dataset']); $i++){

    if(stripos($json['dataset'][$i]['title'], $query) != false){

        $data[] = $json['dataset'][$i]['title'];

    }

}

// echo json encoded to feed to autocomplete script

if(count($data)<10){
echo json_encode($data);
}
elseif(count($data)>10){
	for($i=0; $i<10; $i++){
		$results[] = $data[$i];
	}
	echo json_encode($results);
}
?>
