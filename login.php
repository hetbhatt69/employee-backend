<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");

include "db.php";

/* Read JSON input */
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

/* Find user */
$result = pg_query_params(
    $conn,
    "SELECT * FROM users WHERE email=$1",
    [$email]
);

$user = pg_fetch_assoc($result);

if(!$user){
    echo json_encode([
        "status"=>"error",
        "message"=>"User not found"
    ]);
    exit;
}

/* Verify password */
if(!password_verify($password,$user["password"])){
    echo json_encode([
        "status"=>"error",
        "message"=>"Wrong password"
    ]);
    exit;
}

/* Success */
echo json_encode([
    "status"=>"success",
    "user"=>[
        "id"=>$user["id"],
        "email"=>$user["email"],
        "role"=>$user["role"]
    ]
]);
?>
