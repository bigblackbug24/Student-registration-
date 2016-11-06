<?php
include('db.php');
?>
<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8">
<title>registration form</title>
<meta name="keywords" content="example, JavaScript Form Validation, Sample registration form" />
<meta name="description" content="This document is an example of JavaScript Form Validation using a sample registration form. " />
<!--<link rel='stylesheet' href='style.css' type='text/css' /> -->
<style>
    h1 {
margin-left: 70px;
}
form li {
list-style: none;
margin-bottom: 5px;
}

form ul li label{
float: left;
clear: left;
width: 100px;
text-align: right;
margin-right: 10px;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:14px;
}

form ul li input, select, span {
float: left;
margin-bottom: 10px;
}

form textarea {
float: left;
width: 350px;
height: 150px;
}

[type="submit"] {
clear: left;
margin: 20px 0 0 230px;
font-size:18px
}
[type="reset"] {
clear: left;
margin: 20px 0 0 230px;
font-size:18px
}

p {
margin-left: 70px;
font-weight: bold;
}
    </style>
<script>
function formValidation()
{

//var passid = document.registration.passid;
    var uname = document.registration.name;
    var fname = document.registration.fname
    var uemail = document.registration.email;
    var upass = document.registration.password;
    var ucnic = document.registration.cnic;
    var uphone = document.registration.phone;
    var uadd = document.registration.address;
    var ucountry = document.registration.country;
//var uzip = document.registration.zip;
//var uemail = document.registration.email;
//var umsex = document.registration.msex;
//var ufsex = document.registration.fsex; if(userid_validation(uid,5,12))
    {

        if (allLetter(uname))
        {
            if (allLetter_fname(fname))
            {
                if (ValidateEmail(uemail))
                {
                    if (passid_validation(upass))
                    {
                        if (alphanumeric_cinc(ucnic))
                        {
                            if (alphanumeric(uadd))
                            {
                                if (countryselect(ucountry))
                                {
                                    if (allnumeric(uzip))
                                    {

                                        if (validsex(umsex, ufsex))
                                        {
                                           // header('Location:/insertdata.php')
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    return false;
}
/*function userid_validation(uid,mx,my)
 {
 var uid_len = uid.value.length;
 if (uid_len == 0 || uid_len >= my || uid_len < mx)
 {
 alert("User Id should not be empty / length be between "+mx+" to "+my);
 uid.focus();
 return false;
 }
 return true;
 }
 */
function allLetter(uname)
{
    var letters = /^[A-Za-z]+$/;
    if (uname.value.match(letters))
    {
        return true;
    } else
    {
        alert('Username must have alphabet characters only');
        uname.focus();
        return false;
    }
}
function allLetter_fname(fname)
{

    var letters = /^[A-Za-z]+$/;
    if (fname.value.match(letters))
    {
        return true;
    } else
    {
        alert('father name must have alphabet characters only');
        fname.focus();
        return false;
    }

}
function ValidateEmail(uemail)
{
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (uemail.value.match(mailformat))
    {
        return true;
    } else
    {
        alert("Please entered an valid email address!");
        uemail.focus();
        return false;
    }
}

function passid_validation(upass)
{
    var password = /^[0-9a-zA-Z]+$/;
    if (upass.value.match(password))
    {
        return true;
    } else
    {
        alert("Pasword field not b empty");
        upass.focus();
        return false;
    }
}

function alphanumeric_cinc(ucnic)
{
    var letters = /^[0-9]+$/;
    if (ucnic.value.match(letters))
    {
        return true;
    } else
    {
        alert('User cnic must have alphanumeric characters only');
        ucnic.focus();
        return false;
    }


}

/*function alphanumeric(uadd)
{
    var letters = /^[0-9a-zA-Z]+$/;
    if (uadd.value.match(letters))
    {
        return true;
    } 
    else
    {
        alert('User address not b Empty');
        uadd.focus();
        return false;
    }
}*/
function countryselect(ucountry)
{
    if (ucountry.value == "Default")
    {
        alert('Select your country from the list');
        ucountry.focus();
        return false;
    } else
    {
        return true;
    }
}


</script>
</head>
<?php
$id=$_GET['id'];
$sql="SELECT * FROM `user` where 'id'=$id";
$result = $conn->query($sql);
//$res=$result->num_rows.();
print_r($result);
exit();
?>
<body onload="document.registration.userid.focus();">
<h1>Registration Form</h1>
<form name='registration' onSubmit="return formValidation();" action="updatequery.php" method="post" enctype="multipart/form-data">
<ul>
<li><label for="userid">User id:</label></li>
<li><input type="hidden" name="userid" size="12" /></li>
<li><label for="username">Name:</label></li>
<li><input type="text" name="name" size="50" value="" /></li>
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
<br>
<li><input type="checkbox" name="edu" value="en" checked /><span>Educated</span></li>
<br>

<li>
    <input type="file" name="file" value=""/>
</li>

<li><input type="submit" name="submit" value="Submit" /></li>

<li><input type="reset" name="" value="Clear" /></li>
</ul>
    
</form>
