<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once("../class/user.php");
require_once("../config.php");

$user->json_planes();
?>
