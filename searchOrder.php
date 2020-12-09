<!DOCTYPE html>
<html>
<head>
  <title>Food Order Search</title>
  <!-- <link rel="stylesheet" href="mycss1.css"> -->
  <?php
  require_once 'header2.php'; ?>

<body>
<div style="padding-Left:100px; padding-top:100px; width=100%"> 
  <h2>Search orders by Name Search</h2>

  <form action="searchResult.php" method="post">
  <p><strong>Choose Search Type:</strong><br />
  <select name="searchtype">
  <option value="firstName">First Name</option>
  <option value="lastName">Last Name</option>
  <option value="phone">Phone Number</option>
  </select>
  </p>
  <p><strong>Enter Search Term:</strong><br />
  <input name="searchterm" type="text" size="40"></p>

  <p><input type="submit" class ="btnSignUp name="submit" value="Search"></p>
  </form>
</div>
  <?php
         require_once 'footer.php';
         ?>

</body>
</html>