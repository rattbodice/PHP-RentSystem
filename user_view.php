<?php 
	include 'include/connectsql.php';

	$userid = $_POST['id'];
	
	$sql = "SELECT * FROM user WHERE user_id = $userid";
	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()){
		echo '
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<tr>
		<td><h3>Name : </h3></td>
		<td><h5>&nbsp'.$row['user_fname']." ".$row['user_lname'].'</h5></td>
		</tr>
		<tr>
		<td><h3>Address : </h3></td>
		<td><h5>&nbsp'.$row['user_address'].'</h5></td>
		</tr>
		<tr>
		<td><h3>City : </h3></td>
		<td><h5>&nbsp'.$row['user_city'].'</h5></td>
		</tr>
		<tr>
		<td><h3>State : </h3></td>
		<td><h5>&nbsp'.$row['user_state'].'</h5></td>
		</tr>
		<tr>
		<td><h3>Phone : </h3></td>
		<td><h5>&nbsp'.$row['user_phone'].'</h5></td>
		</tr>
		<tr>
		<td><h3>Username : </h3></td>
		<td><h5>&nbsp'.$row['username'].'</h5></td>
		</tr>
		<tr>
		<td><h3>Password : </h3></td>
		<td><h5>&nbsp'.$row['userpassword'].'</h5></td>
		</tr>
		</table>
		';

	}
?>