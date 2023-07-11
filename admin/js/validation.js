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
   'hairdresser_email':email,
  },
  success: function (response) {
   if(response=="doesntexist")	
   {
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(addnewhairdresserform.email.value))) {
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
function validatePosition(){
	if(addnewhairdresserform.hairdresser_position.value != "empty")
	{
		document.getElementById("position").style.boxShadow = "none";
		document.getElementById("positiontick").style.display = "block";
		return true;
	}
	else{
		document.getElementById("position").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		return false;
	}
}
function validateFirstName()
{
	var hasNumber = /\d/;
	if(addnewhairdresserform.hairdresser_firstname.value != "")
	{
		if(hasNumber.test(addnewhairdresserform.hairdresser_firstname.value))
		{
			document.getElementById("firstname-validation").style.display = "block";
			document.getElementById("firstnametick").style.display = "none";
			document.getElementById("firstname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
			document.getElementById("firstname-validation").innerHTML = "Please enter a valid first name";
		}
		else{
			document.getElementById("firstname-validation").style.display = "none";
			document.getElementById("firstnametick").style.display = "block";
			document.getElementById("firstname").style.boxShadow = "none";
			return true;
		}
	}
	else
	{
		document.getElementById("firstnametick").style.display = "none";
		document.getElementById("firstname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		return false;
	}
}
function validateLastName()
{
	var hasNumber = /\d/;
	if(addnewhairdresserform.hairdresser_lastname.value != "")
	{
		if(hasNumber.test(addnewhairdresserform.hairdresser_lastname.value))
		{
			document.getElementById("lastname-validation").style.display = "block";
			document.getElementById("lastnametick").style.display = "none";
			document.getElementById("lastname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
			document.getElementById("lastname-validation").innerHTML = "Please enter a valid last name";
		}
		else{
			document.getElementById("lastname-validation").style.display = "none";
			document.getElementById("lastnametick").style.display = "block";
			document.getElementById("lastname").style.boxShadow = "none";
			return true;
		}
	}
	else
	{
		document.getElementById("lastnametick").style.display = "none";
		document.getElementById("lastname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		return false;
	}
}
function validateContact() {
	var contact = addnewhairdresserform.hairdresser_contactnum.value;
	var format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
	if (addnewhairdresserform.contact.value != "")
	{
		if(contact.match(/[a-z]/i) || format.test(contact))
		{
			document.getElementById("contact-validation").innerHTML = "Please enter valid contact number";
			document.getElementById("contact-validation").style.display = "block";
			document.getElementById("contact").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
			return false;
		}else if (contact.length >= 10 && contact.length <= 11)
		{
			document.getElementById("contact").style.boxShadow = "none";
			document.getElementById("contacttick").style.display = "block";
			document.getElementById("contact-validation").style.display = "none";
			return true;
		}
	}
	if(contact.length > 11 || contact.length < 10 || contact == "")
	{
		document.getElementById("contacttick").style.display = "none";
		document.getElementById("contact").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
	}
}
function validateGender()
{
	if(addnewhairdresserform.hairdresser_gender.value != "empty")
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
function validateAddress() {
	if (addnewhairdresserform.hairdresser_address.value != "")
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
	if(addnewhairdresserform.hairdresser_state.value != "empty")
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
    var postcode = addnewhairdresserform.hairdresser_postcode.value;

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
/////////////// add new position //////////////////
function validatePositionName(){
	if(addnewpositionform.position_name.value == ""){
		document.getElementById("positionname-validation").style.display = "block";
        document.getElementById("positionname-validation").innerHTML = "Please enter position name!"
        document.getElementById("positionname").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("positionnametick").style.display = "none";
	}
	else{
		document.getElementById("positionname-validation").style.display = "none";
        document.getElementById("positionname").style.boxShadow = "none";
		document.getElementById("positionnametick").style.display = "block";
	}
}
function validateServiceCharge(){
	if(addnewpositionform.position_servicecharge.value == ""){
		document.getElementById("positionservicecharge-validation").style.display = "block";
        document.getElementById("positionservicecharge-validation").innerHTML = "Please enter position service charge!"
        document.getElementById("positionservicecharge").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("positionservicechargetick").style.display = "none";
	}
	else if(isNaN(addnewpositionform.position_servicecharge.value)){
		document.getElementById("positionservicecharge-validation").style.display = "block";
        document.getElementById("positionservicecharge-validation").innerHTML = "Please enter number only!"
        document.getElementById("positionservicecharge").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("positionservicechargetick").style.display = "none";
	}
	else{
		document.getElementById("positionservicecharge-validation").style.display = "none";
        document.getElementById("positionservicecharge").style.boxShadow = "none";
		document.getElementById("positionservicechargetick").style.display = "block";
	}
}
/////////////// add new service //////////////////
function validateServiceName(){
	var sn=$('#service_name').val();
 if(sn)
 {
  $.ajax({
  type: 'get',
  url: 'checkservicename.php',
  data: {
   'service_name':sn,
  },
  success: function (response) {
   if(response=="doesntexist")	
   {
    if(addnewserviceform.service_name.value == ""){
		document.getElementById("service_name-validation").style.display = "block";
        document.getElementById("service_name-validation").innerHTML = "Please enter service name!"
        document.getElementById("service_name").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("service_nametick").style.display = "none";
	}
	else{
		document.getElementById("service_name-validation").style.display = "none";
        document.getElementById("service_name").style.boxShadow = "none";
		document.getElementById("service_nametick").style.display = "block";
	}
   }
   else if(response == 'exist')
   {
	  document.getElementById("service_name-validation").style.display = "block";
      document.getElementById("service_name").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
      document.getElementById("service_nametick").style.display = "none";
	  document.getElementById("service_name-validation").innerHTML = "Service name already exists!";
   }
  }
  });
 }
 else
 {
  document.getElementById("email").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
  document.getElementById("email-validation").innerHTML = "Please enter service name!"
  document.getElementById("emailtick").style.display = "none";
 }

 return true;
	
}
function validateEstimateFee(){
	if(addnewserviceform.service_estimate_fee.value == ""){
		document.getElementById("service_estimate_fee-validation").style.display = "block";
        document.getElementById("service_estimate_fee-validation").innerHTML = "Please enter service estimate fee!"
        document.getElementById("service_estimate_fee").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("service_estimate_feetick").style.display = "none";
	}
	else if(isNaN(addnewserviceform.service_estimate_fee.value)){
		document.getElementById("service_estimate_fee-validation").style.display = "block";
        document.getElementById("service_estimate_fee-validation").innerHTML = "Please enter number only!"
        document.getElementById("service_estimate_fee").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("service_estimate_feetick").style.display = "none";
	}
	else{
		document.getElementById("service_estimate_fee-validation").style.display = "none";
        document.getElementById("service_estimate_fee").style.boxShadow = "none";
		document.getElementById("service_estimate_feetick").style.display = "block";
	}
}

function validateEstimateDuration(){
	if(addnewserviceform.service_estimate_duration.value == ""){
		document.getElementById("service_estimate_duration-validation").style.display = "block";
        document.getElementById("service_estimate_duration-validation").innerHTML = "Please enter service estimate duration!"
        document.getElementById("service_estimate_duration").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("service_estimate_durationtick").style.display = "none";
	}
	else if(isNaN(addnewserviceform.service_estimate_duration.value)){
		document.getElementById("service_estimate_duration-validation").style.display = "block";
        document.getElementById("service_estimate_duration-validation").innerHTML = "Please enter number only!"
        document.getElementById("service_estimate_duration").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("service_estimate_durationtick").style.display = "none";
	}
	else{
		document.getElementById("service_estimate_duration-validation").style.display = "none";
        document.getElementById("service_estimate_duration").style.boxShadow = "none";
		document.getElementById("service_estimate_durationtick").style.display = "block";
	}
}
function validateServiceType(){
	if(addnewserviceform.service_type.value == ""){
		document.getElementById("service_type-validation").style.display = "block";
        document.getElementById("service_type-validation").innerHTML = "Please enter service name!"
        document.getElementById("service_type").style.boxShadow = "5px 4px 5px 0px rgba(214,0,0,1)";
		document.getElementById("service_typetick").style.display = "none";
	}
	else{
		document.getElementById("service_type-validation").style.display = "none";
        document.getElementById("service_type").style.boxShadow = "none";
		document.getElementById("service_typetick").style.display = "block";
	}
}
