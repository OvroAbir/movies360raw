<?php

	function listTop($str)
	{

 		$username="sakib"; // Oracle username
    	$password="sakib"; // Oracle password 
		$conn = oci_connect($username,$password,'localhost/orcl');

		if(!$conn)
			echo 'Connection Failed';

		$numOfRows = 11;

		if($str == 'movie')
		{
			//top 5 movie
		    $queryTemp = oci_parse($conn,  "SELECT MOVIE_NAME, RATING 
											FROM
											(SELECT MOVIE_NAME, RATING 
											FROM MOVIE 
											ORDER BY RATING DESC)
											WHERE ROWNUM <=$numOfRows");

		    $resultTemp = oci_execute($queryTemp);
		    $countTemp = oci_fetch_all($queryTemp, $resultTemp);

	        $val = 0;
	        $counter=0;
	    
	        oci_execute($queryTemp);

	        echo '<table cellspacing = "15px">';
	        echo "<th align ='left'>Name</th> <th align='left'> Rating </th>";

  	        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
  	        {
  	        	$val = $row['MOVIE_NAME'];
  	        	//echo '<tr><td><a href="moviePage.php?movieName="' . $val . '"> ' . $val . '</a> </td>';
  	        	echo '<tr><td><a href="moviePage.php?movieName=' . $val . '"> ' . $val . '</a> </td>';
  	        	$rat = $row['RATING'];
  	        	echo "<td> $rat </td></tr>";
            }


            echo "</table>";
		}
		else if($str == 'actor')
		{
			//top 5 actor
		    $queryTemp = oci_parse($conn,  "SELECT NAME 
											FROM ACTOR
											WHERE ROWNUM <=$numOfRows");

		    $resultTemp = oci_execute($queryTemp);
		    $countTemp = oci_fetch_all($queryTemp, $resultTemp);

	        $val = 0;
	    
	        oci_execute($queryTemp);

	        echo '<table cellspacing = "10px">';

  	        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
  	        {
  	        	$val = $row['NAME'];
  	        	//echo '<tr><td><a href="moviePage.php?movieName="' . $val . '"> ' . $val . '</a> </td>';
  	        	echo '<tr><td><a href="actorPage.php?actorName=' . $val . '"> ' . $val . '</a> </td></tr>';
            }
            echo "</table>";
		}
		else if($str == 'director')
		{
			//top 5 actor
		    $queryTemp = oci_parse($conn,  "SELECT DIRECTOR_NAME 
											FROM DIRECTOR
											WHERE ROWNUM <=$numOfRows");

		    $resultTemp = oci_execute($queryTemp);
		    $countTemp = oci_fetch_all($queryTemp, $resultTemp);

	        $val = 0;
	    
	        oci_execute($queryTemp);

	        echo '<table cellspacing = "10px">';

  	        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
  	        {
  	        	$val = $row['DIRECTOR_NAME'];
  	        	//echo '<tr><td><a href="moviePage.php?movieName="' . $val . '"> ' . $val . '</a> </td>';
  	        	echo "<tr><td> $val </td></tr>";
            }
            echo "</table>";
		}

		else if($str == 'prod')
		{
			//top 5 prod
		    $queryTemp = oci_parse($conn,  "SELECT PROD_HOUSE_NAME 
											FROM PRODUCTION_HOUSE
											WHERE ROWNUM <=$numOfRows");

		    $resultTemp = oci_execute($queryTemp);
		    $countTemp = oci_fetch_all($queryTemp, $resultTemp);

	        $val = 0;
	    
	        oci_execute($queryTemp);

	        echo '<table cellspacing = "10px">';

  	        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
  	        {
  	        	$val = $row['PROD_HOUSE_NAME'];
  	        	//echo '<tr><td><a href="moviePage.php?movieName="' . $val . '"> ' . $val . '</a> </td>';
  	        	echo '<tr><td> $val </td></tr>';
            }
            echo "</table>";
		}
	}

?>