<?php

function getUniqueCode($length = "")
{
    $code = md5(uniqid(rand(), TRUE));
    if ($length != "") {
        return substr($code, 0, $length);
    } else {
        return $code;
    }
}

function generateHash($plainText, $salt = NULL)
{
    if ($salt === NULL) {
        $salt = substr(md5(uniqid(rand(), TRUE)), 0, 25);
    }
    else {
        $salt = substr($salt, 0, 25);
    }
    return $salt . sha1($salt . $plainText);
}

function isUserLoggedIn()
{
    global $loggedInUser, $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		customer_id,
		password
		FROM " . $db_table_prefix . "customerdetails
		WHERE
		customer_id = ?
		AND
		password = ?
		AND
		active = 1
		LIMIT 1");
    $stmt->bind_param("ss", $loggedInUser->user_id, $loggedInUser->hash_pw);
    $stmt->execute();
    $stmt->store_result();
    $num_returns = $stmt->num_rows;
    $stmt->close();

    if ($loggedInUser == NULL) {
        return false;
    } else {
        if ($num_returns > 0) {
            return true;
        } else {
            destroySession("ThisUser");
            return false;
        }
    }
}

function destroySession($name)
{
    if (isset($_SESSION[$name])) {
        $_SESSION[$name] = NULL;
        unset($_SESSION[$name]);
    }
}

function fetchAllUsers()
{

    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		customer_id,
		username,
		first_name,
		last_name,
		email,
		password,
		MemberSince,
		Active,
		role
		FROM " . $db_table_prefix . "customerdetails
		");

    $stmt->execute();
    $stmt->bind_result($customer_id, $username, $firstname, $lastname, $email, $password, $MemberSince, $Active, $role);
    while ($stmt->fetch()) {
        $row[] = array(
            'customer_id' => $customer_id,
            'username' => $username,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'password' => $password,
            'MemberSince' => $MemberSince,
            'Active' => $Active,
            'role'=> $role);
    }
    $stmt->close();
    return ($row);
}

function fetchUserDetails($username)
{

    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		customer_id,
		username,
		first_name,
		last_name,
		email,
		password,
		MemberSince,
		Active,
		role
		FROM " . $db_table_prefix . "customerdetails
		WHERE
		username = ?
		LIMIT 1");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $stmt->bind_result($customer_id, $username, $firstname, $lastname, $email, $password, $MemberSince, $Active, $role);
    while ($stmt->fetch()) {
        $row = array('customer_id' => $customer_id,
            'username' => $username,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'password' => $password,
            'MemberSince' => $MemberSince,
            'Active' => $Active,
            'role'=> $role
        );
    }
    $stmt->close();
    return ($row);
}

function fetchUsersForCSR()
{

    global $loggedInUser, $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare("SELECT
		customer_id,
		username,
		first_name,
		last_name,
		email,
		password,
		MemberSince,
		Active,
		role
		FROM " . $db_table_prefix . "customerdetails
		WHERE
		AgentUsername = ?
		");
    $stmt->bind_param("s", $loggedInUser->username);
    $stmt->execute();
    $stmt->bind_result($customer_id, $username, $firstname, $lastname, $email, $password, $MemberSince, $Active, $role);
    while ($stmt->fetch()) {
        $row[] = array('customer_id' => $customer_id,
            'username' => $username,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'password' => $password,
            'MemberSince' => $MemberSince,
            'Active' => $Active,
            'role'=> $role
        );
    }
    $stmt->close();
    return ($row);
}

function checkAvailability($roomType, $checkInDate, $checkOutDate)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare("select count(*) from 
                                (select room_number from " . $db_table_prefix . "rooms 
                                    where room_type=?) a 
                                where a.room_number not in 
                                    (SELECT room_id FROM " . $db_table_prefix . "bookingdetails 
                                        where 
                                        (check_in<=? and check_out>=?)
                                        or (check_in<=? and check_out>=?))");
    $stmt->bind_param("sssss", $roomType, $checkInDate, $checkInDate, $checkOutDate, $checkOutDate);
    $stmt->execute();
    $stmt->bind_result($count);
    while ($stmt->fetch()) {
        $row = array('count' => $count);
    }

    $stmt->close();
    return ($row);
}

function createNewUser ($username, $firstname, $lastname, $email, $password, $phone, $role)
{
    if (!$role){
        $role = 'regular';
    }
    global $mysqli, $db_table_prefix;

    $newpassword = generateHash($password);
    $stmt = $mysqli->prepare(
        "INSERT INTO " . $db_table_prefix . "customerdetails (
		username,
		first_name,
		last_name,
		email,
		password,
		contact_number,
		role,
		MemberSince,
		Active
		)
		VALUES (
		?,
		?,
		?,
		?,
		?,
		?,
		?,
		'" . time() . "',
		1
        )"
    );
    $stmt->bind_param("sssssss", $username, $firstname, $lastname, $email, $newpassword, $phone, $role);

    $last_id = $mysqli->insert_id;
    $result = $stmt->execute();
    //print_r($result);
    $stmt->close();
    return $result;

}

