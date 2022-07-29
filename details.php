<?php

require_once "./components/db_connect.php";
$id = $_GET["id"];
$sql = "SELECT * from realestate WHERE id = $id";
$res = mysqli_query($connect, $sql);
$home = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'components/boot.php' ?>
    <style>
        .container{
            height:100vh
        }
    </style>
</head>
<body>
<?php require_once 'components/navigation.php' ?>
<div class="container d-flex align-items-center justify-content-center">
                        <div class="card" style="width: 45rem">
                        <img src="./pictures/<?php echo $home["image"]?>" class="card-img-height" alt="<?php echo $home["advert_title"]?>">
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $home["advert_title"]?></h5>
                            <p class="card-text">Size: <?php echo $home["size"]?></p>
                            <p class="card-text">Rooms: <?php echo $home["roomnumber"]?></p>
                            <p class="card-text">Location: <?php echo $home["city"]?></p>
                            <p class="card-text">Price: <?php echo $home["price"]?></p>
                            <p class="card-text"> Address: <?php echo $home["address"]?></p>
                            <p class="card-text">Price Reduced: <?php echo $home["pricereduction"]?></p>
                            </div>
                            <form action='./actions/a_delete.php' method='post'>
                     <input type='hidden' name='id' value="<?php echo $home["id"]?>"/>
                    <button class='btn btn-danger' type='submit'>Delete</button>
                </form>
                    <a href ="/update.php?id=<?php echo $home["id"]?>" class='btn btn-primary'>Update</a>
                </div>
                <div id="map" style="width: 100%; height: 20%"></div>
        <script>
            var map;
            function initMap() {
                var home = {lat: <?php echo $home["latitude"]?>,
                lng: <?php echo $home["longitude"]?>}
                map = new google.maps.Map(document.getElementById('map'), {
                center: home, zoom: 8
                });
                var pinpoint = new google.maps.Marker({
                position: home,
                map: map
});
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
</body>
</html>