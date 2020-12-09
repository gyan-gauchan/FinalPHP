<?php

require_once 'dbConnection.php';
if(isset($_POST['update']))
{
    $foodID=$_GET['ID'];
    $foodName =$_POST['foodName'];
    $image_path=$_POST['uploadpic'];
    $price=$_POST['price'];

    $query ="UPDATE menu set FoodName ='".$foodName."',
                            Image_path='".$image_path."',
                            Price ='".$price."' WHERE FoodID ='".$foodID."'";
    $result = $db->query($query);

   

    if($result){
        //header("location:editMenu.php");
        echo "<h3>Menu updated!</h3>";
        ?><input type ="button" class="btnSignUp" onclick ="location.href='editMenu.php';" value= "Back to Edit"/>
        <?php
    }
else{
    echo "Please check the query";
}

}else{
    hearder("location:editMenu.php");
}

?>