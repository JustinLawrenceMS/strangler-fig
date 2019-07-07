<!DOCTYPE html>
<html>
    <head>
	    
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  ></script>
        <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  ></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="jqui/jquery-ui.min.css" rel="stylesheet">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />

        <style>
            h2 {
                width: 50%;
	    }
        </style>

</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
	     <div class="col-md-1">
                  &nbsp;
             </div>
        <div class="card bg-dark col-md-10">
             <div class="card-title">
        <p>
            <a href="index.php">reset page</a>
        </p>
        <br>
	<br>
        </div>
	<div class="card-body bg-dark">
        <div class="form-group"> 
        <form action="index.php" method="get">
            <p>   
                <input class="form-control" type="text" name="searchterm" id="auto" autocomplete="off" placeholder="Type a CDC title" />

                <input class="form-control btn btn-secondary" type="submit" value="Submit" />
           </p>
       </form>
    </div>

<script>
$('#auto').autocomplete({
        source: "autocomp.php",
        minLength: 1
	});
jQuery.ui.autocomplete.prototype._resizeMenu = function () {
  var ul = this.menu.element;
  ul.outerWidth(this.element.outerWidth());
}
</script>
<?php
$query = $_GET['searchterm'];
$string = file_get_contents("cdc_data.json");
$json_a = json_decode($string, true);

$keyola = array();

for($i=0; $i<count($json_a['dataset']); $i++){
    
    if(strpos($json_a['dataset'][$i]['title'], $query) !== false){

        $keyola[] = $json_a['dataset'][$i];

    }
}

if(isset($query)){

    echo '
         <table class="table-dark table-responsive">
             <tr>
                  <td><p><b>Title: </b>'.$keyola[0]["title"].'</p></td></tr>
             <tr>
                  <td><p><b>Description: </b>'.$keyola[0]["description"].'</p></td></tr>
             <tr>
                  <td><p><b>Contact: </b>'.$keyola[0]["contactPoint"]['fn'].', '.$keyola[0]['contactPoint']['hasEmail'].'</p></td></tr>
             <tr>
                  <td><p><b>URL: </b>'.$keyola[0]["landingPage"].'</p></td></tr>

	</table>	     <div class="col-md-1">
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
    
    echo '	     <div class="col-md-1">
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
