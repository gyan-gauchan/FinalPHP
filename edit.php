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
<?php
//Connect to the db
require_once 'dbConnection.php';
$foodID =$_GET['GetID'];
$sql = "SELECT * FROM menu WHERE FoodID='$foodID'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
       $foodID =$row['FoodID'];
       $foodName=$row['FoodName'];
       $image_path=$row['Image_path'];
       $price=$row['Price'];
   }


// $query = "SELECT * FROM menu WHERE FoodID='$foodID'";
// $result = $db->query($query);
// if ($result->num_rows > 0) {




?>
<!DOCTYPE html>
<html>
  <head>
    <title>About Us</title>
   <!-- <link rel="stylesheet" href="styleau.css"> -->
   <link rel="stylesheet" href="mycss1.css">
   <link rel="stylesheet" href="mycss2.css">
   <style>
table,th, td {
    border:1px solid black;
    border-collapse: collapse;
}
tr {
    height:40px;
    
}
</style>

   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  </head>
  <header>
  <ul class="nav">
  <li class="navop"><a href="about.html">Home</a></li>
  <li class="navop"><a href="restaurant_menu.html">Menu</a></li>
  <li class="navop"><a href="logout.php">Sign Out</a></li>
  <li class="navop"><a href="contact2.html">Contact</a></li>
	</ul>
    </header>
  <body>


      <div class="h1center">
      <h1>Edit Menu</h1>
      <h2></h2>
      <form method="post" action="updateMenu.php?ID=<?php echo $foodID ?> ">
            <table style="margin-left: auto; margin-right: auto;">
              <tr>
              <th style="width:250px">Food Name</th>
              <th style="width:200px">Image location</th>
              <th style="width:80px">Price</th>
              </tr>
            <?php
          

         

                ?>
                <tr>
                <td><input type="text" name="foodName" value ="<?php echo $foodName?>"></td>
                <td><input type="text" name="uploadpic" value ="<?php echo $image_path?>"></td>
                <td><input type="text" name="price" value ="<?php echo $price ?>"></td>
               </tr>
                <?php        
                }             
                 
            
   
           else {
              echo "0 results";
          } 
          $db->close();
               
        echo '</table>';  
      
    ?>
    <p><input type="submit" class="btnSignUp" name = "update" value="Update" /></p>
         
</form>

<input type ="button" class="btnSignUp" onclick ="location.href='editMenu.php';" value= "Back to Menu"/>

</div> 





</body>
</html>
