<?php
include 'include/connectsql.php';

$userid = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];

$sql = "update user set user_fname = ?,user_lname = ?,user_phone = ? , user_address = ? , user_city = ? , user_state = ? , username = ? , userpassword =  ? ,user_status = ? where user_id = $userid";
$statement = $conn->prepare($sql);
$statement->bind_param('sssssssss', $fname, $lname, $phone, $address, $city, $state, $username, $password,$status);
$result = $statement->execute();
if (!$result) {
    die('Execute failed: ' . $statement->error);
    $conn->close();
} else {
    $conn->close();
    header('Location:user.php');
    exit();
}



?>