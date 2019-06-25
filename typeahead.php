<!DOCTYPE html>
<html>
    <head>
	    
        <script src="jquery.min.js"></script>
        <script src="bootstrap3.js"></script>
        <link rel="stylesheet" href="assets/css/pp.css" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
    	<link rel="stylesheet" href="assets/css/tacosauce.css" />

        <style>
            h2 {
                width: 50%;
            }
        </style>

</head>
<body>
    <span style="display: block; margin-left: 20%; margin-right:20%;">
        <p>
            <a href="typeahead.php">reset page</a>
        </p>
        <br>
        <br>
        <form action="typeahead.php" method="get">
            <p>   
                <input  type="text" style="width: 100%" name="searchterm" id="auto" autocomplete="off" placeholder="Type a CDC title" />

                <input style="margin: 0;" type="submit" value="Submit" />
           </p>
       </form>
    </span>

<script>
$(document).ready(function(){

    $('#auto').typeahead({
        source: function(query, result)
        {
            $.ajax({
                    url:"autocomp.php",
                    method: "POST",
                    data:{query:query},
                    dataType:"json",
                    success:function(data)
                        {
                        result($.map(data, function(item){
                            return item;
                        }));
                        }
                   })
         }
    });
});
</script>
<?php
$query = $_GET['searchterm'];
$string = file_get_contents("cdcdata.json");
$json_a = json_decode($string, true);

$keyola = array();

for($i=0; $i<count($json_a['dataset']); $i++){
    
    if(strpos($json_a['dataset'][$i]['title'], $query) !== false){

        $keyola[] = $json_a['dataset'][$i];

    }
}

if(isset($query)){

    echo '
         <table style="margin-left:20%; margin-right:20%; width: 60%;">
             <tr style="margin-left: 20%; margin-right: 20%;">
                  <td><p><b>Title: </b>'.$keyola[0]["title"].'</p></td></tr>
             <tr style="margin-left: 20%; margin-right: 20%;">
                  <td><p style="text-align: justify;"><b>Description: </b>'.$keyola[0]["description"].'</p></td></tr>
             <tr style="margin-left: 20%; margin-right: 20%;">
                  <td><p><b>Contact: </b>'.$keyola[0]["contactPoint"]['fn'].', '.$keyola[0]['contactPoint']['hasEmail'].'</p></td></tr>
             <tr style="margin-left: 20%; margin-right: 20%;">
                  <td><p><b>URL: </b>'.$keyola[0]["landingPage"].'</p></td></tr>

        </table>
    </body>
    </html>
';
}
else{
    
    echo '
    </body>
    </html>
'
;
}
?>
