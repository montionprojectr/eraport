<?php
require('fpdf.php');
class ConductPDF extends FPDF {
function vcell($c_width,$c_height,$x_axis,$text){
$w_w=$c_height/3;
$w_w_1=$w_w+2;
$w_w1=$w_w+$w_w+$w_w+3;
$len=strlen($text);// check the length of the cell and splits the text into 7 character each and saves in a array 

$lengthToSplit = 65;
if($len>$lengthToSplit){
$w_text=str_split($text,$lengthToSplit);
$this->SetX($x_axis);
$this->Cell($c_width,$w_w_1,$w_text[0],'','','');
if(isset($w_text[1])) {
    $this->SetX($x_axis);
    $this->Cell($c_width,$w_w1,$w_text[1],'','','');
}
$this->SetX($x_axis);
$this->Cell($c_width,$c_height,'','LTRB',0,'L',0);
}
else{
    $this->SetX($x_axis);
    $this->Cell($c_width,$c_height,$text,'LTRB',0,'L',0);}
    }
 }
$pdf = new ConductPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

$pdf->Ln();
$x_axis=$pdf->getx();
$c_width=40;
$c_height=5;
$text="Menunjukkan penguasaan yang baik dalam menganalisis makna syu’abul iman (cabang-cabang iman), pengertian, dalil, macam dan manfaatnya";
$pdf->vcell($c_width,$c_height,$x_axis,'Hai');
$x_axis=$pdf->getx();
$pdf->vcell($c_width,$c_height,$x_axis,'VICKY');
$x_axis=$pdf->getx();
$pdf->vcell(100,$c_height,$x_axis,$text);

$pdf->Output('F','coba.pdf');
?>