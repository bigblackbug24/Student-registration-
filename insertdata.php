<?php

include 'db.php';
//image upload properties....................
function upload()
{
$_fname = $_FILES['file']['name'];
$_ftemp = $_FILES['file']['tmp_name'];

$store = "./upload/" . $_fname;

$filename = $_ftemp;

$check = move_uploaded_file($_ftemp, $store);
return $_fname;
}
//include 'registration form.php';

$name = $_POST['name'];
$father_name = $_POST['fname'];
$email = $_POST['email'];
$password = $_POST['password'];
$cnic = $_POST['cnic'];
$phone_no = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['country'];
$gender = $_POST['gender'];
//$image=$_POST['file'];

 $image = upload();

$sql = "INSERT INTO user (Name,father_name,Email,password,cnic,Phone_no,address,city,gender,image) VALUES ('$name','$father_name',
  '$email','$password','$cnic','$phone_no','$address','$city','$gender','$image')";
//var_dump($sql);
//exit();
$result = $conn->query($sql);
//var_dump($result);
//exit();
header('Location:registration form.php');
?>