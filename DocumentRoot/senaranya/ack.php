<?php
use Aranyasen\HL7\Message;
use Aranyasen\HL7\Segment;
use Aranyasen\HL7\Segments\MSA;
use Aranyasen\HL7\Segments\MSH;
function respuesta(){

  require_once('./vendor/autoload.php');
  $msg = new Message("MSH|^~\\&|1|\rABC|1||^AAAA1^^^BB|", null, true);
  $ackResponse = new ACK($msg, ['SEGMENT_SEPARATOR' => '\r\n', 'HL7_VERSION' => '2.5']);
  echo $msg->toString(true)."\n";
}
?>
