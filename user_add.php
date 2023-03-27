<?php
include 'include/connectsql.php';

$sql = "SELECT * FROM user ORDER BY user_id DESC";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$userid = $row['user_id']+1;
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];
date_default_timezone_set('Asia/Bangkok');
$date = date('d-m-Y');
$status = $_POST['status'];

$sql = 'INSERT INTO user(user_id,user_fname,user_lname,user_phone,user_address,user_city,user_state,username,userpassword,user_date,user_status) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
$statement = $conn->prepare($sql);
$statement->bind_param('sssssssssss',$userid,$fname, $lname, $phone,$address,$city,$state,$username,$password,$date,$status);
$result = $statement->execute();
if (!$result) {
	die('Execute failed: ' . $statement->error);
} else {
	header('Location: user.php');
	exit();
}
?>