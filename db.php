<?php

$host = "aws-1-ap-southeast-2.pooler.supabase.com";
$port = "5432";
$dbname = "postgres";
$user = "postgres.wjrdxtzuiywrmuljsltr";
$password = "YOUR_DATABASE_PASSWORD";  // ← paste your Supabase DB password

try {
    $conn = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require",
        $user,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    echo "DB ERROR: " . $e->getMessage();
}
?>
