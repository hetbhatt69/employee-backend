<?php

$host = "db.YOUR_SUPABASE_ID.supabase.co";
$dbname = "postgres";
$user = "postgres";
$password = "YOUR_DB_PASSWORD";

try {
    $conn = new PDO(
        "pgsql:host=$host;port=5432;dbname=$dbname",
        $user,
        $password
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo json_encode([
        "status"=>"error",
        "message"=>"DB connection failed"
    ]);
    exit;
}
