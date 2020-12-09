<?php

require_once 'checkAdmin.php';
require_once 'dbConnection.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>About Us</title>
   <!-- <link rel="stylesheet" href="styleau.css"> -->
   <!-- <link rel="stylesheet" href="mycss1.css">
   <link rel="stylesheet" href="mycss2.css"> -->
   <style>
table, th, td {
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
  <?php
  require_once 'header2.php'; ?>
  <body>
  <div style="padding-Left:100px;padding-top:40px;">

      <h2>Welcome back <?php echo $sfirstName ?>!</h2>
      <h3>Edit Menu</h3>
      

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
                <td><a href="edit.php?GetID=<?php echo $row['FoodID']?>"><u style="color:red">Edit</u></a></td>
                <td><a href="deleteMenu.php?DeleteID=<?php echo $row['FoodID']?>"><u style="color:red">Remove</u></a></td>
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
   
  
        </br>

      
   <input type ="button" class="btnSignUp" onclick ="location.href='createMenuPage.php';" value= "Insert Menu"/></br></br>
   <input type ="button" class="btnSignUp" onclick ="location.href='admin.php';" value= "Back to Admin"/></br></br>

      
   </div>



   <?php
  require_once 'footer.php'; ?>


</body>
</html>
