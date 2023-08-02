<?php
$title = "Home";
include 'dbOperations.php';
$postDescriptionErr = $imageErr = null;
$postDescription = null;
session_start();

if (isset($_POST["savePost"])) {
    
    if (empty($_POST["postDescription"])) {
        $postDescriptionErr = "Description is required";
    }
    if ($postDescriptionErr == null) {

        $data = insertData('posts', ["user_id", "post_description", "created_at", "updated_at"], [(int)$_SESSION["id"], $_POST["postDescription"], date("y/m/d"), date("y/m/d")],true);
        $file = $_FILES["file"];
        $fileName = $file["name"];
        $tmpFilePath = $file["tmp_name"];
        // Define the upload directory path
        $uploadDir = "uploads/";
        // echo ($uploadDir);
        // Generate a unique filename to avoid overwriting existing files
        $uploadedFileName = $_SESSION['id'] . '_'. uniqid() . '.' . pathinfo($fileName)['extension'];
        // print_r($_FILES);
        // Move the uploaded file to the specified directory
        // print_r($file["tmp_name"]);
        $destination = $uploadDir . $uploadedFileName;
        move_uploaded_file($tmpFilePath, $destination);
        // if (move_uploaded_file($tmpFilePath, $destination)) {
           
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