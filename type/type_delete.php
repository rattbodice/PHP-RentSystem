<?php
	include '../include/connectsql.php';
	
	$userid = $_POST['id'];
	$sql = 'delete from type where type_id = ?';
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $userid);
    $result = $statement->execute();

    // Execute sql and check for failure
    if (!$result) {
        echo '<script>alert("ไม่สามารถลบข้อมูลได้ เนื่องจากมีข้อมูลที่มีข้อมูลดานนี้อยู่")</script>';
    }

    // Redirect
    header('Location: ../type.php');
    exit();
?>