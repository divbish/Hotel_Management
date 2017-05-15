<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
$username = $firstname = $lastname = $password = $confirm_pass = $email =  $phone =  "";
$usernameErr = $firstnameErr = $lastnameErr = $passwordErr = $confirm_passErr = $emailErr = $phoneErr = "";
require_once("config.php");
//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { header("Location: myaccount.php"); die(); }

//Forms posted

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = array();

    if (empty($_POST["username"])) {
        $errors[]= $usernameErr = "Username is required";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty($_POST["firstname"])) {
        $errors[]= $firstnameErr = "Firstname is required";
    } else {
        $firstname = trim($_POST["firstname"]);
    }

    if (empty($_POST["lastname"])) {
        $errors[]= $lastnameErr = "Lastname is required";
    } else {
        $lastname = trim($_POST["lastname"]);
    }

    if (empty($_POST["password"])) {
        $errors[]= $passwordErr = "Password is required";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($_POST["username"])) {
        $errors[]= $confirm_passErr = "Confirm password is required";
    } else {
        $confirm_pass = trim($_POST["passwordc"]);
    }

    if (empty($_POST["email"])) {
        $errors[]= $emailErr = "Email is required";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty($_POST["phone"])) {
        $errors[]= $phoneErr = "Username is required";
    } else {
        $phone = trim($_POST["phone"]);
    }

    if ($_POST["password"] != $_POST["passwordc"]){
        $errors[]= $confirm_passErr = "Password and Confirm password don't match!";
    }

    $role = null;


    if(count($errors) == 0)
    {
        $user = createNewUser($username, $firstname, $lastname, $email, $password, $phone, $role);
        //print_r($user);
        if($user <> 1){
            $errors[] = "registration error";
        }
    }
    if(count($errors) == 0) {
        $successes[] = "registration successful";
        echo "Thank you for signing up with us!";

        ?>
        <script type="text/javascript">
            alert("Thank you for signing up with us!");
            location="index.php";
        </script> <?php
    }
}

require_once("header.php");
?>

	<div id="wrapper">
		<div id="content">
			<div id="top-nav">
			    <?php include("top-nav.php"); ?>
			</div>

			<div id="main">

                <header class="w3-display-container w3-content" style="max-width:1500px;">
                    <img class="w3-image" src="style/images/Vila.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
                    <div class="w3-display-left w3-padding w3-col l3 m8">
                        <div class="w3-container w3-red">
                            <h2><i class="fa fa-bed w3-margin-right"></i>Sign Up</h2>
                        </div>
                        <div class="w3-container w3-white w3-padding-16">
                            <div id="regbox">
                                <form name="login" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                    <p>
                                        <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Username" name="username" />
                                        <span class="error"> <?php echo $usernameErr;?></span>
                                    </p>
                                    <p>
                                        <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="First Name" name="firstname" />
                                        <span class="error"> <?php echo $firstnameErr;?></span>
                                    </p>
                                    <p>
                                        <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Last Name" name="lastname" />
                                        <span class="error"> <?php echo $lastnameErr;?></span>
                                    </p>
                                    <p>
                                        <input class="w3-input w3-padding-14 w3-border" type="password" placeholder="Password" name="password" />
                                        <span class="error"> <?php echo $passwordErr;?></span>
                                    </p>
                                    <p>
                                        <input class="w3-input w3-padding-14 w3-border" type="password" placeholder="Confirm Password" name="passwordc" />
                                        <span class="error"> <?php echo $confirm_passErr;?></span>
                                    </p>
                                    <p>
                                        <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Email" name="email" />
                                        <span class="error"> <?php echo $emailErr;?></span>
                                    </p>
                                    <p>
                                        <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Phone number" name="phone" />
                                        <span class="error"> <?php echo $phoneErr;?></span>
                                    </p>
                                    <p>
                                        <label>&nbsp;</label>
                                        <button class="w3-button w3-red w3-padding-large" type="submit">Register</button>
                                    </p>
                                </form>



                            </div>
                        </div>
                    </div>
                </header>
			</div>
			<div id='bottom'></div>
		</div>
	</div>
</body>
</html>