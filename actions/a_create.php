<?php

require_once '../components/db_connect.php';
require_once '../components/file_upload.php';

if ($_POST) {
    $advert_title = $_POST['advert_title'];
    $size = $_POST['size'];
    $roomnumber = $_POST['roomnumber'];
    $city = $_POST['city'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $pricereduction = $_POST['pricereduction'];
    $uploadError = '';
    $image = file_upload($_FILES['image'], 'animals');

    $sql = "INSERT INTO realestate (advert_title, size, roomnumber, city, price, address, latitude, longitude, pricereduction, image) VALUES ('$advert_title','$size', '$roomnumber', '$city', '$price', '$address', '$latitude', '$longitude', '$pricereduction', '$image->fileName')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $advert_title </td>
            </tr></table><hr>";
        $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='/index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>
</html>