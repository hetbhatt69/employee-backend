<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
?>
<?php
include "db.php";

$data=json_decode(file_get_contents("php://input"),true);

$name=$data["name"];
$email=$data["email"];
$password=password_hash($data["password"],PASSWORD_DEFAULT);

$stmt=$conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");

try{
$stmt->execute([$name,$email,$password]);
echo json_encode(["status"=>"success"]);
}catch(Exception $e){
echo json_encode(["status"=>"error","message"=>"Email exists"]);
}
?>
