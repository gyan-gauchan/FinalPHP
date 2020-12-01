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


   $query = "SELECT firstName,lastName,foodName,quantity 
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
  
    $stmt->bind_result($firstName, $lastName, $foodName, $quantity);

    echo "<p>Number of orders found: ".$stmt->num_rows."</p>";

    while($stmt->fetch()) {
      echo "<p>First Name: ".$firstName;
      echo "<br />Last Name: ".$lastName;
      echo "<br />Food Name: ".$foodName;
      echo "<br />Quantity: " .$quantity ."</p>";
    }

    $stmt->free_result();
    $db->close();
  ?>

<input type ="button" class="btnSignUp" onclick ="location.href='searchOrder.html';" value= "Back to Order Search"/>
</body>
</html>