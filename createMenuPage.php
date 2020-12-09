<?php

require_once 'checkAdmin.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Insert Menu</title>
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <link rel="stylesheet" href="basic.css">
  
  </head>

  <?php
  require_once 'header2.php'; ?>
  <body>
  
  <h1>Welcome back <?php echo $sfirstName ?>!</h1>
         <div style="padding-Left:100px; width:100%">                
        <h2>Create Menu</h2>

        <form action="insertMenu.php" method="post" enctype="multipart/form-data">

          <fieldset >
            <p><h4>Food Name: </h4>
            <input type="text" name="foodName" maxlength="30" size="30"></p>
        
            <p><h4>Upload Picture</h4>
              
            <input type="file"  name="uploadpics"/></p>
            <!-- <p><label for="lblFile">File Path</label>
              <input type="text" name="filePath" maxlength="30" size="30"></p> -->
          
            <p><h4>Price ($)</h4>
            <input type="text" name="Price" maxlength="7" size="7"></p> 
          </fieldset>
          
          <p><input type="submit" class="btnSignUp" value="Add New Menu" ></p>
          
    
          </form>

          <input type ="button" class ="btnSignUp" onclick ="location.href='Admin.php';" value= "Back to Admin"/>
</div>
         <?php
         require_once 'footer.php';
         ?> 


      </body>
      </html>