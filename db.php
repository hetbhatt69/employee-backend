<?php

$host = "aws-0-xxx.pooler.supabase.com";
$port = "6543";
$db   = "postgres";
$user = "postgres";
$pass = "YOUR_PASSWORD";

$conn = pg_connect("
host=$host
port=$port
dbname=$db
user=$user
password=$pass
");

if(!$conn){
    echo json_encode([
        "status"=>"error",
        "message"=>"DB connection failed"
    ]);
    exit;
}
?>
