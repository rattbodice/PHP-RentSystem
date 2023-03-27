<?php
require('../include/connectsql.php');
$eventid = $_POST['id'];


$sql = "SELECT * FROM stockpile_has_user INNER JOIN stockpile ON stockpile.stockpile_id = stockpile_has_user.stockpile_stockpile_id INNER JOIN type ON stockpile.type_type_id = type.type_id INNER JOIN user ON stockpile_has_user.user_user_id = user.user_id
WHERE event_id = $eventid";
$result = $conn->query($sql);
$rowitem = $result->fetch_assoc();

echo '
<input type="hidden" name="idhidden" value="' . $rowitem["event_id"] . '" >
                        <h5 id="eventid" >Event ID : ' . $rowitem["event_id"] . '</h5>
                        <h5 id="name" >Name : ' . $rowitem["user_fname"] . " " . $rowitem["user_lname"] . '</h5>
                        <h5 id="stockname" >Stock Name : ' . $rowitem["stock_name"] . '</h5>
                        <h5 id="amount" >Amount : ' . $rowitem["amount"] . '</h5>
                        <div class="mb-3 form-row ">
                            <div class="mb-3 col-md-5">
                                <label for="edit_email" class="col-form-label">Return Date</label>
                                <input type="date" class="form-control" name="returndate" value="">
                            </div>
                        </div>
                        <h5>Are you sure to submit this event ?</h5>
';

?>