



<!DOCTYPE html>
<html>
  <head>
    <title>Online order Menu</title>
    
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <link rel="stylesheet" href="basic.css">
    <style>


/* Create two unequal columns that floats next to each other */
.column {
  float: left;

 
}

.left {
  width: 85%;

}

.right {
  width: 15%;
  padding-top:100px;
}

/* Clear floats after the columns */
/* .row:after {
  content: "";
  display: table;
  clear: both;
} */
</style>
  
  </head>

  <?php
  require_once 'header2.php'; 

if(isset($_SESSION['valid_user'])){
//  echo "Your session is running " .$_SESSION['valid_user'];

  $firstName=$_SESSION['first_name'];
}
require_once 'dbConnection.php';
?>

  <body>
    
  <div class="paddingLeft" style ="width:100%">
    <div class="row">
  <div class="column left">
      <?php

    if(isset($_SESSION['valid_user'])){
      
    } 
     echo '<div class="h1center">';
      
      ?>
      <h1 style= "padding-top:40px;">Food Menu </br>Please enter the quantity</h1>
<div class="paddingLeft">
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
                <td style="outline:  solid black; align-content: center; padding:10px;">
                <div class="col-md-3" style = "width:100%">
                <div style = "align-content: center;" >
                  <img src= "<?php echo $row['image_path']; ?>" width="220px" height="180px" /></br>
                  <h4 style ="white-space: nowrap"><?php echo $row['foodName']. '   $'.$row['price']; ?></h4>
                  <?php echo '<input type="number" min=1 oninput="validity.valid||(value=\"\");" name="quantity_'.$row['FoodID'].'" />'; ?>
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
        </div>
        </div>
  <div class="column right">
<?php
if(isset($firstName)){
  echo '<h2>Hello '.$firstName.'!</h2>';
  }
  ?>



  </br>
  </br>

   
    <p><input type="submit" class="btnSignUp" name = "orderNow" value="Order Now" /></p>
         
</form>
      
<input type ="button" class =btnSignUp onclick ="location.href='searchOrder.php';" value= "Search Order"/>




        </div>
        </div>


    <?php
  require_once 'footer.php';
  ?>


</body>
</html>
