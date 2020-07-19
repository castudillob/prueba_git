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
				   array('parametro' => 'xsd:string','parametro1' => 'xsd:string'), // Parametros de entrada
				   array('return' => 'xsd:string'), // Parametros de salida
				   $miURL);
function getRespuesta($parametro,$parametro1){
	//$testigo="testigo1";
	if($parametro1 == "testigo")
	 return new soapval('return', 'xsd:string', 'soy servidor y devuelvo: '.$parametro);
	else
	 return new soapval('return', 'xsd:string', 'password no concide: '.$parametro);
}
/*function doAuthenticate(){    
if(isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW']) )
          {
           //here I am hardcoding. You can connect to your DB for user authentication.    

           if($_SERVER['PHP_AUTH_USER']=="abhishek" and $_SERVER['PHP_AUTH_PW']="123456" )
                return true;
           else
               return  false;                   

           }
}*/

#la linea siguiente debio ser comentada
#$server->service($HTTP_RAW_POST_DATA);
$server->service(file_get_contents("php://input"));
?>
