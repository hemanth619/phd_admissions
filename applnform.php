<?PHP
session_start();
include('db.php');
require_once("QOB/qob.php");
/*require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}*/

require_once('backendFunctions.php');
if(!isset($_SESSION['userId']))
{
    RedirectToURL("login.php");
    exit();
}
$userId=$_SESSION['userId'];
$user=getUserByID($userId);
if($user['applicationSubmitStatus']!=1)
{
    RedirectToURL("login.php");
    exit();
}
?>

<?php
require("fpdf/fpdf.php");
class PDF extends FPDF{

function footer()
{
 $this->SetY(-25);
 
    // Select Arial italic 8
    $this->SetFont('Arial','B',12);
	
    // Print centered page number
    $this->Cell(0,10,'Signature Of The Applicant',0,0,'R');

}

}
$userId=$_SESSION['userId'];

$pdf = new PDF( );
$pdf->SetMargins(15,15,15);
$pdf->AddPage('P');
$pdf->Image('images/logo.jpg',15,15,30,30);
$header = "INDIAN INSTITUTE OF INFORMATION TECHNOLOGY,";
$header1 = "DESIGN & MANUFACTURING(IIITD&M),KANCHEEPURAM";
$header2 = "APPLICATION FORM FOR ADMISSION TO Ph.D PROGRAMME";
$pdf->SetFont('Arial','B','12');
$pdf->Cell(40);
$pdf->Cell(100,10,$header,'C');
$pdf->Ln();
$pdf->Cell(40);
$pdf->Cell(100,10,$header1,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B','11');
$pdf->Cell(40);
$pdf->Cell(100,10,$header2,'C');
$pdf->Line(15,45,195,45);
$pdf->Line(15,15,195,15);
$pdf->Line(15,15,15,285);
$pdf->Line(195,15,195,285);
$pdf->Line(15,285,195,285);




    $retrieve = "SELECT * FROM personal_info where userId = '$userId'";

    $result = mysql_query($retrieve) or die(mysql_error());

    $paymentType="1";
    $transactionNo="2";
    while($row = mysql_fetch_array($result))
    {
        $App_no = $_SESSION['applicationNo'];
        $Full_Name = $row['fullName'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $nationality = $row['nationality'];
        $community = $row['community'];
        $fname = $row['fatherName'];
        $pemail = $row['primaryEmail'];
        $aemail = $row['alternateEmail'];
        $Temp_Address = $row['currentAddress'];
        $T_District = $row['currentDistrict'];
        $T_state = $row['currentState'];
        $T_pincode = $row['currentPincode'];
        //$T_phone_number = $row['T_phone_number'];
        $T_mobile_number = $row['mobileNumber'];
        $perm_Address = $row['permanentAddress'];
        $P_District = $row['permanentDistrict'];
        $P_pincode = $row['permanentPincode'];
        $P_state = $row['permanentState'];
        //$P_phone_number = $row['P_phone_number'];
        $P_mobile_number = $row['alternateMobileNumber'];
        $paymentType = $row['paymentType'];
        $transactionNo = $row['transactionNo'];
    }
    $t1 = $Full_Name;

	
$sql3="select discipline,mode from registered_users where userId='$userId'";
$result3=mysql_query($sql3) or die(mysql_error());
$row = mysql_fetch_array($result3);
$sp=$row[0];

/*$sql3="select mode from fgusers3 where username='$t1'";
$result3=mysql_query($sql3) or die(mysql_error());
$row = mysql_fetch_array($result3);*/
$area = $row[1];

$pdf->Ln(15);
//$pdf->Ln(20);
if (file_exists("upload/" .$App_no."_PP.jpg"))
$pdf->Image('upload/'.$App_no.'_PP.jpg',150,70,-300);
else
$pdf->Image('upload/'.$App_no.'_PP.png',150,70,-300);

//$pdf->Ln(20);

$pdf->SetFont('Arial','B',11);
$head = ' Application Number :  ';
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->SetFont('Arial');
$pdf->Cell(25,10,$App_no);
//$pdf->Ln();

$pdf->SetFont('Arial','B',11);
$pdf->Cell(20);
$head = ' Specialization : ';
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->SetFont('Arial');
$pdf->Cell(25,10,$sp);
$pdf->Ln();

$pdf->SetFont('Arial','B',11);
$head = ' Mode : ';
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->SetFont('Arial');
$pdf->Cell(25,10,$area);
$pdf->Ln();

$pdf->SetFont('Arial','B');
$head = ' Full Name : ';
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->SetFont('Arial');
$pdf->Cell(10,10,$Full_Name);
$pdf->Ln();
//$pdf->Ln();

$pdf->SetFont('Arial','B');
$head = ' Name of Father/Husband :   ';
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->SetFont('Arial');
$pdf->Cell(10,10,$fname);
$pdf->Ln();

$pdf->SetFont('Arial','B');
$head = ' Date of Birth (DD-MM-YYYY):  ';
$date = date("d-m-Y", strtotime($dob));
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->SetFont('Arial');
$pdf->Cell(10,10,$date);
//$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','B');
$head = ' Nationality :  ';
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->SetFont('Arial');
$pdf->Cell(10,10,$nationality);
$pdf->Ln();
//$pdf->Ln();


$pdf->SetFont('Arial','B');
$head = ' Sex :  ';
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->SetFont('Arial');
$pdf->Cell(10,10,$gender);
$pdf->Ln();
//$pdf->Ln();


$pdf->SetFont('Arial','B');
$head = ' Community :    ';
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->SetFont('Arial');
$pdf->Cell(10,10,$community);
$pdf->Ln();
/*$head = 'Certificate Attached :';
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->Cell(10,10,$categorycerti);
$pdf->Ln();
//$pdf->Ln();
*/

$pdf->SetFont('Arial','B');
$head = ' Address of Communication :';
$pdf->Cell(2*strlen($head),10,$head,0,1);
$pdf->SetFont('Arial');
$pdf->Cell(10,10," ".$Temp_Address.",".$T_District."-".$T_pincode.",".$T_state);
$pdf->Ln();
// $head = 'Phone : ';
// $pdf->Cell(2*strlen($head),10,$head,0,0);
// $pdf->Cell(10,10,$T_phone_number);
// //$pdf->Ln();
// $pdf->Cell(30);
$pdf->SetFont('Arial','B');
$head = ' Primary Email : ';
$pdf->Cell(2*strlen($head),10,$head,0,0);
$pdf->SetFont('Arial');
$pdf->Cell(10,10,$pemail);
$pdf->Ln();
//$pdf->Ln();

$pdf->SetFont('Arial','B'); $head = ' Permanent Home Address :';
$pdf->Cell(2*strlen($head),10,$head,0,1); $pdf->SetFont('Arial');
$pdf->Cell(10,10," ".$perm_Address.",".$P_District."-".$P_pincode.",".$P_state);
$pdf->Ln(); 
// $head = 'Phone : '; 
// $pdf->Cell(2*strlen($head),10,$head,0,0); // $pdf->Cell(10,10,$P_phone_number); // //$pdf->Ln(); // $pdf->Cell(30);
$pdf->SetFont('Arial','B'); $head = ' Alternate Email : ';
$pdf->Cell(2*strlen($head),10,$head,0,0); $pdf->SetFont('Arial');
$pdf->Cell(10,10,$aemail); $pdf->Ln();

$pdf->SetFont('Arial','B');
$head = ' Payment Details:';
$pdf->Cell(2*strlen($head),10,$head,0,1);

$head=" Payment Type: ";
$pdf->Cell(2*strlen($head),10,$head,0,0);
/*$pdf->SetFont('Arial');
$pdf->Cell(2*strlen($paymentType),10,$paymentType,0,1);
$head="Transaction Number:";
$pdf->SetFont('Arial','B');
$pdf->Cell(strlen($head),10,$head,0,1);
$pdf->SetFont('Arial');
$pdf->Cell(strlen($transactionNo),10,$transactionNo,0,1);*/

if($paymentType=="onlineTransfer")
{
    $pdf->SetFont('Arial');
    $head=$paymentType="Online Transfer";
    $pdf->Cell(2*strlen($head),10,$head,0,1);
    
    $head=" Transaction Number:";
    $pdf->SetFont('Arial','B');
    $pdf->Cell(2*strlen($head),10,$head,0,0);
    $pdf->SetFont('Arial');
    $pdf->Cell(2*strlen($transactionNo),10,$transactionNo,0,1);
}
else
{
    $pdf->SetFont('Arial');
    $head=$paymentType="Demand Draft";
    $pdf->Cell(2*strlen($head),10,$head,0,1);

    $head=" Demand Draft No. :";
    $pdf->SetFont('Arial','B');
    $pdf->Cell(2*strlen($head),10,$head,0,0);
    $pdf->SetFont('Arial');
    $pdf->Cell(2*strlen($transactionNo),10,$transactionNo,0,1);
}
//$pdf->Ln();

//***********END OF FORM1***********

//**************FORM-2**********
$sql1 = "select * from qualifications where userId='$userId'";
 // $sql1="insert into personal_info(App_no) values ('$temp')";
  $result1=mysql_query($sql1) or die(mysql_error());
  if(!$result1||mysql_num_rows($result1)<1){//echo 'empty result';
  }
  else
  {
    while($row = mysql_fetch_array($result1))
            {
                $univ_10 = $row['10_instituteName'];
                $univ_12 = $row['12_instituteName'];
                $univ_bd = $row['ug_university'];
                $univ_pg = $row['pg_university'];
                //$univ_o = $row['o_univ'];
                $degree_10 = $row['10_degreeName'];
                $degree_12 = $row['12_degreeName'];
                $degree_bd = $row['ug_degreeName'];
                $degree_pg = $row['pg_degreeName'];
                //$degree_o = $row['o_degree'];
                $marks_10 = $row['10_aggregate'];
                $marks_12 = $row['12_aggregate'];
                $marks_bd = $row['ug_aggregate'];
                $marks_pg = $row['pg_aggregate'];
                //$marks_o = $row['o_marks'];
                $grade_10 = $row['10_gradeFormat'];
                $grade_12 = $row['12_gradeFormat'];
                $grade_bd = $row['ug_gradeFormat'];
                $grade_pg = $row['pg_gradeFormat'];
                //$grade_o = $row['o_grade'];
                $year_10 = $row['10_yearOfPassing'];
                $year_12 = $row['12_yearOfPassing'];
                $year_bd = $row['ug_yearOfPassing'];
                $year_pg = $row['pg_yearOfPassing'];
                //$year_o = $row['o_year'];
                // $bd_1 = $row['bd_1'];
                // $bd_2 = $row['bd_2'];
                // $bd_3 = $row['bd_3'];
                // $bd_4 = $row['bd_4'];
                // $bd_5 = $row['bd_5'];
                // $bd_6 = $row['bd_6'];
                // $bd_7 = $row['bd_7'];
                // $bd_8 = $row['bd_8'];
                // $bd_9 = $row['bd_9'];
                // $bd_10 = $row['bd_10'];
                // $md_1 = $row['md_1'];
                // $md_2 = $row['md_2'];
                // $md_3 = $row['md_3'];
                // $md_4 = $row['md_4'];
                // $md_agr = $row['md_agr'];
                // $bd_agr = $row['bd_agr'];
                // $md_class = $row['md_class'];
                // $bd_class = $row['bd_class'];
            }
  }
 
$pdf->SetFont('Arial','B');
$head = ' Education Details :';
$pdf->Cell(2*strlen($head),10,$head,0,1);
$col_widths = array(45, 65, 30, 20, 20,);
$headers = array("Degree with discipline", "University", "Grade Format", "Marks*", "Year*"); 
$rows = array();
$rows[] = array($degree_10,$univ_10,$grade_10,$marks_10,$year_10);
$rows[] = array($degree_12,$univ_12,$grade_12,$marks_12,$year_12);
$rows[] = array($degree_bd,$univ_bd,$grade_bd,$marks_bd,$year_bd);
$rows[] = array($degree_pg,$univ_pg,$grade_pg,$marks_pg,$year_pg);
$row_line_heights = array(4, 4, 4, 4);

for($i = 0; $i < count($headers); $i++) {
            $pdf->Cell($col_widths[$i], 5, $headers[$i], 1, 0, 'C');
        }

        $pdf->Ln();
		
		
/*
$x = $pdf->GetX();
for($col = 0; $col < count($headers); $col++) {
            $yBeforeCell = $pdf->GetY();
                $borders = 'LB' . ($col + 1 == count($col_widths) ? 'R' : ''); // Only add R for last col
                $pdf->MultiCell($col_widths[$col], $row_line_heights[$r], $headers[$col], $borders);
                $yCurrent = $pdf->GetY();
                $rowHeight = $yCurrent - $yBeforeCell;
                $pdf->SetXY($x + $col_widths[$col], $yCurrent - $rowHeight);
                $x = $pdf->GetX();
            }
        $pdf->Ln();*/
$pdf->SetFont('Arial','','10');
        
        for ($r = 0; $r < count($rows); $r++) {

            $row = $rows[$r];
            $x = $pdf->GetX();

            for ($col = 0; $col < count($col_widths); $col++) {
                $yBeforeCell = $pdf->GetY();
                $borders = 'LB' . ($col + 1 == count($col_widths) ? 'R' : ''); // Only add R for last col
                $pdf->MultiCell($col_widths[$col], $row_line_heights[$r], $row[$col], $borders);
                $yCurrent = $pdf->GetY();
                $rowHeight = $yCurrent - $yBeforeCell;
                $pdf->SetXY($x + $col_widths[$col], $yCurrent - $rowHeight);
                $x = $pdf->GetX();
            }

            $pdf->Ln($rowHeight); // Line-feed at last cell height to start a new row
        }
        

/*
$pdf->SetFont('Arial','B');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$head = 'Signature of the Applicant :';
$pdf->Cell(strlen($head),10,$head,0,1);
$pdf->Ln();*/
$pdf->Output();
//$pdf->Output("Final.pdf",F);

?>



