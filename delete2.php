<?php
$connection = mysqli_connect('localhost', 'root','');
$db=mysqli_select_db($connection, 'formrestaurant2');

   
    if(isset($_POST['delete'])){
        $id=$_POST['ID'];
        $query="DELETE FROM livredor WHERE ID='$id'";
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