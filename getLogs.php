<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
?>
<?php
include "db.php";
$logs=$conn->query("SELECT * FROM logs ORDER BY time DESC")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($logs);
?>
