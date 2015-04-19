
<?php
require('fpdf/fpdf.php');

class PDF extends FPDF {
private $PG_W = 190;
public $nap;
public $nsc;
public $ug;
public $pg;
public function Header() {
        
        $this->SetFont('Arial', 'B', 16);
        $this->Cell($this->PG_W, 8, "Shortlisted Candidates (ST Category)", 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Arial', '', 12);
        
        $this->Cell($this->PG_W / 5, 5, "No of Applicants :", 0, 0, 'L');
        $this->Cell($this->PG_W / 6, 5, $this->nap, 0, 0, 'L');
        $this->Cell($this->PG_W / 3, 5, "No of shortlisted candidates :", 0, 0, 'L');
        $this->Cell($this->PG_W / 6, 5, $this->nsc, 0, 0, 'L');       

        $this->Ln(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell($this->PG_W, 5, "Cutoff", 0, 0, 'L');
        $this->Ln();
        $this->SetFont('Arial', '', 12);
        $this->Cell($this->PG_W / 4, 5, "UG CGPA :", 0, 0, 'L');
        $this->Cell($this->PG_W / 4, 5, $this->ug, 0, 0, 'L');      
        $this->Cell($this->PG_W / 4, 5, "PG CGPA :", 0, 0, 'L');
        $this->Cell($this->PG_W / 4, 5, $this->pg, 0, 'L');      
        
        $this->Ln(10);
    }

        function BuildTable($header,$data) {

        //Colors, line width and bold font

        $this->SetFillColor(255,255,255);

        $this->SetTextColor(0);

        $this->SetDrawColor(0,0,0);

        $this->SetLineWidth(.3);

        $this->SetFont('','B');

        //Header

        // make an array for the column widths

        $w=array(30,50,20,50,20,20);

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

$this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
$this->Cell($w[4],6,$row[4],'LR',0,'C',$fill);
$this->Cell($w[5],6,$row[5],'LR',0,'C',$fill);


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

$sql = 'SELECT * FROM selected where community = "ST"';

$result = mysql_query($sql, $conn)

        or die( "Could not execute sql: $sql");



// build the data array from the database records.

While($row = mysql_fetch_array($result)) {

        $data[] = array($row['Appl'], $row['Name'], $row['community'], $row['email_id'], $row['ug_agr'], $row['pg_agr'] );

}

$sql1 = 'SELECT count(Appl) FROM selected where community = "ST"';

$result = mysql_query($sql1, $conn)

        or die( "Could not execute sql: $sql1");



// build the data array from the database records.

While($row = mysql_fetch_array($result)) {

        $data1 = array($row[0]);

}

$sql2 = 'SELECT count(App_no) FROM list where community = "ST"';

$result = mysql_query($sql2, $conn)

        or die( "Could not execute sql: $sql2");



// build the data array from the database records.

While($row = mysql_fetch_array($result)) {

        $data2 = array($row[0]);

}

$sql3 = 'SELECT sc1,sc2 FROM criterion';

$result = mysql_query($sql3, $conn)

        or die( "Could not execute sql: $sql3");



// build the data array from the database records.

While($row = mysql_fetch_array($result)) {

        $data3 = array($row['sc1'],$row['sc2']);

}
// start and build the PDF document

$pdf = new PDF();

$pdf->nsc = $data1[0];
$pdf->nap = $data2[0];
$pdf->ug = $data3[0];
$pdf->pg = $data3[1];

//Column titles

$header=array('Application No','Name','Category','Email','UG CGPA','PG CGPA');



$pdf->SetFont('Arial','',12);

$pdf->AddPage('P');

// call the table creation method

$pdf->BuildTable($header,$data);

$pdf->Output();


?>
