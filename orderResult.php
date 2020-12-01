
<?php
require_once 'dbConnection.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Order Result</title>
    <!--<link rel="stylesheet" href="styleau.css">-->
  </head>
  <header>
  <ul class="nav">
  <li class="navop"><a href="index.html">Home</a></li>
  <li class="navop"><a href="about.html">About us</a></li>
  <li class="navop"><a href="restaurant_menu.html">Menu</a></li>
  <li class="navop"><a href="loginPage.html">Login</a></li>
  <li class="navop"><a href="contact2.html">Contact</a></li>
	</ul>
  
  </header>
  <body>

  <h1>Your order Result</h1>
  
  <?php
  
  if (!isset($foodName) || !isset($price) || !isset($quantity)) {
        echo "<p>You have not entered all the required details.<br />
                Please go back and try again.</p>";
exit;
}

//   if (!isset($_POST['foodName']) || !isset($_POST['price']) || !isset($_POST['quantity'])) {
//         echo "<p>You have not entered all the required details.<br />
//                 Please go back and try again.</p>";
// exit;
// }



// create short variable names
$foodName=$_POST['foodName'];
$price=$_POST['price'];
$quantity =$_POST['quantity'];
//$amount=$price * $quantity;



//print the items that are ordered with quantity

//add the Total amount 
  

 
   $db->close();



  ?>        
   <input type ="button" onclick ="location.href='menudisplay.html';" value= "Another other"/>
  <input type ="button" onclick ="location.href='about.html';" value= "Back to Home Page"/>


      </body>
      </html>