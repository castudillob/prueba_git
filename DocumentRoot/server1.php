<?php
// server
class MySoapServer
{
  public function getMessage()
  {
    return 'Hello,World!';
  }
  
  public function addNumbers($num1,$num2)
  {
    return $num1+$num2;
  }
}

$options= array('uri'=>'http://localhost/test');
$server=new SoapServer(NULL,$options);
$server->setClass('MySoapServer');
$server->handle();
?>
