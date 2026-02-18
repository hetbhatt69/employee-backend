<?php
session_start();
include "db.php";

if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"]!="admin"){
 echo json_encode(["status"=>"unauthorized"]);
 exit;
}

$data = json_decode(file_get_contents("php://input"), true);

$email = $data["email"];
$password = password_hash($data["password"], PASSWORD_DEFAULT);
$role = $data["role"];

$stmt = $conn->prepare("INSERT INTO users(email,password,role) VALUES(?,?,?)");
$stmt->execute([$email,$password,$role]);

echo json_encode(["status"=>"created"]);
?>
