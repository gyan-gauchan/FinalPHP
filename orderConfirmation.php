<?php
session_start();


if(!isset($_SESSION['valid_user'])){
  echo  "You are not logged in. Please login";
  echo '<p><a href="loginPage.html">Click here to Login</a></p>';
  die();
}
else{
  if(isset($_POST['payment'])){
  require_once 'dbConnection.php';
  $date = new DateTime('now');
  $dateString = $date->format("Y-m-d\ T H:i:s");
  $payType=$_POST['payType'];

 // echo "Your session is running " .$_SESSION['valid_user'];
//addint order to db
    if(!empty($_SESSION['order'])){
      $order_saved = $_SESSION['order'];
      $sql="INSERT INTO order1 (UserID) VALUES ('".$_SESSION['user_id']."')"; 
      $q = $db->query($sql);
      $inserted_order_id =  $db->insert_id;
      $total =0.0;
      foreach($_SESSION['order'] as $key=>$value) {
      //  echo $_SESSION['order'][$key]['foodID'];
        $sql = "INSERT INTO orderline (Quantity, CreatedOn, OrderID, FoodID) VALUES('".$_SESSION['order'][$key]['quantity']."', '$dateString', '".
                $inserted_order_id."', '".$_SESSION['order'][$key]['foodID']."')";
        $q=$db->query($sql);
        //get price mulitply ** update order table
        $foodID =$_SESSION['order'][$key]['foodID'];
        $sqlPrice = "SELECT Price FROM menu WHERE foodID=$foodID";
        $resultP =$db->query($sqlPrice);
        $resultStore = $resultP->fetch_assoc();

        if ($resultP->num_rows >0){
          $total += $resultStore['Price']*$_SESSION['order'][$key]['quantity'];
        }
        else{
          echo 'Payment data is not recorded';
        }

      }
      
      $totatWithtax =number_format($total*1.10,2);
      //$formatedTotal =number_format($total,2);
      $sql="INSERT INTO payment (OrderID,PaymentType,TotalAmount,CreatedOn) VALUES ('".$inserted_order_id."','$payType','$totatWithtax','$dateString')"; 
      $q = $db->query($sql);
     // echo 'This is the total amount from sesion '.$totatWithtax;
      
      $_SESSION['order'] = [];
    }

    $firstName=$_SESSION['first_name'];
  }
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


    
<?php
 $totalAfterTax =0.0;

// check for form submit

if(isset($_POST['payment']))  {
    // display ordered items
   // print_r($_POST);
    
    echo '<h1>Thank you '.$firstName.' for the order</h1>';
    echo '<h2>Here is your order confirmation</h2>';

//     print_r( $order_saved);
//     foreach ($order_saved as $order) {
//       foreach ($order as $key => $value) {
//           echo $key;
//           echo $value;
//       }
//   }
// echo '</br>';
//   foreach($order_saved as $key=>$value) {
//     echo $order_saved[$key]['quantity'];

//   }


$SQL= "SELECT FoodName, Quantity, Price FROM menu m
        INNER JOIN orderline ol on(m.FoodID=ol.FoodID)
        WHERE orderID=$inserted_order_id";

$result1 =$db->query($SQL);


if($result1->num_rows>0){
  $total =0.0;
  echo "<table style='width:20%;'><tr>
      <td><strong>Food</strong></td>
      <td><strong>Quantity</strong></td>
      <td style='text-align:right'><strong>Price</strong></td>
      </tr></b>";
  while($row = $result1->fetch_assoc()) {
    
  $price=$row['Quantity']*$row['Price'];

  echo ' <tr>
  <td>'.$row['FoodName'].'</td>
  <td style="text-align:center">'.$row['Quantity'].'</td>
  <td style="text-align:right">$ '.number_format($price,2).'</td>
  </tr>';
  $total += $price;
}
$tax=0.10;
echo '<tr><td colspan="2">Total before tax</td><td style="text-align:right">$ '.number_format($total,2).'</td></tr>';
echo '<tr><td colspan="2">Tax</td><td style="text-align:right">$ '.number_format(($total*$tax),2).'</td></tr>';
echo '<tr style="font-weight:bold"><td colspan="2">Order Total</td><td style="text-align:right">$ '.number_format(($total+($total*$tax)),2).'</td></tr>';
echo '</table>';

  
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
        case 'Credit Card':
            echo '<p> Your <strong>Credit Card</strong> is charged for the amount of $ '.$totatWithtax;
            break;
        case 'Paypal':
            echo '<p> Your <strong>Paypal</strong> is charged for the amount of $ '.$totatWithtax;
            break;
        default:
            # code...
            break;
    }
}




// echo '</body>';
// echo '</html>';

}
else{
  echo 'Please make sure cart is not empty';

}
}

?>
  </br>
</br><input type ="button" class="btnSignUp" onclick ="location.href='menudisplay.php';" value= "Order Again"/></br></br>

</body>
</html>
