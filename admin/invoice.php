<?php include("slice/db.php");?>
<?php include("slice/function.php");?>
<?php
require('fpdf17/fpdf.php');

$date = date('d-m-y');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(189,30,'',0,1);
//creating long space to get content down a little
$pdf->SetFont('Arial','B',20);
$pdf->Cell(50,7,'PHARMCARE',0,1);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,7,'admin@gmail.com',0,1);
$pdf->Cell(50,7,'www.pharmcare.com',0,1);
$pdf->Cell(50,7,'030-(212)-(123)',0,1);
$pdf->Cell(50,7,'Accra-Ghana',0,1);
$pdf->Cell(189,10,'',0,1);
//space create
$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,7,'TO:',0,0);
$pdf->Cell(89,7,'',0,0);
$pdf->Cell(50,7,'INVOICE',0,1);


$pdf->SetFont('Arial','',14);


if(isset($_GET['p_code'])){
   $code = $_GET['p_code'];
    global $connection;
    $result = mysqli_query($connection,"SELECT * FROM stockList WHERE purchaseCode = {$code}");
    confirmQuery($result);
    while($data = mysqli_fetch_assoc($result)){
        $supplier = $data['supplier'];
        $id = $data['id'];
    }
$pdf->Cell(50,7,"$supplier",0,0);
$pdf->Cell(89,7,'',0,0);
$pdf->Cell(50,7,"$id",0,1);
$result2 = mysqli_query($connection,"SELECT phone FROM supplier WHERE name = '{$supplier}'");
$row = mysqli_fetch_assoc($result2);
$phone = $row['phone'];
$pdf->Cell(50,7,"$phone",0,0);
$pdf->Cell(89,7,'',0,0);
$pdf->Cell(50,7,'',0,1);
    }
//header

//space
$pdf->Cell(189,10,'',0,1);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,7,'SL No',1,0);
$pdf->Cell(48,7,'Item',1,0);
$pdf->Cell(40,7,'Price',1,0);
$pdf->Cell(40,7,'Quantity',1,0);
$pdf->Cell(40,7,'Amount',1,1);

//content
$pdf->SetFont('Arial','',14);
if(isset($_GET['p_code'])){
   $code = $_GET['p_code'];
    global $connection;
    $result = mysqli_query($connection,"SELECT * FROM stockList WHERE purchaseCode = {$code}");
    confirmQuery($result);
    while($data = mysqli_fetch_assoc($result)){
    $pdf->Cell(20,7,"{$data['id']}",1,0);
    $pdf->Cell(48,7,"{$data['name']}",1,0);
    $pdf->Cell(40,7,"{$data['buyPrice']}",1,0);
    $pdf->Cell(40,7,"{$data['quantity']}",1,0);
    $pdf->Cell(40,7,"{$data['amount']}",1,1);
        
    }

$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,7,'SL No',1,0);
$pdf->Cell(48,7,'Item',1,0);
$pdf->Cell(40,7,'Price',1,0);
$pdf->Cell(40,7,'Quantity',1,0);
$pdf->Cell(40,7,'Amount',1,1);
//footer

global $connection;
$query2 = "SELECT SUM(amount) AS sumBalance FROM stockList WHERE purchaseCode = {$code}";
$result2 = mysqli_query($connection,$query2);
confirmQuery($result);
$data = mysqli_fetch_array($result2);
$data['sumBalance']; 
$pdf->Cell(189,10,'',0,1);
$pdf->Cell(60,7,'',0,0);
$pdf->Cell(48,7,'',0,0);
$pdf->Cell(40,7,'Total:',0,0);
$pdf->Cell(40,7,"{$data['sumBalance']}",0,1);
}
$pdf->Output();
?>
