<?php
namespace Aranyasen\HL7\Segments;
require_once('./vendor/autoload.php');

use Aranyasen\HL7\Message;


use Aranyasen\HL7\Segment;
// Create an empty Message object, and populate MSH and PID segments... 
$msg = new Message();
$msh = new MSH();
$msg->addSegment($msh); // Message is: "MSH|^~\&|||||20171116140058|||2017111614005840157||2.3|\n"
$msh->setField(9,'ACK^A01^ADT_A01');
echo $msg->toString(true)."\n";
// Create any custom segment
$abc = new Segment('ABC');
$abc->setField(1, 'xyz');
$abc->setField(4, ['']); // Set an empty field at 4th position. 2nd and 3rd positions will be automatically set to empty
$msg->setSegment($abc, 1); // Message is now: "MSH|^~\&|||||20171116140058|||2017111614005840157||2.3|\nABC|xyz|\n"
echo $msg->toString(true)."\n";

// Create a defined segment (To know which segments are defined in this package, look into Segments/ directory)
// Advantages of defined segments over custom ones (shown above) are 1) Helpful setter methods, 2) Auto-incrementing segment index 
$pid = new PID(); // Automatically creates PID segment, and adds segment index at PID.1
$lastname="Astu";
$middlename="Bernardo";
$suffix="Super";
//$pid->setPatientName([$lastname, $firstname, $middlename, $suffix]); // Use a setter method to add patient's name at standard position (PID.5)
//$pid->setField('abcd', 5); // Apart from standard setter methods, you can manually set a value at any position too
//unset $pid; // Destroy the segment and decrement the id number. Useful when you want to discard a segment.
?>
