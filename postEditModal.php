<script src="./public/js/modal.js"></script>
<script>
    addDataTargetValueToInputs("postid", "updateModal")
    addDataTargetValueToInputs("postdescription", "updateModal")
</script>
<?php
$postDescription =$_POST["post-description"];
$postid =$_POST["postid"];
if (isset($_POST["update"])) {
    updateTableData("posts", "post_description = '$postDescription' " , "WHERE id = $postid");
    header('Location: ./profile.php');
}
?>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">

                    <input type="hidden" class="postid" name="postid">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control postdescription" id="message-text" name="post-description"></textarea>
                    </div>
                    <button class="btn btn-primary" name="update">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>