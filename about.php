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
<title>about</title>
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
    <li class="home">About</li>
  </ul>
</div>
<div id="bodyPan">
  <div id="leftPan">
    <h2>About Our Project</h2>
    <p>
      This database was created as a term project of Level-3/Term-1. <br />
    </p>
      <p>
        <center>Created By</center>
        <table cellspacing = "20px" width = "100%" >
          <tr>
            <td>
              Nazmus Sakib <br />
              1205020 <br />
              Email &nbsp; : &nbsp; nazsa.9070@gmail.com<br /> 
            </td>
            <td>
              Joy Ghosh<br />
              1205054<br />
              Email &nbsp; : &nbsp; joyghosh826@gmail.com<br />
            </td>
          </tr>
        </table>
      </p>

      <p>
        <center>
        Supervisior  <br />
          <a href="https://www.facebook.com/tanmoy.sen.33?fref=ts">Tanmoy Sen</a> <br />
          <a href="http://cse.buet.ac.bd/faculty/facdetail.php?id=tanmoycse">Website</a> <br />
          Lecturer <br />
          <a href="http://cse.buet.ac.bd/">Dept. of CSE</a>,
          <a href="http://www.buet.ac.bd/">BUET</a>
        </center>
      </p>
    
  </div>
  <div id="rightPan">
    <?php
    //session_start();
    if(!isset($_SESSION['myusername'])){
    echo '<form action="checklogin.php?page=about" method="post" class="form1">
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
