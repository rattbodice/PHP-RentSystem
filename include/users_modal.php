<!-- View Users-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลผู้ใช้งาน</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="detail">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add User -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="user_add.php" >
                    <div class="detailupdate" id="detailadd">
                    <div class="mb-3">
                        <label for="edit_email" class="col-form-label">First Name</label>
                        <input type="text" class="form-control"  name="fname" value="" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Last Name</label>
                        <input type="text" class="form-control"  name="lname" value="" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Address</label>
                        <input type="text" class="form-control"  name="address" value="" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">City</label>
                        <input type="text" class="form-control"  name="city" value="" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">State</label>
                        <input type="text" class="form-control"  name="state" value="" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Phone</label>
                        <input type="text" class="form-control"  name="phone" value="" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Username</label>
                        <input type="text" class="form-control"  name="username" value="" required>
                    </div>
					<div class="mb-3">
                        <label for="edit_email" class="col-form-label">Password</label>
                        <input type="text" class="form-control" name="password" value="" required>
                    </div>
                    <div>
                    <label for="edit_email" class="col-form-label">Status</label>
                        <select class="form-control  col-md" aria-label="Default select example" name="status">
                            <option value="USER">USER</option>
                            <option value="ADMIN">ADMIN</option>
                        </select>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="bc-edit" value="boychawin.com"
                            class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Users-->

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="user_edit.php" >
                    <div class="detailupdate" id="detailupdate"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="bc-edit" value="boychawin.com"
                            class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Users-->

<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="user_delete.php">
                    <input type="hidden" class="bcId" id="inputid" name="id">
                    <div class="d-flex">
                        <p>Are do you want to delete USERID: &nbsp<p id="showid" ></p> &nbsp?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="bc-delete" value=""
                            class="btn btn-danger bt-menu">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>