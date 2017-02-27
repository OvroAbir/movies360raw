<?php
session_start();
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
<title>Advanced Search</title>
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
    <li class="home">Search</li>
    <li><a href="adminLogin.php">Admin Access</a></li>
    <li><a href="about.php">About</a></li>
  </ul>
</div>
<div id="bodyPan">
  <div id="leftPan">
    <h3>Please fill in at least one field from below </h3>
    <center>
    <form action="multiSearchFormHandler.php" method="post">
      <p>
      <table cellspacing = "10px">
        <tr>
            <td>Movie Name &nbsp;</td>
            <td><input type="text" name="movieName" size="40" maxlength="40" value="" /></td>
        </tr>
        <tr>
            <td>Director Name &nbsp;</td>
            <td><input type="text" name="directorName" size="40" maxlength="40" value="" /></td>
        </tr>
        <tr>
            <td>Production House  &nbsp;</td>
            <td><input type="text" name="productionHouse" size="40" maxlength="40" value="" /></td>
        </tr>
        <tr>
            <td>Actor Name &nbsp;</td>
            <td><input type="text" name="actorName" size="40" maxlength="40" value="" /></td>
        </tr>

        <tr>
          <td valign="middle">Movie Genre </td>
          <td>
            <table>
              <tr>
                <td><input type="checkbox" name="genreName[]" value="Action" />&nbsp;Action &nbsp;</td>
                <td><input type="checkbox" name="genreName[]" value="Adventure" />&nbsp;Adventure&nbsp;</td>
                <td><input type="checkbox" name="genreName[]" value="Comedy" />&nbsp;Comedy&nbsp;</td>
                <td><input type="checkbox" name="genreName[]" value="Crime" />&nbsp;Crime&nbsp;</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="genreName[]" value="Drama" />&nbsp;Drama&nbsp;</td>
                <td><input type="checkbox" name="genreName[]" value="Family" />&nbsp;Family&nbsp;</td>
                <td><input type="checkbox" name="genreName[]" value="Fantasy" />&nbsp;Fantasy&nbsp;</td>
                <td><input type="checkbox" name="genreName[]" value="Mystery" />&nbsp;Mystery&nbsp;</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="genreName[]" value="Romance" />&nbsp;Romance&nbsp;</td>
                <td><input type="checkbox" name="genreName[]" value="Sci-fi" />&nbsp;Sci-Fi</td>
              </tr>
            </table>
          </td>
        </tr>
 
      </table>
    </p>
    </center>
        <p> 
          <center><input type="submit" name="goButton" value="Go!" /> </center>
        </p>
    </form>
  </div>
  <div id="rightPan">
    <?php
    //session_start();
    if(!isset($_SESSION['myusername'])){
    echo '<form action="checklogin.php?page=multiSearchForm" method="post" class="form1">
      <h2>User Login</h2>
      <label>Name &nbsp;</label>
      <input name="username" type="text" />
      <label>Passward&nbsp;</label>
      <input name="password" type="password" />
      <label class="label1"><a href="signUpForm.php">Not Registered Yet?</a></label>
      <input name="GO" type="submit" class="botton" id="GO" value="GO" />
    </form>';}
    else echo'<form action="logout.php" method="get" class="form2">
        <h2>Log Out</h2>
        
     
        </select>
        <input name="logout" type="submit"  class="search" id="search" value="Log Out"/>
      </form>
';
    ?>
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