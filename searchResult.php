<?php
//Connect to the db
require_once 'dbConnection.php';


?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Search Results</title>
  <style>
 table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding:10px;
} 
  </style>
</head>
<body>
  <h1>Order Search Results</h1>
  <?php
    // create short variable names
    // $searchtype=$_POST['searchtype'];
    // $searchterm=$_POST['searchterm'];

    if (!$_POST['searchtype'] || !$_POST['searchterm']) {
       echo '<p>You have not entered search details.<br/>
       Please go back and try again.</p>';
      echo '<p><a href = "searchOrder.php">Go back to Search Order</a></p>';
       die();
    }
     $searchtype=$_POST['searchtype'];
    $searchterm=$_POST['searchterm'];

    // whitelist the searchtype
    switch ($searchtype) {
      case 'firstName':
      case 'lastName':
      case 'phone':   
        break;
      default: 
        echo '<p>That is not a valid search type. <br/>
        Please go back and try again.</p>';
        exit; 
    }


   $query = "SELECT firstName,lastName,foodName,quantity,price,ol.createdOn
            FROM user1 u 
            inner join order1 o on(u.UserID=o.UserID)
            inner join orderline ol on (o.orderid=ol.OrderID) 
            inner join menu m on (m.FoodID=ol.FoodID) 
            where $searchtype = ? ";
            //echo $query;
            //echo $searchterm;
   $stmt = $db->prepare($query);
    $stmt->bind_param('s', $searchterm);  
    $stmt->execute();
    $stmt->store_result();
  
    $stmt->bind_result($firstName, $lastName, $foodName, $quantity,$price,$createdOn);


    // echo '<p>Customer Name: ' .$firstName.' '.$lastName.'</p>';
    echo '<p>Number of orders found: '.$stmt->num_rows.'</p>';
    $amount=0.0;
    $total=0.0;
    ?>
    <table style="width:650px">
      <tr>
      <th>Date</th>
        <th>Menu Items</th>
        <th>Menu Items</th>
        <th>Unit Price</th>
        <th>Total</th>
  </tr>
    <?php

    while($stmt->fetch()) {
$amount= number_format(($price*$quantity),2);
      echo '<tr>
              <td>'.$createdOn.'</td>
              <td>'.$foodName.'</td>
              <td style ="text-align:center">'.$quantity.'</td>
              <td style="text-align:center">'.number_format($price,2).'</td>
              <td style="text-align:right">'.$amount.'</td>
              
      
      </tr>';
      $total+=$amount;

    }
    ?>
   
    <tr>
      <td colspan='4'>Total</td>
      <td style="text-align:right"><?php echo number_format($total,2);?></td></b>
  </tr>
  </table>
    <?php

    $stmt->free_result();
    $db->close();
  ?>
</br>
  </br>
<input type ="button" class="btnSignUp" onclick ="location.href='searchOrder.php';" value= "Back to Order Search"/>
</body>
</html>