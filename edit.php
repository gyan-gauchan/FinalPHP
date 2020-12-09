<?php
//require_once 'checkAdmin.php';
require_once 'header2.php';
require_once 'dbConnection.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Insert Menu</title>
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <link rel="stylesheet" href="basic2.css">
  
  </head>

  <?php

  

$foodID =$_GET['GetID'];
$sql = "SELECT * FROM menu WHERE FoodID='$foodID'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
       $foodID =$row['FoodID'];
       $foodName=$row['FoodName'];
       $image_path=$row['Image_path'];
       $price=$row['Price'];
   }
 
  


// $query = "SELECT * FROM menu WHERE FoodID='$foodID'";
// $result = $db->query($query);
// if ($result->num_rows > 0) {

?>
<style>
table,th, td {
    border:1px solid black;
    border-collapse: collapse;
}
tr {
    height:40px;
    
}
</style>

  <body>


  <div style="padding-Left: 600px">
      <h1>Edit Menu</h1>
</div>
      <h2></h2>
      <form method="post" action="updateMenu.php?ID=<?php echo $foodID ?> ">
            <table style="margin-left: auto; margin-right: auto;">
              <tr>
              <th style="width:250px">Food Name</th>
              <th style="width:200px">Image location</th>
              <th style="width:80px">Price</th>
              </tr>
            <?php
          

         

                ?>
                <tr>
                <td><input type="text" name="foodName" value ="<?php echo $foodName?>"></td>
                <td><input type="text" name="uploadpic" value ="<?php echo $image_path?>"></td>
                <td><input type="text" name="price" value ="<?php echo $price ?>"></td>
               </tr>
                <?php        
                }             
                 
            
   
           else {
              echo "0 results";
          } 
          $db->close();
               
        echo '</table>';  
      
    ?>
    </br>
    <div style="padding-Left: 600px">
    <p><input type="submit" class="btnSignUp" name = "update" value="Update" /></p>
         
</form>

<input type ="button" class="btnSignUp" onclick ="location.href='editMenu.php';" value= "Back to Menu"/>

</div> 



<?php require_once 'footer.php'; ?>

</body>
</html>
