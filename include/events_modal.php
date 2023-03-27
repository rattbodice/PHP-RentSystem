<!-- Submit Event-->
<div class="modal fade" id="submit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Submit Event</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="event/eventsubmit.php">
                <div class="modal-body" id="detail">

                </div>
                <div class="modal-footer">
                <button type="submit" name="bc-edit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
            
        </div>
    </div>
</div>

<!-- Add Data -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="user_add.php">
                    <div class="detailupdate" id="detailadd">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="bc-edit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Users-->

<div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="detailupdate" id="detailupdate">
                </div>

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
                <form method="POST" action="event/eventdelete.php">
                    <input type="hidden" class="bcId" id="inputid" name="id">
                    <input type="hidden" class="bcId" id="inputamount" name="amount">
                    <div class="d-flex">
                        <p>Do you want to delete EVENT ID: &nbsp
                        <p id="showid"></p> &nbsp?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="bc-delete" value="" class="btn btn-danger bt-menu">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>