<?php
include './dbOperations.php';
// my_function.php

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the parameters from the form submission
    $id = $_POST["id"];
    deleteData("posts","WHERE id ='$id'");
    deleteData("post_comments","WHERE post_id ='$id'");
    deleteData("post_likes","WHERE post_id ='$id'");
    $post_images_destination = getTableDataByCondition("post_images", "file_destination", 'WHERE post_id = ' . $id . '');
    foreach($post_images_destination as $destinations){
        $destination = $destinations["file_destination"];
        unlink($destination);
    }
    deleteData("post_images","WHERE post_id ='$id'");

    // Call the PHP function with the parameters
    header('Location: profile.php');
}


?>
