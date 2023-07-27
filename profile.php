<?php include './dbOperations.php';?>
<?php
session_start();
$firstName = $_POST["first-name"];
$lastName = $_POST["last-name"];
$description = $_POST["description"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$birthday = date('Y-m-d',strtotime($_POST["date-of-birth"]));
$gender = $_POST["gender"];
$id= $_SESSION["id"];
if (isset($_POST["infoUpdate"])) {
    $update = updateTableData("users", "first_name = '$firstName',last_name = '$lastName', description = '$description', address = '$address', phone = '$phone', gender = '$gender', birthday = '$birthday'", "WHERE id = '$id'");
    
    $_SESSION["address"] = $_POST["address"];
    $_SESSION["phone"] = $_POST["phone"];
    $_SESSION["birthday"] = date('Y-m-d',strtotime($_POST["date-of-birth"]));
    $_SESSION["gender"] = $_POST["gender"];
    $_SESSION["description"] = $_POST["description"];
    $_SESSION["first_name"] = $_POST["first-name"];
    $_SESSION["last_name"] = $_POST["last-name"];
    
    header('Location: profile.php');
    
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <?php include './assets.php'; ?>
    <title>Profile</title>
</head>

<body class="m-0 p-0">

    <div class="container-fluid m-0 p-0">
        <?php include './dashboard-header.php'; ?>
        <div class="pt-110 d-flex align-items-center justify-content-center">
            <div class="col-lg-10 col-md-8 col-sm-10 height600">
                <div class="bg-white rounded-lg shadow-lg row align-items-center justify-content-center pb-5">
                    <div class="rounded-lg width100 position-relative">
                        <img src="./profile.avif" alt="" class="width100 cover-round height250">
                        <div class="position-absolute profile-container">
                            <img src="./profile.jpeg" alt="" class="profile-image">
                        </div>
                    </div>
                    <div class="col-lg-7 pt-3 col-md-3 col-sm-3">
                        <p class="pl-3 font-weight-bold"><?php echo $_SESSION["first_name"] . " " . $_SESSION["last_name"]; ?></p>
                        <div class="pl-3">
                            <form method="post">
                            <?php
                            include './infoEditModal.php';
                            ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoUpdateModal"><i class="fas fa-edit cursor-pointer"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-10 pt-5 row">

                        <div class="d-flex flex-column gap8 col-lg-8">

                            <div class="d-flex gap6 align-items-center">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo $_SESSION["address"]; ?>
                            </div>
                            <div class="d-flex gap6 align-items-center">
                                <i class="fas fa-envelope"></i>
                                <?php echo $_SESSION["email"]; ?>
                            </div>
                            <div class="d-flex gap6 align-items-center">
                                <i class="fas fa-mobile"></i>
                                <?php echo $_SESSION["phone"]; ?>
                            </div>
                            <div class="d-flex gap6 align-items-center">
                                <i class="fas fa-birthday-cake"></i>
                                <?php echo $_SESSION["birthday"]; ?>
                            </div>
                            <div class="d-flex gap6 align-items-center">
                                <i class="fas fa-user"></i>
                                <?php echo $_SESSION["gender"]; ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="font-weight-bold">
                                Description:
                            </div>
                            <div class="">
                                <p class="url-spacing"> <?php echo $_SESSION["description"]; ?></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container posts-content">
            <div class="row pt-3">
                <?php
                
                include './post.php';
                ?>
            </div>
        </div>

    </div>
</body>

</html>