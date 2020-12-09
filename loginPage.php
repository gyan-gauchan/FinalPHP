<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <!-- <link rel="stylesheet" href="mycss1.css"> -->
    <link rel="stylesheet" href="basic.css">
  
  </head>

  <?php
  require_once 'header.php'; ?>
    
                    <form action="logMeIn.php" method="post" class="loginForm" autocomplete="off">
                        
                            <h2>Login</h2>
                        
    
                        <div class="wrapLogin">
                            <input class="inputLogin" type="text" name="email" placeholder="Email">
                            <span class="symbolLogin">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
    
                        <div class="wrapLogin">
                            <input class="inputLogin" type="password" name="pass" placeholder="Password">
                           
                            <span class="symbolLogin">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        
                        <div>
                            <button class="loginButton">
                                LOGIN
                            </button>
                        </div>
    
                        <!-- <div class="text-center p-t-12">
                            <span class="txt1">
                                Forgot
                            </span>
                            <a class="txt2" href="#">
                                Username / Password?
                            </a>
                        </div> -->

                        <div class="text-center p-t-136">
                            <h3>New User? Sign up here</h3>
                            <input type ="button" class="loginButton" onclick ="location.href='signUp.php';" value= "Create an account"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
  require_once 'footer.php';
  ?>
  </body>
</html>