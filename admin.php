<?php
session_start();
if(!isset($_SESSION['valid_user'])){
  echo "Access Denied! You are not logged in. Please login";
  echo '<p><a href="loginPage.html">Click here to Login</a></p>';
}
else{
  echo "Your session is running " .$_SESSION['valid_user'];

  $nameEmail=$_SESSION['valid_user'];
  $getName= explode('@',$nameEmail);
  $uName= ucwords($getName[0]);
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>Titan | Multipurpose HTML5 Template</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="mycss1.css">

	<link rel="stylesheet" href="testtest.css">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
	
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.html"></a>
          </div>
          <div style= "padding: 0px 0px 20px 300px;" class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
            <li><h2><strong> You are at Admin Page</strong></h2>/li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Home</a>
                <ul class="dropdown-menu">
                  <li><a href="index.html">Return to homepage</a></li>
                 
                </ul>
              </li>
			   </ul>
          </div>
        </div>
      </nav>
    <div class ="row" style="display:flex;">
    <div class ="column" style="padding-top:100px;padding-left:80px;">
			  <!-- <h1><strong>ADMIN PAGE</strong></h1> -->
		
			  <form action="removeUser.php" method="post" class="signUpForm">
			  <h2><strong>Remove User</strong></h2>
			  <p><h3><strong>Enter User FirstName: </strong></h3>
			  <input type="text" class ="roundedInput" name="fname" size="55"></p>
			  <p><h3><strong>Enter User LastName: </strong></h3>
			  <input type="text" class ="roundedInput"  id="lname" name="lname" size="55"></p></br>
			  
			  <p><input type="submit" name="submit" class="btnSignUp" value="remove"></p>
        </form>
</div>
			  
<div class ="column" style="padding-top:100px;padding-left:80px;">
			  <h2><strong> Add User </strong></h2>
			  <form action="processlibrary.php" method="post" class="signUpForm">
            <table style ="border:0px;">
             <tr>
             <td><h3><label for="fname">First name:</label></h3></td>
               <td><input type="text" class ="roundedInput" id="fname" name="fname" autofocus required></td>
               </tr>
            <tr>
               <td><h3><label for="lname">Last name:</label></h3></td>
               <td><input type="text" class ="roundedInput"  id="lname" name="lname" required></td>
            </tr>
            <tr>
                <td><h3><label for="email">Email:</label></h3></td>
                <td><input type="text" class ="roundedInput"  id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required title ="Invalid email address"></td>
             </tr>

             <tr>
                <td><h3><label for="phone">Phone:</label></h3></td>
                <td><input type="tel" class ="roundedInput"  id="phone" name="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required title = "Please enter in this format 123-456-7890"></td>
             </tr>

             <tr>
                <td><h3><label for="pass">Password:</label></h3></td>
                <td><input type="password" class ="roundedInput"  id="pass" name="pass"  pattern=".{6,}" required title="Please enter at least 6 characters"></td>
             </tr>  
          

             <tr> <td><h3><label for="role">Role:</label></h3></td>
				
        <td><select id="role" name="role" class="roundedInput">
          <option value="Customer">Customer</option>
          <option value="Admin">Admin</option>
        </select></td> </tr>

          
          
          
            <tr>
                <td><input type="submit" class="btnSignUp" value="Sign Up"></td> 
            </tr>

        
    </table>
        </form> 
</div>

<div class ="column" style="padding-top:100px;padding-left:150px;">
<h2>Welcome back <?php echo $uName; ?>!</h2></br></br>
<input type ="button" class="btnSignUp" onclick ="location.href='logout.php';" value= "Log Out"/></br></br></br></br>
<input type ="button" class="btnSignUp" onclick ="location.href='menudisplay.php';" value= "Order Here"/></br></br>
<input type ="button" class="btnSignUp" onclick ="location.href='createMenuPage.html';" value= "Insert Menu"/></br></br>
<input type ="button" class="btnSignUp" onclick ="location.href='searchOrder.html';" value= "Order Search"/>
</div>

</div>
              </body>
			   
			   
			   <footer class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright font-alt">&copy; 2020&nbsp;<a href="index.html">Metro</a>, All Rights Reserved</p>
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
      </div>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="assets/lib/jquery/dist/jquery.js"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/lib/wow/dist/wow.js"></script>
    <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/lib/smoothscroll.js"></script>
    <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
        </html>
        <?php
}
?>