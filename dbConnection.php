<?php

       // connnection to the local server db
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "restapp";

      //Connection to the metro webserver db
//  $servername = "localhost";
//  $username = "ics325fa2007";
//  $password = "6876";
//  $dbname = "ics325fa2007";

  $db = new mysqli($servername, $username, $password, $dbname);

  if (mysqli_connect_errno()) {
    echo "<p>Error: Could not connect to database.<br/> Please try again later.</p>";
     exit;
  }
?>