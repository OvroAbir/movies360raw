<?php  
ob_start();
$username="sakib"; // Oracle username
$password="sakib"; // Oracle password 

$conn=oci_connect($username,$password,'127.0.0.1/orcl') or die("can't connect");

// username and password sent from form
$myusername=$_POST['adminNameTextField'];
$mypassword=$_POST['adminPassTextField']; 

$queryString = "SELECT *
				FROM
				ADMIN_PANEL
				WHERE
				ADMIN_NAME = '".$myusername ."' AND PASSWORD = ORA_HASH('$mypassword', 99999, 5)";
echo($queryString);
echo('<br>');				

$query1 = oci_parse($conn, $queryString);
$result = oci_execute($query1);

$count = oci_fetch_all($query1, $result);
echo "<br>Count: $count<br>";
if ($count == 1) {
	session_register("myusername");
	session_register("mypassword");
	header("location:adminEditPage.php");
} else {
	header("location:adminLogin.php");
}

ob_end_flush();
?>