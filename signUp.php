
<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <link rel="stylesheet" href="basic.css">
  
  </head>

  <?php
  require_once 'header.php'; ?>
  <body>

  <div style="padding-Left:100px;padding-top:20px; width:100%">   
              
        <h2 class="h2heading">Create your Account</h2>

        <form action="processlibrary.php" method="post" class="signUpForm" autocomplete="off">
            <table style ="border:0px;">
             <tr>
               <td><label style = "color:white;" for="fname">First name:</label></td>
               <td><input type="text" class ="roundedInput" id="fname" name="fname" autofocus required></td>
               </tr>
            <tr>
               <td><label style = "color:white;" for="lname">Last name:</label></td>
               <td><input type="text" class ="roundedInput"  id="lname" name="lname" required></td>
            </tr>
            <tr>
                <td><label style = "color:white;" for="email">Email:</label></td>
                <td><input type="text" class ="roundedInput"  id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required title ="Invalid email address"></td>
             </tr>

             <tr>
                <td><label style = "color:white;" for="phone">Phone:</label></td>
                <td><input type="tel" class ="roundedInput"  id="phone" name="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required title = "Please enter in this format 123-456-7890"></td>
             </tr>
<!--
             <tr>
                <td><label for="phone">User Name:</label></td>
                <td><input type="text" class ="roundedInput"  id="username" name="username"  pattern="{3,}" required title="Please enter at least 3 characters"></td>
             </tr>
-->
             <tr>
                <td><label style = "color:white;" for="pass">Password:</label></td>
                <td><input type="password" class ="roundedInput"  id="pass" name="pass"  pattern=".{6,}" required title="Please enter at least 6 characters"></td>
             </tr>

            
          
          
          

    </table>
</br>
    <input type="submit" class="loginButton" value="Sign Up">
        </form> 

   <label><h3 style="margin-bottom: 0;padding-left: 20px;">Already signed up?</h3></label>
</br>
        <input type ="button" class="loginButton" onclick ="location.href='loginPage.php';" value= "Login Here"/>  
<?php require_once 'footer.php'; ?>
</div>
    </body>
    </html>