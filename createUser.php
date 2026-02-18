<?php
session_start();
include "db.php";

if($_SESSION["user"]["role"]!="admin"){
 echo json_encode(["status"=>"unauthorized"]);
 exit;
}

$data=json_decode(file_get_contents("php://input"),true);

$hash=password_hash($data["password"],PASSWORD_DEFAULT);

$stmt=$conn->prepare("INSERT INTO users(email,password,role) VALUES(?,?,?)");
$stmt->execute([
$data["email"],
$hash,
$data["role"]
]);

echo json_encode(["status"=>"created"]);
?>
