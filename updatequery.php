<?php
include 'db.php';
//include 'registration form.php';
$name=$_POST['name'];
$father_name=$_POST['fname'];
$email=$_POST['email'];
$password=$_POST['password'];
$cnic=$_POST['cnic'];
$phone_no=$_POST['phone'];
$address=$_POST['address'];
$city=$_POST['country'];
$gender = $_POST['gender'];
$_GET['id']=$id;
$sql ="UPDATE user SET name='$name', father_name= '$father_name' ,email='$email',password='$password',cnic='$cnic',
        phone_no='$phone_no',address='$address',city='$city',gender='$gender' WHERE id=$id";
//var_dump($sql);
//exit();
 $result = $conn->query($sql);
 //var_dump($result);
 //exit();
header('Location:registration form.php');
?>