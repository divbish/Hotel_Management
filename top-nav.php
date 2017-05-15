<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
</style>
<body class="w3-light-grey">

<!-- Navigation Bar -->


<?php
// Links for logged in user


if (isUserLoggedIn()&& $loggedInUser->role =='admin') { ?>
    <div class="w3-bar w3-white w3-large">
        <a href="index.php" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Hotel 667</a>
        <a href="index.php#rooms" class="w3-bar-item w3-button w3-mobile">Rooms</a>
        <a href="index.php#contact" class="w3-bar-item w3-button w3-mobile">Contact Us</a>
        <a href="admin_users.php" class="w3-bar-item w3-button w3-mobile">Admin privilege</a>
        <a href="availability.php" class="w3-bar-item w3-button w3-mobile">Availability</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-mobile">Logout</a>
    </div>

<?php } else if (isUserLoggedIn()&& $loggedInUser->role =='CSR') { ?>
    <div class="w3-bar w3-white w3-large">
        <a href="index.php" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Hotel 667</a>
        <a href="index.php#rooms" class="w3-bar-item w3-button w3-mobile">Rooms</a>
        <a href="csr.php" class="w3-bar-item w3-button w3-mobile">CSR privilege</a>
        <a href="index.php#contact" class="w3-bar-item w3-button w3-mobile">Contact Us</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-mobile">Logout</a>
    </div>

<?php } else if (isUserLoggedIn()&& $loggedInUser->role =='regular') { ?>
    <div class="w3-bar w3-white w3-large">
        <a href="index.php" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Hotel 667</a>
        <a href="index.php#rooms" class="w3-bar-item w3-button w3-mobile">Rooms</a>
        <a href="index.php#contact" class="w3-bar-item w3-button w3-mobile">Contact Us</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-mobile">Logout</a>
    </div>


<?php } else { ?>
    <div class="w3-bar w3-white w3-large">
        <a href="index.php" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Hotel 667</a>
        <a href="index.php#rooms" class="w3-bar-item w3-button w3-mobile">Rooms</a>
        <a href="index.php#contact" class="w3-bar-item w3-button w3-mobile">Contact Us</a>
        <a href="registration.php" class="w3-bar-item w3-button w3-mobile">Employee Sign up</a>
        <a href="login.php" class="w3-bar-item w3-button w3-mobile">Log in</a>
    </div>
<?php } ?>


</body>
</html>