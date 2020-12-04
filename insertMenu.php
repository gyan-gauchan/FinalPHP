<?php
session_start();
if(!isset($_SESSION['valid_user'])){
  echo "Access Denied! You are not logged in. Please login";
  echo '<p><a href="loginPage.html">Click here to Login</a></p>';
  die();

}
else{
  //echo "Your session is running " .$_SESSION['valid_user'];
    //Connect to the db
    require_once 'dbConnection.php';
    $firstName=$_SESSION['first_name'];

}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Insert Menu</title>
    <!--<link rel="stylesheet" href="styleau.css">-->
    <link rel="stylesheet" href="mycss1.css">
   <link rel="stylesheet" href="mycss2.css">
  </head>
  <header>
  <ul class="nav">
  <li class="navop"><a href="index.html">Home</a></li>
  <li class="navop"><a href="restaurant_menu.html">Menu</a></li>
  <li class="navop"><a href="logout.php">Sign Out</a></li>
  <li class="navop"><a href="contact2.html">Contact</a></li>
	</ul>
  

  </header>
  <body>

  <h1>Menu Insert Result</h1>
  
  <?php
  
  if (!isset($_POST['foodName']) || !isset($_FILES['uploadpics']) 
  || !isset($_POST['Price'])) {
echo "<p>You have not entered all the required details.<br />
      Please go back and try again.</p>";
exit;
}
// create short variable names
$foodName=$_POST['foodName'];
//$uploadpics=$_POST['uploadpics'];
$price=$_POST['Price'];
$price = doubleval($price);
$date = new DateTime('now');
$dateString = $date->format("Y-m-d\ T H:i:s");

//https://www.php.net/manual/en/function.move-uploaded-file.php
//$uploads_dir = "/images";
$targetDir = "images/";
//$targetDir = "images/";
$fileName = basename($_FILES["uploadpics"]["name"]);
$targetFilePath = $targetDir . $fileName;

if(move_uploaded_file($_FILES["uploadpics"]["tmp_name"], $targetFilePath)){

   $query = "INSERT INTO menu (FoodName, Image_path, Price, CreatedOn) VALUES (?, ?, ?,?)";
   $stmt = $db->prepare($query);

   $stmt->bind_param('ssds',$foodName, $targetFilePath, $price, $dateString);
   $stmt->execute();

   if ($stmt->affected_rows > 0) {
       echo  "<p>Menu inserted into the database.</p>";
       
   } else {
       echo "<p>An error has occurred.<br/>
             The item was not added.</p>";
   }
 
   $db->close();

} 

  ?>        
   <input type ="button" name = "btnSignUp" onclick ="location.href='createMenuPage.html';" value= "Add More Menu"/>
  

      </body>
      </html>