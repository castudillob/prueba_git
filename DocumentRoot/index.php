<html>
<h1>Docker SOAP Example</h1>
Is soap installed? <?php echo class_exists('\SoapClient') ? "Yes" : "No"; ?>
<h2>Working Example</h2>
<?php $sillyNumber = is_numeric($_GET['degrees']) ? $_GET['degrees'] : 0; ?>
How much is <?php echo $sillyNumber ?> °F in °C? <?php
// convert number using example service from http://www.webservicex.net/WS/WSDetails.aspx?WSID=31&CATID=13
$client = new \SoapClient('http://www.webservicex.net/ConvertTemperature.asmx?WSDL');
$args = [
    'Temperature' => $sillyNumber,
    'FromUnit' => 'degreeFahrenheit',
    'ToUnit' => 'degreeCelsius'
];

echo $client->ConvertTemp($args)->ConvertTempResult; ?> °C

<small>Add ?degrees=&lt;double&gt; to change the requested value</small>
