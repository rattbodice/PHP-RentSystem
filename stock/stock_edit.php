<?php
include '../include/connectsql.php';

$Sid = $_POST['id'];
$Sname = $_POST['Sname'];
$Samount = $_POST['Samount'];
$Sdes = $_POST['Sdes'];
$Stype = $_POST['Stype'];

$sql = "SELECT * FROM type WHERE type_id = $Stype";
$result = $conn -> query($sql);
$item = $result -> fetch_assoc();

$Stype_code = $item['type_code'];

$sql = "update stockpile set stock_name = ?,stock_amount = ?,stock_des = ? , type_type_id = ? , type_type_code = ? where stockpile_id = $Sid";
$statement = $conn->prepare($sql);
$statement->bind_param('sssis', $Sname, $Samount, $Sdes , $Stype, $Stype_code);
$result = $statement->execute();
if (!$result) {
    die('Execute failed: ' . $statement->error);
    $conn->close();
} else {
    $conn->close();
    header('Location:../stock.php');
    exit();
}



?>