<!DOCTYPE html>
<html lang="en">
<head>
    <title>Burgers</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.html">
                        <img src="Photos/Burger Restaurant Logo.png" width="150" height="auto" alt="logo burgers restaurant" class="d-inline-block align-top" loading="lazy">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.html">Accueil</a>
                            </li>
                            <li class="nav-item ps-2">
                            <a class="nav-link" href="menu.html">Menu</a>
                            </li>
                            <li class="nav-item ps-2">
                                <a class="nav-link" href="galerie.php">Galerie</a>
                            </li>
                            <li class="nav-item ps-2">
                                <a class="nav-link" href="NotreHistoire.html">Notre Histoire</a>
                            </li>
                            <li class="nav-item ps-2">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                            <li class="nav-item ps-2">
                              <a class="nav-link" href="guestbook.php">Guestbook</a>
                          </li>
                            <li class="nav-item ps-2">
                              <a class="nav-link" href="gestion2.php">Gestion</a>
                          </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row my-2">
            <div class="jumbotron bg-light">
                <h1 style="text-align: center; color: brown; padding: 20px;">Galerie Photos</h1>      
            </div>
        </div>
        
        <?php //error_reporting(0);?>
        <?php
            $connectgalery = mysqli_connect('localhost', 'root','','formrestaurant2');
            if($connectgalery->connect_error){
                die('connection failed : '.$connectgalery->connect_error);
            } 
            
            $sql="SELECT ID, date_sub, name, image from imageupload ORDER BY ID DESC";
            $result= $connectgalery-> query($sql);
        ?>
        <div class="row my-2 ms-md-2 justify-content-center"> <!--Image-->
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                         
                <div class="carousel-inner my-5">
                    <?php $active = true; //https://stackoverflow.com/questions/21386194/php-with-bootstrap-carousel ?> 
                    <?php 
                    if($result){
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="carousel-item <?php echo ($active == true)?"active":"" ?>" data-bs-interval="10000"> 
                    <img src="img/<?php echo $row['image'];?>" alt="" data-id="<?php echo $row['ID'];?>" class=" img-fluid rounded" data-title="<?php echo $row['name'];?>" width="300" height="auto">
                    </div>
                    <?php $active = false; ?>
                    <?php
                        }
                    }
                    else{
                        echo "No record found";
                    }
                    $connectgalery->close();
                    ?>  
                </div>
                          
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        
           
          <!--end div-->
         
        
        
        <footer class="bg-light text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
              <div style="text-align:center;">
                <i class="fa fa-facebook pe-3" aria-hidden="true" style="color: brown; font-size: 25px;"></i>
                <i class="fa fa-instagram pe-3" aria-hidden="true" style="color: brown; font-size: 25px;"></i>
                <i class="fa fa-pinterest-p pe-3" aria-hidden="true" style="color: brown; font-size: 25px;"></i>
                <i class="fa fa-youtube-play pe-3" aria-hidden="true" style="color: brown; font-size: 25px;"></i>
            </div>
            </section>
            <!-- Section: Social media -->
            </div>
            <!-- Grid container -->
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: #F8F9FA; color: brown;">
              © 2022 Copyright -
              <a class="text-danger" href="#">Ichrak</a> - <a class="text-danger" href="#">CGU & Politique de confidentialités</a>
            </div>
            <!-- Copyright -->
        </footer>
      </div>
</body>
</html>