<?php
function MySQlExecuted($connectionString,$sql)
{
	$arr = explode(",",$connectionString);
	$con = mysqli_connect($arr[0],$arr[1],$arr[2]);
	if (!$con)
	{
		die('Could not connect: ' . mysqli_error());
	}
	mysqli_select_db($con,"paimai");
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
function JsonEncodeWithCallBack($string)
{
	$_GET['callback'].'('.(json_encode($table)).')';
}
?>