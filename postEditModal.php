<!-- <script src="./public/js/modal.js"></script> -->
<script>
    // addDataTargetValueToInputs("postid", "updateModal")
    // addDataTargetValueToInputs("postdescription", "updateModal")
</script>
<?php
function editPostModal($item)  {
   
    echo '<div class="modal fade" id="updateModal_'.$item["post_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    <input type="hidden" class="postid" name="postid" value="'.$item["post_id"].'">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control postdescription" id="message-text" name="post-description" value="'.$item["post_description"].'">'.$item["post_description"].'</textarea>
                    </div>
                    <button class="btn btn-primary" name="update_'.$item["post_id"].'">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>';
$postDescription = $_POST["post-description"];
$postid = $_POST["postid"];
$submitButton = "update_".$item["post_id"];
if (isset($_POST[$submitButton])) {
    $update = updateTableData("posts", "post_description = '$postDescription' ", "WHERE id = $postid");
    
    header('Location: index.php');
    
}

}


?>
