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
<title>Insert Movie Info</title>
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
    <h3>Please Insert necessay informations of the <span>Movie</span>. </h3>
    <p>
    <center>
    <form action="insertData.php" method="post" enctype="multipart/form-data">
      <table cellspacing="10px">
        <tr>
          <td>Movie Name</td>
          <td><input type="text" name="movieNameTextField" size="40" maxlength="40" value="" /></td>
        </tr> 
        <tr>
          <td>Runtime(In Minute)</td>
          <td><input type="text" name="runTimeTextField" size="5" maxlength="5" value="" /> </td>
        </tr> 
        <tr>
          <td>Language</td>
          <td><input type="text" name="langTextField" size="20" maxlength="20" value="" /> </td>
        </tr>  
        <tr>
          <td>Release Date</td>
          <td>
            <select name="relDateDayDropDown">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            </select>
          -
          <select name="relDateMonthDropdown">
            <option value="JAN">JAN</option>
            <option value="FEB">FEB</option>
            <option value="MAR">MAR</option>
            <option value="APR">APR</option>
            <option value="MAY">MAY</option>
            <option value="JUN">JUN</option>
            <option value="JUL">JUL</option>
            <option value="AUG">AUG</option>
            <option value="SEP">SEP</option>
            <option value="OCT">OCT</option>
            <option value="NOV">NOV</option>
            <option value="DEC">DEC</option>
            </select>
          -
          <select name="relDateYearTextField">
            <?php
              for($i=1930;$i<2016;$i++)
                echo '<option value="'.$i.'">'.$i.'</option> <br />'
            ?>
          </select>

          
        </tr>

        <tr>
          <td>Budget(In Million Dollar) &nbsp;</td>
          <td><input type="text" name="budgetTextField" size="10" maxlength="10" value="" /> </td>
        </tr> 

        <tr>
          <td>Country</td>
          <td><input type="text" name="countryTextField" size="15" maxlength="15" value="" /> </td>
        </tr> 

        <tr>
          <td>Rating</td>
          <td><input type="text" name="ratingTextField" size="5" maxlength="5" value="" /> </td>
        </tr> 

        <tr>
          <td>Production House</td>
          <td><input type="text" name="proHouseTextField" size="50" maxlength="50" value="" /> </td>
        </tr>

        <tr>
          <td>Director Name</td>
          <td><input type="text" name="dirNameTextField" size="50" maxlength="50" value="" /> </td>
        </tr>

        <tr>
          <td valign="middle">Movie Genre </td>
          <td>
            <table>
              <tr>
                <td><input type="checkbox" name="check_list[]" value="6" />&nbsp;Action &nbsp;</td>
                <td><input type="checkbox" name="check_list[]" value="2" />&nbsp;Adventure&nbsp;</td>
                <td><input type="checkbox" name="check_list[]" value="9" />&nbsp;Comedy&nbsp;</td>
                <td><input type="checkbox" name="check_list[]" value="1" />&nbsp;Crime&nbsp;</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="check_list[]" value="3" />&nbsp;Drama&nbsp;</td>
                <td><input type="checkbox" name="check_list[]" value="4" />&nbsp;Family&nbsp;</td>
                <td><input type="checkbox" name="check_list[]" value="5" />&nbsp;Fantasy&nbsp;</td>
                <td><input type="checkbox" name="check_list[]" value="7" />&nbsp;Mystery&nbsp;</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="check_list[]" value="10" />&nbsp;Romance&nbsp;</td>
                <td><input type="checkbox" name="check_list[]" value="8" />&nbsp;Sci-fi</td>
              </tr>
            </table>
          </td>
        </tr>
    </table>

    <p>
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
    </p>

    <p> 
      <input type="submit" name="NextButton" value="Next" /> 
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
