<?php  ob_start()?>
<html>
<head>
</head>
<body>

<?php

   // If the submit button has been pressed...

   if (isset($_POST['addButton']))
   {

      // Connect to the database

$username="sakib"; // Oracle username
$password="sakib"; // Oracle password 
	  $conn = oci_connect($username,$password,'localhost/orcl');
      //$conn = oci_connect('hr', 'hr','localhost/orcl');

	/*if($conn)
		echo 'Connection Successful';
	else
		echo 'Connection Failed';*/
      // Retrieve the posted new location information.


      $aName = $_POST['actorNameTextField'];

      $aGenderId = 0;
      if($_POST['radioGender'] == 'male')
        $aGenderId = 1;
      else
        $aGenderId = 2;
 
      $aBirDate = $_POST['dayDropDown'].'-'.$_POST['monthDropdown'].'-'.$_POST['birDateYearTextField'] ;
      $aHeight = $_POST['heightTextField'];
      $aCountryName = $_POST['countryTextField'];

      


  //getting country id
      $queryTemp = oci_parse($conn, "SELECT COUNTRY_ID FROM COUNTRY WHERE COUNTRY_NAME = '$aCountryName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $aCountryId = 0;
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
        $aCountryId = $val;
      }
      else
      {
        $queryTemp = oci_parse($conn, "SELECT COUNTRY_ID FROM COUNTRY");
        $resultTemp = oci_execute($queryTemp);

         $countRow = oci_fetch_all($queryTemp, $resultTemp);
         $aCountryId = $countRow+1;

         $queryInsert = oci_parse($conn, "INSERT INTO COUNTRY(COUNTRY_ID, COUNTRY_NAME)
                                          VALUES($aCountryId, '$aCountryName')");
         oci_execute($queryInsert);
      }






      //getting actor id
      $queryTemp = oci_parse($conn, "SELECT ACTOR_ID FROM ACTOR WHERE NAME = '$aName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $aId = 0;
      $val = 0;
      // echo "counTemp is $countTemp";
      if($countTemp != 0)
      {
        oci_execute($queryTemp);
        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
        {
         $val = $row['ACTOR_ID'];
         //echo "val is $val";
        }
        //echo "vafasfl is $val";
        $aId = $val;
      }
      else
      {
        $queryTemp = oci_parse($conn, "SELECT ACTOR_ID FROM ACTOR");
        $resultTemp = oci_execute($queryTemp);

        $countRow = oci_fetch_all($queryTemp, $resultTemp);
        $aId = $countRow+1;

         $queryInsert = oci_parse($conn, "INSERT INTO ACTOR(ACTOR_ID, NAME, GENDER_ID, BIRTH_DATE, HEIGHT, COUNTRY_ID)
                                          VALUES($aId, '$aName', $aGenderId, '$aBirDate', $aHeight, $aCountryId)");
         oci_execute($queryInsert);
      }
	  header("location:actorPage.php?actorName=$aName");
    }


     // $queryInsert = oci_parse($conn, "INSERT INTO MOVIE(MOVIE_ID, MOVIE_NAME, RUNTIME, RELEASE_DATE, BUDGET,
      //                                   COUNTRY_ID, RATING, PROD_HOUSE_ID, DIRECTOR_ID)
//VALUES($mId, '$mName', $mRunTime, '$mRelDate', $mBudget, $mCountryId, $mRating, $mProdHsId, $mDirId)");

     // $queryInsert = oci_parse($conn, "SELECT COUNT(*) from MOVIE");
  //    oci_execute($queryInsert);

    //  while (($row = oci_fetch_array($query, OCI_ASSOC)) != false) {
    //  $val = $row['SALARY'];
    //  echo $val."<br>\n";
    //  }
  ?>

</body>
</html>
<?php  ob_end_flush();?>