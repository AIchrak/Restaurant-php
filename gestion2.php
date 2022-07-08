<?php //message
$connM = new mysqli('localhost', 'root','','heroku_c1b2033687fa4fd');
            if($connM->connect_error){
                die('connection failed : '.$connM->connect_error);
            } else{
                $stmt=$connM->prepare("insert into bookingatable(firstname, lastname, email, selection,textarea,checkbox)values(?,?,?,?,?,?)");
                $stmt->bind_param("ssssss",$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['selection'],$_POST['textarea'],$_POST['checkbox']);
                $stmt->execute();
                $stmt->close();
               $connM->close();
            } 
?>
<?php //guestbook
$conn = new mysqli('localhost', 'root','','heroku_c1b2033687fa4fd');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
} else{
    $stmt=$conn->prepare('insert into livredor(name, email, message,visite,checkbox)values(?,?,?,?,?)');
    $stmt->bind_param("sssss",$_POST['name2'], $_POST['email'],$_POST['message'],$_POST['visite'],$_POST['checkbox']);
    $stmt->execute();
    $stmt->close();
    $conn->close();
} 
?>
<?php //gallery
if (isset($_POST['submit3'])) {
    $name=$_POST['name3'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];  
        $folder = "img/".$filename;   
    // connect with the database
    $db = mysqli_connect("localhost", "root", "", "heroku_c1b2033687fa4fd"); 
        
        // Add the image to the "image" folder"
        if (move_uploaded_file($tempname, $folder)) {
            // query to insert the submitted data
        $sql = "INSERT INTO imageupload (name, image) VALUES ('$name','$filename')";
        // function to execute above query
        mysqli_query($db, $sql);       
            echo "<script>alert('Image uploaded successfully');</script>";
        }else{
            echo "<script>alert('Failed to upload image');</script>";
    }$result = mysqli_query($db, "SELECT * FROM imageupload");
}
?>
<!-- one file for x pages-->
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
    <!--Onglets-->
    <div class="row align-self-center" id="onglets">
        <form action="" method="post">
            <button class="btn btn-danger btn-md active" name="onclick" value="message" role="button" href="">Messages</button>
        
            <button class="btn btn-danger btn-md active" name="onclick" value="guestbook" role="button" href="">Guestbook</button>
       
            <button class="btn btn-danger btn-md active" name="onclick" value="gallery" role="button" href="">Gallery</button>
        </form>
        <?php //error_reporting(0);?>
        </div>
        <?php 
        if(isset($_POST['onclick'])){
            $target_directory = "C:\wamp64\www\Restaurant-2.0\gestion2.php";
            if(file_exists($target_directory)){
            if($_POST['onclick'] == 'guestbook'){
            //Database connection:
            
            //Guestbook ?>
            <div class="row mt-3" id="guestbook">
                <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Date de soumission</th>
                    <th scope="col">Date de visite</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Approval</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $connectG = mysqli_connect('localhost', 'root','','heroku_c1b2033687fa4fd');
                        if($connectG->connect_error){
                            die('connection failed : '.$connectG->connect_error);
                        } 
                        
                        $sql="SELECT ID, datesub, visite, name, email, message,checkbox from livredor ORDER BY ID DESC";
                        $result= $connectG-> query($sql);?>
                        <?php 
                        if($result){
                        while($row = mysqli_fetch_array($result)){
                        ?>
                            <tr class="text-center">
                                <td><?php echo $row["ID"];?></td>
                                <td><?php echo $row["datesub"];?></td>
                                <td><?php echo $row["visite"];?></td>
                                <td><?php echo $row["name"];?></td>
                                <td><?php echo $row["email"];?></td>
                                <td><?php echo $row["message"];?></td>
                                <td><?php echo $row["checkbox"];?></td>
                                <form method="post" action="delete2.php"> <!--Create a form so everytime you delete data is sent to the other php file-->
                                <input type="hidden" name="ID" value="<?php echo $row['ID']?>">
                                <td><input type="submit" name="delete" value="DELETE" class="btn btn-danger"></td>
                            </form>
                            </tr>     
                    <?php
                        }
                    }
                    else{
                        echo "No record found";
                    }
                    //$connectG->close();
                    ?>
                </tbody>
                </table>
            </div>
        <?php ?>
        <?php
            } else if($_POST['onclick'] == 'gallery'){
                ?>
                <!--Galery-->
                <div class="row" id="box">
                <form class="downloadImage" action="" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3"> 
                <b>Select image to upload: </b></br>
                <input type="file" name="image" id="image" />
                </div>
                <div class="mb-3">
                <label for="name"><b>Name:</b></label></br>
                <input type="text" id="name" required value="" name="name3" />
                </div>
                <div class="mb-3 mt-3">
                <input type="submit" class="btn btn-danger" value="Upload Image" name="submit3" />
                <a href="galerie.php" class="btn btn-outline-danger btn-md" role="button">Voir galerie</a>
                </div>
                </form>

                <?php //to upload images
                $target_dir = "C:\wamp64\www\Restaurant-2.0\img";
                $test=isset($_FILES["image"]["name"]);
                $target_file = $target_dir.basename($test);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize((isset($_FILES["image"]["tmp_name"])));
                    if($check !== false) {
                    echo "";
                    $uploadOk = 1;
                    } else {
                    echo "";
                    $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "";
                    $uploadOk = 0;
                }
                
                // Check file size
                if (isset($_FILES["image"]["size"]) > 10000000) {
                    echo "";
                    $uploadOk = 0;
                }
                
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "";
                    $uploadOk = 0;
                }
                
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file(isset($_FILES["image"]["tmp_name"]), $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                    } else {
                    echo "Sorry, there was an error uploading your file.";
                    }
                }
                ?>
                <div class="row" id="gallery">
                    <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $connectI = mysqli_connect('localhost', 'root','','heroku_c1b2033687fa4fd');
                    if($connectI->connect_error){
                        die('connection failed : '.$connectI->connect_error);
                    } 
                    
                    $sql="SELECT ID, date_sub, name, image from imageupload ORDER BY ID DESC";
                    $result= $connectI-> query($sql);?>
                    <?php 
                    if($result){
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr class="text-center">
                            <td><?php echo $row["ID"];?></td>
                            <td><?php echo $row["date_sub"];?></td>
                            <td><?php echo $row["name"];?></td>
                            <td><img src="img/<?php echo $row['image'];?>" width='200' alt=''/></td>
                            <form method="post" action="photoconnextion.php"> <!--Create a form so everytime you delete data is sent to the other php file-->
                            <input type="hidden" name="ID" value="<?php echo $row['ID']?>">
                            <td><input type="submit" name="delete" value="DELETE" class="btn btn-danger"></td>
                        </form>
                        </tr>     
                        <?php
                            }
                        }
                        else{
                            echo "No record found";
                        }
                        //$connectI->close();
                        ?>
                    

                    </tbody>
                    </table>
                    </div>
                    </div> 
            <?php    
            } 
            else {
                
            //Database connection:
            
            
            ?>
            <!--Form table-->
        <div class="row mt-3" id="formtable">
        <table class="table table-bordered">
        <thead>
            <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Object</th>
            <th scope="col">Message</th>
            <th scope="col">Approval</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
            $connectM = mysqli_connect('localhost', 'root','','heroku_c1b2033687fa4fd');
            if($connectM->connect_error){
                die('connection failed : '.$connectM->connect_error);
            } 
            
            $sql="SELECT ID, Submission_Date, firstname, lastname, email, selection,textarea,checkbox from bookingatable ORDER BY ID DESC";
            $result= $connectM-> query($sql);?>
            <?php 
            if($result){
            while($row = mysqli_fetch_array($result)){
            ?>
                <tr class="text-center">
                    <td><?php echo $row["ID"];?></td>
                    <td><?php echo $row["Submission_Date"];?></td>
                    <td><?php echo $row["firstname"];?></td>
                    <td><?php echo $row["lastname"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["selection"];?></td>
                    <td><?php echo $row["textarea"];?></td>
                    <td><?php echo $row["checkbox"];?></td>
                    <form method="post" action="delete.php"> <!--Create a form so everytime you delete data is sent to the other php file-->
                    <input type="hidden" name="ID" value="<?php echo $row['ID']?>">
                    <td><input type="submit" name="delete" value="DELETE" class="btn btn-danger"></td>
                </form>
                </tr>     
        <?php
            }
        }
        else{
            echo "No record found";
        }
        //$connectM->close();
        ?>
        </tbody>
        </table>
        </div>
            <?php
            }
            
        }else {
                echo"404 error";
                exit();
              }
    }
        ?>
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