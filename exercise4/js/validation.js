function formValidator(){
  //alert("Show something before submitting the page!");
  return false;
}

function notEmpty(elem, helperMsg){
	if(elem.value.length == 0){
		//alert(helperMsg);
		document.getElementById("error")=helperMsg;
		elem.focus(); // set the focus to this input
		return false;
	}
	document.getElementById("error").innerHTML=" ";
    return true;
}

function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		document.getElementById("zip_error").innerHTML=" ";
        return true;
	}else{
		//alert(helperMsg);
        document.getElementById("zip_error").innerHTML=helperMsg;
		elem.focus();
		return false;
	}
}

function isAlphabet(elem, helperMsg){
//alert("in isAlpha");
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		document.getElementById("name_error").innerHTML=" ";
		return true;
	}else{
		//alert(helperMsg);
		//alert(elem.getAttribute("id"));
		document.getElementById("name_error").innerHTML=helperMsg;
		var id = elem.getAttribute("id");
		document.getElementById(id).focus(); 
		
		//elem.focus();
		return false;
	}
}

function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		document.getElementById("addr_error").innerHTML=" ";
        return true;
	}else{
		//alert(helperMsg);
        document.getElementById("addr_error").innerHTML=helperMsg;
		var id = elem.getAttribute("id");
		document.getElementById(id).focus(); 
		
		//elem.focus();
		return false;
	}
}

function lengthRestriction(elem, min, max){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		document.getElementById("usrname_error").innerHTML=" ";
        return true;
	}else{
		document.getElementById("usrname_error").innerHTML="Please enter between " +min+ " and " +max+ " characters";
		var id = elem.getAttribute("id");
		document.getElementById(id).focus(); 
		
		//elem.focus();
		return false;
	}
}

function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){
		//alert(helperMsg);
        document.getElementById("state_error").innerHTML=helperMsg;
		var id = elem.getAttribute("id");
		document.getElementById(id).focus(); 
		
		//elem.focus();
		return false;
	}else{
        document.getElementById("state_error").innerHTML=" ";
		return true;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		document.getElementById("email_error").innerHTML=" ";
        return true;
	}else{
		//alert(helperMsg);
        document.getElementById("email_error").innerHTML=helperMsg;
		var id = elem.getAttribute("id");
		document.getElementById(id).focus(); 
		
		//elem.focus();
		return false;
	}
}