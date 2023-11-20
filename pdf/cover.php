<?php
include_once('../koneksi.php');
$id = $_GET["id"];
?>
<?php
require('fpdf.php');
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
$pdf->SetFont('Arial','',11);
 $pdf->Cell(0,265,'',1,0,'C');
 $pdf->Image('../../eraport/pdf/logo.png',90,30,30,'C');

	$pdf->Ln(70);
    $pdf->Cell(0,20,'RAPOR PESERTA DIDIK',0,0,'C');
    $pdf->Ln(7);
    $pdf->Cell(0,20,'SEKOLAH MENENGAH KEJURUAN',0,0,'C');
    $pdf->Ln(7);
    $pdf->Cell(0,20,'(SMK)',0,0,'C');

    $pdf->Ln(40);
    $pdf->Cell(0,20,'Nama Peserta Didik :',0,0,'C');
    $pdf->Ln(15);
	$pdf->Cell(40);
    $pdf->Cell(115,7,$row['nama'],1,0,'C');
	$pdf->Ln(7);
    $pdf->Cell(0,20,'NIS / NISN :',0,0,'C');
    $pdf->Ln(15);
    $pdf->Cell(40);
    $pdf->Cell(115,7,$row['nis'].' / '.$row['nisn'],1,1,'C');

    $pdf->Ln(50);
    $pdf->Cell(0,20,'KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI
',0,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(0,20,'REPUBLIK INDONESIA',0,0,'C');



$pdf->Ln(30);
    $pdf->Cell(0,20,'RAPOR PESERTA DIDIK',0,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(0,20,'SEKOLAH MENENGAH KEJURUAN',0,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(0,20,'(SMK)',0,0,'C');

    $pdf->Ln(30);
    $pdf->SetFont('Arial','',11);
$width_cell=array(8,60,5,150);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],15,'',0,0);
    $pdf->Cell($width_cell[1],15,'Nama Sekolah',0,0);
    $pdf->Cell($width_cell[2],15,':',0,0);
    $pdf->Cell($width_cell[3],15,$row['nama_sekolah'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],15,'',0,0);
    $pdf->Cell($width_cell[1],15,'NPSN / NSS',0,0);
    $pdf->Cell($width_cell[2],15,':',0,0);
    $pdf->Cell($width_cell[3],15,$row['npsn'].' / '.$row['nss'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],15,'',0,0);
    $pdf->Cell($width_cell[1],15,'Alamat',0,0);
    $pdf->Cell($width_cell[2],15,':',0,0);
    $pdf->MultiCell($width_cell[3],15,$row['alamat'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],15,'',0,0);
    $pdf->Cell($width_cell[1],15,'Kelurahan',0,0);
    $pdf->Cell($width_cell[2],15,':',0,0);
    $pdf->Cell($width_cell[3],15,$row['kelu'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],15,'',0,0);
    $pdf->Cell($width_cell[1],15,'Kecamatan',0,0);
    $pdf->Cell($width_cell[2],15,':',0,0);
    $pdf->Cell($width_cell[3],15,$row['kec'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],15,'',0,0);
    $pdf->Cell($width_cell[1],15,'Kabupaten/Kota',0,0);
    $pdf->Cell($width_cell[2],15,':',0,0);
    $pdf->Cell($width_cell[3],15,$row['kab'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],15,'',0,0);
    $pdf->Cell($width_cell[1],15,'Provinsi',0,0);
    $pdf->Cell($width_cell[2],15,':',0,0);
    $pdf->Cell($width_cell[3],15,$row['prov'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],15,'',0,0);
    $pdf->Cell($width_cell[1],15,'Web Site',0,0);
    $pdf->Cell($width_cell[2],15,':',0,0);
    $pdf->MultiCell($width_cell[3],15,$row['web'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],15,'',0,0);
    $pdf->Cell($width_cell[1],15,'Email',0,0);
    $pdf->Cell($width_cell[2],15,':',0,0);
    $pdf->Cell($width_cell[3],15,$row['email'],0,1);



$pdf->Ln(230);
$pdf->Cell(0,20,'KETERANGAN TENTANG DIRI PESERTA DIDIK',0,0,'C');
$pdf->Ln(30);

$pdf->SetFont('Arial','',9);
$width_cell=array(8,60,5,100);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'1.',0,0);
    $pdf->Cell($width_cell[1],7,'Nama Peserta Didik (Lengkap)',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['nama'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'2.',0,0);
    $pdf->Cell($width_cell[1],7,'NIS / NISN',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['nis'].' / '.$row['nisn'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'3.',0,0);
    $pdf->Cell($width_cell[1],7,'Tempat, Tanggal Lahir',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['ttl'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'4.',0,0);
    $pdf->Cell($width_cell[1],7,'Jenis Kelamin',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    if ($row['kelamin']=='L'){
        $pdf->Cell($width_cell[3],7,'Laki-Laki',0,1);
    }
     else if ($row['kelamin']=='P'){
        $pdf->Cell($width_cell[3],7,'Perempuan',0,1);
    }
    else if ($row['kelamin']==''){
        $pdf->Cell($width_cell[3],7,'-',0,1);
    }

$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'5.',0,0);
    $pdf->Cell($width_cell[1],7,'Agama',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['agama'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'6.',0,0);
    $pdf->Cell($width_cell[1],7,'Status dalam keluarga',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['status'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'7.',0,0);
    $pdf->Cell($width_cell[1],7,'Anak Ke',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['anak_ke'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'8.',0,0);
    $pdf->Cell($width_cell[1],7,'Alamat Peserta Didik',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->MultiCell($width_cell[3],7,$row['alamat_siswa'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'9.',0,0);
    $pdf->Cell($width_cell[1],7,'Nomer Telepon Rumah',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['hp_siswa'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'10.',0,0);
    $pdf->Cell($width_cell[1],7,'Sekolah Asal',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['asal_sekolah'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'11.',0,0);
    $pdf->Cell($width_cell[1],7,'Diterima disekolah ini',0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'',0,0);
    $pdf->Cell($width_cell[1],7,'Dikelas',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['kel'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'',0,0);
    $pdf->Cell($width_cell[1],7,'Pada tanggal',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['tgl_terima'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'12.',0,0);
    $pdf->Cell($width_cell[1],7,'Nama Orang Tua',0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'',0,0);
    $pdf->Cell($width_cell[1],7,'Ayah',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['ayah'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'',0,0);
    $pdf->Cell($width_cell[1],7,'Ibu',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['ibu'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'13.',0,0);
    $pdf->Cell($width_cell[1],7,'Alamat Orang Tua',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->MultiCell($width_cell[3],7,$row['alamat_ortu'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'',0,0);
    $pdf->Cell($width_cell[1],7,'Nomer Telepon Rumah',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['hp_ortu'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'14.',0,0);
    $pdf->Cell($width_cell[1],7,'Pekerjaan Orang TUa',0,0);
    $pdf->Cell($width_cell[2],7,'',0,0);
    $pdf->MultiCell($width_cell[3],7,'',0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'',0,0);
    $pdf->Cell($width_cell[1],7,'Ayah',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['kerja_ayah'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'',0,0);
    $pdf->Cell($width_cell[1],7,'Ibu',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['kerja_ibu'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'15.',0,0);
    $pdf->Cell($width_cell[1],7,'Nama Wali Peserta Didik',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->MultiCell($width_cell[3],7,$row['nama_wali'],0,1);

$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'16.',0,0);
    $pdf->Cell($width_cell[1],7,'Alamat Wali Peserta Didik',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->MultiCell($width_cell[3],7,$row['alamat_wali'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'',0,0);
    $pdf->Cell($width_cell[1],7,'Nomer Telepon Rumah',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->Cell($width_cell[3],7,$row['hp_wali'],0,1);
$pdf->Cell(15);
    $pdf->Cell($width_cell[0],7,'17.',0,0);
    $pdf->Cell($width_cell[1],7,'Pekerjaan Wali Peserta Didik',0,0);
    $pdf->Cell($width_cell[2],7,':',0,0);
    $pdf->MultiCell($width_cell[3],7,$row['kerja_wali'],0,1);
 $pdf->Image('../../eraport/pdf/watermark.png',85,120,40,'C');
$pdf->SetXY(60,240);
$pdf->MultiCell(20,14,"Pas Foto\n3X4",1,'C',false);
$pdf->SetXY(60,238);
$width_cell=array(22,40,40);

// $pdf->Cell(45);
// $pdf->SetX(40);
// $pdf->Cell(30,"Pas Foto\n3X4",1,0);

$pdf->Cell(37);
$pdf->Cell($width_cell[1],5,'Pemalang, '.$row['tgl_terima'],0,1);
$pdf->Cell(87);
$pdf->Cell($width_cell[2],5,'Kepala Sekolah',0,1);
$pdf->ln(12);
$pdf->Cell(87);
$pdf->Cell($width_cell[1],5, $row['nama_ks'],0,1);
$pdf->Cell(87);
$pdf->Cell($width_cell[2],5,'NIPY. '.$row['nipy'],0,1);

$pdf->Output('D','Cover '. $row['kelas'].' '.$row['jurusan'].' '. $row['pemkelas'].' '.$row['nama'].'.pdf');
}?>