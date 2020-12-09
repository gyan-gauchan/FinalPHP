
<?php

require_once 'checkAdmin.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Insert Menu</title>
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <link rel="stylesheet" href="basic.css">
  
  </head>

  <?php
  require_once 'header.php';
  require_once 'dbConnection.php';
  
?>
  <body>

  <h1>Removing User Result</h1>
  
  <?php
  
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
 echo "<h3>You have deleted user : ".$firstName."</h3></br>";
   }
   else{
      echo "<h3>No user with the name exists!</h3>";
   }






 
   $db->close();



  ?>        
   <input type ="button" class ="btnSignUp" onclick ="location.href='admin.php';" value= "Back to Admin"/>
  

  <?php
  require_once 'footer.php';  ?>
      </body>
      </html>