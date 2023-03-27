<?php
require('include/connectsql.php');

session_start();
$status = $_SESSION['login'];
if($status != "ADMIN"){
    header("Location:login.php");
}

$sql = 'SELECT * FROM type';
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <!-- Font -->
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
        <h1 class="h3 mb-2 text-gray-800">ระบบจัดการชนิดพัสดุ</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">ระบบจัดการชนิดพัสดุ</h6>
                <button class="btn btn-primary addData" >Add Type</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Type ID</th>
                                <th>Type Name</th>
                                <th>Type Code</th>
                                <th>Menu</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                            <tr>
                                            <td>' . $row['type_id'] . '</td>
                                            <td>' . $row['type_name'] . '</td>
                                            
                                            <td>' . $row['type_code'] . '</td>
                                            <td>                
                                               <button type="submit" class="btn btn-warning bt-menu editData" id="'.$row['type_id'].'">Edit</button>
                                               <button type="submit" class="btn btn-danger bt-menu deleteData" id="'.$row['type_id'].'" >Delete</button>
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
    include 'include/types_modal.php';
    ?>
    </div>

    <script>
    $(document).ready(function(){
        
        $('.editData').click(function(){
            let userid=$(this).attr("id");
            $.ajax({
                url:"type/fetchtype.php",
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