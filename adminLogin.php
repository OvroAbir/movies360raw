<?php
session_start();
session_destroy();
/*if(!isset($_SESSION['myusername'])){
header("location:homepage.php");
}*/
/*if(isset($_SESSION['myusername']))
{
  echo $_SESSION["myusername"].'<br>';
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin</title>
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
    <li class ="home">Admin Access</li>
    <li><a href="about.php">About</a></li>
  </ul>
</div>
<div id="bodyPan">
  <div id="leftPan">
    <h3>
      Insert Admin Name and Password.
    </h3>
    <center>
    <form action="adminCheckLogin.php" method="post">
      <p>
      <table cellspacing = "10px">
        <tr>
          <td>Admin User Name &nbsp; </td>
          <td><input type="text" name="adminNameTextField" size="35" maxlength="40" value="" /></td>
        </tr>
        <tr>
          <td>Password &nbsp; </td>
          <td><input type="password" name="adminPassTextField" size="35" maxlength="40" value="" /></td>
        </tr>
      </table>
    </p>
    </center>
        <p> 
          <center><input type="submit" name="insertButton" value="Log In" /> </center>
        </p>
    </form>
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
