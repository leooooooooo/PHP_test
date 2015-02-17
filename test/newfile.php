<?php

$connectionString='leoloard.mysql.rds.aliyuncs.com,leo,2312481';//$_REQUEST['connectionString']; // $_POST['connectionString'];   //
$sql ="SELECT * fROM paimai.paimai";//$_POST['sql'];//
$a = MySQlExecuted($connectionString, $sql);
echo json_encode($a);

function MySQlExecuted($connectionString,$sql)
{
    $arr = explode(",",$connectionString);
    $con = mysqli_connect($arr[0],$arr[1],$arr[2]);
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con,"");
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
    $table = array();
    $data = array();
    while($row = mysqli_fetch_array($result))
    {
        for($i = 0;$i<count($row)/2;$i++)
        {
            array_push($data, $row[$i]);
        }
        array_push($table, $data);
        $data=array();
    }
    return $table;
}
?>