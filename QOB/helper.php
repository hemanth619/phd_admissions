








<?php
 /***************************************************************************************
 * functions_helper.php - a source which contains may helper functions needed by core functions

 * Purpose: it includes definitions for various basic functions like time stamp, alert etc

 * Major changes made:
   Date          Time        Description
   23-05-2014    14:42:26    file was created 
   27-06-2014    12:46:30    file was fully commented and optimized

 * Bug fixes:
   Date          Time        Description

 * Developer: Battinoju Sai Kumar, 16/6/2014, 14:42:26

 * Comments:
   This file needs to be modified when more helper functions are required

 ***************************************************************************************/



 
 
 
 
 
 
/*********************************************************************
 * insertLog - this function is used to write all the error messages onto the log file

 * Returns: nothing

 * Arguments: errorMessage - Error message to be recorded
              fileName - error log file name, default - LOG_FILE

 * Method: it creates the new file if the log file is not yet created and appends the error messages
           of particular format

 * Bugs: None

 * To be done: nothing
*********************************************************************/
function insertLog($errorMessage, $fileName = LOG_FILE)
  {
	$fp = fopen($fileName, "a");//creates file if it does not exist

	fputs($fp, $errorMessage);//appends the information onto the file
	
	fclose($fp);//close the file pointer
  }/*End of insertLog */

  
  
  





/*********************************************************************
 * timeStamp - this function is used to return the date time in yyyy-mm-dd hh:mm:ss format

 * Returns: data and time in a specific format

 * Arguments: seconds - time stamp in seconds, default: current time stamp seconds

 * Method: time stamp is decoded to get the required representation of date and time

 * Bugs: None

 * To be done: nothing
*********************************************************************/
function timeStamp($seconds = C_TIME)
  {
    return date("Y",$seconds)."-".date("m",$seconds)."-".date("d",$seconds)." ".date("H",$seconds).":".date("i",$seconds).":".date("s",$seconds);
  }/*End of timeStamp */

  
  
  
  
  
  
  
  
?>