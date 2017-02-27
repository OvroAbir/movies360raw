<?php  
session_start()
?>
<html>
<head>

</head>
<body>

<?php

   // If the submit button has been pressed...

   if (isset($_POST['insertButton']))
   {

      // Connect to the database
    $username="sakib"; // Oracle username
    $password="sakib"; // Oracle password 
    $conn = oci_connect($username,$password,'localhost/orcl');

  if($conn)
    echo '';
  else
    echo 'Connection Failed';
      // Retrieve the posted new location information.


    $aName = $_POST['actorNameTextField'];
    $aCharName = $_POST['charNameTextField'];
    $movie_id = $_SESSION['mId'];
    //echo "$movie_id";
    $_SESSION["text"] = 2;

     //getting actor id
      $queryTemp = oci_parse($conn, "SELECT ACTOR_ID FROM ACTOR WHERE NAME = '$aName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $aId = 0;
      $val = 0;
      // echo "counTemp is $countTemp";
      if($countTemp != 0)
      {
        //echo "<br>..... already in database .....<br>";
        oci_execute($queryTemp);
        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
        {
         $val = $row['ACTOR_ID'];
         //echo "val is $val";
        }
        //echo "vafasfl is $val";
        $aId = $val;
        $queryInsert = oci_parse($conn, "INSERT INTO ACTOR_LIST(MOVIE_ID, ACTOR_ID, CHARACTER_NAME)
                                          VALUES($movie_id, $aId, '$aCharName')");
         oci_execute($queryInsert);

         // // include insertActorInMovie.php
        // insert(all actor list attributes);
         include 'insertActorinMovieForm3.php';

      }
      else
      {
       // echo "<br>..... not in database .....<br>";
        $_SESSION["actor"] = $aName;
        $_SESSION["char"] = $aCharName;
        include 'insertActorForm2.php';
        // add actor in movie
        //echo "back to page";
      }

    }
?>
</body>
</html>
