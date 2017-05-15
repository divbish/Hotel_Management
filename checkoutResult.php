<?php
/**
 * Created by PhpStorm.
 * User: divyabishnoi
 * Date: 5/4/17
 * Time: 12:02 AM
 */
require_once("config.php");

#check if the user is logged in
$room_type=$_POST['room_type'];
$check_in=$_POST['check_in'];
$check_out=$_POST['check_out'];
$adults=$_POST['adults'];
$kids=$_POST['kids'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$role=null;
$password=$_POST['password'];
$username = $_POST['username'];

if( isUserLoggedIn() && $loggedInUser->role =='CSR') {
    $AgentUsername = $_POST['AgentUsername'];
}
else{
    $AgentUsername = "guest";
}

$customer_id = createUser($username, $firstname, $lastname, $email, $password, $phone, $role, $AgentUsername);

$booking_details = bookRoom($customer_id, $room_type, $check_in, $check_out, $adults, $kids);

if(! $booking_details['room_number']){
    ?>
    <script type="text/javascript">
        alert("No Rooms available for selected room type and dates");
        location="index.php";
    </script> <?php
}
require_once("header.php");
?>
<!DOCTYPE html>
<html>
<body>
<div id="wrapper">
    <div id="content">
        <div id="top-nav">
            <?php include("top-nav.php"); ?>
        </div>

        <div id="main">

            <header class="w3-display-container w3-content" style="max-width:1500px;">
                <img class="w3-image" src="style/images/Vila.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
                <div class="w3-display-middle w3-padding w3-col 17 m8">
                    <div class="w3-container w3-red">
                        <h2><i class="fa fa-bed w3-margin-right"></i>Booking Confirmation Details</h2>
                        <h3><i class="w3-margin-right"></i>Thank you for staying with us</h3>
                    </div>
                    <div class="w3-container w3-white w3-padding-14">
                        <div id="regbox">
                            <table cellspacing="10">
                            <p>
                                <tr><td>Booking Confirmation</td><td><input class="w3-input w3-padding-14 w3-border" type="text" name="Booking Confirmation ID" value = "<?php echo $booking_details['booking_id'] ?>" readonly="readonly"/></td>
                                </p><p>
                                    <tr><td>Room Number</td><td><input class="w3-input w3-padding-14 w3-border" type="text" name="Room Number" value = "<?php echo $booking_details['room_number'] ?>" readonly="readonly"/></td>
                                </p>
                                <p>
                                    <tr><td>First Name</td><td><input class="w3-input w3-padding-14 w3-border" type="text" name="First Name" value = "<?php echo $firstname ?>" readonly="readonly"/></td>
                                </p>
                                <p>
                                    <tr><td>Last Name</td><td><input class="w3-input w3-padding-14 w3-border" type="text" name="Last Name" value = "<?php echo $lastname ?>" readonly="readonly"/></td>
                                </p>
                                <p>
                                    <tr><td>Check In Date</td><td><input class="w3-input w3-padding-14 w3-border" type="text" name="Check In Date" value = "<?php echo $check_in ?>" readonly="readonly"/></td>
                                </p>
                                <p>
                                    <tr><td>Check Out Date</td><td><input class="w3-input w3-padding-14 w3-border" type="text" name="Check Out Date" value = "<?php echo $check_out ?>" readonly="readonly"/></td>
                                </p>
                                <p>
                                    <tr><td>Room Type</td><td><input class="w3-input w3-padding-14 w3-border" type="text" name="Room Type" value = "<?php echo $room_type ?>" readonly="readonly"/></td>
                                </p>
                                <p>
                                    <tr><td>Room Price</td><td><input class="w3-input w3-padding-14 w3-border" type="text" name="Room Price" value = "<?php echo $booking_details['price'] ?>" readonly="readonly"/></td>
                                </p>
                                <p>
                                    <tr><td>Adults</td><td><input class="w3-input w3-padding-14 w3-border" type="text" name="Adults" value = "<?php echo $adults?>" readonly="readonly"/></td>
                                </p>
                                <p>
                                    <tr><td>Kids</td><td><input class="w3-input w3-padding-14 w3-border" type="text" name="Kids" value = "<?php echo $kids ?>" readonly="readonly"/></td>
                                </p>
                            </table>
                        </div>
                    </div>

            </header>
        </div>
        <div id='bottom'></div>
    </div>
</div>
</body>
