<?php
require_once('./vendor/autoload.php');
use Aranyasen\HL7\Message;
use Aranyasen\HL7\Segment;
// Create a Message object from a HL7 string
$msg = new Message("MSH|^~\\&|1|\rPID|||abcd|\r"); // Either \n or \r can be used as segment endings
echo $msg->isempty()."\n";
$pid = $msg->getSegmentByIndex(1);
$msh = $msg->getSegmentByIndex(0);
echo $msh->getField(1)."\n";
echo $pid->getField(3)."\n"; // prints 'abcd'
echo $msg->toString(true); // Prints entire HL7 string

// Get the first segment
$msg->getFirstSegmentInstance('PID'); // Returns the first PID segment. Same as $msg->getSegmentsByName('PID')[0];
// Check if a segment is present in the message object
$msg->hasSegment('PID'); // return true or false based on whether PID is present in the $msg object
echo $msg->hasSegment('MSA')."\n";
// Check if a message is empty
$msg = new Message();
$msg->isempty(); // Returns true
echo $msg->isempty()."\n";
?>
