var pwvalidation ="";
function capitalize(inputField) 
{
	inputField.value = inputField.value.replace(/\b[a-z](?=[a-z]{0})/gi, function(letter) {
	return letter.toUpperCase();
	});
}
function validateEmail()
{
 var email=$('#email').val();
 if(email)
 {
  $.ajax({
  type: 'get',
  url: 'checkemail.php',
  data: {
   'user_email':email,
  },
  success: function (response) {
   if(response=="doesntexist")	
   {

    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(registerform.email.value))) {
        document.getElementById("email-validation").innerHTML = "Please enter an valid email!";
        document.getElementById("email-validation").style.display = "block";
        document.getElementById("email").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
        document.getElementById("emailtick").style.display = "none";
    } else {
        document.getElementById("email-validation").style.display = "none";
        document.getElementById("email").style.boxShadow = "none";
        document.getElementById("emailtick").style.display = "block";
		}
   }
   else if(response == 'exist')
   {
	  document.getElementById("email-validation").style.display = "block";
      document.getElementById("email").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
      document.getElementById("emailtick").style.display = "none";
	  document.getElementById("email-validation").innerHTML = "Your email has already registered!";
   }
  }
  });
 }
 else
 {
  document.getElementById("email").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
  document.getElementById("email-validation").innerHTML = "Please enter your email!";
  document.getElementById("emailtick").style.display = "none";
 }

 return true;
}

