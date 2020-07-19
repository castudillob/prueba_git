<?php

$client = new SoapClient(null, array(
      'location' => "http://localhost/server.php",
      'uri'      => "http://localhost/server.php",
      'trace'    => 1 ));

try {
    echo $return = $client->__soapCall("saludar", ["mundo!" ] );
} catch ( SOAPFault $e ) {
    echo $e->getMessage().PHP_EOL;
}
?>
