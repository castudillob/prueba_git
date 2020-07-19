<?php

class MiClase
{
 public function saludar()
 {
 return 'Hola ' . func_get_args()[0] . PHP_EOL;
 }
}

try {
 $server = new SoapServer(
 null,
 [
 'uri'=> 'http://localhost:8080/soap_server.php',
 ]
 );

 $server->setClass('MiClase');
 $server->handle();
} catch (SOAPFault $f) {
 print $f->faultstring;
}
?>
