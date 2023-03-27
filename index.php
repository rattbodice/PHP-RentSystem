<?php
require('include/connectsql.php');
session_start();

$status = $_SESSION['login'];
if($status != "ADMIN"){
    header("Location:login.php");
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

    <!-- Font -->
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

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">สถานะการยืม</h1>
        </div>

        <div class="row">
            <?php
            $sql = 'SELECT * FROM stockpile_has_user';
            $result = $conn->query($sql);
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-l font-weight-bold text-primary text-uppercase mb-1">
                                    ประวัติการยืมทั้งหมด</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $result->num_rows ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-box fa-2x " style="color:RGB(0,55,174);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sql = "SELECT * FROM stockpile_has_user WHERE event_status = 'RENT'";
            $result = $conn->query($sql);
            ?>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2" style="border-left:solid;border-left-color:RGB(15,172,3);">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-l font-weight-bold  text-uppercase mb-1" style="color:RGB(15,172,3);">
                                    การยืมที่กำลังดำเนินการ</div>
                                <div class="h5 mb-3 font-weight-bold text-gray-800">
                                    <?php echo $result->num_rows ?>
                                </div>
                                <a class="btn btn-danger" href="event.php?status=RENT" style="background-color:RGB(15,172,3);border-color:RGB(15,172,3);">Go</a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dolly fa-2x " style="color:RGB(15,172,3);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $datenow = strtotime(date("d-m-Y"));
            $sql = "SELECT * FROM stockpile_has_user WHERE event_status = 'RENT'";
            $result = $conn->query($sql);
            $count =0;
            while ( $item = $result -> fetch_assoc()){
                $dateselect = strtotime($item['date_end']);
                if ($dateselect < $datenow){
                    $count = $count+1;
                }
            }
            ?>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2" style="border-left:solid;border-left-color:red;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-l font-weight-bold  text-uppercase mb-1" style="color:red;">
                                    การยืมที่เลยกำหนด</div>
                                <div class="h5 mb-3 font-weight-bold text-gray-800">
                                    <?php echo $count ?>
                                </div>
                                <a class="btn btn-danger" href="event.php?status=RENT&outtime=true" style="background-color:red;">Go</a>
                            </div>
                            <div class="col-auto">
                                <i class="	fas fa-calendar-alt fa-2x " style="color:red;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT * FROM stockpile_has_user WHERE event_status = 'Finished'";
            $result = $conn->query($sql);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2" style="border-left:solid;border-left-color:grey;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-l font-weight-bold  text-uppercase mb-1" style="color:grey;">
                                    การยืมที่คืนเสร็จสิ้นแล้ว</div>
                                <div class="h5 mb-3 font-weight-bold text-gray-800">
                                    <?php echo $result->num_rows ?>
                                </div>
                                <a class="btn btn-danger" href="event.php?status=Finished" style="background-color:grey;border-color:grey;">Go</a>
                            </div>
                            <div class="col-auto">
                                <i class="	fas fa-clipboard-check fa-2x " style="color:grey;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">อื่นๆ</h1>
        </div>

        <?php
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);

        ?>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2" style="border-left:solid;border-left-color:RGB(33,175,207);">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-l font-weight-bold  text-uppercase mb-1"
                                    style="color:RGB(33,175,207);">
                                    จำนวนผู้ใช้</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $result->num_rows ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-street-view fa-2x " style="color:RGB(33,175,207);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT * FROM stockpile";
            $result = $conn->query($sql);

            ?>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2" style="border-left:solid;border-left-color:RGB(204,138,0);">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-l font-weight-bold  text-uppercase mb-1"
                                    style="color:RGB(204,138,0);">
                                    จำนวนพัสดุ</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $result->num_rows ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-warehouse fa-2x " style="color:RGB(204,138,0);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT * FROM type";
            $result = $conn->query($sql);

            ?>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2" style="border-left:solid;border-left-color:RGB(205,204,3);">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-l font-weight-bold  text-uppercase mb-1"
                                    style="color:RGB(205,204,3);">
                                    จำนวนประเภทพัสดุ</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $result->num_rows ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-pallet fa-2x " style="color:RGB(205,204,3);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
    include 'include/types_modal.php';
    ?>
    </div>