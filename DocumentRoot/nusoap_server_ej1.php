<?php
require_once('nusoap/lib/nusoap.php');
$miURL = 'http://localhost';
$server = new soap_server();
$server->configureWSDL('ws_orlando', $miURL);
$server->wsdl->schemaTargetNamespace=$miURL;


/*
 *  Ejemplo 1: getRespuesta es una funcion sencilla que recibe un parametro y retorna el mismo
 *  con un string anexado
 */
$server->register('getRespuesta', // Nombre de la funcion
				   array('parametro' => 'xsd:string'), // Parametros de entrada
				   array('return' => 'xsd:string'), // Parametros de salida
				   $miURL);
function getRespuesta($parametro){
	return new soapval('return', 'xsd:string', 'soy servidor y devuelvo: '.$parametro);
}
#la linea siguiente debio ser comentada
#$server->service($HTTP_RAW_POST_DATA);
$server->service(file_get_contents("php://input"));
?>
