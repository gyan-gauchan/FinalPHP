<?php
session_start();
if(!isset($_SESSION['valid_user'])){
  echo  "You are not logged in. Please login";
  echo '<p><a href="loginPage.html">Click here to Login</a></p>';
}
else{
 // echo "Your session is running " .$_SESSION['valid_user'];

  $nameEmail=$_SESSION['valid_user'];
  $getName= explode('@',$nameEmail);
  $uName= ucwords($getName[0]);
?>
<?php
require_once 'dbConnection.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Order Confirmation</title>
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


    
      <?php
 $totalAfterTax =0.0;

// check for form submit

if(isset($_POST['payment']))  {
    // display ordered items
    print_r($_POST);
    

    $sql = "SELECT FoodID, foodName, image_path, price FROM menu";
    $result = $db->query($sql);
    echo '<h1>'.$uName.'\'s Order conformation</h1>';
    echo '<h2>Your order summary</h2>';
  
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
  }

 else { 

  echo "<h1>Your cart is empty</h1>";
  echo "<h2>Please go back and enter the order</h2>";
exit();

}

$db->close();

if(isset($_POST['payType'])){
    $select1 = $_POST['payType'];
    switch ($select1) {
        case 'credit':
            echo '<p> Your credit Card is charged for the amount of $'.$totalAfterTax;
            break;
        case 'paypal':
            echo '<p> Your Paypal is charged for the amount of $'.$totalAfterTax;
            break;
        default:
            # code...
            break;
    }
}


?>







</body>
</html>

<?php
}
?>
