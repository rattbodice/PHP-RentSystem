<?php
include '../include/connectsql.php';

$userid = $_POST['id'];
$sql = "SELECT * FROM type WHERE type_id = $userid";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo '
    <input type="hidden" class="bcId" name="id" value="' . $row['type_id'] . '">
                    <div class="mb-3">
                        <label class="col-form-label">Type ID : '.$row['type_id'].'</label>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="col-form-label">Type Name</label>
                        <input type="text" class="form-control" id="edit_email" name="typename" value="' . $row['type_name'] . '" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Type Code</label>
                        <input type="text" class="form-control" id="edit_email" name="typecode" value="' . $row['type_code'] . '" required>
                    </div>
    ';
}
?>