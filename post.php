<script src="./public/js/api.js"></script>
<?php
// include 'dbOperations.php';
$routes = explode("/", $_SERVER['REQUEST_URI']);
$fileName = $routes[count($routes) - 1];
$condition = "";
$fileName == 'profile.php' ? $condition = "INNER JOIN users ON posts.user_id = users.id WHERE user_id = " . $_SESSION['id'] : $condition = "INNER JOIN users ON posts.user_id = users.id";
$array = [];
$array = getTableDataByCondition("posts", "first_name, last_name, email, user_id, post_description, created_at, updated_at, posts.id as post_id", $condition);
// if(count($array) > 0) {
// foreach ($array as $item) {
//     echo $item;
//     echo '<div class="col-lg-6">
//     <div class="card mb-4 rounded-lg shadow-lg">
//         <div class="card-body">
//         <div class="media-body ml-3">
//                 ' . $item["first_name"] . " " . $item["last_name"] . '
//                     <div class="text-muted small">' . $item["created_at"] . '</div>
//                 </div>
//                 <p class="ml-3">
//             ' . $item["post_description"] . '
//               </p>


//         </div>
//     </div>
// </div>';
// }
// }
// 
?>
<?php
include './postEditModal.php';
foreach ($array as $item) {

?>
    <div class="col-lg-6">
        <div class="card mb-4 rounded-lg shadow-lg">
            <div class="card-body">

                <div class="media-body ml-3">
                    <?php echo $item["first_name"] . " " . $item["last_name"] ?>
                    <div class="text-muted small"><?php echo $item["created_at"] ?></div>
                </div>
                <p class="ml-3">
                    <?php
                    echo $item["post_description"]
                    ?>
                </p>
                <?php if ($fileName == 'profile.php') { ?>
                    <div class="d-flex">

                        <div class="ml-3 ">
                            <form method="post">
                                <?php
                                editPostModal($item);
                                ?>
                                <!-- <input type="hidden" value="<?php echo $item["id"] ?>" name="id"> -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal_<?php echo $item["post_id"] ?>">
                                    <i class="fas fa-edit cursor-pointer"></i></button>


                            </form>
                        </div>

                        <div class="ml-3 ">

                            <form method="post" action="./deleteData.php">
                                <input type="hidden" value="<?php echo $item["post_id"] ?>" name="id">

                                <button class="deco-none btn btn-danger" name="deletepost">
                                    <i class="fas fa-trash-alt cursor-pointer"></i>
                                </button>
                            </form>
                        </div>


                    </div>
                <?php } ?>
                <div class="ml-3 pt-2">
                    <!-- <form method="post" id="likeForm"> -->
                        <div id="like_<?php echo $item["post_id"]?>">
                            <input type="hidden" value="<?php echo $item["post_id"] ?>" name="post_id">
                            <input type="hidden" value="<?php echo $_SESSION["id"] ?>" name="user_id">
                            <button type="submit" class="cursor-pointer background-border-none deco-none" id="like_btn_<?php echo $item["post_id"]?>" onclick="javascript:addlike(<?php echo $item['post_id'] ?>, <?php echo $_SESSION['id'] ?>,)"><i class="fas fa-thumbs-up fa-lg"></i></button>
                        </div>
                    <!-- </form> -->
                </div>
                
                <div class="">
                    <form method="post" class="pt-2">
                        <div class="ml-3 position-relative">
                            <input type="hidden" value="<?php echo $item["post_id"] ?>" name="post_id">
                            <input type="hidden" value="<?php echo $item["user_id"] ?>" name="user_id">
                            <input type="text" placeholder="Write your comment" class="form-control">
                            <div class="position-absolute comment-button">
                                <button type="button" class="cursor-pointer deco-none background-border-none" name="comment"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

<?php } ?>