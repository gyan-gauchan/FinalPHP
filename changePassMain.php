
<?php 
require('header2.php');
if(!isset($_SESSION['valid_user'])){
  echo "Access Denied! You are not logged in. Please login";
  echo '<p><a href="loginPage.php">Click here to Login</a></p>';
}
else{
  //echo "Your session is running " .$_SESSION['valid_user'];

  $firstName=$_SESSION['first_name'];
}
  ?>
  
<!DOCTYPE html>
<html>
  <head>
    <title>Change user password</title>
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <link rel="stylesheet" href="basic2.css">
  
  </head>


	  <h1>PASSWORD PAGE</h1>
	  

<div class="container">
	<form action="changePass.php" method="post">

    <label for="uname" class="labelclass"><b>Previous Password</b></label>
    <input type="text" placeholder="Please enter your previous password." name="prevpass" required></br>
    <label for ="newpass" class="labelclass2"><b>New Password:</b></label>
	<input name="newpass" required="required" type="password" id="password" /></br>
	<label for="matchpass" class="labelclass3"><b>Confirm Password:<b></label>
	<input name="newpass2" required="required" type="password" id="password_confirm" oninput="check(this)" />
	<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Password Must Match.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
<br /><br />
    <button type="submit" class="btnSignUp">Update Password</button>
   
	</div>
  </form>
 
<?php require_once 'footer.php';  ?>
  </body>
</html>