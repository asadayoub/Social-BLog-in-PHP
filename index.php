<?php
$title = "Home";
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
            <form class="col-lg-10 col-md-8 col-sm-10 " method="post">
                <div class="bg-white p-5 rounded-lg shadow-lg row align-items-center justify-content-center">
                    <div class="form-group col-lg-3 m-0">

                        <input type="text" class="form-control username" id="username" placeholder="Enter Username">
                        <!-- <small id="emailHelp" class="form-text text-danger">We'll never share your email with anyone
                            else.</small> -->
                    </div>
                    <div class="form-group col-lg-4 m-0">

                        <textarea id="post" class="resize-text-area form-control post" placeholder="Write anything you want to post"></textarea>
                        <!-- <small id="emailHelp" class="form-text text-danger">We'll never share your email with anyone
                            else.</small> -->
                    </div>
                    <div class="form-group col-lg-2 m-0">
                        <input type="file" class="form-control image" id="image">
                        <!-- <small id="emailHelp" class="form-text text-danger">We'll never share your email with anyone
                            else.</small> -->
                    </div>
                    <div class="col-lg-3 ">

                        <button type="submit" class="btn button-design rounded add-post width100">post</button>

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
    <script src="./public/js/posts.js"></script>
</body>

</html>