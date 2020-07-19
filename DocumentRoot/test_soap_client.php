<?php
// Encrypted Client
$cli = new SoapClient(null, array('uri' => 'http://localhost/', 'location' => 'http://localhost/test_soap_server.php', 'trace' => true,'encoding'=>'utf-8'));
$h = new SoapHeader('http://localhost', 'auth', '123456789', false, SOAP_ACTOR_NEXT);
$cli->__setSoapHeaders(array($h));
try {
echo $cli->say()."\n";
} catch (Exception $e) {
echo $e->getMessage()."\n";
}
?>