function createUser($username, $firstname, $lastname, $email, $password, $phone, $role, $AgentUsername)
{
    if (!$role){
        $role = 'regular';
    }

    if(!$AgentUsername){
        $AgentUsername = null;
    }
    global $mysqli, $db_table_prefix;

    $newpassword = generateHash($password);
    $stmt = $mysqli->prepare(
        "INSERT INTO " . $db_table_prefix . "customerdetails (
		username,
		first_name,
		last_name,
		email,
		password,
		contact_number,
		role,
		MemberSince,
		Active,
		AgentUsername
		)
		VALUES (
		?,
		?,
		?,
		?,
		?,
		?,
		?,
		'" . time() . "',
		1,
		?
        )"
    );
    $stmt->bind_param("ssssssss", $username, $firstname, $lastname, $email, $newpassword, $phone, $role, $AgentUsername);

    $result = $stmt->execute();
    $last_id = $mysqli->insert_id;
    $stmt->close();
    return $last_id;
}

function bookRoom($customer_id, $room_type, $check_in, $check_out, $adults, $kids)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare("select min(room_number) from 
                                (select room_number from " . $db_table_prefix . "rooms 
                                    where room_type=?) a 
                                where a.room_number not in 
                                    (SELECT room_id FROM " . $db_table_prefix . "bookingdetails 
                                        where 
                                        (check_in<=? and check_out>=?)
                                        or (check_in<=? and check_out>=?))");
    $stmt->bind_param("sssss", $room_type, $check_in, $check_in, $check_out, $check_out);
    $stmt->execute();
    $stmt->bind_result($room_number);
    while ($stmt->fetch()) {
        $row = array('room_number' => $room_number);
    }
    $room_number = $row['room_number'];
    $stmt->close();

    $stmt = $mysqli->prepare("select room_price from 
                                " . $db_table_prefix . "roomtype 
                                where room_type=?");
    $stmt->bind_param("s", $room_type);
    $stmt->execute();
    $stmt->bind_result($room_price);
    while ($stmt->fetch()) {
        $row = array('room_price' => $room_price);
    }
    $room_price = $row['room_price'];
    $stmt->close();

    $stmt = $mysqli->prepare(
        "INSERT INTO " . $db_table_prefix . "bookingdetails (
		room_id,
		user_id,
		check_in,
		check_out,
		guests,
		kids,
		bill_amount
		)
		VALUES (
		?,
		?,
		?,
		?,
		?,
		?, 
		?
        )"
    );
    $d1=new DateTime($check_in);
    $d2=new DateTime($check_out);
    $date_diff = $d1->diff($d2);
    $date_diff=  (int)$date_diff->days;
    $room_price = $room_price*$date_diff;
    $stmt->bind_param("sssssss", $room_number, $customer_id, $check_in, $check_out, $adults, $kids, $room_price);

    $result = $stmt->execute();
    $last_id = $mysqli->insert_id;
    $stmt->close();
    return $row = array('room_number' => $room_number, 'booking_id' => $last_id, 'check_in'=>$check_in, 'check_out'=>$check_out,
        'price'=>$room_price);
}

function fetchThisUser($customer_id)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "SELECT
		customer_id,
		username,
		first_name,
		last_name,
		email,
		password,
		MemberSince,
		Active,
		role
		FROM " . $db_table_prefix . "customerdetails
		WHERE
		customer_id = ?
		LIMIT 1"
    );
    $stmt->bind_param("s", $customer_id);
    $stmt->execute();
    $stmt->bind_result($customer_id, $username, $firstname, $lastname, $email, $password, $MemberSince, $Active, $role);
    while ($stmt->fetch()) {
        $row[] = array(
            'customer_id' => $customer_id,
            'username' => $username,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'password' => $password,
            'MemberSince' => $MemberSince,
            'Active' => $Active,
            'role'=> $role
        );
    }
    $stmt->close();
    return ($row);
}

function updateThisRecord($username, $email, $password, $Active, $role, $customer_id)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "UPDATE " . $db_table_prefix . "customerdetails
		SET
		username = ?,
		email = ?,
		password = ?,
		Active = ?,
		role = ?
		WHERE
		customer_id = ?
		LIMIT 1"
    );
    $stmt->bind_param("ssssss", $username, $email, $password, $Active, $role, $customer_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}