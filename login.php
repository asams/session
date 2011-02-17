<?php
   session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Log In</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="contents">
<?php
  include "db_connect.php";
  $name = mysqli_real_escape_string($db, trim($_POST['username']));
  $pw = mysqli_real_escape_string($db, trim($_POST['pw']));

   $query = "SELECT * FROM users WHERE username='$name' AND password=SHA('$pw') ";
   //echo ($query);   
 
   $result = mysqli_query($db, $query);
   if ($row = mysqli_fetch_array($result))
   {
   		
   		$_SESSION['username'] = $name;
		$_SESSION['zipcode'] = $row['zipcode'];
		echo "<p>Thanks for logging in, $name</p>\n";
		//echo $_SESSION['username'];
   		echo "<p><a href=\"search.php\">Continue</a></p>";
		
   }
   else
    {
   		echo "<p>Incorrect username or password</p>\n";
   		echo  "<h1>Log In</h1>\n  <form method=\"post\" action=\"login.php\">";
    	echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"username\" name=\"username\" /><br />";
        echo "<label for=\"pw\">Password:</label><input type=\"password\" id=\"pw\" name=\"pw\" /><br />";
        echo "<input type=\"submit\" value=\"Login\" name=\"submit\" /></form> <p><a href=\"createAccount.html\">Create Account</a></p>";
    }
   
  
?>
  
  </div>
</body>
</html>
