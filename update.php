<?php

require_once "./components/db_connect.php";
$id = $_GET["id"];
$sql = "SELECT * from realestate WHERE id = $id";
$res = mysqli_query($connect, $sql);
$realestate = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once './components/boot.php' ?>
    <title>Create Real Estate</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>
<body>
<?php require_once 'components/navigation.php' ?>

    <fieldset>
        <legend class='h2'>Add Real Estate</legend>
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class='table'>
            <input type='hidden' name='id' value="<?php echo $realestate['id'];?>"/>
                <tr>
                    <th>Advert Title</th>
                    <td><input class='form-control' type="text" name="advert_title" placeholder="Advert Title" value="<?php echo $realestate['advert_title'];?>"/></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="Squaremeter" value="<?php echo $realestate['size'];?>"/></td>
                </tr>
                <tr>
                    <th>Roomnumber</th>
                    <td><input class='form-control' type="text" name="roomnumber" placeholder="Number of rooms" value="<?php echo $realestate['roomnumber'];?>"/></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><input class='form-control' type="text" name="city" placeholder="Location" value="<?php echo $realestate['city'];?>"/></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input class='form-control' type="text" name="price" placeholder="How much is the fish" value="<?php echo $realestate['price'];?>"/></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input class='form-control' type="text" name="address" placeholder="Streetname etc" value="<?php echo $realestate['address'];?>"/></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><input class='form-control' type="file" name="image" /></td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td><input class='form-control' type="number" name="latitude" placeholder="Latitude" value="<?php echo $realestate['latitude'];?>"/></td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td><input class='form-control' type="number" name="longitude" placeholder="Longitude" value="<?php echo $realestate['longitude'];?>"/></td>
                </tr>
                <tr>
                    <th>Price Reduction</th>
                    <td><input class='form-control' type="text" name="pricereduction" placeholder="If price is reduced" value="<?php echo $realestate['pricereduction'];?>"/></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Update</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>