<?php
session_start();
include "db.php";

if(!isset($_SESSION["user"])){
 echo json_encode(["status"=>"no"]);
 exit;
}

echo json_encode($_SESSION["user"]);
?>
