<?php
require_once("../../classes/class.Server.inc.php");

$server = new SERVER();
$servers = $server->GetServers();
$serverInfo = $server->GetTracker($servers[0]["SERVER"]);
$gameStyle = ($serverInfo["PVP"] == 1) ? 'PVP' : 'PVE';
$cluster = ($serverInfo["EPIC"] == 1) ? 'Epic' : 'Freedom';

$img = imagecreatefrompng("vert.png");
$color = imagecolorallocate($img, 255, 255, 255);
imagestring($img, 2, 13, 60, $serverInfo["NAME"], $color);

imagestring($img, 2, 13, 90, $serverInfo["COUNT"] . "/" . $serverInfo["MAXPLAYERS"], $color);

imagestring($img, 2, 13, 120, "Game mode: " . $gameStyle, $color);
imagestring($img, 2, 13, 134, "Cluster: " . $cluster, $color);
imagestring($img, 2, 13, 148, "Max creatures: " . $serverInfo["MAXCREATURES"], $color);
imagestring($img, 2, 13, 162, "Aggressive creatures: " . round($serverInfo["MAXCREATURES"] * ($serverInfo["PERCENT_AGG_CREATURES"] / 100)) . "(" . $serverInfo["PERCENT_AGG_CREATURES"] ."%)", $color);
imagestring($img, 2, 13, 176, "Skill gain rate: " . $serverInfo["SKILLGAINRATE"], $color);
imagestring($img, 2, 13, 190, "Action timer: " . $serverInfo["ACTIONTIMER"], $color);

header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);

?>