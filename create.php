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
        <form action="../actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Advert Title</th>
                    <td><input class='form-control' type="text" name="advert_title" placeholder="Advert Title" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="Squaremeter"/></td>
                </tr>
                <tr>
                    <th>Roomnumber</th>
                    <td><input class='form-control' type="text" name="roomnumber" placeholder="Number of rooms"/></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><input class='form-control' type="text" name="city" placeholder="Location"/></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input class='form-control' type="text" name="price" placeholder="How much is the fish"/></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input class='form-control' type="text" name="address" placeholder="Streetname etc"/></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><input class='form-control' type="file" name="image" /></td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td><input class='form-control' type="number" name="latitude" placeholder="Latitude"/></td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td><input class='form-control' type="number" name="longitude" placeholder="Longitude"/></td>
                </tr>
                <tr>
                    <th>Price Reduction</th>
                    <td><input class='form-control' type="text" name="pricereduction" placeholder="If price is reduced"/></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Insert</button></td>
                    <td><a href="/index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>