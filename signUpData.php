<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sign Up</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="topPan"> <a href="#"><img src="images/logo.gif" title="Brain Tech" alt="Brain Tech" width="219" height="58" border="0"  class="logo"/></a>
  <div id="topimagePan"><img src="images/blank.gif" alt="" /></div>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="topMovie.php">Top Movies</a></li>
    <li><a href="actorList.php">Actors</a></li>
    <li><a href="multiSearchForm.php">Search</a></li>
    <li><a href="adminLogin.php">Admin Access</a></li>
    <li><a href="about.php">About</a></li>
  </ul>
  </ul>
</div>
<div id="bodyPan">
  <div id="leftPan">
    <form action="index.php" method="post">
    <?php
      $uName = $_POST['userNameTextField'];
      $pass = $_POST['passTextField'];

      $username="sakib"; // Oracle username
      $password="sakib"; // Oracle password 
      $conn = oci_connect($username,$password,'localhost/orcl');
      if(!$conn)
        echo 'Connection Failed';

      $queryTemp = oci_parse($conn, "SELECT USER_ID FROM USER_TABLE WHERE USER_NAME = '$uName'");
      $resultTemp = oci_execute($queryTemp);

      $countTemp = oci_fetch_all($queryTemp, $resultTemp);

      $val = 0;
    
      if($countTemp != 0)
      {
        echo "This username is already in use. Please try another name.<br />";
      }
      else
      {
        $queryTemp = oci_parse($conn, "SELECT USER_ID FROM USER_TABLE");
        $resultTemp = oci_execute($queryTemp);

        $countRow = oci_fetch_all($queryTemp, $resultTemp);
        $uId = $countRow+1;

        $queryInsert = oci_parse($conn, "INSERT INTO USER_TABLE VALUES
                                          ($uId, '$uName', ORA_HASH('$pass', 99999, 5))");
        oci_execute($queryInsert);

        echo "You are successfully signed up. <br />";
      }
   ?>
    <center> 
      <input type="submit" name="submitButton" value="Return" />      
    </center>
  </form>
  </div>
  <div id="rightPan">
    <div id="rightform2Pan">
      <form action="searchByCatagory.php" method="post" class="form2">
        <h2>Search</h2>
        <label>search</label>
        <input name="input" type="text" />
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
      <li><a href="genreSearch.php?catagory=Action">Action</a></li>
      <li><a href="genreSearch.php?catagory=Adventure">Adventure</a></li>
      <li><a href="genreSearch.php?catagory=Comedy">Comedy</a></li>
      <li><a href="genreSearch.php?catagory=Crime">Crime</a></li>
      <li><a href="genreSearch.php?catagory=Drama">Drama</a></li>
      <li><a href="genreSearch.php?catagory=Family">Family</a></li>
      <li><a href="genreSearch.php?catagory=Fantasy">Fantasy</a></li>
      <li><a href="genreSearch.php?catagory=Mystery">Mystery</a></li>
      <li><a href="genreSearch.php?catagory=Romance">Romance</a></li>
    </ul>
  </div>
</div>
<div id="bodyBottomPan">
  <div id="BottomLeftPan">
    <p>about our <span>Project</span></p>
  </div>
  <div id="BottomMiddlePan">
    <p>This Database wsa created by Nazmus Sakib and Joy Ghosh under the supervision of Tanmoy Sen.<br /><br /></p>
    <p class="more"><a href="about.php">more</a></p>
  </div>
</div>
<div id="footerPan">
  <ul>
    <li><a href="index.php">home</a>|</li>
    <li><a href="about.php">about us</a>|</li>
    <li><a href="about.php">support</a>|</li>
    <li><a href="about.php">solutions</a>|</li>
    <li><a href="topMovie.php">movies</a>|</li>
    <li><a href="about.php">contact</a></li>
  </ul>
  <p class="copyright">©Free distributeable.</p>
  <div id="footerPanhtml"><a href="index.php">HTML</a></div>
  <div id="footerPancss"><a href="index.php">CSS</a></div>
</div>

</body>
</html>
