<?php
namespace Aranyasen\HL7\Segments;
use Aranyasen\HL7\Message;
use Aranyasen\HL7\Segment;
require_once('./vendor/autoload.php');
function first($tipo_field_9){
// Create an empty Message object, and populate MSH and PID segments...
//parametros del mensaje
//function first(){
  $fields=array("app_origen"=>"EPATH","lugar_origen"=>"LABAPAT","app_destino"=>"HISHNV","lugar_destino"=>"HNV");
	//$tipo_field_9="QBP^Q23^QBP_Q21";
	$msg = new Message();
	$msh = new MSH();
	$msg->addSegment($msh); // Message is: "MSH|^~\&|||||20171116140058|||2017111614005840157||2.3|\n"
	$msh->setField(9,$tipo_field_9);
	$msh->setField(11,"D");
	$n=3;
	foreach ( $fields as $key => $value )
	{
		$msh->setField($n,$value);
		$n=$n+1;
	}

	echo $msg->toString(true)."\n";
	// Create any custom segment
	$abc = new Segment('QPD');
	$abc->setField(1, 'Q23^Get Corresponding IDs^HL7nnnn');
	echo $msg->toString(true)."\n";
	$abc->setField(4, ['']); // Set an empty field at 4th position. 2nd and 3rd positions will be automatically set to empty
	$msg->setSegment($abc, 1); // Message is now: "MSH|^~\&|||||20171116140058|||2017111614005840157||2.3|\nABC|xyz|\n"
	$publica=$msg->toString(true);
	echo $publica."\n";
	$msg->toFile('his.hl7');
}
//
//first();
?>
