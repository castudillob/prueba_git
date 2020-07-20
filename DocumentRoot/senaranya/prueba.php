<?php
require_once('./vendor/autoload.php');
use Aranyasen\HL7\Message;
use Aranyasen\HL7\Segment;
// Create a Message object from a HL7 string
//$msg = new Message("MSH|^~\\&|1|32|\rPID|||abcd|45|\r"); // Either \n or \r can be used as segment endings
//$msg=new Message("MSH|^~\&|EPATH|LABAPAT|HISHNV|HNV|20200719221717||QBP^Q23^QBP_Q21|2020071922171772935|D|2.3|\rQPD|Q23^Get Corresponding IDs^HL7nnnn||||\r");
$msg= new Message("MSH|^~\&|||||||ORU^R01|00001|P|2.3.1|\nOBX|1||11^AA|\nOBX|1||22^BB|\n");
echo $msg->isempty()."numero 0 \n";
$pid = $msg->getSegmentByIndex(1);
$msh = $msg->getSegmentByIndex(0);
$componente=$msh->getField(9);
echo $componente[0]." componente\n";
echo $msh->getField(9)."numero 2 \n";
echo $pid->getField(3)."numero 3 \n"; // prints 'abcd'
echo $msg->toString(true); // Prints entire HL7 string
//prueba de recepcion de mensaje de his
$salida = $msg->toString(true);
$rec = new Message($salida);
$rmsh = $rec->getSegmentByIndex(0);
$componente_recibido=$rmsh->getField(9);
foreach ($componente_recibido as $valor) {
  echo $valor." estara bien\n";
}
echo $componente_recibido[0]." numero 2 recibido ok\n";
// Get the first segment
$msg->getFirstSegmentInstance('PID'); // Returns the first PID segment. Same as $msg->getSegmentsByName('PID')[0];
// Check if a segment is present in the message object
$msg->hasSegment('PID'); // return true or false based on whether PID is present in the $msg object
echo $msg->hasSegment('MSA')."numero 4 \n";
// Check if a message is empty
$msg = new Message();
$msg->isempty(); // Returns true
echo $msg->isempty()."numero 5 \n";
?>
