<?php

if (!isset($_SESSION)) { session_start(); }


if(!isset($_SESSION['valid_user'])){
  echo "Access Denied! You are not logged in. Please login";
  echo '<p><a href="loginPage.php">Click here to Login</a></p>';
  die();
}
else if($_SESSION['role']!='Admin'){
  echo '<p><a href = "index.php">Back to Homepage</a></p>';
  die("Access Denied! for this user!");
  
}
else{
 // echo "Your session is running " .$_SESSION['valid_user'];
 $sfirstName=$_SESSION['first_name']; 
  
}
?>