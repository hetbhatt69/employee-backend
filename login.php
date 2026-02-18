<?php
session_start();
include "db.php";
include "log.php";

$data=json_decode(file_get_contents("php://input"),true);

$email=$data["email"];
$password=$data["password"];

$stmt=$conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute([$email]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);

if($user && password_verify($password,$user["password"])){

 $_SESSION["user"]=[
  "email"=>$user["email"],
  "role"=>$user["role"]
 ];

 logAction($email,"Login Success",$conn);

 echo json_encode([
  "status"=>"success",
  "user"=>$_SESSION["user"]
 ]);

}else{

 logAction($email,"Login Failed",$conn);

 echo json_encode(["status"=>"error"]);
}
?>
