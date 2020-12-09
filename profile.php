
<?php 
 require('header2.php');
if(!isset($_SESSION['valid_user'])){
  echo "Access Denied! You are not logged in. Please login";
  echo '<p><a href="loginPage.php">Click here to Login</a></p>';
}
else{
  echo "Your session is running " .$_SESSION['valid_user'];

  $firstName=$_SESSION['first_name'];
}
  ?>
  
<!DOCTYPE html>
<html>
  <head>
    <title>User Profile</title>
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <link rel="stylesheet" href="basic2.css">
  
  </head>





  

<!-- <link href = "basic2.css" rel="stylesheet"> -->
<div class="container">

<h1>Welcome back <?php echo $firstName;?>! </h1>
    <input type ="button" class="btnSignUp" onclick ="location.href='logout.php';" value= "Log Out"/></br></br>
    <input type ="button" class="btnSignUp" onclick ="location.href='menudisplay.php';" value= "Order Here"/></br></br>
	<h3><ul class='options'>
	<li><a href = "changeUserEmail.php">Change Email</a></li>
	<li><a href = "changePassMain.php">Change Password</a></li>
  </ul></h3>
</br></br></br>
	</div>
 
  
	 <?php require_once 'footer.php';?>
  </body>
</html>
