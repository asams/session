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
  
  $username = $_POST['username'];
  $pw = $_POST['pw'];
  $zip = $_POST['zip'];
  
  $query = "select * from users WHERE username = '$username'";
  $result = mysqli_query($db, $query);
  if ($row != mysqli_fetch_array($result)) {
    $query= "INSERT INTO users VALUES('$username', SHA('$pw'), '$zip') ";
    $result = mysqli_query($db, $query) or die("Error Querying Database");
  }
?>  
</div>
</body>
</html>