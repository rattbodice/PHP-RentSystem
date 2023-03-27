<?php
require('../include/connectsql.php');
$eventid = $_POST['idhidden'];
$returndate = date('d-m-Y', strtotime($_POST['returndate']));
$status = "Finished";
$sql = "UPDATE stockpile_has_user SET date_end = ?,event_status = ?
WHERE event_id = $eventid";
$statement = $conn->prepare($sql);
$statement->bind_param("ss",$returndate,$status);
$result = $statement->execute();

$sql = "SELECT * FROM stockpile_has_user INNER JOIN stockpile ON stockpile.stockpile_id = stockpile_has_user.stockpile_stockpile_id INNER JOIN type ON stockpile.type_type_id = type.type_id INNER JOIN user ON stockpile_has_user.user_user_id = user.user_id
WHERE event_id = $eventid";
$result = $conn->query($sql);
$rowitem = $result->fetch_assoc();

$amount = $rowitem['amount'];

$sql = "UPDATE stockpile SET stock_amount = stock_amount + $amount ";
$result = $conn->query($sql);



// Execute sql and check for failure
if (!$result) {
    die('Execute failed: ' . $statement->error);
}

// Redirect
header('Location: ../event.php');
exit();

if (!$result) {
    die("Error : " . $result->error);
}

?>