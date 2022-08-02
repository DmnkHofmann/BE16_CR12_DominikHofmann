
<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
require_once '../components/db_connect.php';

function response($status, $message, $data = null)
{
    $response = new stdClass();
    $response->status = $status;
    $response->message = $message;
    $response->data = $data;
    // convert it to string, because API is json
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $sql = "SELECT * FROM realestate";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        response(200, "Data fetched succesfully", $row);
    } else {
        response(400, 'error');
    }
}
mysqli_close($connect); ?>









