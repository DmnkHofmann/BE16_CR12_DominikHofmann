<?php
require_once '../components/db_connect.php';

if (array_key_exists('reduced', $_GET)) {
    $sql = "SELECT * FROM realestate WHERE pricereduction='Yes'";
  } else {
    $sql = "SELECT * FROM realestate";
  }

$result= mysqli_query($connect,$sql);

$realestate=mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($realestate);

?>