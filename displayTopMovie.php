<?php
     function displayTop()
     {
          include "display.php";
          $username="sakib"; // Oracle username
          $password="sakib"; // Oracle password 

          $conn=oci_connect($username,$password,'127.0.0.1/orcl') or die("can't connect");

          $queryP0 = 'SELECT M.MOVIE_NAME, M.RATING, P.PROD_HOUSE_NAME, D.DIRECTOR_NAME, M."RUNTIME", M.RELEASE_DATE, C.COUNTRY_NAME, M."BUDGET"
          FROM MOVIE M JOIN PRODUCTION_HOUSE P ON (M.PROD_HOUSE_ID = P.PROD_HOUSE_ID) JOIN DIRECTOR D ON (M.DIRECTOR_ID = D.DIRECTOR_ID) JOIN COUNTRY C ON (M.COUNTRY_ID = C.COUNTRY_ID)';
          $queryString = "$queryP0 WHERE ROWNUM <= 5 ORDER BY M.RATING DESC";
          $header = "Top 5 Movies";

          //$query1 = oci_parse($conn, $queryString);
          $query2 = oci_parse($conn, $queryString);
               oci_execute($query2);
          
          echo "<h2>$header</h1>";
          
          display($query2);
     }


?>