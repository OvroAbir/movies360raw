<?php
session_start();
include 'fetchData4IndexPage.php';
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
<title>Movie Database Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="topPan"> <a href="#"><img src="images/logo.gif" title="Brain Tech" alt="Brain Tech" width="219" height="58" border="0"  class="logo"/></a>
  <div id="topimagePan"><img src="images/blank.gif" alt="" /></div>
  <ul>
    <li class="home">Home</li>
    <li><a href="topMovie.php">Top Movies</a></li>
    <li><a href="actorList.php">Actors</a></li>
    <li><a href="multiSearchForm.php">Search</a></li>
    <li><a href="adminLogin.php">Admin Access</a></li>
    <li><a href="about.php">About</a></li>
  </ul>
</div>
<div id="bodyPan">
  <div id="leftPan">
    <h2>Movie <span>Database</span></h2>
    <p>
      This is a Database for Movies. General Informations like Casting,  Rating, Runtime, Budget, Language, Country, Release Date,
      Directors and Production House can be found here. One can also search for informations of actors/actresses. Only Admin Panel
      can make new entry in the database. Users can Only rate the movies. 
    </p>
    <div id="leftblockonePan">
      <h3><a href="topMovie.php">Top <span>Movies</span></a></h3>
      <h4><span>1.<a href=<?php echo '"moviePage.php?movieName=' . $MOVIE_Table[0][1] . '"'; ?>></span> <?php echo $MOVIE_Table[0][1]; ?></a></h4>
      <p>
      </br>
        &nbsp;&nbsp;&nbsp;<img src=<?php echo '"images/' . $MOVIE_Table[0][0] . '.jpg"'; ?> alt="Can not find" style="width:120px;height:120px;"> 
      </p>
      <p> 
        <table>
          <tr><td>&nbsp;&nbsp; <span>Language &nbsp; </td><td> &nbsp; </span> <?php echo $MOVIE_Table[0][2]; ?> </td> </tr>
          <tr><td>&nbsp;&nbsp; <span>Rating &nbsp; </td><td> &nbsp; </span> <?php echo $MOVIE_Table[0][3]; ?> </td></tr>
          <tr><td>&nbsp;&nbsp; <span>Release Date &nbsp; </td> <td>&nbsp; </span> <?php echo $MOVIE_Table[0][4]; ?> </td></tr>
        </table>
      </p>

      <p class="border"><img src="images/blank.gif" alt="" /></p>
      <h4><span>2.<a href=<?php echo '"moviePage.php?movieName=' . $MOVIE_Table[1][1] . '"'; ?>></span><?php echo $MOVIE_Table[1][1]; ?></a></h4>
      <p>
      </br>
        &nbsp;&nbsp;&nbsp;<img src=<?php echo '"images/' . $MOVIE_Table[1][0] . '.jpg"'; ?> alt="Can not find" style="width:120px;height:120px;"> 
      </p>
      <p> 
        <table>
          <tr><td>&nbsp;&nbsp; <span>Language &nbsp; </td><td> &nbsp; </span> <?php echo $MOVIE_Table[1][2]; ?> </td> </tr>
          <tr><td>&nbsp;&nbsp; <span>Rating &nbsp; </td><td> &nbsp; </span> <?php echo $MOVIE_Table[1][3]; ?> </td></tr>
          <tr><td>&nbsp;&nbsp; <span>Release Date &nbsp; </td> <td>&nbsp; </span> <?php echo $MOVIE_Table[1][4]; ?> </td></tr>
        </table>
      </p>

    </div>
    <div id="leftblocktwoPan">
      <h3><a href="actorList.php">Top <span>Actors</span></a></h3>
      <ul>
        <li><a href=<?php echo '"actorPage.php?actorName=' . $ACTOR_Table[0][0] . '"'; ?>> <?php echo $ACTOR_Table[0][0]; ?></a></li></br>
        <li><a href=<?php echo '"actorPage.php?actorName=' . $ACTOR_Table[1][0] . '"'; ?>> <?php echo $ACTOR_Table[1][0]; ?></a></li></br>
        <li><a href=<?php echo '"actorPage.php?actorName=' . $ACTOR_Table[2][0] . '"'; ?>> <?php echo $ACTOR_Table[2][0]; ?></a></li></br>
      </ul>
      
      <h3><a href="directorList.php">Top <span>Directors</span></a></h3>
      </br>
      <ul>
        <li> <?php echo $DIRECTOR_Table[0][0]; ?></li></br>
        <li> <?php echo $DIRECTOR_Table[1][0]; ?></li></br>
      </ul>

    </div>
  </div>
  <div id="rightPan">
    <?php
    //session_start();
    if(!isset($_SESSION['myusername'])){
    echo '<form action="checklogin.php?page=index" method="post" class="form1">
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
