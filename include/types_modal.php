<!-- Add Type -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="type/type_add.php">
                    <div class="detailupdate" id="detailadd">
                        <div class="mb-3">
                            <label for="edit_email" class="col-form-label">Type Name</label>
                            <input type="text" class="form-control" name="Tname" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="col-form-label">Type Code</label>
                            <input type="text" class="form-control" name="Tcode" value="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="bc-edit" value="boychawin.com" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Type-->

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="type/type_edit.php">
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
<!-- Delete Type-->

<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="type/type_delete.php">
                    <input type="hidden" class="bcId" id="inputid" name="id">
                    <div class="d-flex">
                        <p>Are do you want to delete TYPE ID: &nbsp
                        <p id="showid"></p> &nbsp?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="bc-delete" value="" class="btn btn-danger bt-menu">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>