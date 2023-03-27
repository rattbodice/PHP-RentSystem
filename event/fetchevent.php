<?php
require('../include/connectsql.php');
$eventid = $_POST['id'];


$sql = "SELECT * FROM stockpile_has_user INNER JOIN stockpile ON stockpile.stockpile_id = stockpile_has_user.stockpile_stockpile_id INNER JOIN type ON stockpile.type_type_id = type.type_id INNER JOIN user ON stockpile_has_user.user_user_id = user.user_id
WHERE event_id = $eventid";
$result = $conn->query($sql);
$rowitem = $result->fetch_assoc();

echo '<div class="container">

<form action="event/eventedit.php" method="POST" id="form1">
    <div class="detailupdate" id="detailadd">
    <input type="hidden" class="form-control" name="eventid"
                    value="' . $rowitem["event_id"] . '" >
        <div class="mb-3 form-row ">
            <div class="form-group col-md-2">
                <label for="edit_email" class="col-form-label ">Stock Event ID</label>
                <input type="text" class="form-control" name="eventid"
                    value="' . $rowitem["event_id"] . '" disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="edit_email" class="col-form-label">Stock ID </label>
                <input type="text" class="form-control" name="stockid"
                    value="' . $rowitem["stockpile_stockpile_id"] . '" disabled>
            </div>
            <div class="mb-3 col-md-5">
                <label for="edit_email" class="col-form-label">Stock Name</label>
                <input type="text" class="form-control" name="Stockname"
                    value="' . $rowitem["stock_name"] . '" disabled>
            </div>
            <div class="mb-3 col-md-3 ">
                <label for="" class="col-form-label">Stock Type</label>
                <input type="text" class="form-control" name="Samount"
                    value="' . $rowitem["type_name"] . '" disabled>
            </div>
            <div class="mb-3 col-md-6">
                <label for="edit_email" class="col-form-label">Stock Description</label>
                <textarea type="text" class="form-control" name="Sdes" value=""
                    disabled>' . $rowitem["stock_des"] . '</textarea>
            </div>
        </div>
        <div class="mb-3 form-row ">
            <div class="form-group col-md-4">
                <label for="edit_email" class="col-form-label">User Name </label>
                <input type="text" class="form-control" name="Samount"
                    value="' . $rowitem["user_fname"] . " " . $rowitem["user_lname"] . '" disabled>
            </div>
            <div class="mb-3 col-md-3">
                <label for="edit_email" class="col-form-label">User Address</label>
                <input type="text" class="form-control" name="Samount"
                    value="' . $rowitem["user_address"] . '" disabled>
            </div>
            <div class="mb-3 col-md-2 ">
                <label for="" class="col-form-label">User City</label>
                <input type="text" class="form-control" name="Samount"
                    value="' . $rowitem["user_city"] . '" disabled>
            </div>
            <div class="mb-3 col-md-2 ">
                <label for="" class="col-form-label">User State</label>
                <input type="text" class="form-control" name="Samount"
                    value="' . $rowitem["user_state"] . '" disabled>
            </div>
            <div class="mb-3 col-md-2 ">
                <label for="" class="col-form-label">User Phone</label>
                <input type="text" class="form-control" name="Samount"
                    value="' . $rowitem["user_phone"] . '" disabled>
            </div>
        </div>
        <div class="mb-3 form-row ">
            <div class="form-group col-md-3">
                <label for="edit_email" class="col-form-label">Date Start</label>
                <input type="date" class="form-control" name="Edates" value="' . date("Y-m-d", strtotime($rowitem["date_start"])) . '">
            </div>
            <div class="mb-3 col-md-3">
                <label for="edit_email" class="col-form-label">Date End</label>
                <input type="date" class="form-control" name="Edatee" value="' . date("Y-m-d", strtotime($rowitem["date_end"])) . '">
            </div>
        </div>
        <div class="mb-3 form-row">
            <div class="mb-3 col-md-2 ">
                <label for="" class="col-form-label">Amount</label>
                <input type="number" class="form-control" id="Eamount" name="Eamount" value="' . $rowitem["amount"] . '"required>
            </div>
        </div>
        <div id="alertAmount" class="alert alert-danger" role="alert" style="display:none;">
            Your amount too much than amount in stock !! 
        </div>
        <div class="mb-3 form-row ">
            <div class="mb-3 col-md-6">
                <label for="edit_email" class="col-form-label">Stock Event Description</label>
                <textarea type="text" class="form-control" name="Edes" value="" required>' . $rowitem["hasrent_des"] . '</textarea>
            </div>
        </div>
        <div class="mb-3 form-row ">
            <div class="mb-3 col-md-6">
                <button type="button" class="btn btn-primary" onclick = "checkAmount()">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>

        <script>
           function checkAmount(){
            let ipamount = document.getElementById("Eamount").value;
              if (ipamount > ' . $rowitem["stock_amount"] . '){
                document.getElementById("alertAmount").style.display = "block";
              }else{
                document.getElementById("form1").submit();
              }
           }
        </script>
</form>
</div>';
?>