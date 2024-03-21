<!DOCTYPE html>
<html>
    <head>
	<title>
		JSON Dataset
	</title>
        <script  src="https://code.jquery.com/jquery-3.4.1.min.js"
  >
	</script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  >
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
	</script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />

	<style>

		body {

			background-image: url('/images/bg.jpg');
			background-size: cover;
			background-repeat: repeat;

			font-family: Times;

		}

	</style>

</head>
<body class="bg-light">
    <?php dump("legacy app"); ?>
    <div class="container">
	<div class="row">
		<div class="col">
			<h1>&nbsp;</h1>
		</div>
	</div>
        <div class="row">
	     <div class="col-1">
                  &nbsp;
             </div>
        <div class="card bg-light col-10">
             <div class="card-title">
        <p>
            <a href="index.php">reset page</a>
        </p>
        <br>
	<br>
		<h3 class="text-center text-dark">
			I am a CDC dataset (JSON) displayed with raw PHP
		</h3>
        </div>
	<div class="card-body bg-light">
        <div class="form-group">
        <form action="index.php" method="get">
            <p>
                <input class="form-control" type="text" name="searchterm" id="auto" autocomplete="off" placeholder="Type a CDC title" />

                <input class="form-control btn btn-dark" type="submit" value="Submit" />
           </p>
       </form>
    </div>
<script>
$('#auto').autocomplete({
        source: "json.php",
        minLength: 1
	});
jQuery.ui.autocomplete.prototype._resizeMenu = function () {
  var ul = this.menu.element;
  ul.outerWidth(this.element.outerWidth());
}
</script>
<?php
$query = $_GET['searchterm'];
$string = file_get_contents("cdc_dataset.json");
$json = json_decode($string, true);

$array = array();

for($i=0; $i<count($json['dataset']); $i++){

    if(strpos($json['dataset'][$i]['title'], $query) !== false){

        $array[] = $json['dataset'][$i];

    }
}

if(isset($query)){

	echo '<div class="col-1></div>
		<div class="text-dark col-10">
		  <div class="row">
                    <div class="col"><p class="text-dark"><b>Title: </b>'.$array[0]["title"].'</p></div></div>
             <div class="row">
                  <div class="col"><p class="text-dark"><b>Description: </b>'.$array[0]["description"].'</p></div></div>
             <div class="row">
                  <div class="col"><p class="text-dark"><b>Contact: </b>'.$array[0]["contactPoint"]['fn'].', '.$array[0]['contactPoint']['hasEmail'].'</p></div></div>
             <div class="row">
                  <div class="col"><p class="text-dark"><b>URL: </b>'.$array[0]["landingPage"].'</p></div></div>

	</div>
</div> <div class="col-1">
                  &nbsp;
	     </div>
</div>
</div>
</div>
</div>
    </body>
    </html>
';
}
else{

    echo '	     <div class="col-1">
                  &nbsp;
	     </div>
</div>
</div>
</div>
</div>
    </body>
    </html>
'
;
}
?>
