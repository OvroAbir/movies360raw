<html>
<head>
<title>Hello World</title>
</head>
<body>
The data of Table T1
<?php

$con = oci_connect('system','123','localhost/orcl');
$con = oci_connect('hr','hr','localhost/orcl');
if($con)
	echo 'Connection Successful';
else
	echo 'Connection Failed';

$query = 'select * from T1';
$stid = oci_parse($con, $query);
$r = oci_execute($stid);
//$con = oci_connect('hr','hr','orcl');
// Fetch each row in an associative array
print '<table border="1">';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
	print '<tr>';
		foreach($row as $item)
		{
			//print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
			print '<td>';
			if($item !== null )
				print $item;
			else
				print '&nbsp';
			print '</td>';
		}
		
		print '</tr>';
}
print '</table>';

?>

<table>
<tr>
<td>
<form action="index.php" method="post">
   

    <p>
      <input type="submit" name="Home" value="Home" /> 
    </p>
</form>
</td>
</tr>
</table>
</body>
</html>