<?php
session_start();
if(!isset($_SESSION['valid_user'])){
  echo "Access Denied! You are not logged in. Please login";
  echo '<p><a href="loginPage.html">Click here to Login</a></p>';
  die();
}
else{
  echo "Your session is running " .$_SESSION['valid_user'];

  $firstName=$_SESSION['first_name'];
}

?>
<?php
require('header.php');
?>
<div class="all">
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
             <td><h3><label  style="color:white;" for="fname">First name:</label></h3></td>
               <td><input type="text" class ="roundedInput" id="fname" name="fname" autofocus required></td>
               </tr>
            <tr>
               <td><h3><label style="color:white;" for="lname">Last name:</label></h3></td>
               <td><input type="text" class ="roundedInput"  id="lname" name="lname" required></td>
            </tr>
            <tr>
                <td><h3><label style="color:white;" for="email">Email:</label></h3></td>
                <td><input type="text" class ="roundedInput"  id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required title ="Invalid email address"></td>
             </tr>

             <tr>
                <td><h3><label style="color:white;" for="phone">Phone:</label></h3></td>
                <td><input type= style="color:white;""tel" class ="roundedInput"  id="phone" name="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required title = "Please enter in this format 123-456-7890"></td>
             </tr>

             <tr>
                <td><h3><label style="color:white;" for="pass">Password:</label></h3></td>
                <td><input type="password" class ="roundedInput"  id="pass" name="pass"  pattern=".{6,}" required title="Please enter at least 6 characters"></td>
             </tr>  
          

             <tr> <td><h3><label style="color:white;" for="role">Role:</label></h3></td>
				
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
<h2>Welcome back <?php echo $firstName; ?>!</h2></br></br>
<input type ="button" class="btnSignUp" onclick ="location.href='logout.php';" value= "Log Out"/></br></br></br></br>
<input type ="button" class="btnSignUp" onclick ="location.href='menudisplay.php';" value= "Order Here"/></br></br>
<input type ="button" class="btnSignUp" onclick ="location.href='createMenuPage.php';" value= "Insert Menu"/></br></br>
<input type ="button" class="btnSignUp" onclick ="location.href='editMenu.php';" value= "Edit Menu"/></br></br>
<input type ="button" class="btnSignUp" onclick ="location.href='searchOrder.html';" value= "Order Search"/>
</div>

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