<?php

//Important Helper Functions
//Author - Hari Krishna Majety


//Checks whether the string has only alphabets and numbers. Returns false if not or if string is empty.  
function hasOnlyAlphaNumerics($string)
{
	$regex="/^[A-Za-z0-9\s]+$/";
	if(preg_match($regex, $string))
	{
		return true;
	}
	else
	{
		return false;
	}
}

//Checks whether the string has only alphabets. Returns false if not or if string is empty.
function hasOnlyAlphabets($string)
{
	$regex="/^[A-Za-z\s]+$/";
	if(preg_match($regex, $string))
	{
		return true;
	}
	else
	{
		return false;
	}
}

//Checks whether the string passed has only numbers. Returns false if not or if string is empty.
function hasOnlyNumbers($string)
{
	$regex="/^[0-9]+$/";
	if(preg_match($regex, $string))
	{
		return true;
	}
	else
	{
		return false;
	}
}

//Checks Whether the string has only the charaters passed to it(as concatenated string) or not. Returns false if not or if string is empty.
function hasOnlyCharacters($characters,$string)
{
	$regex="/^[".$characters."]+$/";
	if(preg_match($regex, $string))
	{
		return true;
	}
	else
	{
		return false;
	}
}


function followsRegex($regex,$string)
{
	if(preg_match($regex, $string))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function validateRegisterFormEntries($formVars)
{
	$emailAddress = trim($formVars['emailAddress']);
	$discipline = trim($formVars['discipline']);
	$modeOfRegistration = trim($formVars['modeOfRegistration']);

	$password = trim($formVars['password']);
	$confirmPassword = trim($formVars['confirmPassword']);
	if($emailAddress=="" || $discipline== "" || $modeOfRegistration==""|| $password=="" || $confirmPassword=="")
	{
		displayAlert("Please Fill All The Fields");
		return false;
	}
	else
	{
		if($modeOfRegistration!="httra" && $modeOfRegistration!="nhttra" && $modeOfRegistration!="internal" && $modeOfRegistration!="external" )
		{
			displayAlert("Enter a valid mode of Registration");
			return false;
		}

		if(!filter_var($emailAddress,FILTER_VALIDATE_EMAIL))
		{
			displayAlert("Enter A valid Email Address.");
			return false;
		}

		if($discipline!="Computer Engineering" && $discipline!="Electronics" && $discipline!="Mechanical" && $discipline!="Mathematics" && $discipline!="Physics")
		{
			displayAlert("Enter A valid Discipline.");
			return false;
		}
		return true;
	}
}

function validateDate($rawDate,$seperator='-')
	{
		//var_dump($rawDate);
		$ndate=explode($seperator,$rawDate);
		//var_dump($ndate);
		$currentYear=(int)date('Y',time());
		$acceptableMinimumAge=15;
		$acceptableInputYear=$currentYear-$acceptableMinimumAge;
		$ndate[0]=(int)$ndate[0];
		$ndate[1]=(int)$ndate[1];
		$ndate[2]=(int)$ndate[2];
		if(in_array('',$ndate))
		{
			return false;
		}
		if($ndate[2]>$acceptableInputYear)
		{
			return false;
		}
		if($ndate[2]%4==0)
		{
			$daysArray=[31,29,31,30,31, 30,31,31,30,31, 30,31];
			if($ndate[1]>=1&&$ndate[1]<=12)
			{
				if($ndate[0]>0&&$ndate[0]<=$daysArray[$ndate[1]-1])
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			$daysArray=[31,28,31,30,31, 30,31,31,30,31, 30,31];
			if($ndate[1]>=1&&$ndate[1]<=12)
			{
				if($ndate[0]>0&&$ndate[0]<=$daysArray[$ndate[1]-1])
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
	}

function dateStringToTimestamp($dateString,$seperator='-')
{
	$isValidDate=validateDate($dateString,$seperator);
	//var_dump($isValidDate);
	if($isValidDate)
	{
		$splitDate=explode($seperator,$dateString);
		$year=$splitDate[2];
		$month=$splitDate[1];
		$day=$splitDate[0];
		$timestamp = mktime(0, 0, 0, $month, $day, $year);
		return $timestamp;
	}
	else
	{
		return false;
	}
}

function isValidPercentage($string)
{
	if(preg_match('/(^[0-9]{1,2}$)|(^[0-9]{1,2}\.[0-9]{1,}$)/',$string))
		return true;
	else
		return false;
}

//if($_POST["Full_Name"]!="" || $_POST["gender"]!="" || $_POST["date1"] !=""  || $_POST["fname"]!="" || $_POST["Nationality"]!="" || $_POST["Marital_status"]!="" || $_POST["Physically_challenged"]!="" || $_POST["community"]!="" || $_POST["pemail"]!="" || $_POST["aemail"]!="" || $_POST["Temp_Address"]!="" || $_POST["T_District"]!="" || $_POST["T_state"]!="" || $_POST["T_pincode"]!="" || $_POST["T_phone_number"]!="" ||$_POST["T_mobile_number"]!="" || $_POST["perm_Address"]!="" || $_POST["P_District"]!="" || $_POST["P_state"]!="" || $_POST["P_pincode"]!="" || $_POST["P_phone_number"]!="" ||$_POST["P_mobile_number"]!="")
function validatePersonalInfoOnSave($personalInfo)
{
	//$count=0;
	$message='';
	//1
	if(trim($personalInfo['Full_Name'])!='')
	{
		$fullName=$personalInfo['Full_Name'];
		if(!hasOnlyAlphabets($fullName))
		{
			$message='Enter a Valid name. Only Alphabets.\\n';
		}
		/*else
		{
			$count++;
		}*/
	}
	
	if($personalInfo['gender']!='Male'&&$personalInfo['gender']!='Female')
	{
		$message.='Enter Gender.\\n';
	}
	//2
	if($personalInfo['date1']!='')
	{
		$currentTimestamp=time();
		$dob=dateStringToTimestamp($personalInfo['date1'],'-');
		if($dob==false)
		{
			$message.="Enter a Valid date in Date Of Birth.\\n";
		}
		else if($dob>=$currentTimestamp)
		{
			$message.="Date of Birth cant be greater than current date.\\n";
		}

		/*else
		{
			$count++;
		}*/
	}
	//3
	if(trim($personalInfo['fname']!=""))
	{
		if(!hasOnlyAlphabets($personalInfo['fname']))
		{
			$message.="Enter a Valid Father's Name. Only Alphabets are Allowed\\n";
		}
		/*else
		{
			$count++;
		}*/
	}

	if(trim($personalInfo['pemail']!=''))
	{
		if(!(filter_var($personalInfo['pemail'], FILTER_VALIDATE_EMAIL)))
		{
			$message.="Enter a valid Primary Email Address.\\n";
		}
		/*else
		{
			$count++;
		}*/
	}
	
	if(trim($personalInfo['aemail']!=''))
	{
		$check=true;
		if(!(filter_var($personalInfo['aemail'], FILTER_VALIDATE_EMAIL)))
		{
			$message.="Enter a valid Alternate Email Address.\\n";
			$check=false;
		}

		if(trim($personalInfo['pemail']==""))
		{
			$message.='Fill Primary Email first.<br/>';
			$check=false;
		}

		if(trim($personalInfo['pemail'])!=''&&trim($personalInfo['pemail'])==trim($personalInfo['aemail']))
		{
			$message.="Primary and Alternate Email Can't be same. Fill in different one else leave it.\\n";
			$check=false;
		}
		
	}

	/*if($personalInfo['Temp_Address']!='')
	{
		$count++;
	}*/

	if(trim($personalInfo['T_pincode'])!='')
	{
		if(!hasOnlyCharacters('0-9-',$personalInfo['T_pincode']))
		{
			$message.="Please Enter  Valid Pincode. Numerics Only.\\n";
		}
		/*else
		{
			$count++;
		}*/
	}

	/*if(trim($personalInfo['T_phone_number'])!='')
	{

		if(!hasOnlyNumbers($personalInfo['T_phone_number']))
		{
			$message.="Please Enter Valid phone number. Enter Only Numbers.\\n";
		}
		/*else
		{
			$count++;
		}*/
	//}

	if(trim($personalInfo['T_mobile_number'])!='')
	{
		if(!hasOnlyNumbers($personalInfo['T_mobile_number']))
		{
			$message.="Please Enter Valid mobile number. Enter Only Numbers.\\n";
		}
		/*else
		{
			$count++;
		}*/
		if($personalInfo['T_mobile_country_code']=="")
		{
			$message.="Country Code for Mobile Number Is Compulsory.\\n";
		}
		else if(!hasOnlyNumbers($personalInfo['T_mobile_country_code']))
		{
			$message.="Country Code for Mobile Number should be a Number";
		}
	}

	/*if($personalInfo['perm_Address']!='')
	{
		$count++;
	}*/

	if(trim($personalInfo['P_pincode'])!='')
	{
		if(!hasOnlyCharacters('0-9-',$personalInfo['P_pincode']))
		{
			$message.="Enter Valid Pincode in Permanent Address.\\n";
		}
		/*else
		{
			$count++;
		}*/
	}

/*	if($personalInfo['P_phone_number']!='')
	{
		if(!hasOnlyNumbers($personalInfo['P_phone_number']))
		{
			$message.="Enter valid phone number in Permanent Address. Enter Only Numbers.\\n";
		}
		/*else
		{
			$count++;
		}*/
	//}

	if($personalInfo['P_mobile_number']!='')
	{
		if(!hasOnlyNumbers($personalInfo['P_mobile_number']))
		{
			$message.="Enter Valid mobile number in Permanent Address. Enter Only Numbers.\\n";
		}
		/*else
		{
			$count++;
		}*/
		if($personalInfo['P_mobile_country_code']=="")
		{
			$message.="Country Code for Alternate Mobile Number Is Compulsory.\\n";
		}
		else if(!hasOnlyNumbers($personalInfo['P_mobile_country_code']))
		{
			$message.="Country Code for Alternate Mobile Number should be a Number";
		}
	}

	
		return $message;
	
}


function validateQualificationsInfoOnSave($qualificationsInfo){
	$message='';
	/**********  CLASS 10 validation  ************/
	if(trim($qualificationsInfo["univ_10"])!=''){
		$univName_10 = $qualificationsInfo["univ_10"];
		if(!hasOnlyAlphabets($univName_10)){
			$message = $message."Enter the valid class 10 Board name. Only Alphabhets.\\n";
		}
	}
	//var_dump($qualificationsInfo["grade_10"]);
	if(($qualificationsInfo["grade_10"]!='MAR-100') && ($qualificationsInfo["grade_10"]!='CGP-10') && ($qualificationsInfo["grade_10"]!='CPI-4') && ($qualificationsInfo["grade_10"]!='CPI-8') ){
		$message = $message."Enter valid 10th Evalution of marks.\\n";
	}
	if(trim($qualificationsInfo["marks_10"])!=''){
		//var_dump($qualificationsInfo["marks_10"]);
		$marks_10 = $qualificationsInfo["marks_10"];
		if(!isValidPercentage($marks_10)){
			$message = $message."Enter valid percentage for class 10.\\n";
		}
	}
	if(trim($qualificationsInfo["year_10"])!=''){
		$passYear_10 = $qualificationsInfo["year_10"];
		if(!hasOnlyNumbers($passYear_10)){
			$message = $message."Enter valid year of passsing for class 10th.\\n";
		}
	}
	/*********  CLASS 12 Validation  ************/
	if(trim($qualificationsInfo["univ_12"])!=''){
		$univName_12 = $qualificationsInfo["univ_12"];
		if(!hasOnlyAlphabets($univName_12)){
			$message = $message."Enter the valid class 12th Board name. Only Alphabhets.\\n";
		}
	}
	if(($qualificationsInfo["grade_12"]!='MAR-100') && ($qualificationsInfo["grade_12"]!='CGP-10') && ($qualificationsInfo["grade_12"]!='CPI-4') && ($qualificationsInfo["grade_12"]!='CPI-8') ){
		$message = $message."Enter valid Evalution of marks for class 12th.\\n";
	}
	if($qualificationsInfo["marks_12"]!=''){
		$marks_12 = $qualificationsInfo["marks_12"];
		if(!isValidPercentage($marks_12)){
			$message = $message."Enter valid percentage for class 12.\\n";
		}
	}
	if($qualificationsInfo["year_12"]!=''){
		$passYear_12 = $qualificationsInfo["year_12"];
		if(!hasOnlyNumbers($passYear_12)){
			$message = $message."Enter valid year of passsing for Board 12.\\n";
		}
	}
	/************ bachelor degree validation  ***************/
	if(trim($qualificationsInfo["bd_univ"])!=''){
		$bd_univName = $qualificationsInfo["bd_univ"];
		if(!hasOnlyAlphabets($bd_univName)){
			$message = $message."Enter the valid Bachelor Degree University name. Only Alphabhets.\\n";
		}
	}
	if(trim($qualificationsInfo["bd_degree"])!=''){
		$bd_degree = $qualificationsInfo["bd_degree"];
		if(!hasOnlyAlphaNumerics($bd_degree)){
			$message = $message."Enter the Valid Bachelor Degree Equivalent.\\n";
		}
	}
	if(($qualificationsInfo["bd_grade"]!='MAR-100') && ($qualificationsInfo["bd_grade"]!='CGP-10') && ($qualificationsInfo["bd_grade"]!='CPI-4') && ($qualificationsInfo["bd_grade"]!='CPI-8') ){
		$message = $message."Enter valid Evalution of marks for Bachelor degree.\\n";
	}
	if($qualificationsInfo["bd_marks"]!=''){
		$bd_marks = $qualificationsInfo["bd_marks"];
		if(!isValidPercentage($bd_marks)){
			$message = $message."Enter valid percentage for Bachelor Degree.\\n";
		}
	}
	if($qualificationsInfo["bd_year"]!=''){
		$passYear_bd = $qualificationsInfo["bd_year"];
		if(!hasOnlyNumbers($passYear_bd)){
			$message = $message."Enter valid year of passsing for Bachelor Degree.\\n";
		}
	}
	/**************  Masters degree validation  ****************/
	if(trim($qualificationsInfo["pg_univ"])!=''){
		$pg_univName = $qualificationsInfo["pg_univ"];
		if(!hasOnlyAlphabets($pg_univName)){
			$message = $message."Enter the valid Masters Degree University name. Only Alphabhets.\\n";
		}
	}
	if(trim($qualificationsInfo["pg_degree"])!=''){
		$pg_degree = $qualificationsInfo["pg_degree"];
		if(!hasOnlyAlphaNumerics($pg_degree)){
			$message = $message."Enter the Valid Masters Degree Equivalent.\\n";
		}
	}
	if(($qualificationsInfo["pg_grade"]!='MAR-100') && ($qualificationsInfo["pg_grade"]!='CGP-10') && ($qualificationsInfo["pg_grade"]!='CPI-4') && ($qualificationsInfo["pg_grade"]!='CPI-8') ){
		$message = $message."Enter valid Evalution of marks for Masters degree.\\n";
	}
	if($qualificationsInfo["pg_marks"]!=''){
		$pg_marks = $qualificationsInfo["pg_marks"];
		if(!isValidPercentage($pg_marks)){
			$message = $message."Enter valid percentage for Masters Degree.\\n";
		}
	}
	if($qualificationsInfo["pg_year"]!=''){
		$passYear_pg = $qualificationsInfo["pg_year"];
		if(!hasOnlyNumbers($passYear_pg)){
			$message = $message."Enter valid year of passsing for masters degree.\\n";
		}
	}
	/**************   Other degree validation  ********************/
/*	if(trim($qualificationsInfo["o_univ"])!=''){
		$o_univName = $qualificationsInfo["o_univ"];
		if(!hasOnlyAlphabets($o_univName)){
			$message = $message."Enter the valid others Degree University name. Only Alphabhets.\\n";
		}
	}
	if(trim($qualificationsInfo["o_degree"])!=''){
		$o_degree = $qualificationsInfo["o_degree"];
		if(!hasOnlyAlphaNumerics($o_degree)){
			$message = $message."Enter the Valid others Degree Equivalent.\\n";
		}
	}
	if(($qualificationsInfo["o_grade"]!='MAR-100') && ($qualificationsInfo["o_grade"]!='CGP-10') && ($qualificationsInfo["o_grade"]!='CPI-4') && ($qualificationsInfo["o_grade"]!='CPI-8') ){
		$message = $message."Enter valid Evalution of marks for others.\\n";
	}
	if($qualificationsInfo["o_marks"]!=''){
		$o_marks = $qualificationsInfo["o_marks"];
		if(!isValidPercentage($o_marks)){
			$message = $message."Enter valid percentage for other Degree.\\n";
		}
	}
	if($qualificationsInfo["o_year"]!=''){
		$passYear_o = $qualificationsInfo["o_year"];
		if(!hasOnlyNumbers($passYear_o)){
			$message = $message."Enter valid year of passsing for other.\\n";
		}
	}*/
	/************* B.tech CGPA validation *************/
/*	if($qualificationsInfo["bd_1"]!=''){
		$bd_cgpa1 = $qualificationsInfo["bd_1"];
		if(!isValidPercentage($bd_cgpa1)){
			$message = $message."Enter valid percentage for B.E/B.tech I sem.\\n";
		}
	}
	if($qualificationsInfo["bd_2"]!=''){
		$bd_cgpa2 = $qualificationsInfo["bd_2"];
		if(!isValidPercentage($bd_cgpa1)){
			$message = $message."Enter valid percentage for B.E/B.tech II sem.\\n";
		}
	}
	if($qualificationsInfo["bd_3"]!=''){
		$bd_cgpa3 = $qualificationsInfo["bd_3"];
		if(!isValidPercentage($bd_cgpa1)){
			$message = $message."Enter valid percentage for B.E/B.tech III sem.\\n";
		}
	}
	if($qualificationsInfo["bd_4"]!=''){
		$bd_cgpa4 = $qualificationsInfo["bd_4"];
		if(!isValidPercentage($bd_cgpa1)){
			$message = $message."Enter valid percentage for B.E/B.tech IV sem.\\n";
		}
	}
	if($qualificationsInfo["bd_5"]!=''){
		$bd_cgpa5 = $qualificationsInfo["bd_5"];
		if(!isValidPercentage($bd_cgpa1)){
			$message = $message."Enter valid percentage for B.E/B.tech V sem.\\n";
		}
	}
	if($qualificationsInfo["bd_6"]!=''){
		$bd_cgpa6 = $qualificationsInfo["bd_6"];
		if(!isValidPercentage($bd_cgpa1)){
			$message = $message."Enter valid percentage for B.E/B.tech VI sem.\\n";
		}
	}
	if($qualificationsInfo["bd_7"]!=''){
		$bd_cgpa7 = $qualificationsInfo["bd_7"];
		if(!isValidPercentage($bd_cgpa1)){
			$message = $message."Enter valid percentage for B.E/B.tech VII sem.\\n";
		}
	}
	if($qualificationsInfo["bd_8"]!=''){
		$bd_cgpa8 = $qualificationsInfo["bd_8"];
		if(!isValidPercentage($bd_cgpa1)){
			$message = $message."Enter valid percentage for B.E/B.tech VIII sem.\\n";
		}
	}
	if($qualificationsInfo["bd_9"]!=''){
		$bd_cgpa9 = $qualificationsInfo["bd_9"];
		if(!isValidPercentage($bd_cgpa1)){
			$message = $message."Enter valid percentage for B.E/B.tech IX sem.\\n";
		}
	}
	if($qualificationsInfo["bd_10"]!=''){
		$bd_cgpa10 = $qualificationsInfo["bd_10"];
		if(!isValidPercentage($bd_cgpa1)){
			$message = $message."Enter valid percentage for B.E/B.tech X sem.\\n";
		}
	}*/
/*	if($qualificationsInfo["bd_agr"]!=''){
		$bd_cgpaagr = $qualificationsInfo["bd_agr"];
		if(!isValidPercentage($bd_cgpaagr)){
			$message = $message."Enter valid aggregate percentage for B.E/B.tech.\\n";
		}
	}*/
/*	if(trim($qualificationsInfo["bd_class"])!=''){
		$bd_agrclass = $qualificationsInfo["bd_class"];
		if(!hasOnlyAlphaNumerics($bd_agrclass)){
			$message = $message."Enter valid class for B.E/B.tech.\\n";
		}
	}
	if($qualificationsInfo["md_1"]!=''){
		$md_cgpa1 = $qualificationsInfo["md_1"];
		if(!isValidPercentage($md_cgpa1)){
			$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		}
	}
	if($qualificationsInfo["md_2"]!=''){
		$md_cgpa2 = $qualificationsInfo["md_2"];
		if(!isValidPercentage($md_cgpa2)){
			$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		}
	}
	if($qualificationsInfo["md_3"]!=''){
		$md_cgpa3 = $qualificationsInfo["md_3"];
		if(!isValidPercentage($md_cgpa3)){
			$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		}
	}
	if($qualificationsInfo["md_4"]!=''){
		$md_cgpa4 = $qualificationsInfo["md_4"];
		if(!isValidPercentage($md_cgpa4)){
			$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		}
	}*/
/*	if($qualificationsInfo["md_agr"]!=''){
		$md_cgpaagr = $qualificationsInfo["md_agr"];
		if(!isValidPercentage($md_cgpaagr)){
			$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		}
	}
	if(trim($qualificationsInfo["md_class"])!=''){
		$md_agrClass = $qualificationsInfo["md_class"];
		if(!hasOnlyAlphaNumerics($md_agrClass)){
			$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		}
	}*/


		return $message;

}


function validateExperienceInfoOnSave($experienceInfo)
{
	//$sql2="insert into  experience(user_ex,org_1,des_1,per_1,work_1,org_2,des_2,per_2,work_2,org_3,des_3,per_3,work_3,org_4,des_4,per_4,work_4,org_5,des_5,per_5,work_5) values('$t','$_POST[org_1]' , '$_POST[des_1]' , '$_POST[per_1]' , '$_POST[work_1]' , '$_POST[org_2]' , '$_POST[des_2]' , '$_POST[per_2]' , '$_POST[work_2]' , '$_POST[org_3]' , '$_POST[des_3]' , '$_POST[per_3]' , '$_POST[work_3]' , '$_POST[org_4]' , '$_POST[des_4]' , '$_POST[per_4]' , '$_POST[work_4]' , '$_POST[org_5]' , '$_POST[des_5]' , '$_POST[per_5]' , '$_POST[work_5]' )";
	$message='';
	if(trim($experienceInfo['org_1'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['org_1']))
		{
			$message.="Enter a Valid Organisation name. Only Alphanumerics are Allowed in Work Experience 1.\\n";
		}
	}

	if(trim($experienceInfo['des_1'])!='')
	{
		if(!hasOnlyAlphabets($experienceInfo['des_1']))
		{
			$message.="Enter A valid Designation. Only Alphabets are Allowed in Work Experience 1.\\n";
		}
	}

	if(trim($experienceInfo['per_1'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['per_1']))
		{
			$message.="Enter A valid Experience Period. Only Alpha Numerics are Allowed in Work Experience 1.\\n";
		}
	}

	if(trim($experienceInfo['work_1'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['work_1']))
		{
			$message.="Only Alpha Numerics are allowed in Nature Of work in work Experience 1.\\n";
		}
	}



	//Work Exp 2

	if(trim($experienceInfo['org_2'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['org_2']))
		{
			$message.="Enter a Valid Organisation name. Only Alphanumerics are Allowed in Work Experience 2.\\n";
		}
	}

	if(trim($experienceInfo['des_2'])!='')
	{
		if(!hasOnlyAlphabets($experienceInfo['des_2']))
		{
			$message.="Enter A valid Designation. Only Alphabets are Allowed in Work Experience 2.\\n";
		}
	}

	if(trim($experienceInfo['per_2'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['per_2']))
		{
			$message.="Enter A valid Experience Period. Only Alpha Numerics are Allowed in Work Experience 2.\\n";
		}
	}

	if(trim($experienceInfo['work_2'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['work_2']))
		{
			$message.="Only Alpha Numerics are allowed in Nature Of work in work Experience 2.\\n";
		}
	}

	//work exp 3

	/*if(trim($experienceInfo['org_3'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['org_3']))
		{
			$message.="Enter a Valid Organisation name. Only Alphanumerics are Allowed in Work Experience 3.\\n";
		}
	}

	if(trim($experienceInfo['des_3'])!='')
	{
		if(!hasOnlyAlphabets($experienceInfo['des_3']))
		{
			$message.="Enter A valid Designation. Only Alphabets are Allowed in Work Experience 3.\\n";
		}
	}

	if(trim($experienceInfo['per_3'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['per_3']))
		{
			$message.="Enter A valid Experience Period. Only Alpha Numerics are Allowed in Work Experience 3.\\n";
		}
	}

	if(trim($experienceInfo['work_3'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['work_3']))
		{
			$message.="Only Alpha Numerics are allowed in Nature Of work in work Experience 3.\\n";
		}
	}


	//work exp 4
	if(trim($experienceInfo['org_4'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['org_4']))
		{
			$message.="Enter a Valid Organisation name. Only Alphanumerics are Allowed in Work Experience 4.\\n";
		}
	}

	if(trim($experienceInfo['des_4'])!='')
	{
		if(!hasOnlyAlphabets($experienceInfo['des_4']))
		{
			$message.="Enter A valid Designation. Only Alphabets are Allowed in Work Experience 4.\\n";
		}
	}

	if(trim($experienceInfo['per_4'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['per_4']))
		{
			$message.="Enter A valid Experience Period. Only Alpha Numerics are Allowed in Work Experience 4.\\n";
		}
	}

	if(trim($experienceInfo['work_4'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['work_4']))
		{
			$message.="Only Alpha Numerics are allowed in Nature Of work in work Experience 4.\\n";
		}
	}

	//work exp 5

	if(trim($experienceInfo['org_5'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['org_5']))
		{
			$message.="Enter a Valid Organisation name. Only Alphanumerics are Allowed in Work Experience 5.\\n";
		}
	}

	if(trim($experienceInfo['des_5'])!='')
	{
		if(!hasOnlyAlphabets($experienceInfo['des_5']))
		{
			$message.="Enter A valid Designation. Only Alphabets are Allowed in Work Experience 5.\\n";
		}
	}

	if(trim($experienceInfo['per_5'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['per_5']))
		{
			$message.="Enter A valid Experience Period. Only Alpha Numerics are Allowed in Work Experience 5.\\n";
		}
	}

	if(trim($experienceInfo['work_5'])!='')
	{
		if(!hasOnlyAlphaNumerics($experienceInfo['work_5']))
		{
			$message.="Only Alpha Numerics are allowed in Nature Of work in work Experience 5.\\n";
		}
	}*/

	return $message;

}




?>