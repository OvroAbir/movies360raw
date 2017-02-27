<?php
session_start();
if(!isset($_SESSION['myusername'])){
header("location:homepage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
</head>
<body>
<?php  
//echo 'Welcome, admin '. $_POST['username'] . '!';
echo 'Welcome, admin '. $_SESSION['myusername'] . '!';
?>
<br><br>

<table>
<tr>
<td>
    <p>
	</p>
</td>
</tr>
<tr>
<td>
<form action="insertForm.php" method="post">
    <p>
      <input type="submit" name="submit" value="Insert" /> 
    </p>
</form>
</td>
<td>

<form action="showData.php" method="post">
    <p>
      <input type="submit" name="submit" value="Show" /> 
    </p>
</form>
</td>
</tr>
</table>

<br><br><br>
<form action="homepage.php">
  <input type="submit" value="Log Out">
</form> 


</body>
</html>



