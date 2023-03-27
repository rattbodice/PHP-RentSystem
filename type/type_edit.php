<?php
include '../include/connectsql.php';

$userid = $_POST['id'];
$tname = $_POST['typename'];
$tcode = $_POST['typecode'];


$sql = "update type set type_name = ?,type_code = ? where type_id = $userid";
$statement = $conn->prepare($sql);
$statement->bind_param('ss', $tname, $tcode);
$result = $statement->execute();
if (!$result) {
    echo '<script>alert("ไม่สามารถเปลี่ยนแปลงค่า Code ได้")</script>';
    
    $conn->close();
} else {
    $conn->close();
    header('Location:../type.php');
    exit();
}



?>