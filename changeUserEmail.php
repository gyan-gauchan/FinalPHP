
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
    <title>Change User Email</title>
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <link rel="stylesheet" href="basic2.css">
  
  </head>





	  <h1>EMAIL PAGE</h1>
	  

<div class="container">
	<form action="changeEmail.php" method="post">

    <label for="uname" class="labelclass"><b>Previous Email</b></label>
    <input type="text" placeholder="Please enter previous email." name="prevEmail" required></br>
    <label for ="newpass" class="labelclass2"><b>New Email:</b></label>
	<input name="newEmail" required="required" type="Email" placeholder="Please enter new email."  id="password" /></br>
	<label for="matchpass" class="labelclass3"><b>Confirm Email:<b></label>
	<input name="newEmail2" required="required" type="Email" id="password_confirm" oninput="check(this)" />
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
    <button type="submit" class="btnSignUp">Update Email</button>
   
	</div>
  </form>
 
  
<?php require_once 'footer.php'; ?>
  </body>
</html>