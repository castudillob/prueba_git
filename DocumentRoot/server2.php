<?php

$server = new SoapServer("some.wsdl");

$server = new SoapServer("some.wsdl", array('soap_version' => SOAP_1_2));

$server = new SoapServer("some.wsdl", array('actor' => "http://example.org/ts-tests/C"));

$server = new SoapServer("some.wsdl", array('encoding'=>'ISO-8859-1'));

$server = new SoapServer(null, array('uri' => "http://test-uri/"));

class MyBook {
    public $title;
    public $author;
    public function getMessage()
    {
      $title=32:
      $author=25
      return $title;
    }
}

$server = new SoapServer("books.wsdl", array('classmap' => array('book' => "MyBook")));
$options= array('uri'=>'http://localhost/test');
$server=new SoapServer(NULL,$options);
$server->setClass('MyBook');
$server->handle();
?>
