<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
?>

<?php
include "db.php";

$data=json_decode(file_get_contents("php://input"),true);

$email=$data["email"];
$password=$data["password"];

$stmt=$conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute([$email]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);

if($user){
    if(password_verify($password,$user["password"])){
        echo json_encode([
            "status"=>"success",
            "role"=>$user["role"],
            "name"=>$user["name"],
            "email"=>$user["email"]
        ]);
    }else{
        echo json_encode(["status"=>"error","message"=>"Wrong password"]);
    }
}else{
    echo json_encode(["status"=>"error","message"=>"User not found"]);
}
?>
