<?php
include '../components/connection.php';
$entry = $_GET['check'];

$sql = mysqli_query($connection,"SELECT * FROM `accounts` WHERE username ='$entry'" );
        

    if($row = $sql->fetch_assoc()) { echo "1"; }  


    else {echo "0" ;}

 
?>
