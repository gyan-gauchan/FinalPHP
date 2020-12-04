<?php
session_start();
if(isset($_SESSION['valid_user'])){
//  echo "Your session is running " .$_SESSION['valid_user'];

 
  $firstName=$_SESSION['first_name'];
}
require_once 'dbConnection.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>About Us</title>
   <!-- <link rel="stylesheet" href="styleau.css"> -->
   <link rel="stylesheet" href="mycss1.css">
   <link rel="stylesheet" href="mycss2.css">

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

  <div class="row">
    <div class ="column left">
      <?php
    if(isset($_SESSION['valid_user'])){
      echo '<h2>Hello '.$firstName.'!</h2>';
    } ?>
      <div class="h1center">
      <h1>Food Menu</h1>
      <h2>Please enter the quantity</h2>
</div>
      <form method="post" action="cart.php">
            <table>
              <tr >
            <?php
            $split =0;

            $sql = "SELECT FoodID,foodName, image_path, price FROM menu";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                 // output data of each row
               while($row = $result->fetch_assoc()) {

                ?>
                <td style="outline:  solid black; align-content: center; padding:20px;">
                <div class="col-md-3" style = "width:20%">
                <div style = "align-content: center;" >
                  <img src= "<?php echo $row['image_path']; ?>" width="250px" height="150px" /></br>
                  <h4 style ="white-space: nowrap"><?php echo $row['foodName']. '   $'.$row['price']; ?></h4>
                  <?php echo '<input type="number" name="quantity_'.$row['FoodID'].'" />'; ?>
               </div>
               </div></td>

                <?php
                $split++;
                if($split%4==0){
                  echo '</tr><tr>';
                }
               
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

    <div class="column right">
   
    <p><input type="submit" class="btnSignUp" name = "orderNow" value="Order Now" /></p>
         
</form>
      
<input type ="button" class =btnSignUp onclick ="location.href='searchOrder.html';" value= "Search Order"/>


    </div>
    </div>





</body>
</html>
