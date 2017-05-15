<?php
/**
 * Created by PhpStorm.
 * User: divyabishnoi
 * Date: 5/2/17
 * Time: 11:37 PM
 */

require_once("config.php");

// Assigning $_POST values to individual variables for reuse.
$roomType = $_POST['submit'];
$check_in_date=$_POST['check_in_date'];
$check_out_date=$_POST['check_out_date'];
$adults=$_POST['adults'];
$kids = $_POST['kids'];
if($roomType == 'Choose Single Room'){
    $roomType='SingleRoom';
}
elseif ($roomType == 'Choose Double Room'){
    $roomType='DoubleRoom';
}
elseif ($roomType == 'Choose Deluxe Room'){
    $roomType='DeluxeRoom';
}

$available = intval(checkAvailability($roomType, $check_in_date, $check_out_date)['count']);
if ($available>0){
    header("Location: checkout.php?room_type=$roomType&check_in=$check_in_date&check_out=$check_out_date&adults=$adults&kids=$kids");
}
else{?>
    <script type="text/javascript">
        alert("No Rooms available for selected room type and dates");
location="index.php#rooms";
</script> <?php
    //header("Location: index.php");
}

//display the result that was returned by the createNewUser function - in this case we usually get a 1 when the
//insert is completed successfully.
#echo $newuser;
?>
