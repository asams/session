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
    echo 'That username already exists';
  } else {
     $query= "INSERT INTO users ('username', 'password', 'zipcode') VALUES('$username', SHA($pw), '$zip') ";
     echo $query;
     $result = mysqli_query($db, $query) or die("Error Querying Database2");
  }
?>  
</div>
</body>
</html>