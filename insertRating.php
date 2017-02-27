<?php  
ob_start();
session_start();
if (isset($_SESSION['myusername']) & isset($_POST['rateMovieDropDown'])) {
	$username="sakib"; // Oracle username
	$password="sakib"; // Oracle password 

	$conn=oci_connect($username,$password,'127.0.0.1/orcl') or die("can't connect");

	$movieName = $_GET['movieName'];
	$user = $_SESSION['myusername'];
	//echo "$user<br>";
	$rating = $_POST['rateMovieDropDown'];

	$queryString1 = "SELECT MOVIE_ID FROM MOVIE WHERE MOVIE_NAME = '$movieName'";
	//echo "$queryString1<br>";
	$query1 = oci_parse($conn, $queryString1);
	oci_execute($query1);
	$MOVIE_Row = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS);
	
	$queryString1 = "SELECT USER_ID FROM USER_TABLE WHERE USER_NAME = '$user'";
	//echo "$queryString1<br>";

	$query1 = oci_parse($conn, $queryString1);
	$query2 = $query1;
	$result = oci_execute($query1);

	$count = oci_fetch_all($query1, $result);
	echo "<br>Count: $count<br>";
	oci_execute($query2);
	//$query1 = oci_parse($conn, $queryString1);
	
	//$result = oci_execute($query1);
	$USER_TABLE_Row = oci_fetch_array($query2, OCI_NUM + OCI_RETURN_NULLS);
	//$count = 5;
	//$count = oci_fetch_all($query1, $result);
	//echo "$count";

	if ($count == 1) {
		// insert into user_movie_rating
		$queryString1 = "INSERT INTO USER_MOVIE_RATING VALUES($USER_TABLE_Row[0], $MOVIE_Row[0], $rating)";
		echo "$queryString1<br>";
		$query1 = oci_parse($conn, $queryString1);
		oci_execute($query1);

		$p1 = $MOVIE_Row[0];

		$stid = oci_parse($conn, 'begin GET_AVG_RATING(:MID, :AVG_RATING); end;');
		oci_bind_by_name($stid, ':MID', $p1);

		// The second procedure parameter is an OUT bind. The default type
		// will be a string type so binding a length 40 means that at most 40
		// digits will be returned.
		oci_bind_by_name($stid, ':AVG_RATING', $p2, 40);

		oci_execute($stid);

		//print "$p2\n";   
		
		$query1 = oci_parse($conn, "SELECT AVG(RATING) FROM USER_MOVIE_RATING WHERE MOVIE_ID = $MOVIE_Row[0]"); 
		oci_execute($query1);
		$avgRating = oci_fetch_array($query1, OCI_NUM + OCI_RETURN_NULLS);
		echo "$avgRating[0].....$p2";
		// update movie table
		$queryString1 = "UPDATE MOVIE SET RATING = $p2 WHERE MOVIE_ID = $MOVIE_Row[0]";
		$query1 = oci_parse($conn, $queryString1);
		oci_execute($query1);

		//echo "here";
	}

	header("location:moviePage.php?movieName=$movieName");

}

ob_end_flush();
?>