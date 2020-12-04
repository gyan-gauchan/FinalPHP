<?php
require_once 'dbConnection.php';

if(isset($_GET['DeleteID']))
{
    $foodID=$_GET['DeleteID'];
    $query = "DELETE FROM menu WHERE FoodID='".$foodID."'";
    $result = $db->query($query);

    if($result)
    {
        header("location:editMenu.php");
        echo "Menu deleted!";
        }

    
else{
    echo "Alert! You can not delete this item at this time.</br> It is linked with other data! ";
}
}
else{
     header("location:editMenu.php");
}


?>