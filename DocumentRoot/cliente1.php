<?php
// client
$options= array(
  'location' 	=>	"http://localhost/server1.php",
  'uri'		=>	"http://localhost/server1.php"
);
$client=new SoapClient(NULL,$options);
echo $client->getMessage()."\n";  //Hello,World!
echo $client->addNumbers(3,5)."\n"; //  8
?>
