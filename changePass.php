

<?php
//Connect to the db
require_once 'dbConnection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Password Results</title>
        </head>
        <body>
            

            <?php
            

            if(isset($_POST['prevpass']) && isset($_POST['newpass'])&& isset($_POST['newpass2'])){

            
           $prevPass = htmlspecialchars($_POST['prevpass']);
           $newPass = htmlspecialchars($_POST['newpass']);
           $verifyPass = htmlspecialchars($_POST['newpass2']);
           
            }

            $oldPass = $prevPass;

           if (!$prevPass || !$newPass || !$verifyPass) {
               echo '<p>You have not entered one of the login fields.<br/>
               Please go back and try again</p>';
               exit;
           }
        
     
           $query = "select Password from user1 where Password ='".$prevPass."'";
           $result = $db->query($query);
           if($result->num_rows > 0){
           $obj = $result->fetch_object();
           $oldPass = $obj->Password;
           }else{
               $oldPass = $prevPass;
               $newPass = $oldPass;
            echo "That previous password is not valid";
            exit; 
           }

           $query2 = "UPDATE user1 SET Password = '".$newPass."' WHERE Password = '".$oldPass."'";
           $result2 =$db->query($query2);

           if($query2 == true){
               echo "Password successfully changed from $prevPass to $newPass";
           }


           ?>
           <a href ="profile.php">Back to Profile</a>
           </body>
           </html>