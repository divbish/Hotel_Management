<?php
require_once("config.php");
require_once("header.php");
?>


<body>
    <div id="wrapper">
        <div id="content">
            <h2>My Account</h2>
            <div id="top-nav">
                <?php include("top-nav.php"); ?>
            </div>

            <div id="main">
                <br><br>
                &nbsp &nbsp &nbsp  Hey, <?php echo "$loggedInUser->first_name " . "$loggedInUser->last_name"; ?>.
                You have been member since <?php print date("M d, Y", $loggedInUser->member_since); ?>
            </div>
            <div id='bottom'></div>
        </div>
    </div>
</body>
</html>