function validateFirstName()
{
	var hasNumber = /\d/;
	if(registerform.firstname.value != "")
	{
		if(hasNumber.test(registerform.firstname.value))
		{
		  document.getElementById("firstname-validation").style.display = "block";
		  document.getElementById("firstname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		  document.getElementById("firstnametick").style.display = "none";
		  document.getElementById("firstname-validation").innerHTML = "Please enter a valid first name!";
		  return false;
		}
		else{
		document.getElementById("firstnametick").style.display = "block";
		document.getElementById("firstname").style.boxShadow = "none";
		document.getElementById("firstname-validation").style.display = "none";
		return true;
		}
		
	}
	else
	{
		document.getElementById("firstnametick").style.display = "none";
		document.getElementById("firstname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("firstname-validation").style.display = "none";
		return false;
	}
}
function validateLastName()
{
	var hasNumber = /\d/;
	if(registerform.lastname.value != "")
	{
		if(hasNumber.test(registerform.lastname.value))
		{
		  document.getElementById("lastname-validation").style.display = "block";
		  document.getElementById("lastname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		  document.getElementById("lastnametick").style.display = "none";
		  document.getElementById("lastname-validation").innerHTML = "Please enter a valid last name!";
		  return false;
		}
		else{
		document.getElementById("lastnametick").style.display = "block";
		document.getElementById("lastname").style.boxShadow = "none";
		document.getElementById("lastname-validation").style.display = "none";
		return true;
		}
		
	}
	else
	{
		document.getElementById("lastnametick").style.display = "none";
		document.getElementById("lastname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("lastname-validation").style.display = "none";
		return false;
	}
}
function validateGender()
{
	if(registerform.gender.value != "empty")
	{
		document.getElementById("gendertick").style.display = "block";
		document.getElementById("gender").style.boxShadow = "none";
		return true;
	}
	else
	{
		document.getElementById("gendertick").style.display = "none";
		document.getElementById("gender").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		return false;
	}
}
function validatePassword() {
	var newpw = registerform.pw.value;
	var specialChar = /[_\-#%*\+~!@$^&=?	]/;
	var hasNumber = /\d/;
	if((newpw.replace(/[^A-Z]/g, "").length == 0) || !specialChar.test(newpw) || !hasNumber.test(newpw) || newpw.length < 8)
		pwvalidation = true;
	else
		pwvalidation = false;
    if (pwvalidation && registerform.pw.value != "") {
        document.getElementById("pw-validation").style.display = "block";
        document.getElementById("pw-validation").innerHTML = "Password does not meet requirement!"
        document.getElementById("password1").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
        document.getElementById("pwtick").style.display = "none";

		return false;
    } else if (registerform.pw.value != "") {
        document.getElementById("pwtick").style.display = "block";
        document.getElementById("pw-validation").style.display = "none";
        document.getElementById("password1").style.boxShadow = "none";
		return true;
    } else	{
		document.getElementById("password1").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
        document.getElementById("pwtick").style.display = "none";
		return false;
	}
	
		
}
function passwordConfirm() {
	var pw2 = registerform.pwcf.value;
	var specialChar = /[_\-#%*\+~!@$^&=?	]/;
	var hasNumber = /\d/;
	if((pw2.replace(/[^A-Z]/g, "").length == 0) || !specialChar.test(pw2) || !hasNumber.test(pw2) || pw2.length < 8)
		pwvalidation = true;
	else
		pwvalidation = false;
    if ((registerform.pw.value != registerform.pwcf.value) && (registerform.pwcf.value != "")) {
        if (registerform.password1.value == "" || registerform.password1.value == null) {
            document.getElementById("pw-validation").style.display = "block";
            document.getElementById("pw-validation").innerHTML = "Please enter your password!"
            document.getElementById("password1").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
            document.getElementById("pwconfirmtick").style.display = "none";
            return false;
        } else {
            document.getElementById("pwconfirm-validation").style.display = "block";
            document.getElementById("pwconfirm-validation").innerHTML = "Password Does Not Match!"
            document.getElementById("password2").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
            document.getElementById("pwconfirmtick").style.display = "none";
            return false;
        }
    } else if (registerform.pwcf.value != ""){
        if (registerform.pw.value == "") {
            document.getElementById("pw-validation").style.display = "none";
            document.getElementById("password1").style.boxShadow = "none";
        }
        document.getElementById("pwconfirm-validation").style.display = "none";
        document.getElementById("password2").style.boxShadow = "none";

        if (registerform.pw.value != "" && registerform.pwcf.value != "" && !pwvalidation) {
            document.getElementById("pwconfirmtick").style.display = "block";
            document.getElementById("pwtick").style.display = "block";
			return true;
        }
    }
		if(registerform.pw.value == registerform.pwcf.value && registerform.password1yyy.value!="" && registerform.pwcf.value !="" && !pwvalidation)
		{
			
			document.getElementById("pwconfirmtick").style.display = "block";
            document.getElementById("pwtick").style.display = "block";
			document.getElementById("pw-validation").style.display = "none";
            document.getElementById("password1").style.boxShadow = "none";
			document.getElementById("pwconfirm-validation").style.display = "none";
			document.getElementById("password2").style.boxShadow = "none";
		}else      
		{
			
            document.getElementById("pwconfirmtick").style.display = "none";
			document.getElementById("password2").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		}
}

function validateContact() {
	var format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
	if (registerform.contact.value != "")
	{
		if(registerform.contact.value.match(/[a-z]/i) || format.test(registerform.contact.value))
		{
			document.getElementById("contact-validation").innerHTML = "Please enter valid contact number";
			document.getElementById("contact-validation").style.display = "block";
			document.getElementById("contact").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
			return false;
		}else if (registerform.contact.value.length >= 10 && registerform.contact.value.length <= 11)
		{
			document.getElementById("contact").style.boxShadow = "none";
			document.getElementById("contacttick").style.display = "block";
			document.getElementById("contact-validation").style.display = "none";
			return true;
		}
	}
	if(registerform.contact.value.length > 11 || registerform.contact.value.length < 10 || registerform.contact.value == "")
	{
		document.getElementById("contacttick").style.display = "none";
		document.getElementById("contact").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
	}
}
function validateAddress() {
	if (registerform.address.value != "")
	{
		document.getElementById("addresstick").style.display = "block";
		document.getElementById("address").style.boxShadow = "none";
		return true;
	}
	else
	{
		document.getElementById("addresstick").style.display = "none";
		document.getElementById("address").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		return false;
	}
}
function validateState(){
	if(registerform.state.value != "empty")
	{
		document.getElementById("state").style.boxShadow = "none";
		document.getElementById("statetick").style.display = "block";
		return true;
	}
	else{
		document.getElementById("state").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		return false;
	}
}
function validatePostcode() {
    var postcode = registerform.postcode.value;

    if (isNaN(postcode) || postcode.length > 5) {
        document.getElementById("postcode-validation").style.display = "block";
        document.getElementById("postcode-validation").innerHTML = "Please enter a valid postcode!"
        document.getElementById("postcode").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("postcodetick").style.display = "none";
		return false;
    } else if (postcode=="")
	{
		document.getElementById("postcode").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
	}
	else {
        document.getElementById("postcode-validation").style.display = "none";
        document.getElementById("postcode").style.boxShadow = "none";
		document.getElementById("postcodetick").style.display = "block";
		return true;
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

var rules = [];
$(document).ready(function() {
	$('[data-toggle="popover"]','#contact').popover();
})
//Loops through all forms on the page and ads popover to all password fields with the class validate.
$(document).ready(function() {
    $('[data-toggle="popover"]','#password1').popover();
    for (var i = 0; i < document.forms.length; i++) {
        for (var j = 0; j < document.forms[i].elements.length; j++) {
            var control = document.forms[i].elements[j];
            if (control.type.toString() == "password" && control.classList.contains("validate")) {
                addPasswordField(control);
            } else if (control.type.toString() == "text" && control.classList.contains("validate")) {
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
        $(e).addClass("is-invalid");
        return true;
    } else {
        $(e).removeClass("is-valid");
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
		pwvalidation = false;
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
    $(document).ready(function() {
        $("#progressBar" + num).css("width", percent);
    })
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