<?php 
$conn = oci_connect("gjxy","gjxy","(DESCRIPTION =
  (ADDRESS_LIST =
  (ADDRESS = (PROTOCOL = TCP)(HOST = 114.215.128.76)(PORT = 1521))
  )
  (CONNECT_DATA =
  (SERVICE_NAME = orcl)
  ))");   
if (!$conn) { 
$e = oci_error(); 
print htmlentities($e['message']); 
exit; 
} 
$query = 'select * from TB_PM_LIST t'; // ��ѯ��� 
$stid = oci_parse($conn, $query); // ����SQL��䣬׼��ִ�� 
if (!$stid) { 
$e = oci_error($conn); 
print htmlentities($e['message']); 
exit; 
} 
$r = oci_execute($stid, OCI_DEFAULT); // ִ��SQL��OCI_DEFAULT��ʾ��Ҫ�Զ�commit 
if(!$r) { 
$e = oci_error($stid); 
echo htmlentities($e['message']); 
exit; 
} 
// ��ӡִ�н�� 
print '<table border="1">'; 
while($row = oci_fetch_array($stid, OCI_RETURN_NULLS)) { 
print '<tr>'; 
foreach($row as $item) { 
print '<td>'.($item?htmlentities($item):' ').'</td>'; 
} 
print '</tr>'; 
} 
print '</table>'; 
oci_close($conn); 
?>
