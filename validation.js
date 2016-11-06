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

