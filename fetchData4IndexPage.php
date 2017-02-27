<?php  
$username="sakib"; // Oracle username
$password="sakib"; // Oracle password 

$conn=oci_connect($username,$password,'127.0.0.1/orcl') or die("can't connect");

$queryString = "SELECT M.MOVIE_ID, M.MOVIE_NAME, INITCAP(L.LANGUAGE_NAME), M.RATING, TO_CHAR(M.RELEASE_DATE, 'ddth Mon, YYYY') 
				FROM (SELECT * FROM MOVIE ORDER BY RATING DESC) M JOIN MOVIE_LANGUAGE ML ON (M.MOVIE_ID = ML.MOVIE_ID) JOIN LANGUAGE L ON (ML.LANGUAGE_ID = L.LANGUAGE_ID)
				WHERE ROWNUM <= 2 ";
$query = oci_parse($conn, $queryString);
oci_execute($query);
$MOVIE_Table = array(array());
$count = 0;
while ($MOVIE_Row = oci_fetch_array($query, OCI_NUM + OCI_RETURN_NULLS)) {
    $MOVIE_Table[$count] = $MOVIE_Row;
    //print_r($GENRE_Table[$count]);
    $count++;
}

$queryString = "SELECT A.NAME
				FROM (SELECT * FROM ACTOR ORDER BY ACTOR_ID) A
				WHERE ROWNUM <= 3";
$query = oci_parse($conn, $queryString);
oci_execute($query);
$ACTOR_Table = array(array());
$count = 0;
while ($ACTOR_Row = oci_fetch_array($query, OCI_NUM + OCI_RETURN_NULLS)) {
    $ACTOR_Table[$count] = $ACTOR_Row;
    //print_r($GENRE_Table[$count]);
    $count++;
}
//echo $ACTOR_Table[2][0];

$queryString = "SELECT D.DIRECTOR_NAME
				FROM (SELECT * FROM DIRECTOR ORDER BY DIRECTOR_ID) D
				WHERE ROWNUM <= 2";
$query = oci_parse($conn, $queryString);
oci_execute($query);
$DIRECTOR_Table = array(array());
$count = 0;
while ($DIRECTOR_Row = oci_fetch_array($query, OCI_NUM + OCI_RETURN_NULLS)) {
    $DIRECTOR_Table[$count] = $DIRECTOR_Row;
    //print_r($GENRE_Table[$count]);
    $count++;
}
?>