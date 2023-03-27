<?php
require '../include/connectsql.php';

$type_name = $_POST['Tname'];
$type_code = $_POST['Tcode'];

$sql = "INSERT INTO type VALUES ('','$type_name','$type_code')";
$result = $conn->query($sql);
if (!$result) {
	die('Execute failed: ' . $result->error);
} else {
	header('Location: ../type.php');
	exit();
}
?>