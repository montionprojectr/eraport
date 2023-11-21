
<?php
session_start();
include_once('../koneksi.php');
$nis = $_GET["nis"];
$semester = $_GET["semester"];
$th_pelajaran = $_GET["th_pelajaran"];
$kelas = $_GET["kelas"];
// $jurusan = $_GET["jurusan"];
// $pemkelas = $_GET["pemkelas"];


?>
<?php
require('../pdf/fpdf.php');
 $no=1;
        $sql = "select * from tb_siswa, tb_sekolah where nis = '$nis' ";
  $query = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_array($query);{

  $sql1 = "select * from tb_leger where nis = '$nis' and semester = '$semester' and th_pelajaran = '$th_pelajaran'";
  $query1 = mysqli_query($koneksi, $sql1);
  $leger = mysqli_fetch_array($query1);

   $sql2 = "select * from tb_capaian where nis = '$nis' and semester = '$semester' and th_pelajaran = '$th_pelajaran'";
  $query2 = mysqli_query($koneksi, $sql2);
  $cp = mysqli_fetch_array($query2);

  $sql3 = "select * from tb_thpelajaran where semester = '$semester' and tahun_pelajaran = '$th_pelajaran'";
  $query3 = mysqli_query($koneksi, $sql3);
  $th = mysqli_fetch_array($query3);

  // $sql = "SELECT * FROM tb_mapel";
  // $query = mysqli_query($koneksi, $sql);
  // $mapel = mysqli_fetch_array($query);


unset($_SESSION['penilaian']);
$cek_guru = mysqli_query($koneksi, "select * from tb_users where nipy = '".$_SESSION['nipy']."'");
$guru = mysqli_fetch_array($cek_guru);
 $sql = "select * from tb_users where nipy = '".$_SESSION['nipy']."'";
  $query = mysqli_query($koneksi, $sql);
  $rows = mysqli_fetch_array($query);


 
  //  $sqlll = "SELECT * FROM tb_leger INNER JOIN tb_walikelas ON tb_leger.pemkelas=tb_walikelas.pkelas  where nis='$nis' and jurusan='$jurusan' and pemkelas='$pemkelas'";
  // $query = mysqli_query($koneksi, $sqlll);
  // $wali = mysqli_fetch_array($query);

class PDF extends FPDF
{
// Page header
// function Header()
// {
//     // Logo
//     $this->Image('../eraport/pdf/logo.png',90,30,30,'C');
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
function Footer(){
    include "../../eraport/koneksi.php";
$nis = $_GET["nis"];
$semester = $_GET["semester"];
$th_pelajaran = $_GET["th_pelajaran"];
       $sql = "select * from tb_leger where nis = '$nis' and semester = '$semester' and th_pelajaran = '$th_pelajaran'";
  $query = mysqli_query($koneksi, $sql);
  $leger = mysqli_fetch_array($query);
{

    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 7
    $this->SetFont('Arial','',7);
    // Page number
   $width_cell=array(90,5,90);

    $this->Cell($width_cell[0],6,$leger['nama'],0,0,'L');
    $this->Cell($width_cell[1],6,$this->PageNo(),0,0,'C');
    $this->Cell($width_cell[2],6,$leger['kelas'].' '.$leger['jurusan'].' '.$leger['pemkelas'],0,0,'R');


}

}

}
 
} //end of class

 
// Instanciation of inherited class
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

