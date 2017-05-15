<?php

require_once("config.php");

// Assigning $_POST values to individual variables for reuse.
$name = $_POST['name'];
$email = $_POST['email'];
$roomtypeid = $_POST['roomtypeid'];

$newuser = createNewUser($name, $email, $roomtypeid);

//display the result that was returned by the createNewUser function - in this case we usually get a 1 when the
//insert is completed successfully.
echo $newuser;
?>
