<?php
//Connect to the db
require_once 'dbConnection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        </head>
        <body>
            


            <?php

            if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['fname'])
            && isset($_POST['lname']) && isset($_POST['phone'])){      
            $first = $_POST['fname'];
            $last = $_POST['lname'];
            $email = $_POST['email'];
            $phone =$_POST['phone'];
            $pass = $_POST['pass'];
           // $role = ($_POST['role']);
            $date = new DateTime('now');

        }
        if(!isset($_POST['email']) || !isset($_POST['pass']) || !isset($_POST['fname'])
            || !isset($_POST['lname']) || !isset($_POST['phone'])){
            echo "<p> You have not entered all the required details.<br/>
            Please go back and try again.</p>";
            exit;
            }
            
           $dateString = $date->format("Y-m-d\ T H:i:s");
           
           if(isset($_POST['role'])){
            $role = ($_POST['role']);
            $query = "INSERT INTO User1(FirstName, LastName, Email, Phone, Password, CreatedOn, Role) VALUES ('$first', '$last', '$email', '$phone', '$pass', '$dateString', '$role');";
           }else{
           $query = "INSERT INTO User1(FirstName, LastName, Email, Phone, Password, CreatedOn) VALUES ('$first', '$last', '$email', '$phone', '$pass', '$dateString');";
           }
           mysqli_query($db, $query);
           if($db->affected_rows > 0){
            echo "<p>User Created Successfully.<br/>";
        
         
           }else{
               echo "User not created successfully";
           }
           $db->close();

            ?>
            <p><a href = "loginPage.html">Go back to login</a></p>
            </body>
            </html>
