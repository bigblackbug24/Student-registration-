<?php
include('db.php');
?>
<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8">
<title>registration form</title>
<meta name="keywords" content="example, JavaScript Form Validation, Sample registration form" />
<meta name="description" content="This document is an example of JavaScript Form Validation using a sample registration form. " />
<link rel='stylesheet' href='style.css' type='text/css' />
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
<script src="validation.js"></script>
</head>
<body onload="document.registration.userid.focus();">
    
<h1>Registration Form</h1>
<form id="fileupload" name='registration' onSubmit="return formValidation();"action="//jquery-file-upload.appspot.com/"  action="insertdata.php" method="post" enctype="multipart/form-data">
<ul>
<li><label for="userid">User id:</label></li>
<li><input type="hidden" name="userid" size="12" /></li>
<li><label for="username">Name:</label></li>
<li><input type="text" name="name" size="50" /></li>
<li><label for="fname">Father Name:</label></li>
<li><input type="text" name="fname" size="50" /></li>
<li><label for="email">Email:</label></li>
<li><input type="text" name="email" size="50" /></li>
<li><label for="passid">Password:</label></li>
<li><input type="password" name="password" size="50" /></li>
<li><label for="cnic">Cnic no:</label></li>
<li><input type="text" name="cnic" size="50" /></li>
<li><label for="phone no">phone no:</label></li>
<li><input type="text" name="phone" size="50" /></li>
<li><label for="address">Address:</label></li>
<li><input type="text" name="address" size="50" /></li>
<li><label for="country">Country:</label></li>
<?php

//$uname = $_GET['uname'];
$sql = "SELECT * FROM city";

$result = $conn->query($sql);
$res = $result->fetch_all();
//var_dump($res);
//exit();
?>

<li><select name="country">
<option selected="" name="city">(Please select a country)</option>
<?php 
foreach($res as $index=>$row)
{
$test= implode($row);

?>
<option  name="city"><?php echo $test ?></option>
<?php 
}
?>
</select></li>

<?php
$query='select * from data';
$result = $conn->query($query);
$res = $result->fetch_all();
//print_r($res);
//exit();
?>
<li><label id="gender" name="gender">Gender:</label></li>
<?php 
foreach($res as $index=>$row)
{
$test= implode($row);
//print_r($test);
//exit();
?>

 <li><Input type ='Radio' name="gender" value="<?php echo $test ?>" ><span><?php echo $test ?></span></li>


<?php 
}
?>
<!--<li><input type="radio" name="msex" value="Male" /><span>Male</span></li>
<li><input type="radio" name="fsex" value="Female" /><span>Female</span></li>
<li><label>Educated:</label></li> -->
<li><label for="Educated">Educated:</label></li>
<li><input type="checkbox" name="edu" value="en" checked /><span>Educated</span></li>
<br>
<div class="navbar navbar-default navbar-fixed-top">
   
</div>
<label class="control-label">Select File</label>
    <input id="input-6" name="input6[]" type="file" multiple class="file-loading">
</div>
<li><label for="submit"></label></li>
<li><input type="submit" name="submit" value="Submit" /></li>

<li><input type="reset" name="" value="Clear" /></li>
</ul>
    
</form>

<table class="imagetable" style="margin-left: 500px">
<tr>
    <th>ID</th><th>Name</th><th>Father name</th><th>Email</th><th>Cnic</th><th>Phone#</th><th>Address</th>
    <th>City</th><th>Gender</th><th>image</th><th>Action</th>
</tr>
<tr>
    <?php

//$uname = $_GET['uname'];
$sql = "SELECT * FROM user";

$result = $conn->query($sql);
//$res = $result->fetch_all();
//var_dump($res);
//  exit();
//while($row=>($res))
while($row=$result->fetch_array())
    {
//$test= exp($row)
    //echo '1111';
    //print_r($row);
//exit();
?>
    <th>
    <?php echo $row['id']; ?>    
    </th>
    <th>
    <?php echo $row['name']; ?>    
    </th>
    <th>
    <?php echo $row['father_name']; ?>    
    </th>
    <th>
    <?php echo $row['email']; ?>    
    </th>
    <th>
    <?php echo $row['cnic']; ?>    
    </th>
    <th>
    <?php echo $row['phone_no']; ?>    
    </th>
    <th>
    <?php echo $row['address']; ?>    
    </th>
    <th>
    <?php echo $row['city']; ?>    
    </th>
    <th>
    <?php echo $row['gender']; ?>    
    </th>
    <th>
        <img src="upload/<?php echo $row['image']; ?>" height="50" width="50">   
    </th>
    <th>
        <a href="delete.php?id=<?php echo $row['id'];?>">delete</a>/<a href="update.php/<?php echo $row['id'];?>">Edit</a>
    </th>
</tr>
<?php
}
?>
</table>
    
    <script>
    $(document).on('ready', function() {
        $("#input-6").fileinput({
            showUpload: false,
            maxFileCount: 10,
            mainClass: "input-group-lg"
        });
    });
    </script>