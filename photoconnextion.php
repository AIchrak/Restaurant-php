<?php
$connection = mysqli_connect('localhost', 'root','');
$db=mysqli_select_db($connection, 'heroku_c1b2033687fa4fd');

   
    if(isset($_POST['delete'])){
        $id=$_POST['ID'];
        $query="DELETE FROM imageupload WHERE ID='$id'";
        $query_run= mysqli_query($connection, $query);
        if($query_run){
            echo "<script> alert('Data Deleted'); </script>";
            header("location:gestion2.php");
        } else {
            echo "<script> alert('Data Not Deleted'); </script>";
        }
    } 
   // $connection->close();
    
?>
<?php
/*$hostname     = "localhost";
$username     = "root";
$password     = ""; 
$databasename = "heroku_c1b2033687fa4fd"; 
// Create connection 
$conn = new mysqli($hostname, $username, $password,$databasename);
 // Check connection 
if ($conn->connect_error) { 
die("Unable to Connect database: " . $conn->connect_error);
 }*/
?>