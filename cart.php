
<?php
session_start();
if(!isset($_SESSION['valid_user'])){
  echo  "You are not logged in. Please login";
  echo '<p><a href="loginPage.html">Click here to Login</a></p>';
  die();
}
else{
  if(!isset($_POST['orderNow'])){
    echo '<p> Please enter the order quantity<p>';
  }else{

 // echo "Your session is running " .$_SESSION['valid_user'];
 $order = [];
 $_SESSION['order'] = [];
  foreach($_POST as $key=>$value){
    if(stristr($key, 'quantity')) {
      if(isset($value) && !empty($value)) {
       $foodID = explode('_', $key)[1];
       $order['foodID'] = $foodID;
       $order['quantity'] = $value;
       $_SESSION['order'][] = $order;
      //  echo $foodID;
      //  echo $value.'</br>';
      }
    }
    
  } 
}}require_once 'dbConnection.php';
 // print_r($_SESSION);
  $firstName=$_SESSION['first_name'];
?>


<!DOCTYPE html>
<html>
  <head>
    <title>About Us</title>
   <!-- <link rel="stylesheet" href="styleau.css">-->
   <link rel="stylesheet" href="mycss1.css">
  </head>
  <header>
  <ul class="nav">
  <li class="navop"><a href="about.html">Home</a></li>
  <li class="navop"><a href="restaurant_menu.html">Menu</a></li>
  <li class="navop"><a href="loginPage.html">Login</a></li>
  <li class="navop"><a href="contact2.html">Contact</a></li>
	</ul>
    </header>
  <body>

  <!-- <form method="post" action="orderConfirmation.php">  -->
    
      <?php
 $totalAfterTax =0.0;

// check for form submit

if(isset($_POST['orderNow']))  {
    // display ordered items
    //print_r($_POST);
    echo '<h1>'.$firstName.'\'s order in the cart</h1>';
    echo '<h2>Please review your order</h2>';

    $sql = "SELECT FoodID, foodName, image_path, price FROM menu";
    $result = $db->query($sql);

  
    if ($result->num_rows > 0) {
      $total = 0;
      echo "<table style='width:20%;'><tr>
      <td><strong>Food</strong></td>
      <td><strong>Quantity</strong></td>
      <td style='text-align:right'><strong>Price</strong></td>
      </tr></b>";
  
      while($row = $result->fetch_assoc()) {
          // check if qty has been specified by the  user
          if (!empty($_POST['quantity_'.$row['FoodID']])) {
            $price = $_POST['quantity_'.$row['FoodID']] * $row['price'];
  
            echo ' <tr>
            <td>'.$row['foodName'].'</td>
            <td style="text-align:center">'.$_POST['quantity_'.$row['FoodID']].'</td>
            <td style="text-align:right">$ '.number_format($price,2).'</td>
            </tr>';
         
            $total += $price;
          }
      }
    }
      $taxrate=0.10; //food tax rate
      
      $totalAfterTax=((number_format($total,2))+((number_format($total,2))*$taxrate));
      echo '<tr><td colspan=2><p><strong>Sub Total </strong></td>'.
      '<td style ="text-align:right"><strong>$ '.number_format($total,2).'</strong></td></p></tr>';
      echo '<tr><td colspan=2><p><strong>Tax </strong></td>'.
      '<td style ="text-align:right"><strong>$ '.(number_format($total,2))*$taxrate.'</strong></td></p></tr>';
        echo '<tr><td colspan=2><p><strong>Total after tax </strong></td>'.
        '<td style ="text-align:right"><strong>$ '.$totalAfterTax.'</strong></td></p></tr>';
        echo "</table>";
    
  }

 else { 

  echo "<h1>Your cart is empty</h1>";
  echo "<h2>Please go back and enter the order</h2>";
exit();

}

$db->close();


?>

<input type ="button" class="btnSignUp" onclick ="location.href='menudisplay.php';" value= "Add More"/>


</br>
</br>

<hr>
<h1>Payment Details</h1>
<h2>Select payment type</h2>

<form method="post" action="orderConfirmation.php">
<p><strong>Amout Due: <?php echo $totalAfterTax; ?></strong></p>

<select name="payType" id="payType">
  <option value="Credit Card">Credit Card</option>
  <option value="Paypal">Paypal</option>
</select>



<p><input type="submit" class="btnSignUp" name = "payment" value="Pay Now" /></p>

</form>



</body>
</html>


