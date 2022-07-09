<?php
$connection = mysqli_connect('localhost', 'root','');
$db=mysqli_select_db($connection, 'heroku_c1b2033687fa4fd');

   
    if(isset($_POST['delete'])){
        $id=$_POST['ID'];
        $query="DELETE FROM bookingatable WHERE ID='$id'";
        $query_run= mysqli_query($connection, $query);
        if($query_run){
            echo "<script> alert('Data Deleted'); </script>";
            header("location:gestion2.php");
        } else {
            echo "<script> alert('Data Not Deleted'); </script>";
        }
    } 
   // $connection->close();;;
    
?>