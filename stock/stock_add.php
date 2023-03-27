<?php

require '../include/connectsql.php';

$stockname = $_POST['Sname'];
$stockamount = $_POST['Samount'];
$stockdes = $_POST['Sdes'];
$typeid = $_POST['Stype'];

$sql = "SELECT * FROM type WHERE type_id = $typeid";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();

$typecode = $row['type_code'];


$sql = 'INSERT INTO stockpile(stock_name,type_type_id,type_type_code,stock_amount,stock_des) VALUES (?,?,?,?,?)';
$statement = $conn->prepare($sql);
$statement -> bind_param('sisss',$stockname,$typeid,$typecode,$stockamount,$stockdes); 
$result = $statement->execute();
if(!$result){
    die('Execute failed : '.$result->error);
}else{
    header('Location: ../stock.php');
    exit();
}
?>