$width_cell=array(35,3,85,30,3,30);
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Nama Peserta Didik',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$leger['nama'],0,0);
    $pdf->Cell($width_cell[3],6,'Kelas',0,0);
    $pdf->Cell($width_cell[4],6,':',0,0);
    $pdf->Cell($width_cell[5],6,$leger['kelas'].' '. $leger['jurusan'].' '. $leger['pemkelas'],0,1);
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Nomor Induk/NISN',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$leger['nis'].' / '.$row['nisn'],0,0);
    $pdf->Cell($width_cell[3],6,'Fase',0,0);
    $pdf->Cell($width_cell[4],6,':',0,0);
    $pdf->Cell($width_cell[5],6,'E',0,1);
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Sekolah',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$row['nama_sekolah'],0,0);
    $pdf->Cell($width_cell[3],6,'Semester',0,0);
    $pdf->Cell($width_cell[4],6,':',0,0);
    $pdf->Cell($width_cell[5],6,$leger['semester'],0,1);
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Alamat',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$row['alamat'],0,0);
    $pdf->Cell($width_cell[3],6,'Tahun Pelajaran',0,0);
    $pdf->Cell($width_cell[4],6,':',0,0);
    $pdf->Cell($width_cell[5],6,$leger['th_pelajaran'],0,1);

$pdf->ln(10);    
$pdf->Cell(3);
$pdf->SetFont('Arial','B',10);
;
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

$pdf->Image('../../eraport/pdf/watermark.png',85,120,40,'C');

