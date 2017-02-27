<?php  
$movieName = $productionHouse = $actorName = $directorName = "";
$genreName = array();
if(!empty($_POST['movieName']))  $movieName = $_POST['movieName'];
if(!empty($_POST['directorName']))  $directorName = $_POST['directorName'];
if(!empty($_POST['productionHouse']))  $productionHouse = $_POST['productionHouse'];
if(!empty($_POST['actorName']))  {$actorName = $_POST['actorName'];}
if(!empty($_POST['genreName']))  {
	foreach ($_POST['genreName'] as $check) {
		if (isset($check)) {
			array_push($genreName, $check);
			//echo "$check checked<br>";
		}
	}
}


$username="sakib"; // Oracle username
$password="sakib"; // Oracle password 

$conn=oci_connect($username,$password,'127.0.0.1/orcl') or die("can't connect");

$queryP0 = 'SELECT M.MOVIE_NAME, M.RATING, P.PROD_HOUSE_NAME, D.DIRECTOR_NAME, M."RUNTIME", M.RELEASE_DATE, C.COUNTRY_NAME, M."BUDGET"
			FROM MOVIE M JOIN PRODUCTION_HOUSE P ON (M.PROD_HOUSE_ID = P.PROD_HOUSE_ID) JOIN DIRECTOR D ON (M.DIRECTOR_ID = D.DIRECTOR_ID) JOIN COUNTRY C ON (M.COUNTRY_ID = C.COUNTRY_ID)';
$queryP1 = "$queryP0 WHERE M.MOVIE_ID = ANY ";
$queryP2 = "SELECT AL.MOVIE_ID FROM T2 A JOIN ACTOR_LIST AL ON (A.ACTOR_ID = AL.ACTOR_ID)";
$queryP5 = "SELECT MG.MOVIE_ID FROM T4 G JOIN MOVIE_GENRE MG ON (G.GENRE_ID = MG.GENRE_ID)";
$queryP3 = "MOVIE_ID = ANY (SELECT M.MOVIE_ID FROM MOVIE M JOIN T1 D ON (M.DIRECTOR_ID = D.DIRECTOR_ID))";
$queryP4 = "MOVIE_ID = ANY (SELECT M.MOVIE_ID FROM MOVIE M JOIN T3 P ON (M.PROD_HOUSE_ID = P.PROD_HOUSE_ID))";
$queryString1 = "$queryP0 WHERE M.MOVIE_ID = 1";
$queryString2 = "$queryP0 WHERE M.MOVIE_ID = 1";
$queryString3 = "$queryP0 WHERE M.MOVIE_ID = 1";
$queryString4 = "$queryP0 WHERE M.MOVIE_ID = 1";
$header = "Search Results";

