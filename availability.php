<?php

include_once("config.php");

?>

<div id='top-nav'>
    <?php include("top-nav.php"); ?>
</div>

<pre><?php //print_r($allusers); ?></pre>

<html>
<head>
    <title>Display All Users</title>
</head>

<body>
<form action="" method="post">
<div>
    <div>
        Check In: <input type="date" name="check_in_date">
        Check Out: <input type="date" name="check_out_date">
        <input name="submit" type="submit" />
    </div>
<div>
<table>
    <tr>
        <td>Room Type</td>
        <td>Available</td>

        <?php //NOTICE THE USE OF PHP IN BETWEEN HTML
        $available_single=null;
        $available_double=null;
        $available_deluxe=null;
        if (isset($_POST['submit'])) {
            $available_single = intval(checkAvailability('SingleRoom', $_POST['check_in_date'], $_POST['check_out_date'])['count']);
            $available_double = intval(checkAvailability('DoubleRoom', $_POST['check_in_date'], $_POST['check_out_date'])['count']);
            $available_deluxe = intval(checkAvailability('DeluxeRoom', $_POST['check_in_date'], $_POST['check_out_date'])['count']);
        }
        ?>

    <tr>
        <td>Single Room</td>
        <td><?php print $available_single; ?></td>
    </tr>
    <tr>
        <td>Double Room</td>
        <td><?php print $available_double; ?></td>
    </tr>
    <tr>
        <td>Deluxe Room</td>
        <td><?php print $available_deluxe; ?></td>
    </tr>

</table>
</div>
</div>
</form>
</body>
</html>