{

$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['pabp_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['pabp_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;}  
   
$f=($i+$j)*$h;

$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$x = $pdf->GetX();
$y = $pdf->GetY();
if($row['agama']=="ISLAM")
{
$pdf->MultiCell(50,$f,"", "B",'L');
$pdf->SetXY($x, $y+$i+$j+$h);
$pdf->MultiCell(50,$f/8,"Pendidikan Agama Islam dan Budi Pekerti",'', 'L');
$pdf->SetXY($x+50, $y);
}
if($row['agama']=="KRISTEN")
{
 
$pdf->MultiCell(50,$f,"", "B",'L');
$pdf->SetXY($x, $y+$i+$j+$h);
$pdf->MultiCell(50,$f/8,"Pendidikan Agama Kristen dan Budi Pekerti", "",'L');
$pdf->SetXY($x+50, $y);

}
$pdf->Cell(20,$f,$leger['pabp'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);


$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['pkn_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['pkn_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;}  
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$pdf->Cell(50,$f,'Pendidikan Pancasila', 'LRB',0, 'L');
$pdf->Cell(20,$f,$leger['pkn'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);


$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['b_indo_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['b_indo_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;} 
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$pdf->Cell(50,$f,'Bahasa Indonesia', 'LRB',0, 'L');
$pdf->Cell(20,$f,$leger['b_indo'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);


$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['penjas_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['penjas_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;} 
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(50,$f,"", "B",'L');
$pdf->SetXY($x, $y+$i+$j+$h);
$pdf->MultiCell(50,$f/8,'Pendidikan Jasmani, Olahraga, dan Kesehatan','', 'L');
$pdf->SetXY($x+50, $y);

$pdf->Cell(20,$f,$leger['penjas'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);


$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$width_cell=array(10,50,20,105);
   $pdf->Image('../../eraport/pdf/watermark.png',85,120,40,'C');
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],10,'No',1,0,'C');
    $pdf->Cell($width_cell[1],10,'Mata Pelajaran',1,0,'C');
    $pdf->Cell($width_cell[2],10,'Nilai Akhir',1,0,'C');
    $pdf->Cell($width_cell[3],10,'Capaian Kompetensi',1,1,'C');



$pdf->SetFont('Arial','',8);
$width_cell=array(10,50,20,105); 


$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['sejarah_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['sejarah_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;}  
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$pdf->Cell(50,$f,'Sejarah', 'LRB',0, 'L');
$pdf->Cell(20,$f,$leger['sejarah'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);


$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['seni_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['seni_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;}  
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$pdf->Cell(50,$f,'Seni Budaya', 'LRB',0, 'L');
$pdf->Cell(20,$f,$leger['seni'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);

$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['b_jawa_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['b_jawa_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;}  
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$pdf->Cell(50,$f,'Muatan Lokal Bahasa Jawa', 'LRB',0, 'L');
$pdf->Cell(20,$f,$leger['b_jawa'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);

$pdf->SetFont('Arial','B',10);
$width_cell=array(185);
$pdf->Cell(3);
$pdf->Cell($width_cell[0],6,'B. Kelompok Mata Pelajaran Kejuruan
',1,1,'L'); 
$pdf->SetFont('Arial','',8);
$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['mtk_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['mtk_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;}  
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$pdf->Cell(50,$f,'Matematika', 'LRB',0, 'L');
$pdf->Cell(20,$f,$leger['mtk'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);

$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['b_ing_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['b_ing_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;}  
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$pdf->Cell(50,$f,'Bahasa Inggris', 'LRB',0, 'L');
$pdf->Cell(20,$f,$leger['b_ing'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$width_cell=array(10,50,20,105);
   $pdf->Image('../../eraport/pdf/watermark.png',85,120,40,'C');
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],10,'No',1,0,'C');
    $pdf->Cell($width_cell[1],10,'Mata Pelajaran',1,0,'C');
    $pdf->Cell($width_cell[2],10,'Nilai Akhir',1,0,'C');
    $pdf->Cell($width_cell[3],10,'Capaian Kompetensi',1,1,'C');



$pdf->SetFont('Arial','',8);
$width_cell=array(10,50,20,105); 


$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['informatika_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['informatika_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;}  
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$pdf->Cell(50,$f,'Informatika', 'LRB',0, 'L');
$pdf->Cell(20,$f,$leger['informatika'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);


$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['projek_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['projek_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;}  
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$pdf->Cell(50,$f,'Projek IPAS', 'LRB',0, 'L');
$pdf->Cell(20,$f,$leger['projek'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);

$x = $pdf->GetX();
$y = $pdf->GetY();
$h=4;
$w=105;
$i=1;
$j=1;
$cpm='Menunjukkan penguasaan yang baik dalam '.$cp['dasar_cpm'];
$cpp='Perlu ditingkatkan dalam '.$cp['dasar_cpp'];
$char_cpm=strlen($cpm);
$char_cpp=strlen($cpp);
if ($char_cpm>75)
        {$i=2;}
    if ($char_cpm>145)
        {$i=3;}   
    if ($char_cpm>225)
        {$i=4;}  
    if ($char_cpm>300)
        {$i=5;}  
    if ($char_cpm>375)
        {$i=6;}  
    if ($char_cpm>450)
        {$i=7;}  
    if ($char_cpp>75)
        {$j=2;}
    if ($char_cpp>150)
        {$j=3;}   
    if ($char_cpp>225)
        {$j=4;}  
    if ($char_cpp>300)
        {$j=5;}  
    if ($char_cpp>375)
        {$j=6;}  
    if ($char_cpp>450)
        {$j=7;}  
$f=($i+$j)*$h;
$pdf->Cell(3);
$pdf->Cell(10,$f,$no++,'LRB',0, 'C');
$x = $pdf->GetX();
$y = $pdf->GetY();
if ($leger['jurusan']=="PPLG")
{
$pdf->MultiCell(50,$f,"", "B",'L');
$pdf->SetXY($x, $y+$i+$j+$h);
$pdf->MultiCell(50,$f/8,'Dasar - Dasar Pengembangan Perangkat Lunak dan Gim','', 'L');
$pdf->SetXY($x+50, $y);
}
if ($leger['jurusan']=="TE")
{
$pdf->MultiCell(50,$f,"", "B",'L');
$pdf->SetXY($x, $y+$i+$j+$h); 
$pdf->MultiCell(50,$f/8,'Dasar - Dasar Teknik Elektronika', '', 'L');
$pdf->SetXY($x+50, $y);
}
if ($leger['jurusan']=="TMI")
{
$pdf->MultiCell(50,$f,"", "B",'L');
$pdf->SetXY($x, $y+$i+$j+$h); 
$pdf->Cell(50,$f/8,'Dasar - Dasar Teknik Mesin', '', 'L');
$pdf->SetXY($x+50, $y);
}
if ($leger['jurusan']=="TKR")
{
$pdf->MultiCell(50,$f,"", "B",'L');
$pdf->SetXY($x, $y+$i+$j+$h);
$pdf->Cell(50,$f/8,'Dasar - Dasar Teknik Otomotif', '', 'L');
$pdf->SetXY($x+50, $y);
}
if ($leger['jurusan']=="TSM")
{
$pdf->MultiCell(50,$f,"", "B",'L');
$pdf->SetXY($x, $y+$i+$j+$h);
$pdf->Cell(50,$f/8,'Dasar - Dasar Teknik Otomotif', '', 'L');
$pdf->SetXY($x+50, $y);
}
$pdf->Cell(20,$f,$leger['dasar'],'LRB',0, 'C');
$x = $pdf->GetX();
$pdf->MultiCell($w,$h,$cpm,'LRB','J',FALSE);
$pdf->SetX($x);
$pdf->MultiCell($w,$h,$cpp,'LRB','J',FALSE);



$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$width_cell=array(10,50,20,105);
   $pdf->Image('../../eraport/pdf/watermark.png',85,120,40,'C');
$pdf->Cell(3);
$width_cell=array(45,3,85);

    $pdf->Cell($width_cell[0],6,'Nama Peserta Didik',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$row['nama'],0,1);

$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Nomor Induk/NISN',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$row['nis'].' / '.$row['nisn'],0,1);

$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Kelas',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$leger['kelas'].' '. $leger['jurusan'].' '. $leger['pemkelas'],0,1);

$pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Tahun pelajaran',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$leger['th_pelajaran'],0,1);

 $pdf->Cell(3);
    $pdf->Cell($width_cell[0],6,'Semester',0,0);
    $pdf->Cell($width_cell[1],6,':',0,0);
    $pdf->Cell($width_cell[2],6,$leger['semester'],0,1);

$pdf->ln(10);    
$pdf->Cell(3);
$pdf->SetFont('Arial','B',10);
$no=1;

$pdf->Cell($width_cell[0],6,'B. Ekstrakurikuler',0,1);
$width_cell=array(10,60,115);
$pdf->Cell(3);
    $pdf->Cell($width_cell[0],10,'No',1,0,'C');
    $pdf->Cell($width_cell[1],10,'Kegiatan Ekstrakurikuler ',1,0,'C');
    $pdf->Cell($width_cell[2],10,'Keterangan',1,1,'C');
    $pdf->SetFont('Arial','',8);
$h=8;


if ( $leger['eks1']=="A")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'PRAMUKA ',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Pramuka dengan Sangat Baik",1,1,'L');
}
if ( $leger['eks1']=="B")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'PRAMUKA ',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Pramuka dengan Baik",1,1,'L');
}
if ( $leger['eks1']=="C")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'PRAMUKA ',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Pramuka dengan Kurang Baik",1,1,'L');
}
if ( $leger['eks1']=="D")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'PRAMUKA ',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Pramuka dengan Sangat Kurang Baik",1,1,'L');
}
if ( $leger['eks1']=="")
{
     $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'  -',1,0,'C');
    $pdf->Cell($width_cell[2],$h,"  -",1,1,'C');
}



if ( $leger['eks2']=="A")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Patroli Keamanan Sekolah',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Patroli Keamanan Sekolah dengan Sangat Baik",1,1,'L');
}
if ( $leger['eks2']=="B")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Patroli Keamanan Sekolah',1,0,'L');

    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Patroli Keamanan Sekolah dengan Baik",1,1,'L');
}
if ( $leger['eks2']=="C")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Patroli Keamanan Sekolah',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Patroli Keamanan Sekolah dengan Kurang Baik",1,1,'L');
}
if ( $leger['eks2']=="D")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Patroli Keamanan Sekolah',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Patroli Keamanan Sekolah dengan Sangat Kurang Baik",1,1,'L');
}
if ( $leger['eks2']=="")
{
    // $pdf->Cell($width_cell[2],$h,"   -",1,1,'L');
}


if ( $leger['eks3']=="A")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Palang Merah Remaja',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Palang Merah Remaja dengan Sangat Baik",1,1,'L');
}
if ( $leger['eks3']=="B")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Palang Merah Remaja',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Palang Merah Remaja dengan Baik",1,1,'L');
}
if ( $leger['eks3']=="C")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Palang Merah Remaja',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Palang Merah Remaja dengan Kurang Baik",1,1,'L');
}
if ( $leger['eks3']=="D")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Palang Merah Remaja',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Palang Merah Remaja dengan Sangat Kurang Baik",1,1,'L');
}
if ( $leger['eks3']=="")
{
    // $pdf->Cell($width_cell[2],$h,"   -",1,1,'L');
}

