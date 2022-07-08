
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
                                <a class="nav-link" href="guestbook.php">GuestBook</a>
                            </li>
                            <li class="nav-item ps-2">
                                <a class="nav-link" href="gestion2.php">Gestion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div> 
        <div class="row">
            <div class="row my-2">
                <div class="jumbotron bg-light">
                    <h1 style="text-align: center; color: brown; padding: 20px;">Laissez-nous un message:</h1>      
                </div>
            </div>
        </div>
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-12 col-sm-12 col-md-6"><!--Form-->
                <form method="post" action="gestion2.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="Last name" class="form-control" id="lastname" name="name2">
                    </div>
                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="mt-3">
                    <label for="startDate">Date de visite:</label>
                    <input id="startDate" class="form-control" type="date" name="visite" />
                    </div>
                    <div class="mt-3">
                        <label for="textarea" class="form-label">Message</label>
                        <textarea class="form-control" id="textarea" name="message" rows="3"></textarea>
                    </div>
                    <div class="mt-5 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1"name="checkbox" required>
                    <label class="form-check-label" for="exampleCheck1">J'ai lu et accepte les conditions d'utilisation.</label>
                    </div>
                    <div class="mt-5"><button type="submit" class="btn btn-outline-danger position-relative" name="submit2"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>Envoyer</button> 
                    </div>
                </form>
            </div>
        

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