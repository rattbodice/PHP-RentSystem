<?php
include '../include/connectsql.php';

$eventid = $_POST['eventid'];
$datestart = date('d-m-Y',strtotime($_POST['Edates']));
$dateend = date('d-m-Y',strtotime($_POST['Edatee']));
$amount = $_POST['Eamount'];
$eventdes = $_POST['Edes'];

#---Check Amount Stock---
$sql = "SELECT * FROM stockpile_has_user INNER JOIN stockpile ON stockpile.stockpile_id = stockpile_has_user.stockpile_stockpile_id INNER JOIN type ON stockpile.type_type_id = type.type_id INNER JOIN user ON stockpile_has_user.user_user_id = user.user_id
WHERE event_id = $eventid";
$result = $conn->query($sql);
$rowitem = $result->fetch_assoc();
if ($amount < $rowitem['amount']){
    $value = $rowitem['amount']-$amount;
    $result = $rowitem['stock_amount']+$value;
    $sql = "UPDATE stockpile SET stock_amount = $result";
    $result = $conn -> query($sql);

    if(!$result){
        die("Error : ".$result->error);
    }
    
}else if($amount > $rowitem['amount']){
    $value = $amount-$rowitem['amount'];
    $result = $rowitem['stock_amount']-$value;
    $sql = "UPDATE stockpile SET stock_amount = $result WHERE stockpile_id = '".$rowitem['stockpile_id']."'";
    $result = $conn -> query($sql);

    if(!$result){
        die("Error : ".$result->error);
    }
}

$sql = "UPDATE stockpile_has_user SET amount = ?,hasrent_des = ?, date_start = ?, date_end= ?
        WHERE event_id = $eventid
";
$statement = $conn -> prepare($sql);
$statement -> bind_param("isss",$amount,$eventdes,$datestart,$dateend);
$result = $statement->execute();
header('Location:../event.php');
    ?>