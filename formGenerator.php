<?php  
function formGenerator($type)
{
	if($type == 'login'){
		echo '<form action="checklogin.php" method="post">
  <fieldset>
  <legend><b>Admin Panel:<b></legend>
    <b>Username: <b> <input type="text" name="username">
    <br><br>
    <b>Password: <b> <input type="password" name="password">
    <br><br><br>
    <input type="submit" value="Log In">
  </fieldset>
</form> ';

	}

	if ($type == 'search') {
		echo '<br><br><br><form action="" method="post">
  <fieldset>
    <legend>Search Movies:</legend>
    <p>Please fill in at least one field from below:</p>
    Name:<br><br>
    <input type="text" name="movieName">
    <br><br>
    Director:<br><br>
    <input type="text" name="directorName"><br><br>
    Production House:<br><br>
    <input type="text" name="productionHouse"><br><br>
    Actor:<br><br>
    <input type="text" name="actorName"><br><br>
    Genre:<br><br>
      <input type="checkbox" name="genreName[]" value="Action" />Action &nbsp;&nbsp;
      <input type="checkbox" name="genreName[]" value="Adventure" />Adventure&nbsp;&nbsp;
      <input type="checkbox" name="genreName[]" value="Comedy" />Comedy&nbsp;&nbsp;
      <input type="checkbox" name="genreName[]" value="Crime" />Crime<br>
      <input type="checkbox" name="genreName[]" value="Drama" />Drama&nbsp;&nbsp;
      <input type="checkbox" name="genreName[]" value="Family" />Family&nbsp;&nbsp;
      <input type="checkbox" name="genreName[]" value="Fantasy" />Fantasy<br>
      <input type="checkbox" name="genreName[]" value="Mystery" />Mystery&nbsp;&nbsp;
      <input type="checkbox" name="genreName[]" value="Romance" />Romance&nbsp;&nbsp;
      <input type="checkbox" name="genreName[]" value="Sci-fi" />Sci-fi<br />
    <br><br>
    <input type="submit" value="Go!">
  </fieldset>
</form> ';
	}


}

?>