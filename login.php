<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
</style>
<script type="text/javascript">
    function validate()
    {
        if( document.login.username.value == "" )
        {
            alert( "Please Enter User Name" );
            document.login.username.focus() ;
            return false;
        }

        if( document.login.password.value == "" )
        {
            alert( "Please Enter password" );
            document.login.password.focus() ;
            return false;
        }
    }
    //-->
</script>
</head>
<body class="w3-light-grey">
<?php

require_once("config.php");

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { header("Location: myaccount.php"); die(); }

//Forms posted
if(!empty($_POST))
{
    $errors = array();
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    //Perform some validation

    if($username == "")
    {
        $errors[] = "enter username";
    }
    if($password == "")
    {
        $errors[] = "enter password";
    }

    if(count($errors) == 0)
    {
        //retrieve the records of the user who is trying to login
        $userdetails = fetchUserDetails($username);

        //See if the user's account is activated
        if($userdetails["Active"]==0)
        {
            $errors[] = "account inactive";
        }
        else
        {
            //Hash the password and use the salt from the database to compare the password.
            $entered_pass = generateHash($password,$userdetails["password"]);

            if($entered_pass != $userdetails["password"])
            {

                $errors[] = "invalid password";
            }
            else
            {
                //Passwords match! we're good to go'
                //Transfer some db data to the session object
                $loggedInUser = new loggedInUser();
                $loggedInUser->email = $userdetails["email"];
                $loggedInUser->user_id = $userdetails["customer_id"];
                $loggedInUser->hash_pw = $userdetails["password"];
                $loggedInUser->first_name = $userdetails["first_name"];
                $loggedInUser->last_name = $userdetails["last_name"];
                $loggedInUser->username = $userdetails["username"];
                $loggedInUser->member_since = $userdetails["MemberSince"];
                $loggedInUser->role = $userdetails["role"];

                //pass the values of $loggedInUser into the session -
                // you can directly pass the values into the array as well.

                $_SESSION["ThisUser"] = $loggedInUser;
                if($userdetails["role"]=='admin'){
                    echo "bla bla";
                    header("Location: myaccount.php");
                    die();
                }
                elseif ($userdetails["role"]=='CSR'){
                    header("Location: myaccount.php");
                    die();
                }
                elseif ($userdetails["role"]=='regular'){
                    header("Location: index.php");
                    die();
                }
                //now that a session for this user is created
                //Redirect to this users account page
                //header("Location: myaccount.php");
                //die();
            }
        }

    }
}

require_once("header.php");?>

<div id="wrapper">
    <div id="content">
        <div id="top-nav">
            <?php include("top-nav.php"); ?>
        </div>
        <div id="main">
            <header class="w3-display-container w3-content" style="max-width:1500px;">
                <img class="w3-image" src="style/images/infinity%20pool.jpeg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
                <div class="w3-display-left w3-padding w3-col l3 m8">
                    <div class="w3-container w3-red">
                        <h2><i class="fa fa-bed w3-margin-right"></i>Login</h2>
                    </div>
                    <div class="w3-container w3-white w3-padding-16">
                        <div id="regbox">
                            <form name="login" action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return validate();" method="post">
                                <p>
                                    <input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Username" name="username" />
                                </p>
                                <p>
                                    <input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" name="password" />
                                </p>
                                <p>
                                    <label>&nbsp;</label>
                                    <button class="w3-button w3-red w3-padding-large" type="submit">Login</button>
                                </p>
                            </form>
                            <pre>
            					<?php print_r($errors); ?>
                             </pre>
                        </div>
                    </div>
                </div>
            </header>

        </div>
        <div id="bottom"></div>
    </div>
</div>
</body>
</html>
