<?php

include __DIR__ . "/../vendor/autoload.php";

$dflow = new \juanmicl\dummiesflow\dummiesFlow();

// set Agent Name from web demo - https://bot.dialogflow.com/(AGENTNAME)
$dflow->setAgent("chatbot2");

// generate random sessionId
$sessid = $dflow->genSession();

echo $response = $dflow->query($sessid, "Hola!");

?>