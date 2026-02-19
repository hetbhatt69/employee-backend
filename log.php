<?php
include "db.php";
$data=json_decode(file_get_contents("php://input"),true);

$stmt=$conn->prepare("INSERT INTO logs(user_email,action) VALUES(?,?)");
$stmt->execute([$data["email"],$data["action"]]);

echo json_encode(["status"=>"logged"]);
?>
