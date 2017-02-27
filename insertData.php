<?php  
session_start();
?>
<html>
<head>
</head>
<body>

<?php

   // If the submit button has been pressed...
   if (isset($_POST['NextButton']))
   {
    
      // Connect to the database
    
    $username="sakib"; // Oracle username
    $password="sakib"; // Oracle password 
	  $conn = oci_connect($username,$password,'localhost/orcl');
      //$conn = oci_connect('hr', 'hr','localhost/orcl');

	//if($conn)
	//	echo 'Connection Successful';
	if(!$conn)
		echo 'Connection Failed';
      // Retrieve the posted new location information.


      $mName = $_POST['movieNameTextField']; 
      $mRunTime = $_POST['runTimeTextField'];
      $mRelDate = $_POST['relDateDayDropDown'].'-'.$_POST['relDateMonthDropdown'].'-'.$_POST['relDateYearTextField'] ;
      $mBudget = $_POST['budgetTextField'];
      $mCountryName = $_POST['countryTextField'];
      $mRating = $_POST['ratingTextField'];
      $mProdHsName = $_POST['proHouseTextField'];
      $mDirName = $_POST['dirNameTextField'];
      $mLanguage = $_POST['langTextField'];



      $queryTemp = oci_parse($conn, "SELECT MOVIE_ID FROM MOVIE");
      $resultTemp = oci_execute($queryTemp);

      $countRow = oci_fetch_all($queryTemp, $resultTemp);
      $mId = $countRow+1;
      $_SESSION["mId"] = $mId;
      //echo "idnkvnvw ............ $mId<br>";
      $_SESSION["text"] = 1;
      $_SESSION['movieName'] = $mName;

      //getting country id
      $queryTemp = oci_parse($conn, "SELECT COUNTRY_ID FROM COUNTRY WHERE COUNTRY_NAME = '$mCountryName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $mCountryId = 0;
      $val = 0;
     // echo "counTemp is $countTemp";
      if($countTemp != 0)
      {
        oci_execute($queryTemp);
        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
        {
         $val = $row['COUNTRY_ID'];
         //echo "val is $val";
        }
        //echo "vafasfl is $val";
        $mCountryId = $val;
      }
      else
      {
        $queryTemp = oci_parse($conn, "SELECT COUNTRY_ID FROM COUNTRY");
        $resultTemp = oci_execute($queryTemp);

         $countRow = oci_fetch_all($queryTemp, $resultTemp);
         $mCountryId = $countRow+1;

         $queryInsert = oci_parse($conn, "INSERT INTO COUNTRY(COUNTRY_ID, COUNTRY_NAME)
                                          VALUES($mCountryId, '$mCountryName')");
         oci_execute($queryInsert);
      }

      //echo "country id is $mCountryId";






      //getting director id
      $mDirId = 0;
      $queryTemp = oci_parse($conn, "SELECT DIRECTOR_ID FROM DIRECTOR WHERE DIRECTOR_NAME = '$mDirName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $val = 0;
    
      if($countTemp != 0)
      {
        oci_execute($queryTemp);
        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
        {
         $val = $row['DIRECTOR_ID'];
         //echo "val is $val";
        }
        //echo "vafasfl is $val";
        $mDirId = $val;
      }
      else
      {
        $queryTemp = oci_parse($conn, "SELECT DIRECTOR_ID FROM DIRECTOR");
        $resultTemp = oci_execute($queryTemp);

         $countRow = oci_fetch_all($queryTemp, $resultTemp);
         $mDirId = $countRow+1;

         $queryInsert = oci_parse($conn, "INSERT INTO DIRECTOR(DIRECTOR_ID, DIRECTOR_NAME)
                                          VALUES($mDirId, '$mDirName')");
         oci_execute($queryInsert);
      }

      //echo "country id is $mCountryId";




      //getting production house id
      $mProdHsId = 0;
      $queryTemp = oci_parse($conn, "SELECT PROD_HOUSE_ID FROM PRODUCTION_HOUSE WHERE PROD_HOUSE_NAME = '$mProdHsName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $val = 0;
       //echo "...PROD NUMBER is $countTemp....";
      if($countTemp != 0)
      {
        oci_execute($queryTemp);
        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
        {
         $val = $row['PROD_HOUSE_ID'];
         //echo "val is $val";
        }
        //echo "vafasfl is $val";
        $mProdHsId = $val;
      }
      else
      {
        $queryTemp = oci_parse($conn, "SELECT PROD_HOUSE_ID FROM PRODUCTION_HOUSE");
        $resultTemp = oci_execute($queryTemp);

         $countRow = oci_fetch_all($queryTemp, $resultTemp);
         //echo "$countRow found     ";
         $mProdHsId = $countRow+1;

         $queryInsert = oci_parse($conn, "INSERT INTO PRODUCTION_HOUSE(PROD_HOUSE_ID, PROD_HOUSE_NAME)
                                          VALUES($mProdHsId, '$mProdHsName')");
         oci_execute($queryInsert);
      }

      //echo "country id is $mCountryId";



      $queryInsert = oci_parse($conn, "INSERT INTO MOVIE(MOVIE_ID, MOVIE_NAME, RUNTIME, RELEASE_DATE, BUDGET,
                                         COUNTRY_ID, RATING, PROD_HOUSE_ID, DIRECTOR_ID)
VALUES($mId, '$mName', $mRunTime, '$mRelDate', $mBudget, $mCountryId, $mRating, $mProdHsId, $mDirId)");
      /*echo "INSERT INTO MOVIE(MOVIE_ID, MOVIE_NAME, RUNTIME, RELEASE_DATE, BUDGET,
                                         COUNTRY_ID, RATING, PROD_HOUSE_ID, DIRECTOR_ID)
VALUES($mId, '$mName', $mRunTime, '$mRelDate', $mBudget, $mCountryId, $mRating, $mProdHsId, $mDirId)";*/
     // $queryInsert = oci_parse($conn, "SELECT COUNT(*) from MOVIE");
      oci_execute($queryInsert);


      
      $lId = 0;
      $queryTemp = oci_parse($conn, "SELECT LANGUAGE_ID FROM LANGUAGE WHERE LANGUAGE_NAME = UPPER('$mLanguage')");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $val = 0;
    
      if($countTemp != 0)
      {
        oci_execute($queryTemp);
        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
        {
         $val = $row['LANGUAGE_ID'];
         //echo "val is $val";
        }
        //echo "vafasfl is $val";
        $lId = $val;
      }
      else
      {
        $queryTemp = oci_parse($conn, "SELECT LANGUAGE_ID FROM LANGUAGE");
        $resultTemp = oci_execute($queryTemp);

         $countRow = oci_fetch_all($queryTemp, $resultTemp);
         $lId = $countRow+1;

         $queryInsert = oci_parse($conn, "INSERT INTO LANGUAGE(LANGUAGE_ID, LANGUAGE_NAME)
                                          VALUES($lId, '$mLanguage')");
         oci_execute($queryInsert);
      }
      $queryLang = oci_parse($conn, "INSERT INTO MOVIE_LANGUAGE(MOVIE_ID, LANGUAGE_ID) VALUES($mId, $lId)");
      oci_execute($queryLang);


      // echo "hereulikl ";
      //inserting genre
    function insertGenre($movieId, $genreId, $c)
    {
       $queryInsert = oci_parse($c,  "INSERT INTO MOVIE_GENRE(MOVIE_ID, GENRE_ID)
                                          VALUES($movieId, $genreId)");
       oci_execute($queryInsert);
    }

    if(!empty($_POST['check_list']))
    {
      foreach($_POST['check_list'] as $check) 
      {
        insertGenre($mId, $check, $conn);
      }

    }
    //  while (($row = oci_fetch_array($query, OCI_ASSOC)) != false) {
    //  $val = $row['SALARY'];
    //  echo $val."<br>\n";
    //  }
    
    include 'upload.php';
    include "insertActorinMovieForm3.php";
}
?>
 
</body>
</html>
