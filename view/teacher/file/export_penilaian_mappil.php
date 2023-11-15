<?php 
include "../../../koneksi.php";
// Load file autoload.php
require '../../../vendor/autoload.php';
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_GET['id'])) {
    $id_kelasmappil = $_GET['id'];
    $query = mysqli_query($koneksi, "select * from tb_kelasmappil where id_kelasmappil = '$id_kelasmappil'");
    $dt = mysqli_fetch_array($query);
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'NIS');
$sheet->setCellValue('B1', 'NAMA');
$sheet->setCellValue('C1', 'KELAS');
$sheet->setCellValue('D1', 'Formatif');
$sheet->setCellValue('E1', 'Sumatif_1');
$sheet->setCellValue('F1', 'Sumatif_2');
$sheet->setCellValue('G1', 'Sumatif_3');
$sheet->setCellValue('H1', 'Sumatif_4');
$sheet->setCellValue('I1', 'asts');
$sheet->setCellValue('J1', 'asas');
// $sheet->setCellValue('K1', 'cpm');
// $sheet->setCellValue('L1', 'cpp');

 
$data = mysqli_query($koneksi,"select id_ruangsiswa_mappil, id_kelasmappil, x.th_pelajaran, x.semester, kode_mapel, kode_mapelsub, x.nis, nama, concat_ws(' ',y.kelas, y.jurusan, y.pemkelas) as class from tb_ruangsiswa_mappil x inner join tb_siswa_kelas y on y.nis = x.nis inner join tb_siswa z on z.nis = x.nis where id_kelasmappil = '$id_kelasmappil'");
$i = 2;
$no = 1;
while($d = mysqli_fetch_array($data))
{
    $sheet->setCellValue('A'.$i, $d['nis']);
    $sheet->setCellValue('B'.$i, $d['nama']);
    $sheet->setCellValue('C'.$i, $d['class']);    
    $sheet->setCellValue('D'.$i, 0);
    $sheet->setCellValue('E'.$i, 0);
    $sheet->setCellValue('F'.$i, 0);
    $sheet->setCellValue('G'.$i, 0);
    $sheet->setCellValue('H'.$i, 0);
    $sheet->setCellValue('I'.$i, 0);    
    $sheet->setCellValue('J'.$i, 0);
    // $sheet->setCellValue('K'.$i, 0);
    // $sheet->setCellValue('L'.$i, 0);

    $i++;
}
 
// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=Template_import_nilai_".$dt['nama_kelaspil'].".xlsx"); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
// unlink('Template_nilaiimport.xlsx');
echo "<script>window.location = 'Template_import_nilai_".$dt['nama_kelaspil'].".xlsx'</script>";

}
?>