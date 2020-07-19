<?php
//namespace Aranyasen\HL7\Segments;
require_once('./vendor/autoload.php');

use Aranyasen\HL7\Message;


use Aranyasen\HL7\Segment;
$hl7String = "MSH|^~\&|||||||ORU^R01|00001|P|2.3.1|\n" . "OBX|1||11^AA|\n" . "OBX|1||22^BB|\n";
$msg = new Message($hl7String, null, true, true, false); // $msg contains both OBXs with given indexes in the string
echo $msg->toString(true); // Prints entire HL7 string
$msg->toFile('some.hl7'); // Write to a file
?>
