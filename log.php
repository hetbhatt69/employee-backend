<?php
include "db.php";

function logAction($email,$action,$conn){
 $stmt=$conn->prepare("INSERT INTO logs(email,action) VALUES(?,?)");
 $stmt->execute([$email,$action]);
}
?>
