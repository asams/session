<?php
   session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Log In</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<?php
  include "db_connect.php";
?>


<body>
<div id="contents">
<?php
  
  $username = $_POST['username'];
  $pw = $_POST['pw'];
  $zip = $_POST['zip'];
 
  //echo $username;
  //echo $pw;
  //echo $zip;
  
  $query = "SELECT * from users WHERE username = '$username' and password=SHA('$pw')";
  
  //echo $query;
  $result = mysqli_query($db, $query) or die("Error Querying Database1");
  if ($row = mysqli_fetch_array($result)) {
    echo '<h1><center>A user with that username and password already exists.<br>';
    echo '<h1><center>Try again. </h1></center><br/>';
    echo '<form method="post" action="createaccount.php">
    	<label for="username">Username:</label>
    	<input type="text" id="username" name="username" /><br />
    	<label for="pw">Password:</label>
    	<input type="password" id="pw" name="pw" /><br />
   	<label for="zip">Zipcode:</label>
    	<input type="text" id="zip" name="zip" /><br />
    	<input type="submit" value="Create Account" name="submit" />
    </form>';
  
  } else {
     $query= "INSERT INTO users (username, password, zipcode) VALUES ('$username', SHA('$pw'), '$zip') ";
     //echo $query;
     $result = mysqli_query($db, $query) or die("Error Querying Database2");
     echo '<h1><center>You have successfully created an account with the username of ' . $username . '.<br><br>';
     echo 'Please sign in below.<br><br></center>';
     echo  "<form method=\"post\" action=\"login.php\">";
     echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"username\" name=\"username\" /><br />";
     echo "<label for=\"pw\">Password:</label><input type=\"password\" id=\"pw\" name=\"pw\" /><br />";
     echo "<input type=\"submit\" value=\"Login\" name=\"submit\" /></form> ";

  }
?>  
</div>
</body>
</html>