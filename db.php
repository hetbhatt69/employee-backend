<?php
$host = "aws-1-ap-southeast-2.pooler.supabase.com";
$db = "postgres";
$user = "postgres.xxxxx"; // your user
$pass = "YOUR_PASSWORD";

try {
$conn = new PDO("pgsql:host=$host;port=5432;dbname=$db",$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
echo json_encode(["status"=>"error","message"=>"DB connection failed"]);
exit;
}
?>
