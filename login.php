<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
?>

<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include "db.php";

/* READ JSON BODY */
$data = json_decode(file_get_contents("php://input"), true);

if(!$data){
    echo json_encode([
        "status"=>"error",
        "message"=>"No data received"
    ]);
    exit;
}

$email = $data["email"];
$password = $data["password"];

/* CHECK USER */
$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$user){
    echo json_encode([
        "status"=>"error",
        "message"=>"User not found"
    ]);
    exit;
}

/* VERIFY PASSWORD */
if(password_verify($password,$user["password"])){

    echo json_encode([
        "status"=>"success",
        "user"=>[
            "id"=>$user["id"],
            "name"=>$user["name"] ?? "User",
            "email"=>$user["email"],
            "role"=>$user["role"]
        ]
    ]);

}else{
    echo json_encode([
        "status"=>"error",
        "message"=>"Wrong password"
    ]);
}
