<?php
require_once 'dbConnection.php';

if(isset($_GET['DeleteID']))
{
    $foodID=$_GET['DeleteID'];
    $query = "DELETE FROM menu WHERE FoodID='".$foodID."'";
    $result = $db->query($query);

    if($result)
    {
        //header("location:editMenu.php");
        echo "<h3>Menu item deleted!</h3>";
        ?><input type ="button" class="btnSignUp" onclick ="location.href='editMenu.php';" value= "Back to Edit"/>
        <?php
        }

    
else{
    echo "Alert! You can not delete this item at this time.</br> It is linked with other data! ";
}
}
else{
     header("location:editMenu.php");
}


?>