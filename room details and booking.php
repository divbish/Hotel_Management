<?php
/**
 * Created by PhpStorm.
 * User: AImran
 * Date: 4/30/2017
 * Time: 11:36 AM
 */
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>
        FIRST CRUD
    </title>
    <!-- Style -- Can also be included as a file usually style.css -->
    <style type="text/css">
        table.table-style-three {
            font-family: verdana, arial, sans-serif;
            font-size: 11px;
            color: #333333;
            border-width: 1px;
            border-color: #3A3A3A;
            border-collapse: collapse;
        }
        table.table-style-three th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #FFA6A6;
            background-color: #D56A6A;
            color: #ffffff;
        }
        table.table-style-three a {
            color: blue;
            text-decoration: none;
        }

        table.table-style-three tr:hover td {
            cursor: pointer;
        }
        table.table-style-three tr:nth-child(even) td{
            background-color: #F7CFCF;
        }
        table.table-style-three td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #FFA6A6;
            background-color: #ffffff;
        }
    </style>
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<?php require_once("config.php");

$allrecords = fetchAllRooms();
?>

<!-- Table goes in the document BODY -->
<table class="table-style-three">
    <thead>
    <!-- display user details header  -->
    <th>Room Name</th>
    <th>Price</th>
    <th>Room Type ID</th>
    <th>Number Of Available Rooms</th>
    </thead>
    <tbody>
    <?php
    foreach($allrecords as $displayRecords) { ?>
        <tr>
            <td>
                <div data-role="main" class="ui-content">
                    <div data-role="collapsible">
                        <h1><?php print $displayRecords['RoomName']; ?></h1>
                        <p>Amenities description</p>
                    </div>
                </div>

            </td>
            <td><?php print $displayRecords['RoomPrice']; ?></td>
            <td><?php print $displayRecords['RoomTypeID']; ?></td>
            <td><?php print $displayRecords['NumberOfAvailableRooms']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<tr>
    <br><br>Now to book the room <a href="createNewRecord.php">Click Here</a>
</tr>
</body>
</html>