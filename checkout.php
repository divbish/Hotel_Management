<?php
/**
 * Created by PhpStorm.
 * User: divyabishnoi
 * Date: 5/3/17
 * Time: 10:24 PM
 */
require_once("config.php");
if(!empty($_POST))
{
    $errors = array();
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $password = trim($_POST["password"]);
    $confirmpassword = trim($_POST["passwordc"]);
    $AgentUsername = trim($_POST["AgentUsername"]);

    if($username == "")
    {
        $errors[] = "enter valid username";
    }

    if($firstname == "")
    {
        $errors[] = "enter valid first name";
    }

    if($lastname == "")
    {
        $errors[] = "enter valid last name";
    }

    if($email == "")
    {
        $errors[] = "enter valid email";
    }

    if($password == "")
    {
        $errors[] = "enter valid password";
    }

    if($confirmpassword == "")
    {
        $errors[] = "enter valid password";
    }

    if($password =="" && $confirmpassword =="")
    {
        $errors[] = "enter password";
    }
    else if($password != $confirmpassword)
    {
        $errors[] = "password do not match";
    }

    //End data validation
    if(count($errors) == 0)
    {


        $user = createUser($username, $firstname, $lastname, $email, $password, $phone, $role, $AgentUsername);
        if($user <> 1){
            $errors[] = "registration error";
        }
    }
    if(count($errors) == 0) {
        $successes[] = "registration successful";
    }
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
                        <h2><i class="fa fa-bed w3-margin-right"></i>Guest Sign Up</h2>
                    </div>
                    <div class="w3-container w3-white w3-padding-14">
                        <div id="regbox">
                            <form name ="checkout" action="checkoutResult.php" method="post">
                                <p>
                                    <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Username" name="username" />
                                </p>
                                <p>
                                    <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="First name" name="firstname" />
                                </p>
                                <p>
                                    <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Last name" name="lastname" />
                                </p>
                                <p>
                                    <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Email" name="email" />
                                </p>
                                <p>
                                    <input class="w3-input w3-padding-14 w3-border" type="PASSWORD" placeholder="Password" name="password" />
                                </p>
                                <p>
                                    <input class="w3-input w3-padding-14 w3-border" type="PASSWORD" placeholder="Confirm Password" name="confirmpassword" />
                                </p>
                                <p>
                                    <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Phone Number" name="phone" />
                                </p>
                                <?php if( isUserLoggedIn() && $loggedInUser->role =='CSR') { ?>
                                <p>
                                    <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Agent Username" name="AgentUsername" />
                                </p>
                                <?php }
                                else{}
                                ?>

                                <!--<p>
                                    <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Agent Username" name="AgentUsername" />
                                </p>
                                --><p>
                                    <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="Street Address" name="address" />
                                </p>
                                <p>
                                    <input class="w3-input w3-padding-14 w3-border" type="text" placeholder="City" name="city" />
                                </p>
                                <p>
                                    <select class="w3-input w3-padding-14 w3-border"  placeholder="State" name="state">
                                        <option value="Select State">Select State</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District Of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                                </p>
                                <p>
                                    <input type="hidden" name="room_type" value="<?php echo $_GET['room_type'] ?>" />
                                </p>
                                <p>
                                    <input type="hidden" name="check_in" value="<?php echo $_GET['check_in'] ?>" />
                                </p>
                                <p>
                                    <input type="hidden" name="check_out" value="<?php echo $_GET['check_out'] ?>"/>
                                </p>
                                <p>
                                    <input type="hidden" name="adults" value="<?php echo $_GET['adults'] ?>" />
                                </p>
                                <p>
                                    <input type="hidden" name="kids" value="<?php echo $_GET['kids'] ?>" />
                                </p>
                                <p>
                                    <input type="submit" name='submit' value="Book" class="w3-button w3-red w3-padding-large"></input>
                                </p>

                            </form>
                        </div>
                    </div>

            </header>
        </div>
        <div id='bottom'></div>
    </div>
</div>
</body>

