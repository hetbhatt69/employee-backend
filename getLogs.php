<?php
include "db.php";
$logs=$conn->query("SELECT * FROM logs ORDER BY time DESC")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($logs);
?>
