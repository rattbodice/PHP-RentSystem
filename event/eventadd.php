<?php
require('../include/connectsql.php');
$stockpile_id = $_GET['stockid'];
$userid = $_GET['userid'];

if (isset($stockpile_id)) {
    $sql = "SELECT * FROM stockpile INNER JOIN type ON stockpile.type_type_id = type.type_id WHERE stockpile.stockpile_id = $stockpile_id";
    $result = $conn->query($sql);
    $rowstock = $result->fetch_assoc();
}

if (isset($userid)) {
    $sql = "SELECT * FROM user WHERE user_id = $userid";
    $result = $conn->query($sql);
    $rowuser = $result->fetch_assoc();
}

$sql = "SELECT * FROM stockpile_has_user";
$result = $conn->query($sql);
$numrow_stockev = $result->num_rows;

#Add Event

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stockid = $rowstock['stockpile_id'];
    $userid = $rowuser['user_id'];
    $amount = $_POST['Eamount'];
    $edescrip = $_POST['Edes'];
    $ds = strtotime($_POST["Edates"]);
    $de = strtotime($_POST["Edatee"]);
    $datestart = date('d-m-Y', '' . $ds . '');
    $dateend = date('d-m-Y', '' . $de . '');
    $status = "RENT";

    $sql = "UPDATE stockpile SET stock_amount = ".$rowstock['stock_amount']-$amount." WHERE stockpile_id = $stockid";
    $result = $conn -> query($sql);

    $sql = "INSERT INTO stockpile_has_user(stockpile_stockpile_id,user_user_id,amount,hasrent_des,date_start,date_end,event_status) VALUES (?,?,?,?,?,?,?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param("iiissss", $stockid, $userid, $amount, $edescrip, $datestart, $dateend, $status);
    $result = $statement->execute();

    if (!$result) {
        die('Execute failed: ' . $statement->error);
    } else {
        header('Location: ../event.php');
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Back Rent System.</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>

</head>

<body id="page-top">


    
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <div class="container mt-4">
            <h1 class="h3 mb-2 text-gray-800">ระบบป้อนข้อมูลการยืม</h1>
            <form action="" method="POST" id="form1">
                <div class="detailupdate" id="detailadd">
                    <div class="mb-3 form-row ">
                        <div class="form-group col-md-2">
                            <label for="edit_email" class="col-form-label ">Stock Event ID</label>
                            <input type="text" class="form-control" name="Sname"
                                value="<?php echo $numrow_stockev + 1 ?>" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="edit_email" class="col-form-label">Stock ID </label>
                            <input type="text" class="form-control" name="Samount"
                                value="<?php echo $rowstock['stockpile_id'] ?>" disabled>
                        </div>
                        <div class="mb-3 col-md-5">
                            <label for="edit_email" class="col-form-label">Stock Name</label>
                            <input type="text" class="form-control" name="Samount"
                                value="<?php echo $rowstock['stock_name'] ?>" disabled>
                        </div>
                        <div class="mb-3 col-md-3 ">
                            <label for="" class="col-form-label">Stock Type</label>
                            <input type="text" class="form-control" name="Samount"
                                value="<?php echo $rowstock['type_name'] ?>" disabled>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="edit_email" class="col-form-label">Stock Description</label>
                            <textarea type="text" class="form-control" name="Sdes" value=""
                                disabled><?php echo $rowstock['stock_des'] ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 form-row ">
                        <div class="form-group col-md-2">
                            <label for="edit_email" class="col-form-label">User Name </label>
                            <input type="text" class="form-control" name="Samount"
                                value="<?php echo $rowuser['user_fname'] . " " . $rowuser['user_lname'] ?>" disabled>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="edit_email" class="col-form-label">User Address</label>
                            <input type="text" class="form-control" name="Samount"
                                value="<?php echo $rowuser['user_address'] ?>" disabled>
                        </div>
                        <div class="mb-3 col-md-2 ">
                            <label for="" class="col-form-label">User City</label>
                            <input type="text" class="form-control" name="Samount"
                                value="<?php echo $rowuser['user_city'] ?>" disabled>
                        </div>
                        <div class="mb-3 col-md-2 ">
                            <label for="" class="col-form-label">User State</label>
                            <input type="text" class="form-control" name="Samount"
                                value="<?php echo $rowuser['user_state'] ?>" disabled>
                        </div>
                        <div class="mb-3 col-md-2 ">
                            <label for="" class="col-form-label">User Phone</label>
                            <input type="text" class="form-control" name="Samount"
                                value="<?php echo $rowuser['user_phone'] ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-3 form-row ">
                        <div class="form-group col-md-3">
                            <label for="edit_email" class="col-form-label">Date Start</label>
                            <input type="date" class="form-control" name="Edates" value="">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="edit_email" class="col-form-label">Date End</label>
                            <input type="date" class="form-control" name="Edatee" value="">
                        </div>
                    </div>
                    <div class="mb-3 form-row">
                        <div class="mb-3 col-md-2 ">
                            <label for="" class="col-form-label">Amount</label>
                            <input type="number" class="form-control" id="Eamount" name="Eamount" value="">
                        </div>
                    </div>
                    
                    <div class="mb-3 form-row ">
                        <div class="mb-3 col-md-6">
                            <label for="edit_email" class="col-form-label">Stock Event Description</label>
                            <textarea type="text" class="form-control" name="Edes" value="" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3 form-row ">
                        <div class="mb-3 col-md-6">
                            <button type="button" class="btn btn-primary" onclick="checkAmount()">Submit</button>
                            <a href="../user.php" class="btn btn-danger">Cancle</a>
                        </div>
                    </div>

            </form>
        </div>
    </div>


    </div>
    <?php
    include '../include/users_modal.php';
    ?>
    </div>

    <script>
        function checkAmount() {
            let amount = document.getElementById("Eamount").value;
            if (amount > <?php echo $rowstock['stock_amount']?>) {
                alert("Amount too much than amount in stock !!")
            }else{
                document.getElementById("form1").submit();
            }
        }
    </script>