<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

// SAFE CHECK
if (!$data) {
    echo json_encode([
        "status"=>"error",
        "message"=>"No data received"
    ]);
    exit;
}

$email = $data["email"] ?? "";
$password = $data["password"] ?? "";

if (!$email || !$password) {
    echo json_encode([
        "status"=>"error",
        "message"=>"All fields required"
    ]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode([
        "status"=>"error",
        "message"=>"User not found"
    ]);
    exit;
}

if (password_verify($password, $user["password"])) {
    echo json_encode([
        "status"=>"success"
    ]);
} else {
    echo json_encode([
        "status"=>"error",
        "message"=>"Wrong password"
    ]);
}
?>
