<script src="./public/js/modal.js"></script>
<div class="modal fade" id="infoUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" class="postid" name="postid">
                    <div class="form-group">
                        <label for="first-name" class="col-form-label">First Name:</label>
                        <input type="text" class="form-control first-name" id="first-name" name="first-name">
                    </div>
                    <div class="form-group">
                        <label for="last-name" class="col-form-label">Last Name:</label>
                        <input type="text" class="form-control last-name" id="last-name" name="last-name">
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description:</label>
                        <textarea class="form-control description" id="descriptiion" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label">Address:</label>
                        <input type="text" class="form-control address" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-form-label">phone:</label>
                        <input type="text" class="form-control phone" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="date-of-birth" class="col-form-label">Date Of Birth:</label>
                        <input type="date" class="form-control date-of-birth" id="date-of-birth" name="date-of-birth">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="gender">
                            <option selected disabled>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="uncertain">Uncertain</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary" name="update">Update</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>