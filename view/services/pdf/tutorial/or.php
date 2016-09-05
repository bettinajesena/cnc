<?php
require('../fpdf.php');
session_start();
require_once("dbcontroller.php");


class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

function Header()
{
	// Logo
	//$this->Image('logo.png',10,6,30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(35,10,'Chats N Chiens.',0,0,'C');
    $this->SetFont('Arial','',15);
	//$this->Cell(-35,25,'1208 K8th., East Kamias',0,0,'C');
	//$this->Cell(35,35,'Quezon City',0,0,'C');
	// Line break
	$this->Ln(10); 
	$this->SetFont('Arial','',10);
	$this->SetX($this->lMargin);
	$this->Text(20,37,'Receipt No.');
	$this->SetFont('Arial','u',11);
	//$this->Text(180,37,''.$_GET['tproduct_id'].'',0,0,'l');

	$this->Ln(30); 
	$this->SetFont('Arial','B',11);
	$this->Text(15,45,'___________________________________________________________________________________',0,0,'C');
	 $this->Ln(10); 
    $this->SetFont('Arial','B',16);
    $this->Text(78,54,'OFFICIAL RECEIPT',1,1,'C');
	  $this->Ln(10); 
	  $this->SetFont('Arial','B',11);
	//$this->Text(15,57,'___________________________________________________________________________________',0,0,'C');
	$this->SetFont('Arial','',11);
	$this->Text(15,68,'Client name :',0,0,'C');
	$this->SetFont('Arial','u',11);
	//$this->Text(35,68,''.$_GET['supplier'].'',0,0,'C');
	$this->SetFont('Arial','',11);
	$this->Text(15,74,'Pet/s :',0,0,'C');
	$this->SetFont('Arial','',11);
	$this->Text(15,80,'Date :',0,0,'C');
	$this->SetFont('Arial','u',11);
	$this->Text(15,90,'Services rendered :',0,0,'C');
	$this->SetFont('Arial','u',11);
	$this->Text(15,120,'Products :',0,0,'C');
	$this->SetFont('Arial','u',11);
	//$this->Text(32,74,''.$_GET['date'].'',0,0,'C');
    $this->Ln(20); 


}


// Simple table
function BasicTable($header, $data)
{



	// Column widths
	$w = array(10,35,23,23,24,20,20,25,10);
	// Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	// Data
	foreach($_SESSION["cart_item"] as $item)
	{
		$this->Cell($w[0],6,''.$item['material_no'].'',1);
		$this->Cell($w[1],6,''.$item['brand_name'].'',1);
		$this->Cell($w[2],6,''.$item['category'].'',1);
		$this->Cell($w[3],6,''.$item['scategory_name'].'',1);
		$this->Cell($w[4],6,''.$item['description'].'',1);
		$this->Cell($w[5],6,''.$item['color'].'',1);
		$this->Cell($w[6],6,''.$item['package'].'',1);
		$this->Cell($w[7],6,''.$item['unit_measurement'].' '.$item['abbre'].'',1);
		$this->Cell($w[8],6,''.$item['quantitys'].'',1);

		$this->Ln();
	}
	$this->Cell(array_sum($w),0,'','T');
}

function Footer()
{  
	// Position at 1.5 cm from bottom
	$this->SetY(-15);

	 
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
// Column headings
$header = array('No.', 'Brand','Category', 'Sub-category','Description','Color','Package','Unit','Qty');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',10);
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->BasicTable($header,$data);
$pdf->Output();

?>
 