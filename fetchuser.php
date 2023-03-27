<?php
	include 'include/connectsql.php';

	$userid = $_POST['id'];
	$sql = "SELECT * FROM user WHERE user_id = $userid";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()){
		echo '
		<input type="hidden" class="bcId" name="id" value="'.$row['user_id'].'">
                    <div class="mb-3">
                        <label for="edit_email" class="col-form-label">First Name</label>
                        <input type="text" class="form-control" id="edit_email" name="fname" value="'.$row['user_fname'].'" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Last Name</label>
                        <input type="text" class="form-control" id="edit_email" name="lname" value="'.$row['user_lname'].'" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Address</label>
                        <input type="text" class="form-control" id="edit_email" name="address" value="'.$row['user_address'].'" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">City</label>
                        <input type="text" class="form-control" id="edit_email" name="city" value="'.$row['user_city'].'" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">State</label>
                        <input type="text" class="form-control" id="edit_email" name="state" value="'.$row['user_state'].'" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Phone</label>
                        <input type="text" class="form-control" id="edit_email" name="phone" value="'.$row['user_phone'].'" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Username</label>
                        <input type="text" class="form-control" id="edit_email" name="username" value="'.$row['username'].'" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Password</label>
                        <input type="text" class="form-control" id="edit_email" name="password" value="'.$row['userpassword'].'" required>
                    </div>
                    <div>
                    <label for="edit_email" class="col-form-label">Status</label>
                        <select class="form-control  col-md" aria-label="Default select example" name="status">
                            <option value="USER" selected>USER</option>
                            <option value="ADMIN"
                
		';
        if ($row['user_status'] == "ADMIN"){
            echo ' selected>ADMIN</option>
            </select>
        </div>';
        }else{
            echo '>ADMIN</option>
            </select>
        </div>';
        }
	}
?>