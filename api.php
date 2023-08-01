<?php
include './dbOperations.php';
function callLike($data)
{

    $result = insertData("post_likes", ['user_id', 'post_id'], [(int)$data["user_id"], (int)$data["post_id"]]);
    return $result;
}
function callComment($data)
{
    $result = insertData("post_comments", ['user_id', 'post_id', 'comment'], [(int)$data["user_id"], (int)$data["post_id"], $data["comment"]]);
    return $result;
}
// Set the content type to JSON
header('Content-Type: application/json');

// Simulated database (replace this with an actual database connection)

// Handle GET request to retrieve all books


// Handle POST request to add a new book
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read the input data from the request body
    $data = json_decode(file_get_contents('php://input'), true);
    // echo json_encode($data);
    // return;

    // Validate the input data (in a real application, you might want more robust validation)
    $data['action'] = $_REQUEST["action"];
    if ($data['action'] == 'like') {
        try {
            // if(!isset($_REQUEST["user_id"]) || !isset($_REQUEST["post_id"])) {
            //     http_response_code(400);
            //     echo json_encode(array('error' => 'Something Went Wrong'));
            //     return;
            // }
            // else {
                $islike = callLike($_POST);
                if ($islike == true) {
                    echo json_encode(array('success' => true));
                } else {
                    http_response_code(400);
                    echo json_encode(array('error' => 'Something Went Wrong'));
                }
            // }
        } catch (Exception $ex) {
            echo $ex;
            http_response_code(500);
            echo json_encode(array('error' => $ex));
        }
        return;
    }
    if ($data['action'] == 'comment') {
        try{
            $iscomment = callComment($_POST);
            // echo $iscomment;
            // return;
            if ($iscomment == true) {
                echo json_encode(array('success' => true));
            } else {
                http_response_code(400);
                echo json_encode(array('error' => 'Something Went Wrong'));
            }
        }
        catch (Exception $ex) {
            // echo $ex;
            http_response_code(500);
            echo json_encode(array('error' => $ex));
        }
        
        return;
    }
}

// Handle unsupported request methods
http_response_code(405);
echo json_encode(array('error' => 'Method not allowed'));
