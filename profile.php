<!DOCTYPE html>
<html lang="en">
<head>
<?php include './assets.php'; ?>
    <title>Profile</title>
</head>
<body class="m-0 p-0">
    
<div class="container-fluid m-0 p-0">
        <?php include './dashboard-header.php'; ?>
        <div class="container posts-content">
            <div class="row pt-110">
                <?php      
                include './dbOperations.php';  
                    include './post.php';
                ?>
            </div>
        </div>

</div>
</body>
</html>