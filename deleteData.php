<?php

   // If the submit button has been pressed...
  if (isset($_POST['deleteButton']))
  {
    $username="sakib"; // Oracle username
    $password="sakib"; // Oracle password 
	  $conn = oci_connect($username,$password,'localhost/orcl');
      //$conn = oci_connect('hr', 'hr','localhost/orcl');

  	//if($conn)
  	//	echo 'Connection Successful';
  	if(!$conn)
  		echo 'Connection Failed';
      // Retrieve the posted new location information.

    $oType = $_POST['objTypDropDown'];
    $oName = $_POST['objNameTextField']; 

    $notFound = false;


    if($oType == 'movie')
    {
      $mId = 0;
      $queryTemp = oci_parse($conn, "SELECT MOVIE_ID FROM MOVIE WHERE MOVIE_NAME = '$oName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $val = 0;
    
      if($countTemp != 0)
      {
        oci_execute($queryTemp);
        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
        {
         $val = $row['MOVIE_ID'];
        }
        $mId = $val;

        $queryDlt = oci_parse($conn, "DELETE FROM MOVIE WHERE MOVIE_ID = $mId");
        oci_execute($queryDlt);
      }
      else
        $notFound = true;
    }

    else if($oType == 'actor')
    {
      $aId = 0;
      $queryTemp = oci_parse($conn, "SELECT ACTOR_ID FROM ACTOR WHERE NAME = '$oName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $val = 0;
    
      if($countTemp != 0)
      {
        oci_execute($queryTemp);
        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
        {
         $val = $row['ACTOR_ID'];
        }
        $aId = $val;

        $queryDlt = oci_parse($conn, "DELETE FROM ACTOR WHERE ACTOR_ID = $aId");
        oci_execute($queryDlt);
      }
      else
        $notFound = true;
    }
      
    else if($oType == 'director')
    {
      $mDirId = 0;
      $queryTemp = oci_parse($conn, "SELECT DIRECTOR_ID FROM DIRECTOR WHERE DIRECTOR_NAME = '$oName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $val = 0;
    
      if($countTemp != 0)
      {
        oci_execute($queryTemp);
        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
        {
         $val = $row['DIRECTOR_ID'];
        }
        $mDirId = $val;

        $queryDlt = oci_parse($conn, "DELETE FROM DIRECTOR WHERE DIRECTOR_ID = $mDirId");
        oci_execute($queryDlt);
      }
      else
        $notFound = true;
    }
    else if($oType == 'prodHouse')
    {
      $pId = 0;
      $queryTemp = oci_parse($conn, "SELECT PROD_HOUSE_ID FROM PRODUCTION_HOUSE WHERE PROD_HOUSE_NAME = '$oName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $val = 0;
    
      if($countTemp != 0)
      {
        oci_execute($queryTemp);
        while (($row = oci_fetch_array($queryTemp, OCI_ASSOC)) != false) 
        {
         $val = $row['PROD_HOUSE_ID'];
        }
        $pId = $val;

        $queryDlt = oci_parse($conn, "DELETE FROM PRODUCTION_HOUSE WHERE PROD_HOUSE_ID = $pId");
        oci_execute($queryDlt);
      }
      else
        $notFound = true;
    }
  }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Delete</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="topPan"> <a href="#"><img src="images/logo.gif" title="Brain Tech" alt="Brain Tech" width="219" height="58" border="0"  class="logo"/></a>
  <div id="topimagePan"><img src="images/blank.gif" alt="" /></div>
  <ul>
    <li class="home">Home</li>
    <li><a href="#">Top Movies</a></li>
    <li><a href="#">support</a></li>
    <li><a href="#">solutions</a></li>
    <li><a href="#">books</a></li>
    <li><a href="#">contact</a></li>
  </ul>
</div>
<div id="bodyPan">
  <div id="leftPan">
    <h3>
      <?php
        if($notFound)
          echo "$oName was Not Found in the Database.\n";
        else
          echo "$oName was Successfuly Deleted from Database.\n";
      ?>
    </h3>

    <form action="adminEditPage.php" method="post">
      <p> 
        <center><input type="submit" name="okButton" value="Ok!" /> </center>
      </p>
    </form>
  </div>


  </div>
  <div id="rightPan">
    <div id="rightform2Pan">
      <form action="#" method="get" class="form2">
        <h2>Search</h2>
        <label>search</label>
        <input name="" type="text" />
        <select name="select">
          <option>All</option>
          <option>by name</option>
          <option>by genre</option>
          <option>by actor</option>
          <option>by director</option>
        </select>
        <input name="search" type="submit"  class="search" id="search" value="SEARCH"/>
      </form>
    </div>

    <h3>Browse By Catagory</h3>
    <ul>
      <li><a href="#">Action</a></li>
      <li><a href="#">Adventure</a></li>
      <li><a href="#">Comedy</a></li>
      <li><a href="#">Crime</a></li>
      <li><a href="#">Drama</a></li>
      <li><a href="#">Family</a></li>
      <li><a href="#">Fantasy</a></li>
      <li><a href="#">Mystery</a></li>
      <li><a href="#">Romance</a></li>
    </ul>
  </div>
</div>

<div id="footerPan">
  <ul>
    <li><a href="#">home</a>|</li>
    <li><a href="#">about us</a>|</li>
    <li><a href="#">support</a>|</li>
    <li><a href="#">solutions</a>|</li>
    <li><a href="#">books</a>|</li>
    <li><a href="#">contact</a></li>
  </ul>
  <p class="copyright">©braintech. all right reserved.</p>
  <div id="footerPanhtml"><a href="http://validator.w3.org/check?uri=referer">HTML</a></div>
  <div id="footerPancss"><a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a></div>
  <ul class="templateworld">
    <li>design by:</li>
    <li><a href="http://www.templateworld.com">Template World</a></li>
  </ul>
</div>
</body>
</html>
