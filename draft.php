//https://codeshack.io/gallery-system-php-mysql-js/
<?php
        // we initiate an array that will contain any potential errors.
        $errors = array();
        // 1. Sanitisation
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        // 2. Validation
        if (true == filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "This cleaned email address is considered valid.";
        } else {
            echo "This cleaned email address is not valid. Sorry. xoxo.";
        }

        // 3. execution //formrestaurant2
        if (count($errors)> 0){
            echo "There are mistakes!";
            print_r($errors);
            exit;
        }*/
        // If we get here, it's because everything's fine, we can record
        $bdd = new PDO('mysql:host=localhost;dbname=test','root', '');

        // 4. Display the response interface.
        header("Location: file.extension");
            
        echo "<pre>";
            print_r($_POST); 
            var_dump($_POST);
        ?>

        // bon code pour connect les 2:
        <?php
        // 1. Sanitisation
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        // 2. Validation
        if (true == filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "This cleaned email address is considered valid.";
        } else {
            echo "This cleaned email address is not valid. Sorry. xoxo.";
        }
        //name variables:
        $firstname= $_POST['firstname'];
        $lastname= $_POST['lastname'];
        $email= $_POST['email'];
        $selection= $_POST['selection'];
        $textarea= $_POST['textarea'];
        $checkbox= $_POST['checkbox'];

        //Database connection:
        $conn = new mysqli('localhost', 'root','','formrestaurant2');
        if($conn->connect_error){
            die('connection failed : '.$conn->connect_error);
        } else{
            $stmt=$conn->prepare("insert into bookingatable(firstname, lastname, email, selection,textarea,checkbox)values(?,?,?,?,?,?)");
            $stmt->bind_param("ssssss",$firstname, $lastname, $email, $selection,$textarea,$checkbox);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
        ?>

<?php
            $connection = mysqli_connect('localhost', 'root','','formrestaurant2');
            if(isset($_POST['delete'])){
                $id=$_POST['ID'];
                $query="DELETE FROM bookingatable WHERE ID='$id'";
                $query_run= $connection-> query($query);
                if($query_run){
                    echo "<input type='hidden' name='ID' value=".$row['ID']."<th><input type='submit' name='delete' value='DELETE' class='btn btn-danger'></th>";
                } else {
                    echo"0 result";
                }
            }
        ?>

<input type="hidden" name="ID" value="<?php echo $row['ID']?>">

//draft1 galery:
<!--Galery-->
<div class="row" id="box">
<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
  <label for="name">Name:</label>
  <input type="text" id="name" required value="" name="name">
  <input type="submit" value="Upload Image" name="submit">
</form>
<a href="galerie.html">Gallery</a>
<?php
$target_dir = "C:\Users\ichra\Downloads";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
  
?>

//fin draft1

//draft2 photo:
<!--Galery-->
<div class="row" id="box">
<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
  <label for="name">Name:</label>
  <input type="text" id="name" required value="" name="name" />
  <input type="submit" value="Upload Image" name="submit" />
</form>
<a href="galerie.html">Gallery</a>
<?php
$conn = mysqli_connect('localhost', 'root','','formrestaurant2');

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    if($_FILES['image']['error']==4){
        echo "<script>alert('Image does not exist!');</script>";
    }
    else{
        $fileName=$_FILES['image']['name'];
        $fileSize=$_FILES['image']['size'];
        $tmpName=$_FILES['image']['tmp_name'];
        
        $validImageExtension=['jpg','jpeg','png'];
        $imageExtension= explode('.', $fileName);
        $imageExtension=strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
            echo "<script>alert('Invalid image extension!');</script>";
        }
        else if($fileSize>1000000){
            echo "<script>alert('Image size is to large!');</script>";
        }
        else{
            $newImageName= uniqid();
            $newImageName='.'. $imageExtension;
            
            move_uploaded_file($tmpName, 'C:\wamp64\www\Restaurant-2.0\img'. $newImageName);
            $query="INSERT INTO imageupload VALUES('','$name','$newImageName')";
            mysqli_query($conn, $query);
            echo "<script>alert('Successfully added!');
            document.location.href='gallery.php';</script>";
        }
    }
}
//$conn->close();
?>
<div class="row" id="gallery">
    <table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Date</th>
        <th scope="col">Name</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        $rows=mysqli_query($conn, "SELECT*FROM imageupload ORDER BY ID DESC");
        ?>
        <?php foreach($rows as $row):?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row["datesub"];?></td>
                <td><?php echo $row["name"];?></td>
                <td><img src="img/<?php echo $row['image'];?>" width=' 200' alt=''></td>
            </tr>
        <?php endforeach; ?>  
    </tbody>
    </table>
    </div>
//fin draft2 

//
<div class="content home">
            <div class="images">
                <?php foreach ($rows as $row): ?>
                <?php 
                $target_dir = "C:\wamp64\www\Restaurant-2.0\img";
                $target_file = $target_dir.basename($_FILES["image"]["name"]); 
                if (file_exists($target_file)): ?>
                <a href="#">
                    <img src="img/<?php echo $target_file;?>" alt="" data-id="<?php echo $row['ID'];?>" data-title="<?php echo $row['name'];?>" width="300" height="auto">
                </a>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
            }
        }
        else{
            echo "No record found";
        }
        $connectgalery->close();
        ?>

        //draft galerie display
        <div class="row my-3 justify-content-center" >
        <?php 
            if($result){
            while($row = mysqli_fetch_array($result)){
            ?>
                <div class="col-12 col-md-4 my-4">
                    <div class="text-center">
                        <img src="img/<?php echo $row['image'];?>" alt="" data-id="<?php echo $row['ID'];?>" class=" img-fluid rounded" data-title="<?php echo $row['name'];?>" width="300" height="auto">
                    </div>
                </div>
        <?php
            }
        }
        else{
            echo "No record found";
        }
        $connectgalery->close();
        ?>
            </div>
        </div>