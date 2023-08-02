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
    $likes = getTableDataByCondition("post_likes", "user_id, post_id", 'WHERE post_id = ' . $item["post_id"] . '');

    $filtered = array_filter($likes, function ($like) {
        return $like["user_id"] == $_SESSION["id"];
    });
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
                    <div>
                        <input type="hidden" value="<?php echo $item["post_id"] ?>" name="post_id">
                        <input type="hidden" value="<?php echo $_SESSION["id"] ?>" name="user_id">
                        <div id="like_<?php echo $item["post_id"] ?>">
                            <?php
                            $colorCondition = "";
                            if (count($filtered) > 0) {
                                $colorCondition = "text-primary";
                            }
                            ?>
                            <button type="submit" class="cursor-pointer background-border-none deco-none d-flex gap" id="like_btn_<?php echo $item["post_id"] ?>" onclick="javascript:addlike(<?php echo $item['post_id'] ?>, <?php echo $_SESSION['id'] ?>,)">
                                <i class="fas fa-thumbs-up fa-lg <?php echo $colorCondition; ?>"></i>
                                <span>
                            <?php


                            // echo count($filtered);
                            echo count($likes);
                            ?>
                            likes</span>
                            </button>

                            
                        </div>
                    </div>

                    <!-- </form> -->
                </div>

                <div class="pt-2">

                    <div class="ml-3 position-relative">
                        <input type="hidden" value="<?php echo $item["post_id"] ?>" name="post_id">
                        <input type="hidden" value="<?php echo $_SESSION["id"] ?>" name="user_id">
                        <input type="text" placeholder="Write your comment" class="form-control comment_<?php echo $item["post_id"] ?>">
                        <div class="position-absolute comment-button">
                            <button type="button" class="cursor-pointer deco-none background-border-none" name="comment" onclick="javascript:addcomment(<?php echo $item['post_id'] ?>, <?php echo $_SESSION['id'] ?>,)"><i class="fas fa-paper-plane"></i></button>

                        </div>



                    </div>
                    <div class="ml-3 pt-2 comment-content">


                        <?php
                        $comment = getTableDataByCondition("post_comments", "user_id, post_id, comment", 'WHERE post_id = ' . $item["post_id"] . '');
                        // print_r($comment);
                        foreach ($comment as $msg) {
                            $user = getTableDataByCondition("users", "first_name, last_name, id", 'WHERE id = ' . $msg["user_id"] . '');
                            foreach ($user as $commentor) { ?>
                                <div class="border rounded-lg pl-4 mt-2 comment-<?php echo $msg["post_id"] ?>">
                                    <div>
                                        <?php
                                        echo $commentor["first_name"] . " " . $commentor["last_name"];
                                        ?>

                                    <?php  } ?>
                                    commented</div>
                                    <div class="ml-2 ">
                                        <?php echo $msg["comment"]; ?>
                                    </div>
                                </div>
                            <?php    }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>