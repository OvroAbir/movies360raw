<!DOCTYPE html>
<html>
<head>
	<title>Results</title>
</head>
<body>
<?php  
if (isset($_GET['catagory'])) {
	
	$genreName = $_GET['catagory'];
	//echo "$genreName";
	$username="sakib"; // Oracle username
	$password="sakib"; // Oracle password 

	$conn=oci_connect($username,$password,'127.0.0.1/orcl') or die("can't connect");
	$queryP0 = 'SELECT M.MOVIE_NAME, M.RATING, P.PROD_HOUSE_NAME, D.DIRECTOR_NAME, M."RUNTIME", M.RELEASE_DATE, C.COUNTRY_NAME, M."BUDGET"
			FROM MOVIE M JOIN PRODUCTION_HOUSE P ON (M.PROD_HOUSE_ID = P.PROD_HOUSE_ID) JOIN DIRECTOR D ON (M.DIRECTOR_ID = D.DIRECTOR_ID) JOIN COUNTRY C ON (M.COUNTRY_ID = C.COUNTRY_ID)';
	$queryP1 = "$queryP0 WHERE M.MOVIE_ID = ANY ";
			$queryString1 = "$queryP0 WHERE M.MOVIE_ID = 1";
	$queryP5 = "SELECT MG.MOVIE_ID FROM T4 G JOIN MOVIE_GENRE MG ON (G.GENRE_ID = MG.GENRE_ID)";
$header = "Search Results";
$query1 = oci_parse($conn, "CREATE TABLE T4 AS SELECT * FROM GENRE WHERE GENRE_NAME = '$genreName'");
			oci_execute($query1);
			$queryString = "$queryP1($queryP5)";
		$queryString1 = "DROP TABLE T4";
		$query1 = oci_parse($conn, $queryString);
$query2 = oci_parse($conn, $queryString);
$result = oci_execute($query1);
oci_execute($query2);
$count = oci_fetch_all($query1, $result);

include 'display2.php';

// DELETE TEMPORARY TABLES
$query1 = oci_parse($conn, $queryString1);	

oci_execute($query1);
}
?>
</body>
</html>