if ( $leger['eks4']=="A")
{
     $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Olahraga Prestasi ',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Olahraga Prestasi dengan Sangat Baik",1,1,'L');
}
if ( $leger['eks4']=="B")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Olahraga Prestasi ',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Olahraga Prestasi dengan Baik",1,1,'L');
}
if ( $leger['eks4']=="C")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Olahraga Prestasi ',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Olahraga Prestasi dengan Kurang Baik",1,1,'L');
}
if ( $leger['eks4']=="D")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Olahraga Prestasi ',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Olahraga Prestasi dengan Sangat Kurang Baik",1,1,'L');
}
if ( $leger['eks4']=="")
{

    // $pdf->Cell($width_cell[2],$h,"   -",1,0,'L');
}

if ( $leger['eks5']=="A")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Rohis',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Rohis dengan Sangat Baik",1,1,'L');
}
if ( $leger['eks5']=="B")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Rohis',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Rohis dengan Baik",1,1,'L');
}
if ( $leger['eks5']=="C")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Rohis',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Rohis dengan Kurang Baik",1,1,'L');
}
if ( $leger['eks5']=="D")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Rohis',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Rohis dengan Sangat Kurang Baik",1,1,'L');
}
if ( $leger['eks5']=="")
{
    // $pdf->Cell($width_cell[2],$h,"   -",1,1,'L');
}

