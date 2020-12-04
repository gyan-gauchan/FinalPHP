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
  <?php if(isset($_SESSION['valid_user'])){ 
    echo '<li class="navop"><a href="logout.php">Sign Out</a></li>';
  }else{
    echo '<li class="navop"><a href="loginPage.html">Login</a></li>';  
  } 
  ?>
  <li class="navop"><a href="contact2.html">Contact</a></li>
	</ul>
    </header>
  <body>
<div>

      <h1>Welcome back <?php echo $firstName ?>!</h1>
      <h1>Edit Menu</h1>
      <h2></h2>
</div>
            <table >
              <tr>
              <th style="width:250px">Food Name</th>
              <th style="width:200px">Image location</th>
              <th style="width:80px">Price</th>
              <th style="width:80px">Edit</th>
              <th style="width:80px">Remove</th>
              </tr>
            <?php
          


            $sql = "SELECT FoodID,foodName, image_path, price FROM menu";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                 // output data of each row
               while($row = $result->fetch_assoc()) {

                ?>
                <tr>
                <td><?php echo $row['foodName'] ?></td>
                <td><?php echo $row['image_path'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><a href="edit.php?GetID=<?php echo $row['FoodID']?>">Edit</a></td>
                <td><a href="deleteMenu.php?DeleteID=<?php echo $row['FoodID']?>">Remove</a></td>
               </tr>
        

                <?php
             
                }
               
              
              echo '</tr>';
              echo '</table>';              
            }
   
           else {
              echo "0 results";
          } 
        $db->close();
        
    ?>
   
   </div>
        </br>

      
   <input type ="button" class="btnSignUp" onclick ="location.href='createMenuPage.php';" value= "Insert Menu"/></br></br>
   <input type ="button" class="btnSignUp" onclick ="location.href='admin.php';" value= "Back to Admin"/></br></br>

      







</body>
</html>
