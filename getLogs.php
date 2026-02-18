<?php
session_start();
include "db.php";

if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"]!="admin"){
 echo json_encode(["status"=>"unauthorized"]);
 exit;
}

$res=$conn->query("SELECT * FROM logs ORDER BY time DESC");
echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
?>
