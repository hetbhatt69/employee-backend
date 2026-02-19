<?php

$host = "aws-1-ap-southeast-2.pooler.supabase.com";
$port = "5432";
$db   = "postgres";
$user = "postgres.wjrdxtzuiywrmuljsltr";
$pass = "YOUR_PASSWORD"; // paste supabase DB password

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
