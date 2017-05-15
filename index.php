<?php
/**
 * Created by PhpStorm.
 * User: AImran
 * Date: 4/30/2017
 * Time: 12:29 PM
 */

require_once("config.php");
require_once("header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        function validate()
        {
            var check_in_date = document.check_availability.check_in_date.value;
            var check_out_date = document.check_availability.check_out_date.value;
            var check_in_date = new Date(check_in_date);
            var check_out_date = new Date(check_out_date);
            var today = new Date();
            if (document.check_availability.check_in_date.value == "" || document.check_availability.check_out_date.value == "")
            {
                alert('REQUIRED FIELD ERROR: Please enter date in field!')
                return false;
            }
            else if (check_in_date<today || check_out_date<today )
            {
                alert('You have to enter a future date')
                return false;
            }
            else if (check_out_date<=check_in_date )
            {
                alert('Check out date has to be higher than check in date')
                return false;
            }

            return true;
        }
    </script>

<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
</style>
</head>
<body class="w3-light-grey">

<!-- Navigation Bar -->
<!--<div class="w3-bar w3-white w3-large">
    <a href="#" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Hotel 667</a>
    <a href="#rooms" class="w3-bar-item w3-button w3-mobile">Rooms</a>
    <a href="#contact" class="w3-bar-item w3-button w3-mobile">Contact Us</a>
    <a href="register.php" class="w3-bar-item w3-button w3-mobile">Sign Up</a>
    <a href="login.php" class="w3-bar-item w3-button w3-mobile">Login</a>
    <a href="#contact" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Book Now</a>
</div>-->
    <div id='top-nav'>
        <?php include("top-nav.php"); ?>
    </div>
<!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1500px;">
    <img class="w3-image" src="style/images/hotel.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
    <div class="w3-display-left w3-padding w3-col l3 m8">
        <div class="w3-container w3-red">
            <h2><i class="fa fa-bed w3-margin-right"></i>Hotel 667</h2>
        </div>
        <div class="w3-container w3-white w3-padding-16">
            <h4 class="overviewSubTitle"><b>Memorable seaside hotel with grand benefits</b></h4>
            <h7> <i>The largest and most popular resort hotel at bayside area with private beach, infinity pool, vilas and so on. The Hotel 667 amazes and astonishes guests time and time again. As you enter the lobby, the extra-ordinary obelisk begins to transport you to another world. This world is a grand one, filled with towering palapas, larger-than-life fixtures, and intricate details. Just outside, you’ll discover the elegant Sanctuary pool, protected by a ring of giant palapas. This is just the beginning of your vacation adventure</i></h7>
        </div>
    </div>
</header>

<!-- Page content -->

<div class="w3-content" style="max-width:1532px;">
    <form name ="check_availability" action="booking.php" onsubmit="return validate();" method="post">

        <div class="w3-container w3-margin-top" id="rooms">
            <h3>Rooms</h3>
            <p>Make yourself at home is our slogan. We offer the best beds in the industry. Sleep well and rest well.</p>
        </div>
        <div>

            &nbsp &nbsp Check In: <input type="date" name="check_in_date">
            &nbsp &nbsp Check Out: <input type="date" name="check_out_date">
            &nbsp &nbsp Adults: <select placeholder="adults" name="adults">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option></select>
            &nbsp &nbsp Kids: <select placeholder="kids" name="kids">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option></select>
        </div>


        <div class="w3-row-padding w3-padding-16">
            <div class="w3-third w3-margin-bottom">
                <img src="style/images/room_single.jpg" alt="Norway" style="width:100%">
                <div class="w3-container w3-white">
                    <h3>Single Room</h3>
                    <h6 class="w3-opacity">From $99</h6>
                    <p>Single bed</p>
                    <p>15m<sup>2</sup></p>
                    <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>
                    <input type="submit" name='submit' value="Choose Single Room" class="w3-button w3-block w3-red w3-margin-bottom"></input>
                </div>
            </div>
            <div class="w3-third w3-margin-bottom">
                <img src="style/images/room_double.jpg" alt="Norway" style="width:100%">
                <div class="w3-container w3-white">
                    <h3>Double Room</h3>
                    <h6 class="w3-opacity">From $149</h6>
                    <p>Queen-size bed</p>
                    <p>25m<sup>2</sup></p>
                    <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i></p>
                    <input type="submit" name='submit' value="Choose Double Room" class="w3-button w3-block w3-red w3-margin-bottom"></input>
                </div>
            </div>
            <div class="w3-third w3-margin-bottom">
                <img src="style/images/room_deluxe.jpg" alt="Norway" style="width:100%">
                <div class="w3-container w3-white">
                    <h3>Deluxe Room</h3>
                    <h6 class="w3-opacity">From $199</h6>
                    <p>King-size bed</p>
                    <p>40m<sup>2</sup></p>
                    <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i> <i class="fa fa-glass"></i> <i class="fa fa-cutlery"></i></p>
                    <input type="submit" name ='submit' value="Choose Deluxe Room" class="w3-button w3-block w3-red w3-margin-bottom"></input>
                </div>
            </div>
        </div>
    </form>

    <footer class="w3-padding-32 w3-white w3-center w3-margin-top">
    <div class="w3-container" id="contact">
        <h2>Contact</h2>
        <p>If you have any questions, do not hesitate to contact us.</p>
        <i class="fa fa-map-marker w3-text-red" style="width:30px"></i> New York, US<br>
        <i class="fa fa-phone w3-text-red" style="width:30px"></i> Phone: 1-888-123-4567<br>
        <i class="fa fa-envelope w3-text-red" style="width:30px"> </i> Email: mail@mail.com<br><br><br>
    </div>
    </footer>
    <!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-padding-32 w3-red w3-center w3-margin-top">
    <h5>Find Us On</h5>
    <div class="w3-xlarge w3-padding-16">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <p>Powered by <a href="https://www.hotel667.com" target="_blank" class="w3-hover-text-green">hotel667.com</a></p>
</footer>


</body>
</html>

