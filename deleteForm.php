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
    <h3>
      What Do you want to delete?
    </h3>
    <center>
    <form action="deleteData.php" method="post">
      <p>
      <table cellspacing = "10px" width ="100%">
        <tr>
            <td>Object Type &nbsp;</td>
            <td>
            <?php  
              $a = $_GET['type'];
              echo '<select name="objTypDropDown">';
                if($a == 'movie')
                  echo '<option value="movie" selected="selected">Movie</option>';
                else
                  echo '<option value="movie">Movie</option>';
                if($a == 'actor')
                  echo '<option selected="selected" value="actor">Actor/Actress</option>';
                else
                  echo '<option value="actor">Actor/Actress</option>';
                if($a == 'director')
                  echo '<option selected="selected" value="director">Director</option>';
                else
                  echo '<option value="director">Director</option>';
                if($a == 'production')
                  echo '<option selected="selected" value="prodHouse">Production House  &nbsp;&nbsp;&nbsp;&nbsp;  </option>';
                else
                  echo '<option value="prodHouse">Production House  &nbsp;&nbsp;&nbsp;&nbsp;  </option>';
              echo'</select>
            </td>';
            ?>
        </tr>
        <tr>
            <td>Object Name &nbsp;</td>
            <td><input type="text" name="objNameTextField" size="20" maxlength="30" value="" /> </td>
        </tr>
      </table>
    </p>
    </center>
        <p> 
          <center><input type="submit" name="deleteButton" value="Delete" /> </center>
        </p>
    </form>
  </div>
  <div id="rightPan">
    <?php
    //session_start();
    echo'<form action="adminlogout.php" method="get" class="form2">
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
