<?php
//Connect to the db
require_once 'dbConnection.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Search Results</title>
</head>
<body>
  <h1>Order Search Results</h1>
  <?php
    // create short variable names
    $searchtype=$_POST['searchtype'];
    $searchterm=$_POST['searchterm'];

    if (!$searchtype || !$searchterm) {
       echo '<p>You have not entered search details.<br/>
       Please go back and try again.</p>';
       exit;
    }

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


   $query = "SELECT firstName,lastName,foodName,quantity,price
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
  
    $stmt->bind_result($firstName, $lastName, $foodName, $quantity,$price);


    echo '<p>Customer Name: ' .$firstName.' '.$lastName.'</p>';
    echo '<p>Number of orders found: '.$stmt->num_rows.'</p>';
    $amount=0.0;
    $total=0.0;
    ?>
    <table>
      <tr>
        <th>Menu Items</th>
        <th>Menu Items</th>
        <th>Unit Price</th>
        <th>Total</th>
  </tr>
    <?php

    while($stmt->fetch()) {
$amount= number_format(($price*$quantity),2);
      echo '<tr>
              <td>'.$foodName.'</td>
              <td>'.$quantity.'</td>
              <td>'.$price.'</td>
              <td>'.$amount.'</td>
              
      
      </tr>';
      $total+=$amount;

    }
    ?>
    <tr>
      <td colspan='3'>Total</td>
      <td><?php echo number_format($total,2);?><td>
  </tr>
  </table>
    <?php

    $stmt->free_result();
    $db->close();
  ?>
</br>
  </br>
<input type ="button" class="btnSignUp" onclick ="location.href='searchOrder.html';" value= "Back to Order Search"/>
</body>
</html>