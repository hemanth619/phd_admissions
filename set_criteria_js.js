$(document).ready(function(){	
	$('#submit_criteria').click(function(){
		//alert("clicked");
		var cgpaValue = document.getElementById('ug_min_cgpa').value;

		if(cgpaValue != ""){
			//alert(cgpaValue);
			//check_cgpa(cgpaValue);	
		}		
	})
});

function check_cgpa(value){
	//alert("inside function");
	//alert(value);
	var regExp = "^\d$";
	if(value.match(regExp)){
		alert("yes");
	}
	else{
		alert("no");
	}
}