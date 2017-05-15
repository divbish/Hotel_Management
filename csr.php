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
    <tr><td><a href="CSRdisplay.php">Update accounts you created </a></td></tr>
</table>

<br><br>Click <a href="http://localhost/HotelManagement/index.php">here</a> to go to homepage.
</body>
</html>
