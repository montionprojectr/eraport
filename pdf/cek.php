<?php
include_once('../../cover/koneksi.php');
$id = $_GET["id"];
?>
<?php  
 
/**
 * @author Achmad Solichin
 * @website http://achmatim.net
 * @email achmatim@gmail.com
 */
require("fpdf17/fpdf.php");
 include "../../cover/koneksi.php";
 $no=1;
        $sql = "SELECT * FROM tb_siswa, tb_sekolah WHERE id='$id'";
  $query = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_array($query);{

class FPDF_AutoWrapTable extends FPDF {
    private $data = array();
    private $options = array(
        'filename' => '',
        'destinationfile' => '',
        'paper_size'=>'A4',
        'orientation'=>'P'
    );
 
    function __construct($data = array(), $options = array()) {
        parent::__construct();
        $this->data = $data;
        $this->options = $options;
    }
 
    public function rptDetailData () {
        //
        $border = 0;
        $this->AddPage();
        $this->SetAutoPageBreak(true,60);
        $this->AliasNbPages();
        $left = 25;
 
        //header
        // $this->SetFont("", "B", 15);
        // $this->MultiCell(0, 12, 'PT. ACHMATIM DOT NET');
        // $this->Cell(0, 1, " ", "B");
        // $this->Ln(10);
        // $this->SetFont("", "B", 12);
        // $this->SetX($left); $this->Cell(0, 10, 'LAPORAN DATA KARYAWAN', 0, 1,'C');
        // $this->Ln(10);
         include "../../cover/koneksi.php";
 $id = $_GET["id"];
  $no=1;
 $sql = "SELECT * FROM tb_siswa, tb_sekolah WHERE id='$id'";
  $query = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_array($query);
 $this->SetFont('Arial','',10);

$width_cell=array(120,10,200,60,10,100);
$this->Cell(10);
    $this->Cell($width_cell[0],8,'Nama Peserta Didik',0,0);
    $this->Cell($width_cell[1],8,':',0,0);
    $this->Cell($width_cell[2],8,$row['nama'],0,0);
    $this->Cell($width_cell[3],8,'Kelas',0,0);
    $this->Cell($width_cell[4],8,':',0,0);
    $this->Cell($width_cell[5],8,'dfd',0,1);
  $this->ln(6);  
$this->Cell(10);
    $this->Cell($width_cell[0],8,'Nomor Induk/NISN',0,0);
    $this->Cell($width_cell[1],8,':',0,0);
    $this->Cell($width_cell[2],8,$row['nis'].' / '.$row['nisn'],0,0);
    $this->Cell($width_cell[3],8,'Fase',0,0);
    $this->Cell($width_cell[4],8,':',0,0);
    $this->Cell($width_cell[5],8,'E',0,1);

$this->ln(20);    
$this->Cell(15);
$this->SetFont('Arial','B',10);
    $this->Cell($width_cell[0],6,'A. Nilai Akademik',0,1);
$this->ln(3);

        $h = 20;
        $left = 40;
        $top = 80;
        #tableheader
        $this->SetFillColor(224,235,255);
        $left = $this->GetX();
$this->Cell(15);
        $this->Cell(30,$h,'No',1,0,'C',true);
        $this->Cell(140, $h, 'Mata Pelajaran', 1, 0, 'C',true);
        $this->Cell(60, $h, 'Nilai Akhir', 1, 0, 'C',true);
        $this->Cell(270, $h, 'Capaian Kompetensi', 1, 1, 'C',true);
        $this->SetFillColor(255);
        $this->Cell(15);
       $this->Cell(500, $h, 'A. Kelompok Mata Pelajaran Umum', 1, 1, 'L',true);
       $h=35; // default height of each MultiCell
$w=20;// Width of each MultiCell
$f=0.75*$h;


        $this->SetFont('Arial','',9);
        $this->Cell(15);
        $this->SetWidths(array(30,140,60,270));
        $this->SetAligns(array('C','L','C','J'));

// $this->MultiCell($width_cell[0],30,$h,$no++,'LRTB','C',true);
// $this->MultiCell($width_cell[1],30,$h,'Bahasa Indonesia','LRTB','C',true);
//   $this->Cell(15);
// $this->MultiCell(30,$h,$no++,'LRTB','C',true);
        $no = 1; $this->SetFillColor(255);;
        foreach ($this->data as $baris) {
            $this->Row(
                array($no++,
                $baris['mapel'],
                $baris['na'],
                $baris['cp']
              
            ));$this->Cell(15);
        }
 
    }
 
    public function printPDF () {
 
        if ($this->options['paper_size'] == "A4") {
            $a = 8.3 * 72; //1 inch = 72 pt
            $b = 13.0 * 72;
            $this->FPDF($this->options['orientation'], "pt", array($a,$b));
        } else {
            $this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
        }
 
        $this->SetAutoPageBreak(false);
        $this->AliasNbPages();
        $this->SetFont("helvetica", "B", 10);
        //$this->AddPage();
 
        $this->rptDetailData();
 
        $this->Output($this->options['filename'],$this->options['destinationfile']);
    }
 
    private $widths;
    private $aligns;
 
    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }
 
    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }
 
    function Row($data)
    {
        //Calculate the height of the row
        $nb=1;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=10*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,10,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }
 
    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }
 
    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
} //end of class
 
//contoh penggunaan
$data = array(
    array(
        'mapel'       => 'Pendidikan Agama dan Budi Pekerti' ,
        'na'          => 87,
        'cp'   =>'Menunjukkan penguasaan ;',
    ),
    array(
        'mapel'       => 'Pendidikan Pancasila',
        'na'          => '86',
        'cp'   => 'Perlu ditingkatkan dalam menumbuhkan keinginan bagi peserta didik dalam kewirausahaan dan kepedulian sosial dengan menerapkan ilmu fiqih dalam kegiatannya'
    
    )
);
 
//pilihan
$options = array(
    'filename' => 'cek.pdf', //nama file penyimpanan, kosongkan jika output ke browser
    'destinationfile' => 'F', //I=inline browser (default), F=local file, D=download
    'paper_size'=>'A4', //paper size: F4, A3, A4, A5, Letter, Legal
    'orientation'=>'P' //orientation: P=portrait, L=landscape
);
 
$tabel = new FPDF_AutoWrapTable($data, $options);
$tabel->printPDF();
}?>