$switchVar = 0;
// if movieName was set, work finished
if (!empty($movieName)) {
	$switchVar = 10;
}
// else
else
{
// Generating temporary tables
	if (!empty($directorName)) {
		$query1 = oci_parse($conn, "CREATE TABLE T1 AS SELECT * FROM DIRECTOR WHERE DIRECTOR_NAME = '$directorName'");
		oci_execute($query1);
	}
	if (!empty($actorName)) {
		$query1 = oci_parse($conn, "CREATE TABLE T2 AS SELECT * FROM ACTOR WHERE NAME = '$actorName'");
		oci_execute($query1);
	}
	if (!empty($productionHouse)) {
		$query1 = oci_parse($conn, "CREATE TABLE T3 AS SELECT * FROM PRODUCTION_HOUSE WHERE PROD_HOUSE_NAME = '$productionHouse'");
		oci_execute($query1);
	}
	if (!empty($genreName)) {
		$string = "CREATE TABLE T4 AS SELECT * FROM GENRE WHERE GENRE_NAME IN (";
		for ($i=0; $i < count($genreName) - 1; $i++) { 
			$string .= "'$genreName[$i]'";
			$string .= ', ';
		}
		$string .= "'$genreName[$i]'";
		$string .= ")";
		$query1 = oci_parse($conn, $string);
		oci_execute($query1);
	}

	//Exactly 1 selected
	if (!empty($directorName) & empty($actorName) & empty($productionHouse) & empty($genreName)) {
		
		$switchVar = 5;
	}
	if (empty($directorName) & !empty($actorName) & empty($productionHouse) & empty($genreName)) {
		$switchVar = 6;
	}
	if (empty($directorName) & empty($actorName) & !empty($productionHouse) & empty($genreName)) {
		$switchVar = 7;
	}
	if (empty($directorName) & empty($actorName) & empty($productionHouse) & !empty($genreName)) {
		$switchVar = 8;
	}

	//Exacly 2 selected
	if (!empty($directorName) & !empty($actorName) & empty($productionHouse) & empty($genreName)) {
		$switchVar = 1;
	}
	if (!empty($directorName) & empty($actorName) & !empty($productionHouse) & empty($genreName)) {
		$switchVar = 2;
	}
	if (!empty($directorName) & empty($actorName) & empty($productionHouse) & !empty($genreName)) {		
		$switchVar = 9;
	}
	if (empty($directorName) & !empty($actorName) & !empty($productionHouse) & empty($genreName)) {
		$switchVar = 3;
	}
	if (empty($directorName) & !empty($actorName) & empty($productionHouse) & !empty($genreName)) {		
		$switchVar = 11;
	}
	if (empty($directorName) & empty($actorName) & !empty($productionHouse) & !empty($genreName)) {		
		$switchVar = 12;
	}
	

	//Exacly 3 selected
	if (!empty($directorName) & !empty($actorName) & !empty($productionHouse) & empty($genreName)) {
		$switchVar = 4;
	}
	if (!empty($directorName) & !empty($actorName) & empty($productionHouse) & !empty($genreName)) {
		$switchVar = 13;
	}
	if (!empty($directorName) & empty($actorName) & !empty($productionHouse) & !empty($genreName)) {
		$switchVar = 14;
	}
	if (empty($directorName) & !empty($actorName) & !empty($productionHouse) & !empty($genreName)) {
		$switchVar = 15;
	}

	//All 4 selected
	if (!empty($directorName) & !empty($actorName) & !empty($productionHouse) & !empty($genreName)) {
		$switchVar = 16;
	}
}
switch ($switchVar) {
	case 10:
		$queryString = "$queryP0 WHERE M.MOVIE_NAME = '$movieName'";
		break;
	case 5:
		$queryString = "$queryP1(SELECT M.MOVIE_ID FROM MOVIE M JOIN T1 D ON (M.DIRECTOR_ID = D.DIRECTOR_ID))";
		$queryString1 = "DROP TABLE T1";
		break;
	case 6: 
		$queryString = "$queryP1($queryP2)";
		$queryString1 = "DROP TABLE T2";
		break;
	case 7:
		$queryString = "$queryP1(SELECT M.MOVIE_ID FROM MOVIE M JOIN T3 P ON (M.PROD_HOUSE_ID = P.PROD_HOUSE_ID))";
		$queryString1 = "DROP TABLE T3";
		break;
	case 8: 
		$queryString = "$queryP1($queryP5)";
		$queryString1 = "DROP TABLE T4";
		break;
	case 1:
		$queryString = "$queryP1($queryP2)
						AND
						$queryP3";
		$queryString1 = "DROP TABLE T2";
		$queryString2 = "DROP TABLE T1";
		break;
	case 9:
		$queryString = "$queryP1($queryP5)
						AND
						$queryP3";
		$queryString1 = "DROP TABLE T4";
		$queryString2 = "DROP TABLE T1";
		break;
	case 11:
		$queryString = "$queryP1($queryP2)
						AND
						M.MOVIE_ID = ANY ($queryP5)";
		$queryString1 = "DROP TABLE T2";
		$queryString2 = "DROP TABLE T4";
		break;
	case 12:
		$queryString = "$queryP1($queryP5)
						AND
						$queryP4";
		$queryString1 = "DROP TABLE T3";
		$queryString2 = "DROP TABLE T4";
		break;
	case 2:
		$queryString = "$queryP1(SELECT M.MOVIE_ID FROM MOVIE M JOIN T3 P ON (M.PROD_HOUSE_ID = P.PROD_HOUSE_ID) JOIN T1 D ON (M.DIRECTOR_ID = D.DIRECTOR_ID))"; 
		$queryString1 = "DROP TABLE T1";
		$queryString2 = "DROP TABLE T3";
		break;
	case 3:
		$queryString = "$queryP1($queryP2)
						AND
						$queryP4";
		$queryString1 = "DROP TABLE T2";
		$queryString2 = "DROP TABLE T3";
		break;
	case 4:
		$queryString = "$queryP1($queryP2)
						AND
						$queryP4
						AND
						$queryP3";
		$queryString1 = "DROP TABLE T2";
		$queryString2 = "DROP TABLE T1";
		$queryString3 = "DROP TABLE T3";
		break;
	case 13:
		$queryString = "$queryP1($queryP2)
						AND
						M.MOVIE_ID = ANY ($queryP5)
						AND
						$queryP3";
		$queryString1 = "DROP TABLE T2";
		$queryString2 = "DROP TABLE T1";
		$queryString3 = "DROP TABLE T4";
		break;
	case 14:
		$queryString = "$queryP1($queryP5)
						AND
						$queryP4
						AND
						$queryP3";
		$queryString1 = "DROP TABLE T4";
		$queryString2 = "DROP TABLE T1";
		$queryString3 = "DROP TABLE T3";
		break;
	case 15:
		$queryString = "$queryP1($queryP2)
						AND
						M.MOVIE_ID = ANY ($queryP5)
						AND
						$queryP4";
		$queryString1 = "DROP TABLE T2";
		$queryString2 = "DROP TABLE T3";
		$queryString3 = "DROP TABLE T4";
		break;
	case 16:
		$queryString = "$queryP1($queryP2)
						AND
						M.MOVIE_ID = ANY ($queryP5)
						AND
						$queryP4
						AND
						$queryP3";
		$queryString1 = "DROP TABLE T2";
		$queryString2 = "DROP TABLE T3";
		$queryString3 = "DROP TABLE T4";
		$queryString4 = "DROP TABLE T1";
		break;
	default:
		$queryString = "$queryP0 WHERE ROWNUM <= 5 ORDER BY M.RATING DESC";
		$header = "Top 5 Movies";
		break;
}
$query1 = oci_parse($conn, $queryString);
$query2 = oci_parse($conn, $queryString);
$result = oci_execute($query1);
oci_execute($query2);
$count = oci_fetch_all($query1, $result);

include 'display2.php';

// DELETE TEMPORARY TABLES
$query1 = oci_parse($conn, $queryString1);			
$query2 = oci_parse($conn, $queryString2);			
$query3 = oci_parse($conn, $queryString3);
$query4 = oci_parse($conn, $queryString4);
oci_execute($query1);
oci_execute($query2);
oci_execute($query3);
oci_execute($query4);
?>