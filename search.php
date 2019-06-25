<?php
// Uncomment the three lines below for error reporting

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// Get query from post variable

$query = $_GET['query'];

// Get content of JSON object

$string = file_get_contents("ppdata.json");

// Decode JSON object and store in variable $json_a

$json_a = json_decode($string, true);

// Declare data variable and iterate through $json_a
// to return titles matching the keyword search i  $query

$data = array();

for($i=0; $i<count($json_a['dataset']); $i++){

    if(strpos($json_a['dataset'][$i]['title'], $query) != false){

        $data[] = $json_a['dataset'][$i]['title'];

    }

}

// echo json encoded to feed to autocomplete script

echo json_encode($data);

?>
