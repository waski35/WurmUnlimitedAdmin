<?php
$response = array();

require(dirname(__FILE__) . "/../classes/class.Server.inc.php");

$server = new SERVER();

$serverList = $server->GetServers($_POST);

$response = $serverList;


echo json_encode($response);
?>