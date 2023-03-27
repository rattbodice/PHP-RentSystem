<?php
	include '../include/connectsql.php';
	
    $amount = $_POST['amount'];

    $sql = "UPDATE stockpile SET stock_amount = stock_amount + $amount ";
    $result = $conn -> query($sql);

	$eventid = $_POST['id'];
	$sql = 'delete from stockpile_has_user where event_id = ?';
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $eventid);
    $result = $statement->execute();

    // Execute sql and check for failure
    if (!$result) {
        die('Execute failed: ' . $statement->error);
    }

    // Redirect
    header('Location: ../event.php');
    exit();
?>