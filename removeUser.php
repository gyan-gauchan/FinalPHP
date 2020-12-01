<?php
//Connect to the db
require_once 'dbConnection.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Removing user</title>
    <!--<link rel="stylesheet" href="styleau.css">-->
  </head>
  <header>
  <ul class="nav">
  <li class="navop"><a href="restapp.html">Home</a></li>
  <li class="navop"><a href="restaurant_menu.html">Menu</a></li>
  <li class="navop"><a href="loginPage.html">Login</a></li>
  <li class="navop"><a href="contact2.html">Contact</a></li>
	</ul>
  

  </header>
  <body>

  <h1>Removing User Result</h1>
  
  <?php
  
//   if (!isset($_POST['fname']) || !isset($_FILES['lname'])) {
// echo "<p>You have not entered all the required details.<br />
//       Please go back and try again.</p>";
// exit;
//}
// create short variable names
$firstName=$_POST['fname'];
$lastName=$_POST['lname'];


   $query = $query = "select UserID from user1 
   where FirstName ='".$firstName."' and LastName='".$lastName."'";



   if ($result = $db->query($query)) {

    /* fetch object array */
    $obj = $result->fetch_object();
    
       $userID= $obj->UserID;


$querydelete = $query = "DELETE FROM user1 
   where UserID =  $userID";

 $db->query($querydelete) ;
 echo "You have deleted user : ".$firstName."</br>";
   }
   else{
      echo "No user with the name exists!";
   }






 
   $db->close();



  ?>        
   <input type ="button" onclick ="location.href='createMenuPage.html';" value= "Add More Menu"/>
  <input type ="button" onclick ="location.href='about.html';" value= "Back to Home Page"/>


      </body>
      </html>