<?php
session_start();
include "db.php";

if(!isset($_SESSION["user"])){
 echo json_encode(["status"=>"unauthorized"]);
 exit;
}

$res = $conn->query("SELECT email,role FROM users");

echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
?>
