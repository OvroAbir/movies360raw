<?php  
ob_start();
$username="sakib"; // Oracle username
$password="sakib"; // Oracle password 

$conn=oci_connect($username,$password,'127.0.0.1/orcl') or die("can't connect");

// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password']; 
$page = $_GET['page'];

$queryString1 = "SELECT *
				FROM
				USER_TABLE
				WHERE
				USER_NAME = '".$myusername ."' AND USER_PASSWORD = ORA_HASH('$mypassword', 99999, 5)";
echo($queryString1);
echo('<br>');				

$query1 = oci_parse($conn, $queryString1);
$result = oci_execute($query1);

$count = oci_fetch_all($query1, $result);
echo "<br>Count: $count<br>";
if ($count == 1) {
	session_register("myusername");
	session_register("mypassword");
	header("location:$page.php");
} else {
	header("location:$page.php");
}

ob_end_flush();
?>