if ( $leger['eks6']=="A")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Kesenian',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Kesenian dengan Sangat Baik",1,1,'L');
}
if ( $leger['eks6']=="B")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Kesenian',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Kesenian dengan Baik",1,1,'L');
}
if ( $leger['eks6']=="C")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Kesenian',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Kesenian dengan Kurang Baik",1,1,'L');
}
if ( $leger['eks6']=="D")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'Kesenian',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan Kesenian dengan Sangat Kurang Baik",1,1,'L');
}
if ( $leger['eks6']=="")
{
    // $pdf->Cell($width_cell[2],$h,"   -",1,1,'L');
}    

if ( $leger['eks7']=="A")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'E-Sport',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan E-Sport dengan Sangat Baik",1,1,'L');
}
if ( $leger['eks7']=="B")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'E-Sport',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan E-Sport dengan Baik",1,1,'L');
}
if ( $leger['eks7']=="C")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'E-Sport',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan E-Sport dengan Kurang Baik",1,1,'L');
}
if ( $leger['eks7']=="D")
{
    $pdf->Cell(3);
    $pdf->Cell($width_cell[0],$h,$no++,1,0,'C');
    $pdf->Cell($width_cell[1],$h,'E-Sport',1,0,'L');
    $pdf->Cell($width_cell[2],$h,"Melaksanakan kegiatan E-Sport dengan Sangat Kurang Baik",1,1,'L');
}
if ( $leger['eks7']=="")
{
    // $pdf->Cell($width_cell[2],$h,"   -",1,1,'L');
}   

 
$pdf->SetFont('Arial','B',10);
$pdf->Ln(10);
$pdf->Cell(3);
$pdf->Cell($width_cell[0],6,'C. Ketidakhadiran',0,1);
$pdf->SetFont('Arial','',8);
$width_cell=array(55,30);
    $pdf->Cell(3);
     $pdf->Cell($width_cell[0],$h,'Sakit',1,0,'L');
    $pdf->Cell($width_cell[1],$h,':   '.$leger['sakit'].'  hari',1,1,'L');
    $pdf->Cell(3); 
    $pdf->Cell($width_cell[0],$h,'Izin',1,0,'L');
    $pdf->Cell($width_cell[1],$h,':   '.$leger['ijin'].'  hari',1,1,'L');
    $pdf->Cell(3); 
    $pdf->Cell($width_cell[0],$h,'Tanpa Keterangan',1,0,'L');
    $pdf->Cell($width_cell[1],$h,':   '.$leger['alpa'].'  hari',1,1,'L');



