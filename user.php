<?php
require('include/connectsql.php');

session_start();
$status = $_SESSION['login'];
if($status != "ADMIN"){
    header("Location:login.php");
}

$sql = 'SELECT * FROM user';
$result = $conn->query($sql);

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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

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

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">ระบบจัดการข้อมูลผู้ใช้งาน</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">ระบบจัดการข้อมูลผู้ใช้งาน</h6>
                <button class="btn btn-primary addData" >Add User</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Date start</th>
                                <th>Menu</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                            <tr>
                                            <td>' . $row['user_id'] . '</td>
                                            <td>' . $row['user_fname'] . " " . $row['user_lname'] . '</td>
                                            
                                            <td>' . $row['user_city'] . '</td>
                                            <td>' . $row['user_state'] . '</td>
                                            <td>' . $row['user_date'] . '</td>
                                            <td>
                                               <a type="submit" class="btn btn-success " href="stock.php?userid='.$row['user_id'].'" id="'.$row['user_id'].'">Select</a>                
                                               <button type="submit" class="btn btn-info bt-menu viewData" id="'.$row['user_id'].'">View</button>
                                               <button type="submit" class="btn btn-warning bt-menu editData" id="'.$row['user_id'].'">Edit</button>
                                               <button type="submit" class="btn btn-danger bt-menu deleteData" id="'.$row['user_id'].'" >Delete</button>
                                            </td>
                                            </tr>

                                            ';
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    include 'include/users_modal.php';
    ?>
    </div>
    
   


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    $(document).ready(function(){
        $('.viewData').click(function(){
            let userid=$(this).attr("id");
            $.ajax({
                url:"user_view.php",
                method:"post",
                data:{id:userid},
                success:function(data){
                    $('#detail').html(data);
                    $('#exampleModal').modal('show');
                }
            });
        });
        $('.editData').click(function(){
            let userid=$(this).attr("id");
            $.ajax({
                url:"fetchuser.php",
                method:"post",
                data:{id:userid},
                success:function(data){
                    $('#detailupdate').html(data);
                    $('#edit').modal('show');
                }
            });
        });
        $('.deleteData').click(function(){
            let userid=$(this).attr("id");
            $('#showid').html(userid);
            $('#inputid').val(userid);
            $('#delete').modal('show');
        });
        $('.addData').click(function(){
            $('#add').modal('show');
        });
        
    });
    
</script>

</html>