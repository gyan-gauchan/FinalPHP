<?php
session_start();
if(!isset($_SESSION['valid_user'])){
  echo "Access Denied! You are not logged in. Please login";
  echo '<p><a href="loginPage.html">Click here to Login</a></p>';
  die();

}
else{
  //echo "Your session is running " .$_SESSION['valid_user'];
    require_once 'dbConnection.php';
    $firstName=$_SESSION['first_name'];

}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>About Us</title>
    <link rel="stylesheet" href="mycss1.css">
  </head>
  <header>
    <ul class="nav">
      <li class="navop"><a href="index.html">Home</a></li>
      <li class="navop"><a href="about.html">About us</a></li>
      <li class="navop"><a href="restaurant_menu.html">Menu</a></li>
      <?php if(isset($_SESSION['valid_user'])){ 
    echo '<li class="navop"><a href="logout.php">Sign Out</a></li>';
  }else{
    echo '<li class="navop"><a href="loginPage.html">Login</a></li>';  
  } 
  ?>
      <li class="navop"><a href="contact2.html">Contact</a></li>
      </ul>
  <style type="text/css">

    fieldset {
       width: 75%;
       border: 2px solid #cccccc;
    }

    label {
       width: 75px;
       float: left;
       text-align: left;
       font-weight: bold;
    }

    input {
       border: 1px solid #000;
       padding: 3px;
    }

  </style>

  </header>
  <body>
  <h1>Welcome back <?php echo $firstName ?>!</h1>
                        
        <h2>Create Menu</h2>

        <form action="insertMenu.php" method="post" enctype="multipart/form-data">

          <fieldset>
            <p><label for="lblfoodName">Food Name</label>
            <input type="text" name="foodName" maxlength="30" size="30"></p>
        
            <p><label for="lbluploadpics">Upload Picture</label>
              
            <input type="file"  name="uploadpics"/></p>
            <!-- <p><label for="lblFile">File Path</label>
              <input type="text" name="filePath" maxlength="30" size="30"></p> -->
          
            <p><label for="lblPrice">Price ($)</label>
            <input type="text" name="Price" maxlength="7" size="7"></p> 
          </fieldset>
          
          <p><input type="submit" value="Add New Menu" ></p>
          
    
          </form>

          <input type ="button" onclick ="location.href='about.html';" value= "Back to Home Page"/>

          


      </body>
      </html>