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
</body>
</html>