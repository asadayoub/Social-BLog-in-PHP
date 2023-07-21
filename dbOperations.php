<?php
include 'dbConnection.php';

function getTableDataByCondition($tableName, $columns, $condition = ""): array
{
    $conn = dbConnection();
    $sql = "SELECT " . $columns . " FROM " . $tableName . " " . $condition;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $records = mysqli_fetch_assoc($result);
        return  $records;
    }
    return [];
}
function insertTableData($tableName, $columns, $values)
{
    $conn = dbConnection();
    $columnsStr = implode(', ', $columns);
    $valuesStr = implode('\', \'', $values);
    $sql = "INSERT INTO $tableName ($columnsStr) VALUES('$valuesStr')";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function insertData($tableName, $columns, $values)
{
    $conn = dbConnection();
    // Sanitize the inputs to prevent SQL injection 
    $tableName = mysqli_real_escape_string($conn, $tableName);

    // Build the SQL query 
    $columnsStr = implode(', ', array_map('mysqli_real_escape_string', array_fill(0, count($columns), $conn), $columns));
    $valuesStr = implode("', '", array_map('mysqli_real_escape_string', array_fill(0, count($values), $conn), $values));

    // Complete the query 
    $sql = "INSERT INTO $tableName ($columnsStr) VALUES ('$valuesStr')";

    // Execute the query 
    if (mysqli_query($conn, $sql)) {
        return true; // Success 
    } else {
        return false;
        // Error 
    }
}

// $data = insertData('users', ["first_name", "last_name", "email", "password"], ["asdas", "asdasd", "sdadsds", "12345"]);
// print_r($data);
// $record = getTableDataByCondition("users", "*", "WHERE email = 'ahsanayoub66@gmail.com' AND password = 'hafizasad'");
// print_r($record);
