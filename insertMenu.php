<?php

require_once 'checkAdmin.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Insert Menu</title>
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <link rel="stylesheet" href="basic2.css">
  
  </head>

  <?php
//require_once 'header2.php';
require_once 'dbConnection.php';
?>


  <body>
  <div style="padding-Left:100px;">
  <h1 style="padding-bottom:50px;">Menu Insert Result</h1>
  
  <?php
  if (empty($_POST['foodName']) || empty($_FILES['uploadpics']) 
  || empty($_POST['Price'])) {
echo "<h3>You have not entered all the required details.<br />
      Please go back and try again.</h3>";?>
      <input type ="button" class = "btnSignUp" onclick ="location.href='createMenuPage.php';" value= "Add More Menu"/>
<?php exit;
}
// create short variable names
$foodName=htmlspecialchars($_POST['foodName']);
//$uploadpics=$_POST['uploadpics'];
$price=htmlspecialchars($_POST['Price']);
$price = doubleval($price);
$date = new DateTime('now');
$dateString = $date->format("Y-m-d\ T H:i:s");

//https://www.php.net/manual/en/function.move-uploaded-file.php
//$uploads_dir = "/images";
$targetDir = "images/";
$fileName = basename($_FILES["uploadpics"]["name"]);
$targetFilePath = $targetDir . $fileName;

if(move_uploaded_file($_FILES["uploadpics"]["tmp_name"], $targetFilePath)){

   $query = "INSERT INTO menu (FoodName, Image_path, Price, CreatedOn) VALUES (?, ?, ?,?)";
   $stmt = $db->prepare($query);

   $stmt->bind_param('ssds',$foodName, $targetFilePath, $price, $dateString);
   $stmt->execute();

   if ($stmt->affected_rows > 0) {
       echo  "<h3>Success! Menu inserted into the database.</h3>";
       
   } else {
       echo "<p>An error has occurred.<br/>
             The item was not added.</p>";
             die();
   }
 
   $db->close();

}


  ?>        
   <input type ="button" class = "btnSignUp" onclick ="location.href='createMenuPage.php';" value= "Add More Menu"/>
  <?php
   require_once 'footer.php'; ?>
   </div>
      </body>
      </html>