$pdf->Ln(10);
if ($leger['status']=="XI")
{
$width_cell=array(185);
$pdf->Cell(3);
        $pdf->Cell($width_cell[0],$h,'Berdasarkan hasil yang dicapai pada Semester 1 dan 2, peserta didik ditetapkan : Naik di Kelas XI',1,1,'L');
    $pdf->SetFont('Arial','',8);

} if ($leger['status']=="X")
{
$width_cell=array(185);
$pdf->Cell(3);
        $pdf->Cell($width_cell[0],$h,'Berdasarkan hasil yang dicapai pada Semester 1 dan 2, peserta didik ditetapkan : Tinggal Kelas di Kelas X',1,1,'L');
    $pdf->SetFont('Arial','',8);

} if ($leger['semester']=="Ganjil")
{

}


$pdf->Ln(10);
$pdf->Cell(10);

$pdf->SetFont('Arial','',9);
$width_cell=array(110,65);

    $pdf->Cell($width_cell[0],4,'Orang Tua/Wali',0,0,'L');
    $pdf->Cell($width_cell[1],4,$th['tgl_bagi'],0,1,'L');
    $pdf->Cell(10); 
    $pdf->Cell($width_cell[0],4,'',0,0,'L');
    $pdf->Cell($width_cell[1],4,'Walikelas',0,1,'L');
    $pdf->Cell(10); 
    $pdf->Cell($width_cell[0],20,'',0,0,'L');
    $pdf->Cell($width_cell[1],20,'',0,1,'L');
    $pdf->Cell(10); 
    $pdf->Cell($width_cell[0],4,'. . . . . . . . . . . . . . . . . . . . . . . . . . .',0,0,'L');
    $pdf->Cell($width_cell[1],4, $rows['nama_lengkap'],0,1,'L');
    $pdf->Cell(10); 

    $pdf->Cell($width_cell[0],4,'',0,0,'L');
    $pdf->Cell($width_cell[1],4,'NIPY. '.$rows['nipy'],0,1,'L');
     $pdf->Cell(10); 

    $pdf->Ln(10);
    $width_cell=array(80);
    $pdf->Cell(75);
    $pdf->Cell($width_cell[0],4,'Mengetahui,',0,1,'L');
    $pdf->Cell(75);
    $pdf->Cell($width_cell[0],4,'Kepala Sekolah',0,1,'L');
    $pdf->Cell(75);
    $pdf->Cell($width_cell[0],20,'',0,1,'L');
    $pdf->Cell(75);
    $pdf->Cell($width_cell[0],4,$row['nama_ks'],0,1,'L');
    $pdf->Cell(75);
    $pdf->Cell($width_cell[0],4,'NIPY. '.$row['nipy'],0,1,'L');

 $pdf->Output('I','Raport '. $leger['kelas'].' '. $leger['jurusan'].' '. $leger['pemkelas'].' '.$leger['nama'].' '.$leger['semester'].'.pdf');
}?>