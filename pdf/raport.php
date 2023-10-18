<?php
include_once('../../cover/koneksi.php');
$id = $_GET["id"];
?>
<?php
require('../../cover/pdf/fpdf.php');   
include "../../cover/koneksi.php";
 $no=1;
        $sql = "SELECT * FROM tb_siswa, tb_sekolah WHERE id='$id'";
  $query = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_array($query);{


class PDF extends FPDF
{
// Page header
// function Header()
// {
//     // Logo
//     $this->Image('../cover/pdf/logo.png',90,30,30,'C');
//     // Arial bold 15
//     $this->SetFont('Arial','B',15);
//     // Move to the right
//     $this->Cell(1);
//     // Title
//     $this->Cell(190,270,'',1,0,'C');
//     // Line break
//     $this->Ln(20);
// }

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 7
    $this->SetFont('Arial','I',7);
    // Page number
    $this->Cell(0,7,''.$this->PageNo().'',0,0,'C');

}
}

// Instanciation of inherited class
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

$width_cell=array(35,3,85,30,3,30);
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Nama Peserta Didik',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$row['nama'],0,0);
    $pdf->Cell($width_cell[3],6,'Kelas',0,0);
    $pdf->Cell($width_cell[4],6,':',0,0);
    $pdf->Cell($width_cell[5],6,$row['kelas'],0,1);
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Nomor Induk/NISN',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$row['nis'].' / '.$row['nisn'],0,0);
    $pdf->Cell($width_cell[3],6,'Fase',0,0);
    $pdf->Cell($width_cell[4],6,':',0,0);
    $pdf->Cell($width_cell[5],6,'E',0,1);
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Sekolah',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$row['nama_sekolah'],0,0);
    $pdf->Cell($width_cell[3],6,'Semester',0,0);
    $pdf->Cell($width_cell[4],6,':',0,0);
    $pdf->Cell($width_cell[5],6,'Ganjil',0,1);
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Alamat',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$row['alamat'],0,0);
    $pdf->Cell($width_cell[3],6,'Tahun Pelajaran',0,0);
    $pdf->Cell($width_cell[4],6,':',0,0);
    $pdf->Cell($width_cell[5],6,'2023/2024',0,1);
$pdf->ln(10);    
$pdf->Cell(3);
$pdf->SetFont('Arial','B',10);
    $pdf->Cell($width_cell[0],6,'A. Nilai Akademik',0,1);

$width_cell=array(10,50,20,105);
  
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],10,'No',1,0,'C');
    $pdf->Cell($width_cell[1],10,'Mata Pelajaran',1,0,'C');
    $pdf->Cell($width_cell[2],10,'Nilai Akhir',1,0,'C');
    $pdf->Cell($width_cell[3],10,'Capaian Kompetensi',1,1,'C');

$width_cell=array(185);
$pdf->Cell(3);
$pdf->Cell($width_cell[0],6,'A. Kelompok Mata Pelajaran Umum
',1,1,'L');

$pdf->SetFont('Arial','',8);
$width_cell=array(10,50,20,105);


$pdf->Cell(3);
    $pdf->Cell($width_cell[0],10,'1',1,0,'C');
    $pdf->Cell($width_cell[1],10,'Pendidikan Pancasila',1,0,'L');
    $pdf->Cell($width_cell[2],10,'86',1,0,'C');
    $pdf->MultiCell($width_cell[3],10,'Menunjukkan penguasaan yang baik dalam menganalisis an penguasaan yang baik dalam menganalisis makna syu’abul iman (cabang-cabang iman), pengertian, dalil, macam dan manfaatnya','LTRB','J',0);

$pdf->Cell(3);
    $pdf->Cell($width_cell[0],10,'2',1,0,'C');
    $pdf->Cell($width_cell[1],10,'Pendidikan Pancasila',1,0,'L');
    $pdf->Cell($width_cell[2],10,'86',1,0,'C');
    $pdf->MultiCell($width_cell[3],10,'Menunjukkan penguasaan yang baik dalam menganalisis makna syu’abul iman (cabang-cabang iman), pengertian, dalil, macam dan manfaatnya','LRT','L',0);

 $pdf->Cell(3);
    $pdf->Cell($width_cell[0],10,'3',1,0,'C');
    $pdf->Cell($width_cell[1],10,'Pendidikan Pancasila',1,0,'L');
    $pdf->Cell($width_cell[2],10,'86',1,0,'C');
    $pdf->MultiCell($width_cell[3],10,'Menunjukkan penguasaan yang baik dalam menganalisis makna syu’abul iman (cabang-cabang iman), pengertian, dalil, macam dan manfaatnya','LRT','L',0);   

$pdf->Cell(20, 10, 'Title', 1, 0, 'C');
$pdf->Cell(20, 10, 'Title', 1, 0, 'C');
$pdf->MultiCell(20, 10, 'Menunjukkan penguasaan yang baik dalam menganalisis makna syu’abul iman (cabang-cabang iman), pengertian, dalil, macam dan manfaatnya','LRT','L',0);


 $pdf->Output('F','Raport '. $row['kelas'].' '.$row['nama'].'.pdf');
}?>