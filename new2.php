<?php
require('fpdf/fpdf.php');

class PDF extends FPDF {



        function BuildTable($header,$data) {

        //Colors, line width and bold font

        $this->SetFillColor(255,255,255);

        $this->SetTextColor(0);

        $this->SetDrawColor(0,0,0);

        $this->SetLineWidth(.3);

        $this->SetFont('','B');

        //Header

        // make an array for the column widths

        $w=array(30,70,80);

        // send the headers to the PDF document

        for($i=0;$i<count($header);$i++)

        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);

        $this->Ln();

        //Color and font restoration

        $this->SetFillColor(175);

        $this->SetTextColor(0);

        $this->SetFont('');



        //now spool out the data from the $data array

        $fill=true; // used to alternate row color backgrounds

        foreach($data as $row)

        {

        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);

        // set colors to show a URL style link

        $this->SetTextColor(0,0,0);

        $this->SetFont('');//, 'U');

        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);//, 'http://www.oreilly.com');

        // restore normal color settings

        $this->SetTextColor(0);

        $this->SetFont('');

        $this->Cell($w[2],6,$row[2],'LR',0,'C',$fill);



        $this->Ln();

        // flips from true to false and vise versa

        $fill =! $fill;

        }

        $this->Cell(array_sum($w),0,'','T');

        }

}

$servername="localhost";
$username="root";
$password="z";
$conn=  mysql_connect($servername,$username)or die(mysql_error());
mysql_select_db("test",$conn);


//connect to database

/*$connection = mysql_connect("localhost","root","z");

$db = "test";

mysql_select_db($db, $connection)

        or die( "Could not open $db database");



*/

$sql = 'SELECT * FROM selected ORDER BY Name';

$result = mysql_query($sql, $conn)

        or die( "Could not execute sql: $sql");



// build the data array from the database records.

While($row = mysql_fetch_array($result)) {

        $data[] = array($row['Appl'], $row['Name'], $row['email_id'] );

}



// start and build the PDF document

$pdf = new PDF();



//Column titles

$header=array('Appn. No','Name','Email');



$pdf->SetFont('Arial','',14);

$pdf->AddPage();

// call the table creation method

$pdf->BuildTable($header,$data);

$pdf->Output();


?>
