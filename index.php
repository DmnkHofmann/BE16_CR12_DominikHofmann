<?php
if (array_key_exists('reduced', $_GET)) {
    $endpoint = "/api/alist.php?reduced=yes";
  } else {
    $endpoint = "/api/alist.php";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Real Estate</title>
    <?php require_once 'components/boot.php' ?>
</head>

<body>
    <?php require_once 'components/navigation.php' ?>
    <div>
            <div class="realestatex"></div>
    </div>
    <div class="container">
        <div id="realestate" class="row"></div>
    </div>


    <script>
       function loadElements(location) {
           let xhr = new XMLHttpRequest();
           xhr.open("GET", location);
           xhr.onload = function () {
               if (xhr.status == 200) {
                const realestates = JSON.parse(xhr.responseText);  
                const content = document.getElementById("realestate")
                for (const home of realestates) {         
                       content.innerHTML += `
                  <div class="col text-center">
                    <a href="details.php?id=${home.id}" class="estatecard">
                        <div class="card" style="width: 18rem; height: 450px">
                        <img src="./pictures/${home.image}" class="card-img-height" alt="${home.advert_title}">
                            <div class="card-body">
                            <h5 class="card-title">${home.advert_title}</h5>
                            <p class="card-text">${home.city}</p>
                            <p class="card-text">${home.size}</p>
                            <p class="card-text">${home.price}</p>
                            </div>
                        </div>
                    </a>
                   </div>`
                   }
               }
           }
           xhr.send();
       }
       loadElements("<?php echo $endpoint?>");
   </script>

<footer class="bg-dark mt-5">
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


</body>
</html>