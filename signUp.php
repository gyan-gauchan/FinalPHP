<?php
require('header.php');
?>
              
        <h2 class="h2heading">Create your Account</h2>

        <form action="processlibrary.php" method="post" class="signUpForm" autocomplete="off">
            <table style ="border:0px;">
             <tr>
               <td><label style = "color:white;" for="fname">First name:</label></td>
               <td><input type="text" class ="roundedInput" id="fname" name="fname" autofocus required></td>
               </tr>
            <tr>
               <td><label style = "color:white;" for="lname">Last name:</label></td>
               <td><input type="text" class ="roundedInput"  id="lname" name="lname" required></td>
            </tr>
            <tr>
                <td><label style = "color:white;" for="email">Email:</label></td>
                <td><input type="text" class ="roundedInput"  id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required title ="Invalid email address"></td>
             </tr>

             <tr>
                <td><label style = "color:white;" for="phone">Phone:</label></td>
                <td><input type="tel" class ="roundedInput"  id="phone" name="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required title = "Please enter in this format 123-456-7890"></td>
             </tr>
<!--
             <tr>
                <td><label for="phone">User Name:</label></td>
                <td><input type="text" class ="roundedInput"  id="username" name="username"  pattern="{3,}" required title="Please enter at least 3 characters"></td>
             </tr>
-->
             <tr>
                <td><label style = "color:white;" for="pass">Password:</label></td>
                <td><input type="password" class ="roundedInput"  id="pass" name="pass"  pattern=".{6,}" required title="Please enter at least 6 characters"></td>
             </tr>

            
          
          
            <tr>
                <td><input type="submit" class="btnSignUp" value="Sign Up"></td> 
            </tr>


    </table>
        </form> 

      </br>
   </br>
   <label><h3 style="margin-bottom: 0;padding-left: 20px;">Already signed up?</h3></label>
</br>
        <input type ="button" class="loginButton" onclick ="location.href='loginPage.php';" value= "Login Here"/>  
     <hr class="divider-d">
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
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
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
    <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK2Axt8xiFYMBMDwwG1XzBQvEbYpzCvFU"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
	
    </body>
    </html>