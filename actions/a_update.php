<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);


require_once '../components/db_connect.php';
require_once '../components/file_upload.php';

if ($_POST) { 
        $id = $_POST['id'];
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

    $sql = "SELECT * from realestate WHERE id = $id";
    $res = mysqli_query($connect, $sql); 
    $realestate = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $oldimage = $realestate['image'];

    $image = file_upload($_FILES['image'], "animals");
    if($image->error===0){
        if(file_exists("../pictures/$oldimage")) {
            unlink("../pictures/$oldimage");
        }          
        $sql = "UPDATE realestate SET image = '$image->fileName', advert_title = '$advert_title', size = '$size', roomnumber = '$roomnumber', city = '$city', price = '$price', address = '$address', latitude = '$latitude', longitude = '$longitude', pricereduction = '$pricereduction'  WHERE id = {$id}";
    }else{
        $sql = "UPDATE realestate SET advert_title = '$advert_title', size = '$size', roomnumber = '$roomnumber', city = '$city', price = '$price', address = '$address', latitude = '$latitude', longitude = '$longitude', pricereduction = '$pricereduction'  WHERE id = {$id}";
    }    
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='/index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>