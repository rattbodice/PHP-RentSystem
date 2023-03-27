<?php

require '../include/connectsql.php';

$stockid = $_POST['id'];

$sql = "SELECT * FROM stockpile INNER JOIN type ON stockpile.type_type_id = type.type_id WHERE stockpile_id = $stockid" ;
$result = $conn -> query($sql);
$item = $result -> fetch_assoc();

$sql_t = "SELECT * FROM type";
$result_type = $conn -> query($sql);



    



echo '
<input type="hidden" class="bcId" name="id" value="' . $item['stockpile_id'] . '">
                    <div class="mb-3">
                        <label for="edit_email" class="col-form-label">Stock Name</label>
                        <input type="text" class="form-control" name="Sname" value="'.$item['stock_name'].'" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="col-form-label">Stock Amount</label>
                        <input type="text" class="form-control" name="Samount" value="'.$item['stock_amount'].'" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="col-form-label">Stock Description</label>
                        <textarea type="text" class="form-control" name="Sdes" value="" required>'.$item['stock_des'].'</textarea>
                    </div>
                    <div class="mb-3">
                    <label for="" class="col-form-label">Stock Type</label>
                        <select class="form-control" aria-label="Default select example" name="Stype">
                            <option selected>Open this select menu</option>
                            ';
                            while($item_type = $result_type->fetch_assoc()){
                                echo '<option value="'.$item_type["type_id"].'"';
                                echo ($item_type["type_id"] == $item["type_type_id"])? 'selected':"";
                                echo '>'.$item_type["type_name"].'</option>';
                            
                                }
                                echo'
                        </select>
                    </div>
                </div>';

?>