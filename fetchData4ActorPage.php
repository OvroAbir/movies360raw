<?php  
ob_start();
$actorName = $_GET['actorName'];

$username="sakib"; // Oracle username
$password="sakib"; // Oracle password 

$conn=oci_connect($username,$password,'127.0.0.1/orcl') or die("can't connect");

$string = "SELECT ACTOR_ID, NAME, GENDER_ID, TO_CHAR(BIRTH_DATE, 'DD/MM/YYYY'), HEIGHT, COUNTRY_ID FROM ACTOR WHERE NAME = ". "'$actorName'";
$query1 = oci_parse($conn, $string);
oci_execute($query1);
$ACTOR_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS);
if (!isset($ACTOR_Row[0])) {
	header("location:index.php");
}

if($ACTOR_Row[2] == 1) $gender = 'Male';
else $gender = 'Female';

$string = 'SELECT COUNTRY_NAME FROM COUNTRY WHERE COUNTRY_ID = '. "$ACTOR_Row[5]";
$query1 = oci_parse($conn, $string);
oci_execute($query1);
$COUNTRY_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS);
ob_end_flush();
?>