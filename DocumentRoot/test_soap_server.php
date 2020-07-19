<?php
// Authentication Server
class Test{
  public function auth($a)
  {
    if($a != '123456789'){
      Throw new SoapFault ('Server','Acceso no autorizado');
    }
  }
  function say()
  {
    return 'Autenticado desde eHL7, Respondiendo OK';
  }
}
$srv = new SoapServer(null, array('uri' => 'http://192.168.0.153/hao'));
$srv->setClass('Test');
$srv->handle();
?>
