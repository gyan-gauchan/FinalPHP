<?php
session_start();
if(!isset($_SESSION['valid_user'])){
  echo "Access Denied! You are not logged in. Please login";
  echo '<p><a href="loginPage.html">Click here to Login</a></p>';
}
else{
  echo "Your session is running " .$_SESSION['valid_user'];

  $firstName=$_SESSION['first_name'];
  
  require('header2.php');
?>

  
<head>
<link href = "basic2.css" rel="stylesheet">
<div class="container">

<h1>Welcome back <?php echo $firstName;?>! </h1>
    <input type ="button" class="btnSignUp" onclick ="location.href='logout.php';" value= "Log Out"/></br></br>
    <input type ="button" class="btnSignUp" onclick ="location.href='menudisplay.php';" value= "Order Here"/></br></br>
	<h3><ul class='options'>
	<li><a href = "changeUserEmail.php">Change Email</a></li>
	<li><a href = "changePassMain.php">Change Password</a></li>
  </ul></h3>
</br></br></br>
	</div>
 
  
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
<?php
}
?>