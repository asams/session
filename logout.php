<?php
   session_start(); 
   session_destroy();
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
  echo "<center><h3>You have successfully logged out!</h3>\n <h3>If you want to log back in, use the form below.</h3></center>";


	echo  "<h1>Log In</h1>\n  <form method=\"post\" action=\"login.php\">";
    	echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"username\" name=\"username\" /><br />";
        echo "<label for=\"pw\">Password:</label><input type=\"password\" id=\"pw\" name=\"pw\" /><br />";
        echo "<input type=\"submit\" value=\"Login\" name=\"submit\" /></form> <p><a href=\"createAccount.php\">Create Account</a></p>";
    
   
  
?>
  
  </div>
</body>
</html>
