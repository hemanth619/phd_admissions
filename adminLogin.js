function startValidate(){
	var email = document.getElementById("emailId");
	//alert("deepanshu");
	alert(email.value);
	if($.trim(this.value).length == 0){		
		$('#emailErrorLabel').text("Enter your email-id");					
		//alert(eLabel.value);
	}
	else{
		var emailReg = /^(\w)*([0-9])*@(\w)*([0-9])*.(\.)+(\w)+$/;
    	if(emailReg.test(email)){
    		alert("true");
    	}
    	else{
    		alert("false");	
    	}
	}
}		