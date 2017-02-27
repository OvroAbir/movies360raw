<?php
ob_start();
$movieName = $_GET['movieName'];  
//$movieName = 'The Shawshank Redemption';
//echo "$movieName";
$username="sakib"; // Oracle username
$password="sakib"; // Oracle password 

$conn=oci_connect($username,$password,'127.0.0.1/orcl') or die("can't connect");

$string = 'SELECT * FROM MOVIE WHERE MOVIE_NAME = '. "'$movieName'";
$query1 = oci_parse($conn, $string);
oci_execute($query1);
$MOVIE_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS);
if (!isset($MOVIE_Row[0])) {
	header("location:index.php");
}
/*foreach ($row as $cell) {
	echo "$cell<br>";
}*/

$string = "SELECT TO_CHAR(RELEASE_DATE, 'YYYY') FROM MOVIE WHERE MOVIE_NAME = '$movieName'";
$query1 = oci_parse($conn, $string);
oci_execute($query1);
$DATE_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS);

$string = "SELECT PROD_HOUSE_NAME FROM PRODUCTION_HOUSE WHERE PROD_HOUSE_ID = $MOVIE_Row[7]";
$query1 = oci_parse($conn, $string);
oci_execute($query1);
$PRODUCTION_HOUSE_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS);
if (!isset($PRODUCTION_HOUSE_Row[0])) {
	$PRODUCTION_HOUSE_Row[0] = "&nbsp";
}

$string = "SELECT DIRECTOR_NAME FROM DIRECTOR WHERE DIRECTOR_ID = $MOVIE_Row[8]";
$query1 = oci_parse($conn, $string);
oci_execute($query1);
$DIRECTOR_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS);
if (!isset($DIRECTOR_Row[0])) {
	$DIRECTOR_Row[0] = "&nbsp";
}

$string = "SELECT COUNTRY_NAME FROM COUNTRY WHERE COUNTRY_ID = $MOVIE_Row[5]";
$query1 = oci_parse($conn, $string);
oci_execute($query1);
$COUNTRY_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS);

$string = "SELECT INITCAP(L.LANGUAGE_NAME) FROM MOVIE M JOIN MOVIE_LANGUAGE ML ON (M.MOVIE_ID = ML.MOVIE_ID) JOIN LANGUAGE L ON (ML.LANGUAGE_ID = L.LANGUAGE_ID) WHERE M.MOVIE_ID = $MOVIE_Row[0]";
//echo "$string";
$query1 = oci_parse($conn, $string);
oci_execute($query1);
$LANGUAGE_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS);

$string = "SELECT G.GENRE_NAME FROM MOVIE M JOIN MOVIE_GENRE MG ON (M.MOVIE_ID = MG.MOVIE_ID) JOIN GENRE G ON (MG.GENRE_ID = G.GENRE_ID) WHERE M.MOVIE_ID = $MOVIE_Row[0]";
$query1 = oci_parse($conn, $string);
oci_execute($query1);
$GENRE_Table = array(array());
$count = 0;
while ($GENRE_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS)) {
    $GENRE_Table[$count] = $GENRE_Row;
    //print_r($GENRE_Table[$count]);
    $count++;
}
//echo $GENRE_Table[0][0];

$string = "SELECT A.NAME, AL.CHARACTER_NAME FROM MOVIE M JOIN ACTOR_LIST AL ON (M.MOVIE_ID = AL.MOVIE_ID) JOIN ACTOR A ON (AL.ACTOR_ID = A.ACTOR_ID) WHERE M.MOVIE_ID = $MOVIE_Row[0]";
$query1 = oci_parse($conn, $string);
oci_execute($query1);
$CAST_Table = array(array());
$count = 0;
while ($CAST_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS)) {
    $CAST_Table[$count] = $CAST_Row;
    //print_r($GENRE_Table[$count]);
    $count++;
}
//print_r($CAST_Table[0]);
//print_r($CAST_Table[1]);
ob_end_flush();
?>