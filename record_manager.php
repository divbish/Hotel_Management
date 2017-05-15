<?php
/* This is the admin file. this file will always  be loaded only upon login
I have included the config.php in here that contains the call to functions.php
 */

require_once("config.php");
?>

<!-- this is simple HTML code -- it has calls to the respective files that we are calling at each click -->
<html>
  <head>
    <title>My Application</title>
  </head>
  <body>
    <table>
      <tr><th>Perform Operations:</th></tr>
      <tr><td><a href="recordManagerDisplay.php">(R)ead Display All Users </a></td></tr>
      <?php if(isUserLoggedIn()) { ?>
      <tr><td><a href="create.php"> (C)REATE new User</a></td></tr>
      <tr><td><a href="update.php"> (U)pdate User Record</a></td></tr>
      <tr><td><a href="delete.php"> (D)Delete User Record</a></td></tr>
      <?php } ?>
    </table>
  </body>
</html>
