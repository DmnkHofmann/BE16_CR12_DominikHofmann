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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <?php require_once 'components/boot.php' ?>
    <!-- <style>
        .container{
            height:100vh
        }
    </style> -->
</head>
<body>
<?php require_once 'components/navigation.php' ?>
        <div class="container d-flex align-items-center justify-content-center flex-column">
                        <div class="card" style="width: 45vw">
                        <img src="pictures/<?php echo $home["image"]?>" class="card-img-height" alt="<?php echo $home["advert_title"]?>">
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
                                    <a href ="update.php?id=<?php echo $home["id"]?>" class='btn btn-primary'>Update</a>
                                </form>
                                  
                        </div>
                        <div class="d-flex justify-content-center" id="map" style="width: 45vw; height: 40vh"></div> 
                        
        </div>
        

        <footer class="bg-dark mt-auto">
        <div class="container">
            <div class="d-flex justify-content-center py-4">
                <div class="socials">
                    <img class="icons" src="pictures/facebook.png">
                </div>
                <div class="socials">
                    <img class="icons" src="pictures/twitter.png">
                </div>
                <div class="socials">
                    <img class="icons" src="pictures/google.png">
                </div>
                <div class="socials">
                    <img class="icons" src="pictures/instagram.png">
                </div>
                <div class="socials">
                    <img class="icons" src="pictures/linkedin.png">
                </div>
                <div class="socials">
                    <img class="icons" src="pictures/github.png">
                </div>
            </div>
            <div class="newsletter row d-flex text-light justify-content-center">
                <div class="col-2 py-2">Sign up for our newsletter</div>
                <input class="col-6 py-2" type="email">
                <input type="button" class="subscribe mx-4 col-2 py-2 p-lg-1" value="Subscribe">
            </div>
            <div class="copyright pt-3 text-white text-center">&copy; 2022 Dominik Hofmann</div>
        </div>
        </div>
    </footer>

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