<?php
session_start();
//session_destroy();
//if(isset($_SESSION['myusername'])) echo ($_SESSION['myusername']);  
include 'fetchData4MoviePage.php';
//echo "$movieName";

echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>' . $movieName . '</title>
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
</div>
<div id="bodyPan">
  <div id="leftPan">
    <table  cellspacing="10px" width ="90%">
      <tr>
        <td rowspan="6" >';
        if(file_exists("images/$MOVIE_Row[0].jpg"))
          echo '<img src= images/'.$MOVIE_Row[0].'.jpg alt="Not Found" >';
        else
          echo'<img src= images/img_not_found.jpg alt="Bg Not Found" >';

        echo'</td>
        <td  rowspan="2" valign = "top" font><center><h2><font color = gold face="Geneva, Marko One">'.$movieName.'<font></h2></center></td>
      </tr>
      <tr>
      </tr>
      <tr>
        <td  valign = "baseline"><h2>' . $DATE_Row[0] . '</h2></td>
      </tr>
      <tr>
        <td ><h2><font size="3">';
        foreach ($GENRE_Table as $GENRE_Row) {
          foreach ($GENRE_Row as $genreName) {
            if (!isset($genreName)) {
                break;
              }
            echo "$genreName/";
          }
        }
        echo '</font></h2></td>
      </tr>
      <tr>
        <td ><h2>' . $MOVIE_Row[2] . ' min<h2></td>
      </tr>
      <tr>
        <td valign ="top"><h2><span>Rating</span>&nbsp;&nbsp; : &nbsp;&nbsp;'; echo ' '. $MOVIE_Row[6] .'</h2></td>
      </tr>
    </table>

    <table  width = "100%" cellspacing = "10px" >
      <tr>
        <td><font size = "2">
          <table width = "100%" cellspace = "10px" >
            <tr><td>Language </td> <td>: &nbsp; ' . $LANGUAGE_Row[0] . '</td></tr>
            <tr><td>Budget </td> <td>: &nbsp; ' . $MOVIE_Row[4] .' Million $ </td></tr>
            <tr><td>Release Date </td> <td>: &nbsp; '. $MOVIE_Row[3] . '</td></tr>
            <tr><td>Country </td> <td>: &nbsp; '. $COUNTRY_Row[0] .'</td></tr>
            <tr><td>Production House </td> <td>: &nbsp; '. $PRODUCTION_HOUSE_Row[0] .'</td></tr>
          </table></font>
        </td>
        <td valign = "top" >
          <table  width = "100%" cellspacing = "5px">
            <tr>
              <th align = "left" ><h2>Cast</h2></th>
            </tr>';
          foreach ($CAST_Table as $row) {
              if (!isset($row[0])) {
                break;
              }
              echo '<tr> <td><h3><a href="actorPage.php?actorName='. $row[0] . '">' . $row[0] . '</a></h3>  <span>as</span> '. $row[1] . '</td> </tr>';
            }  
    echo  '</table>
        </td>
      </tr>
      <tr>
        <td>
          
        </td>
        <td valign="top">
          <table  width = "100%" cellspacing = "5px">
            <tr>
              <th align = "left"><h2>Director</h2></th>
            </tr>
            <tr>
              <td><h3>' . $DIRECTOR_Row[0] . '</h3></td>
            </tr>
          </table>
        </td>
        
      </tr>
    </table>

  </div>


  <div id="rightPan">';
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
    echo '<div id="rightform2Pan">

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
    </p>
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
    </ul>';

    if(isset($_SESSION['myusername']))
    {
      echo '<center><form action = "insertRating.php?movieName='. $movieName.'"method = "post"<font size = "4">Rate this Movie </font><br /><br /><p>
    <select name="rateMovieDropDown">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>
    <input type="submit" name="SubmitButton" value="submit"/></p></form></center>';
    }

  echo '</div>
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
</html>'
?>