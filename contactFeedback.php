<!DOCTYPE html>
<html>
    <head>
        <title>Feedback Results</title>
        </head>
        <body>
            
        <h4>FEEDBACK</h4>
            <?php
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            echo "<h4>Thanks for your feedback $name!</h4>";
            echo "Your feedback was:$message<br/>";
            echo "You can rest assured we'll review your feedback and if need be get back to you."
            ?>

            </body>
            </html>