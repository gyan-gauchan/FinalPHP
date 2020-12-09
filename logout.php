<?php
session_start();
$old_user=$_SESSION['valid_user'];
unset($_SESSION['valid_user']);
session_destroy();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Log Out</title>
</head>
<body>
    <h1>Log Out</h1>

    <?php
    if(!empty($old_user)){
        echo '<p>You have been logged out.</p>';
    }else{
        echo '<p> You were not logged in, and so have not been logged out.</p>';
    }
    ?>
    <p><a href="loginPage.php">Back to Login Page</a></p>
    <p><a href="index.php"> Home Page</a></p>
</body>
</html>