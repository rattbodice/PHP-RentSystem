<?php
require('include/connectsql.php');
session_start();
$status = $_SESSION['login'];
if ($status != "ADMIN") {
    header("Location:login.php");
}
#Check user_id sent from user data

if (isset($_GET['userid']))
    $userid = $_GET['userid'];

$sql = 'SELECT * FROM stockpile INNER JOIN type ON stockpile.type_type_id = type.type_id';
$result = $conn->query($sql);

if (isset($_POST['sl-type'])) {
    $select = $_POST['sl-type'];
    if ($select != "null") {
        $sql = "SELECT * FROM stockpile INNER JOIN type ON stockpile.type_type_id = type.type_id WHERE stockpile.type_type_id = $select";
    } else {
        $sql = 'SELECT * FROM stockpile INNER JOIN type ON stockpile.type_type_id = type.type_id';
    }
    $result = $conn->query($sql);
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

    <title>Back Rent System</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap" rel="stylesheet">
</head>
<style>
    * {
        font-family: 'IBM Plex Sans Thai', sans-serif;
    }
</style>

<body id="page-top">


    <?php
    include 'include/nav.php';
    ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">ระบบจัดการพัสดุ</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">ระบบจัดการชนิดพัสดุ</h6>
                <div class="d-flex ">
                    <!-- type row -->
                    <form action="" method="post">
                        <select id="sl-type" name="sl-type" class="form-select form-control align-self-center "
                            onchange="this.form.submit()" style="margin-right:1rem; width:15rem;"
                            aria-label="Default select example">
                            <option value="null" selected>ทั้งหมด</option>
                            <?php
                            $sql = "SELECT * FROM type";
                            $resulttype = $conn->query($sql);
                            echo $resulttype->num_rows;
                            while ($rowtype = $resulttype->fetch_assoc()) {
                                if ($select == $rowtype['type_id']){
                                    echo "<option selected='selected' value=".$rowtype['type_id'].">".$rowtype['type_name']."</option>";
                                }else{
                                    echo '<option value="'. $rowtype['type_id'] .'">' . $rowtype['type_name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </form>
                    <!-- button Add -->
                    <button class="btn btn-primary addData form-control ">Add Stock</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Stock ID</th>
                                <th>Stock Name</th>
                                <th>Stock Amount</th>
                                <th>Type of Stock</th>
                                <th>Menu</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                            <tr>
                                            <td>' . $row['stockpile_id'] . '</td>
                                            <td>' . $row['stock_name'] . '</td>
                                            
                                            <td>' . $row['stock_amount'] . '</td>
                                            <td>' . $row['type_name'] . '</td>
                                            <td>';

                                if (!empty($userid)) {
                                    echo '<a type="submit" class="btn btn-success" href="event/eventadd.php?userid=' . $userid . '&stockid=' . $row['stockpile_id'] . '" id="' . $row['stockpile_id'] . '">Select</a>';
                                }
                                echo '
                                               <button type="submit" class="btn btn-warning bt-menu editData" id="' . $row['stockpile_id'] . '">Edit</button>
                                               <button type="submit" class="btn btn-danger bt-menu deleteData" id="' . $row['stockpile_id'] . '" >Delete</button>
                                            </td>
                                            </tr>
                                            '
                                ;
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        include 'include/stocks_modal.php';
        ?>
    </div>

    <script>
        $(document).ready(function () {

            $('.editData').click(function () {
                let userid = $(this).attr("id");
                $.ajax({
                    url: "stock/fetchstock.php",
                    method: "post",
                    data: { id: userid },
                    success: function (data) {
                        $('#detailupdate').html(data);
                        $('#edit').modal('show');
                    }
                });
            });
            $('.deleteData').click(function () {
                let userid = $(this).attr("id");
                $('#showid').html(userid);
                $('#inputid').val(userid);
                $('#delete').modal('show');
            });
            $('.addData').click(function () {
                $('#add').modal('show');
            });

        });
    </script>