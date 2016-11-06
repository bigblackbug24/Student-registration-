<?php 
include 'db.php';
$id=$_GET['id'];
$sql =  "DELETE FROM `user` WHERE id = $id"; 
 $result = $conn->query($sql);
//print_r($result);

//    exit();
header('Location:registration form.php');


?>