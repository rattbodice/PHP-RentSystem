<?php
	include '../include/connectsql.php';
	
	$userid = $_POST['id'];
	$sql = 'delete from stockpile where stockpile_id = ?';
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $userid);
    $result = $statement->execute();

    // Execute sql and check for failure
    if (!$result) {
        die('Execute failed: ' . $statement->error);
    }

    // Redirect
    header('Location: ../stock.php');
    exit();
?>