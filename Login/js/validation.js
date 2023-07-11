//............Validation for login .........
var pwvalidation = false;
function validateEmail()
{
	var email = loginform.email.value;
	if(email=="" || email==null)
		document.getElementById("email").style.boxShadow = "5px 5px 5px 0px rgba(214,0,0,1)";
	else
		document.getElementById("email").style.boxShadow = "none";
}
function validatePassword()
{
	var pw = loginform.pw.value;
	if(pw=="" || pw==null)
		document.getElementById("pw").style.boxShadow = "5px 5px 5px 0px rgba(214,0,0,1)";
	else
		document.getElementById("pw").style.boxShadow = "none";
}

// .............end of validation for login ................

//..............validation for change password ................
function validateOldpw(email)
{
	var oldpw = changepasswordform.oldpw.value;
	if(oldpw == '')
		{
			document.getElementById("oldpw").style.boxShadow = "5px 5px 5px 0px rgba(214,0,0,1)";
			document.getElementById("oldpw-validation").innerHTML = "Please enter your old password";
			document.getElementById("oldpw-validation").style.display = "block";
		}
if(oldpw && oldpw!='')
 {
  $.ajax({
  type: 'get',
  url: 'checkoldpw.php',
  data: {
   'user_pw':oldpw,
   'user_email':email,
  },
  success: function (response) {
   if(response=="doesntmatch")	
   {
		if(oldpw == '')
		{
			document.getElementById("oldpw").style.boxShadow = "5px 5px 5px 0px rgba(214,0,0,1)";
			document.getElementById("oldpw-validation").innerHTML = "Please enter your old password";
			document.getElementById("oldpw-validation").style.display = "block";
		}
		else{
			document.getElementById("oldpw-validation").style.display = "none";
			document.getElementById("oldpw").style.boxShadow = "none";
			document.getElementById("oldpwtick").style.display = "block";
		}
   }
   else{
	   
	    document.getElementById("oldpw").style.boxShadow = "5px 5px 5px 0px rgba(214,0,0,1)";
		document.getElementById("oldpw-validation").innerHTML = "Your password doesn't match!";
		document.getElementById("oldpw-validation").style.display = "block";
   }
	}
	}
)}
}
function validateNewpw()
{
	var newpw = changepasswordform.password1.value;
	var specialChar = /[_\-#%*\+~!@$^&=?	]/;
	var hasNumber = /\d/;
	if((newpw.replace(/[^A-Z]/g, "").length == 0) || !specialChar.test(newpw) || !hasNumber.test(newpw) || newpw.length < 8)
		pwvalidation = true;
	else
		pwvalidation = false;
	
	 if (pwvalidation && newpw != "") {
        document.getElementById("newpw-validation").style.display = "block";
        document.getElementById("newpw-validation").innerHTML = "Password does not meet requirement!"
        document.getElementById("password1").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
        document.getElementById("newpwtick").style.display = "none";

		return false;
    }
	else{
		if(newpw == '')
		{
			document.getElementById("password1").style.boxShadow = "5px 5px 5px 0px rgba(214,0,0,1)";
			document.getElementById("newpw-validation").innerHTML = "Please enter your new password";
			document.getElementById("newpw-validation").style.display = "block";
			document.getElementById("newpwtick").style.display = "none";
		}
		else{
			document.getElementById("newpw-validation").style.display = "none";
			document.getElementById("password1").style.boxShadow = "none";
			document.getElementById("newpwtick").style.display = "block";
		}
	}
}
function validateNewpw2() {
    if ((changepasswordform.password1.value != changepasswordform.password2.value) && (changepasswordform.password2.value != "")) {
        if (changepasswordform.password1.value == "" || changepasswordform.password1.value == null) {
            document.getElementById("newpw-validation").style.display = "block";
            document.getElementById("newpw-validation").innerHTML = "Please enter your new password!"
            document.getElementById("password1").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
            document.getElementById("newpw2tick").style.display = "none";
            return false;
        } else {
            document.getElementById("newpw2-validation").style.display = "block";
            document.getElementById("newpw2-validation").innerHTML = "Password does not match!"
            document.getElementById("password2").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
            document.getElementById("newpw2tick").style.display = "none";
            return false;
        }
    } else if (changepasswordform.password2.value != ""){
        if (changepasswordform.password1.value == "") {
            document.getElementById("newpw-validation").style.display = "none";
            document.getElementById("password1").style.boxShadow = "none";
        }
        document.getElementById("newpw2-validation").style.display = "none";
        document.getElementById("password2").style.boxShadow = "none";

        if (changepasswordform.password1.value != "" && changepasswordform.password2.value != "") {
            document.getElementById("pwconfirmtick").style.display = "block";
            document.getElementById("newpw2tick").style.display = "block";
			return true;
        }
    }
		if(changepasswordform.password1.value == changepasswordform.password2.value && changepasswordform.password1.value!="" && changepasswordform.password2.value !="" && pwvalidation)
		{
			document.getElementById("newpw2tick").style.display = "block";
            document.getElementById("pwtick").style.display = "block";
			document.getElementById("newpw-validation").style.display = "none";
            document.getElementById("password1").style.boxShadow = "none";
			document.getElementById("pwconfirm-validation").style.display = "none";
			document.getElementById("password2").style.boxShadow = "none";
		}else      
		{
            document.getElementById("newpw2tick").style.display = "none";
			document.getElementById("password2").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		}
}
// .............end of validation for change password ................

// .............validation for edit profile ....................
function validateFirstName() {
	
	var name = editprofileform.fname.value;
	var hasNumber = /\d/;
	if(name != '')
	{
		if(hasNumber.test(editprofileform.fname.value))
		{
			document.getElementById("fname-validation").innerHTML = "Please enter a valid first name!";
			document.getElementById("fname-validation").style.display = "block";
			document.getElementById("fname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		}
		else{
			document.getElementById("fname-validation").style.display = "none";
			document.getElementById("fname").style.boxShadow = "none";
			return true;
		}
	}
	else
	{
		document.getElementById("fname-validation").innerHTML = "Please enter a first name!";
		document.getElementById("fname-validation").style.display = "block";
		document.getElementById("fname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
	}
}
function validateLastName() {
	var name = editprofileform.lname.value;
	var hasNumber = /\d/;
	if(name != '')
	{
		if(hasNumber.test(editprofileform.lname.value))
		{
			document.getElementById("lname-validation").innerHTML = "Please enter a valid last name!";
			document.getElementById("lname-validation").style.display = "block";
			document.getElementById("lname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		}
		else{
			document.getElementById("lname-validation").style.display = "none";
			document.getElementById("lname").style.boxShadow = "none";
			return true;
		}
	}
	else
	{
		document.getElementById("lname-validation").innerHTML = "Please enter a last name!";
		document.getElementById("lname-validation").style.display = "block";
		document.getElementById("lname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
	}
}
function validateAddress() {
	var name = editprofileform.address.value;
	if(name == '')
	{
		document.getElementById("address-validation").innerHTML = "Please enter your address";
		document.getElementById("address-validation").style.display = "block";
		document.getElementById("address").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
	}
	else
	{
		document.getElementById("address-validation").style.display = "none";
		document.getElementById("address").style.boxShadow = "none";
	}
}
function validatePostcode() {
	var name = editprofileform.postcode.value;
	if(name == '')
	{
		document.getElementById("postcode-validation").innerHTML = "Please enter your postcode";
		document.getElementById("postcode-validation").style.display = "block";
		document.getElementById("postcode").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
	}
	else
	{
		document.getElementById("postcode-validation").style.display = "none";
		document.getElementById("postcode").style.boxShadow = "none";
	}
}
function validateContact() {
	var format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
	if (editprofileform.contact.value != "")
	{
		if(editprofileform.contact.value.match(/[a-z]/i) || format.test(editprofileform.contact.value))
		{
			document.getElementById("contact-validation").innerHTML = "Please enter valid contact number";
			document.getElementById("contact-validation").style.display = "block";
			document.getElementById("contact").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
			return false;
		}else if (editprofileform.contact.value.length == 10 || editprofileform.contact.value.length == 11)
		{
			document.getElementById("contact").style.boxShadow = "none";
			document.getElementById("contact-validation").style.display = "none";
			return true;
		}
		else{
			document.getElementById("contact-validation").innerHTML = "Please enter valid contact number";
			document.getElementById("contact-validation").style.display = "block";
			document.getElementById("contact").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
			return false;
		}
	}
	else
	{
		document.getElementById("contact").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("contact-validation").innerHTML = "Please enter your contact number";
		document.getElementById("contact-validation").style.display = "block";
	}
}
$(document).ready(function() {
	$('#password1').focus(function(e) {
		if (!$(e.target).is('#password1')) {
			$("#password1").popover('hide');
		} else {
			$("#password1").popover('show', { animation: true});
		}
	});
})
//Count variable ued for progress bar
var count = 0;

//Loops through all forms on the page and ads popover to all password fields with the class validate.
$(document).ready(function() {
    $('[data-toggle="popover"]','#password1').popover();
	$('[data-toggle="popover"]','#contact').popover();
    for (var i = 0; i < document.forms.length; i++) {
        for (var j = 0; j < document.forms[i].elements.length; j++) {
            var control = document.forms[i].elements[j];
            if (control.type.toString() == "password" && control.classList.contains("validate")) {
                addPasswordField(control);
            } else if (control.type.toString() == "text" && control.classList.contains("validatecontact")) {
				verifyContact(control);
			}

        }
    }

});

/**
 * Ads popover to element e.
 * Popover contains status bar
 * @param e
 */
function addPasswordField(e) {
    //Set Popover Attributes
    e.setAttribute("data-placement", "right");
    e.setAttribute("data-toggle", "popover");
    e.setAttribute("data-trigger", "focus");
    e.setAttribute("data-html", "true");
    e.setAttribute("title", "Password Requirements");
    e.setAttribute("onfocus", "onFocus(this)");
    e.setAttribute("onblur", "onBlur(this)");
    e.setAttribute("onkeyup", "checkPassword(this)");

    //Create progress bar container
    var progressBardiv = document.createElement("div");
    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");
    progressBardiv.id = "progress" + num;
    $(progressBardiv).addClass("progress");

    //Progress bar element
    var progressBar = document.createElement("div");
    $(progressBar).addClass("progress-bar");
    $(progressBar).addClass("bg-info");
    progressBar.id = "progressBar" + num;
    progressBar.setAttribute("role", "progressbar");
    progressBar.setAttribute("aria-valuenow", "100");
    progressBar.setAttribute("aria-valuemin", "0");
    progressBar.setAttribute("aria-valuemax", "100");
    progressBardiv.appendChild(progressBar);

    //Add popover data including the progress bar
    e.setAttribute("data-content", '&bull; Between 8~18 Characters<br/>&bull; An upper Case Letter<br/> &bull; A Number<br/> &bull; At Least 1 Special Character<br/><br/>' + progressBardiv.outerHTML);

}

//TODO: Add validation to check the repeat password field

function verifyContact(e) {
    e.setAttribute("data-placement", "right");
    e.setAttribute("data-toggle", "popover");
    e.setAttribute("data-trigger", "focus");
    e.setAttribute("data-content", '&times; Number Only <br/>&times; Length between 10~11');
    e.setAttribute("data-html", "true");
    e.setAttribute("onfocus", "checkVerify(this)");
    e.setAttribute("onkeyup", "checkVerify(this)");
}

//TODO: Check to see if the 2 passwords are the same
function checkVerify(e) {
		
        $(e).popover('show');
		var format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
		var hint = "";
		var target = e.value;
		if(target.match(/[a-z]/i) || format.test(target))
			hint +="&times; Number Only <br/>";
		else
			hint +="&radic; Number Only <br/>";
		if(target.length <=11 && target.length >=10)
			hint +="&radic; Length between 10~11 <br/>";
		else
			hint +="&times; Length between 10~11 <br/>";
		var popover = $(e).attr('data-content',hint).data('bs.popover');
		popover.setContent(hint);
    

}

function checkRules() {
    for (var i = 0; i < rules.length; i++) {

    }

}

/**
 * Checks to see if all of the requirements ar met.
 * Updates progress bar and popover
 * @param e password field element
 */
function checkPassword(e) {
    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");
    count = 0;
    var password = e.value;
    var length = checkLength(password);
    var upper = checkUpperCase(password);
    var digit = checkDigit(password);
    var special = checkSpecialCharacters(password);
    if (length.length + upper.length + digit.length + special.length == 0) {

        $(e).popover('hide');
        pwvalidation = false;
        return true;
    } else {
        pwvalidation = true;
        setProgressBar(count, e);
        var popover = $(e).attr("data-content", length + upper + digit + special + ' <br/>' + document.getElementById("progress" + num).outerHTML).data('bs.popover');
        popover.setContent();
        return false;
    }

}

/**
 * Checks to see if the password contains an approved special character
 * @param string password to test
 * @returns {string} string to add to the popover
 */
function checkSpecialCharacters(string) {
    var specialChar = /[_\-#%*\+~!@$^&=?	]/;
    if (specialChar.test(string) == false) {
        return addPopoutLine(" At Least 1 Special Character");
    } else {
        count++;
        return "";
    }
}

/**
 * Checks to see if there is at least 1 digit in the password
 * @param string password to test
 * @returns {string} string to add to the popover
 */
function checkDigit(string) {
    var hasNumber = /\d/;
    if (hasNumber.test(string) == false) {
        return addPopoutLine(" A Number");
    } else {
        count++;
        return "";
    }
}

/**
 * Checks to ensure at least 1 character is upper case
 * @param string password to test
 * @returns {string} string to add to the popover
 */
function checkUpperCase(string) {
    if (string.replace(/[^A-Z]/g, "").length == 0) {
        return addPopoutLine(" An upper Case Letter");
    } else {
        count++;
        return "";
    }
}

/**
 * Checks the length of the password
 * @param string password to test
 * @returns {string} string to add to the popover
 */
function checkLength(string) {
    if (string.length < 8) {
        return addPopoutLine(" Between 8~18 Characters");
    } else {
        count++;
        return "";

    }

}

/**
 * sets the progress bar (e) to the percent
 * @param percent percent to set progress bar to
 * @param e  password field element
 */
function setProgressBar(percent, e) {

    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");
    percentNum = (percent / 4) * 100;
    percent = percentNum.toString() + "%";
	 $("#progressBar1").css("width", percent);

}

/**
 * returns string that is formatted with a bullet point and <br> at the end for the popover.
 * @param string popover text
 * @returns {string} formatted popover string
 */
function addPopoutLine(string) {
    return "&bull;" + string + "<br/>";
}

/**
 * On focus event that checks the password when the focus is gained.
 * @param e password element
 */
function onFocus(e) {
    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");
    checkPassword(e);
}

function onBlur(e) {
    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");

    if (checkPassword(e) == false) {

    }

}

function addRule(name, text, regex) {
    var rule = {};
    rule.name = name;
    rule.text = text;
    rule.expression = regex;

}
