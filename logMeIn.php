<?php
//Connect to the db
require_once 'dbConnection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Results</title>
        </head>
        <body>
            

            <?php
            session_start();
            $_SESSION['role']='';
            $_SESSION['valid_user']=$_POST['email'];

            if(isset($_POST['email']) && isset($_POST['pass'])){
                

            }
           $email = $_POST['email'];
           $pass = $_POST['pass'];
           $role = 'Admin';

           if (!$email || !$pass) {
               echo '<p>You have not entered one of the login fields.<br/>
               Please go back and try again</p>';
               exit;
           }
        


           $query = "select * from user1 where Email ='".$email."' and Password='".$pass."'";
           
            $qResult= $db->query($query);
            $resultStore = $qResult->fetch_object();
            $result =$qResult->num_rows;
            
            // $query2 = "select * from user1 where Email ='".$email."' and Password='".$pass."' and Role = '".$role."'";
             
            // $qResult2 = $db->query($query2);
            // $resultStore2 = $qResult2->fetch_object();
            if($result > 0) {
                $_SESSION['valid_user']= $email;
                $_SESSION['user_id'] = $resultStore->UserID;
                $_SESSION['first_name']=$resultStore->FirstName;
                if($resultStore->Role == 'Admin') {
                    $_SESSION['role']= $resultStore->Role;
                    header("Location: admin.php");
                } else {
                    echo '<p>You are logged in as: '.$_SESSION['valid_user'].'
                    <br/>';
                    echo '  </p>';
                    header("Location: profile.php");
                }

            } else {
                echo '<p>Could not log you in. Email or Passsword is incorrect.</p>';
            }
        
            
        //     die();
        //     if(isset($resultStore) && $resultStore == $resultStore2){
        //         header("Location: admin.php");
        //     }

        //    else if ($result > 0){
        //         $_SESSION['valid_user']= $email;
        //         echo '<p>You are logged in as: '.$_SESSION['valid_user'].'
        //         <br/>';
        //         echo '  </p>';
        //         header("Location: profile.php");
        //     }
            

            
        //         else if (isset($email)) {
            
        //         echo '<p>Could not log you in. Email or Passsword is incorrect.</p>';
        //         }
        //         else {
                
        //         echo '<p>You are not logged in.</p>';
        //         }
            ?>
        <p><a href = "loginPage.php">Go back to login</a></p>
        </body>
    </html>