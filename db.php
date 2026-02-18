<?php
$host = "db.wjrdxtzuiywrmuljsltr.supabase.co";
$dbname = "postgres";
$user = "postgres";
$password = "Hey@28bhatt";

$conn = new PDO(
 "pgsql:host=$host;port=6543;dbname=$dbname;sslmode=require",
 $user,
 $password
);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
