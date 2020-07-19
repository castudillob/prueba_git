<?php
// client

function first(){ //function parameters, two variables.
    $options= array(
	'location'    =>      "http://localhost/server1.php",
  	'uri'         =>      "http://localhost/server1.php"
    );
    $client=new SoapClient(NULL,$options);
    return $client->getMessage()."\n";  //Hello,World!
    //echo $client->addNumbers(3,5)."\n"; //  8
}
?>
