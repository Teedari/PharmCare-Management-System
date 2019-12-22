<?php
require('fpdf17/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )


//creating long space to get content down a little

$pdf->Cell(189,20,'',0,1);

$pdf->Cell(189,1,'',1,1);

$pdf->Cell(189,5,'',0,1);

$pdf->SetFont('Arial','B',14);

$pdf->Cell(130	,5,'Rent House Management',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'Belin Top',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Sunyani, Ghana, 2332',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,':dd/mm/yyyy',0,1);//end of line

$pdf->Cell(130	,5,'Phone :+233247440223',0,0);
$pdf->Cell(25	,5,'Invoice #',0,0);
$pdf->Cell(34	,5,':1234567',0,1);//end of line

$pdf->Cell(130	,5,'Fax :+233247440223',0,0);
$pdf->Cell(25	,5,'Tenant ID',0,0);
$pdf->Cell(34	,5,':1234567',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'[Name]',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'[Company Name]',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'[Address]',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'[Phone]',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(30, 10,'House Name',1,0);
$pdf->Cell(159, 10,'Features',1,1);

$pdf->Cell(50, 5,'',0,0);

//create space
$pdf->Cell(189, 5,'',0,1);
$pdf->Cell(189, 5,'',0,1);



$pdf->SetFont('Arial','B',12);

$pdf->Cell(125	,7,'Particulars',1,0);
$pdf->Cell(30	,7,'Status',1,0);
$pdf->Cell(34	,7,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(125	,10,'',1,0);
$pdf->Cell(30	,10,'Cash recieved',1,0);
$pdf->Cell(34	,10,'',1,1);//end of line

//dumy cells
$pdf->Cell(100	,10,'',0,0);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(25	,10,'Total:',0,0);
$pdf->Cell(64	,10,'',1,0);















$pdf->Output();
?>
