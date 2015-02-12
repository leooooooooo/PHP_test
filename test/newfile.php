<?php
include 'leo.php';

$connectionString='leoloard.mysql.rds.aliyuncs.com,leo,2312481';
$sql = "SELECT * fROM paimai";
$a = MySQlExecuted($connectionString, $sql);
echo json_encode($a);

?>