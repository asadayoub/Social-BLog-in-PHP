<?php
$title = "Home";
include 'dbOperations.php';
include './phpOperations.php';
$postDescriptionErr = $imageErr = null;
$postDescription = null;
session_start();

if (isset($_POST["savePost"])) {

    if (empty($_POST["postDescription"])) {
        $postDescriptionErr = "Description is required";
    }
    if ($postDescriptionErr == null) {

        $data = insertData('posts', ["user_id", "post_description", "created_at", "updated_at"], [(int)$_SESSION["id"], $_POST["postDescription"], date("y/m/d"), date("y/m/d")], true);
        if ($_FILES["file"]["name"] == "") {
        } else {
        $file = $_FILES["file"];
        $destination = fileUpload($file, "./uploads/");

        $image = insertData('post_images', ["user_id", "post_id", "file_destination"], [(int)$_SESSION["id"], (int)$data, "$destination"]);

        // File upload successful, insert the file details into the database
        // $image = "INSERT INTO files (filename) VALUES ('$destination')";

        // if ($image == TRUE) {
        //     echo "File uploaded and record inserted successfully.";
        // } else {
        //     echo "Error: file not uploaded";
        // }
        // }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './assets.php'; ?>
    <title><?php
            echo $title
            ?></title>
</head>

<body class="m-0 p-0">
    <div class="container-fluid m-0 p-0">
        <?php include './dashboard-header.php'; ?>

        <div class="pt-110 d-flex align-items-center justify-content-center">
            <form class="col-lg-10 col-md-8 col-sm-10 " method="post" enctype="multipart/form-data">
                <div class="bg-white p-5 rounded-lg shadow-lg row align-items-center justify-content-center">
                    <div class="form-group col-lg-4 m-0">

                        <textarea id="post" class="resize-text-area form-control post" placeholder="Write anything you want to post" name="postDescription"></textarea>
                        <small id="emailHelp" class="form-text text-danger"> <?php echo $postDescriptionErr ?></small>
                    </div>
                    <div class="form-group col-lg-2 m-0">
                        <input type="file" class="form-control image" id="image" name="file">
                        <!-- <small id="emailHelp" class="form-text text-danger">We'll never share your email with anyone
                            else.</small> -->
                    </div>
                    <div class="col-lg-3 ">

                        <button type="submit" class="btn button-design rounded add-post width100" name="savePost">post</button>

                    </div>
                </div>
            </form>
        </div>
        <div class="container posts-content mt-3">
            <div class="row ">
                <?php
                include './post.php';
                ?>


            </div>
        </div>

    </div>
    <!-- <script src="./public/js/posts.js"></script> -->
</body>

</html>