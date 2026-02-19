<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Content-Type: application/json");

if($_SERVER["REQUEST_METHOD"] === "OPTIONS"){
    exit;
}

include "db.php";

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

$query = pg_query_params($conn,
    "SELECT * FROM users WHERE email=$1",
    [$email]
);

$user = pg_fetch_assoc($query);

if(!$user){
    echo json_encode([
        "status"=>"error",
        "message"=>"User not found"
    ]);
    exit;
}

if(!password_verify($password, $user["password"])){
    echo json_encode([
        "status"=>"error",
        "message"=>"Wrong password"
    ]);
    exit;
}

echo json_encode([
    "status"=>"success",
    "user"=>$user
]);
