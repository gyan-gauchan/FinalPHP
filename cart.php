
<?php
session_start();
if(!isset($_SESSION['valid_user'])){
  echo  "You are not logged in. Please login";
  echo '<p><a href="loginPage.php">Click here to Login</a></p>';
  die();
 }
// else if(!isset($_POST['quantity_'])){
//     echo '<p> Please enter the order quantity<p>';
//     die();
//   }
  else{

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
      // echo $value.'</br>';
      }
    }
    
  } 
}
require_once 'dbConnection.php';
 // print_r($_SESSION);
  $firstName=$_SESSION['first_name'];
?>


<!DOCTYPE html>
<html>
  <head>
    <title>About Us</title>
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <!-- <link rel="stylesheet" href="basic.css"> -->
    <style>
    * {
  box-sizing: border-box;
}

/* Create two unequal columns that floats next to each other */
.column {
  float: left;
  padding: 100px;
 
}

.left {
  width: 50%;

}

.right {
  width: 50%;
}
table.tableFontSize tr td{
  font-size:18px;
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
  require_once 'header2.php'; ?>
  <body>

  <div class="paddingLeft" style ="width:100%">
    <div class="row">
  <div class="column left">
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
      echo "<table class ='tableFontSize' style='width:70%;'><tr>
      <td><strong>Food</strong></td>
      <td style='text-align:center'><strong>Quantity</strong></td>
      <td style='text-align:right'><strong>Price</strong></td>
      </tr></b>";
  
      while($row = $result->fetch_assoc()) {
          // check if qty has been specified by the  user
          if (!empty($_POST['quantity_'.$row['FoodID']])) {
            $price = $_POST['quantity_'.$row['FoodID']] * $row['price'];
  
            echo ' <tr style="color:red">
            <td>'.$row['foodName'].'</td>
            <td style="text-align:center">'.$_POST['quantity_'.$row['FoodID']].'</td>
            <td style="text-align:right">$ '.number_format($price,2).'</td>
            </tr>';
         
            $total += $price;
          }
      }
    }
      $taxRate=0.10; //food tax rate
      $subTotal = number_format($total,2);
      $estimatedTax= $subTotal*$taxRate;
      $totalAfterTax= $subTotal+$estimatedTax;
      echo '<tr><td colspan=2><p><strong>Sub Total </strong></td>'.
      '<td style ="text-align:right"><strong>$ '.$subTotal.'</strong></td></p></tr>';
      echo '<tr><td colspan=2><p><strong>Estimated Tax </strong></td>'.
      '<td style ="text-align:right;"><b>$ '.number_format($estimatedTax,2).'</b></td></p></tr>';
        echo '<tr><td colspan=2><p><strong>Total after tax </strong></td>'.
        '<td style ="text-align:right"><strong>$ '.number_format($totalAfterTax,2).'</strong></td></p></tr>';
        echo "</table>";
    
  }

 else { 

  echo "<h1>Your cart is empty</h1>";
  echo "<h2>Please go back and enter the order</h2>";
exit();

}

$db->close();


?>

<input type ="button" class="btnSignUp" onclick ="location.href='menudisplay.php';" value= "Reset Order"/>


</br>
</br>
</div>
  <div class="column right">

<h1>Payment Details</h1>
<h2>Select payment type</h2>

<form method="post" action="orderConfirmation.php">

<select style="font-size:18px" name="payType" id="payType">
  <option value="Credit Card">Credit Card</option>
  <option value="Paypal">Paypal</option>
  <option value="Cash">Cash</option>
</select>

</br>
</br></br>
</br>
</br></br>

<h4 style="color:red"><strong>Amout Due: <?php echo number_format($totalAfterTax,2); ?></strong></h4>





<p><input type="submit" class="btnSignUp" name = "payment" value="Pay Now" /></p>

</form>
</div>
</div>
<?php
  require_once 'footer.php'; ?>

</body>
</html>


