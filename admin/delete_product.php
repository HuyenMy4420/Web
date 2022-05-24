<?php
include_once('dbhelper1.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE id =$id";
    $query = mysqli_query($conn, $sql);
    if(query){
        header('location: admin_home.php');
    }
    else{
        echo "...";
    }
}
?>