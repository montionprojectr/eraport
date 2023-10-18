<?php
// menghubungkan dengan koneksi
    include "../../koneksi.php";
// menghubungkan dengan library excel reader
require_once "../../lib/excel_reader2.php";
 
 
//// upload file xls
$target = basename($_FILES['filedata']['name']) ;
move_uploaded_file($_FILES['filedata']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['filedata']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filedata']['name'],false);
 
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;

 
for ($i=2; $i<=$jumlah_baris; $i++){
 
    // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
    $nis            = $data->val($i, 1); 
    $nisn           = $data->val($i, 2);
    $nama           = $data->val($i, 3);
    $kelas          = $data->val($i, 4);
    $jurusan        = $data->val($i, 5);
    $pemkelas       = $data->val($i, 6);
    $th_pelajaran   = $data->val($i, 7);
    $ttl            = $data->val($i, 8);
    $kelamin        = $data->val($i, 9);
    $agama          = $data->val($i, 10);
    $status         = $data->val($i, 11);
    $anak_ke        = $data->val($i, 12);
    $alamat_siswa   = $data->val($i, 13);
    $hp_siswa       = $data->val($i, 14);
    $asal_sekolah   = $data->val($i, 15);
    $tgl_terima     = $data->val($i, 16);
    $ayah           = $data->val($i, 17);
    $ibu            = $data->val($i, 18);
    $alamat_ortu    = $data->val($i, 19);
    $hp_ortu        = $data->val($i, 20);
    $kerja_ayah     = $data->val($i, 21);
    $kerja_ibu      = $data->val($i, 22);
    $nama_wali      = $data->val($i, 23);
    $alamat_wali    = $data->val($i, 24);
    $hp_wali        = $data->val($i, 25);
    $kerja_wali     = $data->val($i, 26);





 
 
//mengecek jika kolom data pada template excel ada yang kosong
$cari = mysqli_num_rows(mysqli_query($koneksi,"SELECT nis FROM tb_siswa WHERE nis='$nis'"));

 
if (empty($nis)){
       
     //echo "<script>window.alert('Jangan ada nilai kosong !')</script>";
    echo "<script>window.location='".$_SERVER['HTTP_REFERER']."'</script>";
     
}
elseif ($cari > 0){
   
        // $query=mysqli_query($koneksi,"UPDATE tb_siswa SET  nis='$nis', nisn='$nisn',nama='$nama', kelas='$kelas',jurusan='$jurusan',pemkelas='$pemkelas',th_pelajaran='$th_pelajaran',ttl='$ttl', kelamin='$kelamin',agama='$agama', status='$status', anak_ke='$anak_ke', alamat_siswa='$alamat_siswa', hp_siswa='$hp_siswa', asal_sekolah='$asal_sekolah',tgl_terima='$tgl_terima', ayah='$ayah',ibu='$ibu',alamat_ortu='$alamat_ortu',hp_ortu='$hp_ortu',kerja_ayah='$kerja_ayah',kerja_ibu='$kerja_ibu', nama_wali='$nama_wali',alamat_wali='$alamat_wali',hp_wali='$hp_wali',kerja_wali='$kerja_wali' WHERE nis='$nis'");  
        //  $update=mysqli_query($koneksi,"UPDATE tb_leger SET  nis='$nis',nama='$nama', kelas='$kelas',jurusan='$jurusan',pemkelas='$pemkelas',th_pelajaran='$th_pelajaran', WHERE nis='$nis'");  

     $update= "UPDATE tb_siswa SET  nis='$nis', nisn='$nisn',nama='$nama', kelas='$kelas',jurusan='$jurusan',pemkelas='$pemkelas',ttl='$ttl', kelamin='$kelamin',agama='$agama', status='$status', anak_ke='$anak_ke', alamat_siswa='$alamat_siswa', hp_siswa='$hp_siswa', asal_sekolah='$asal_sekolah',tgl_terima='$tgl_terima', ayah='$ayah',ibu='$ibu',alamat_ortu='$alamat_ortu',hp_ortu='$hp_ortu',kerja_ayah='$kerja_ayah',kerja_ibu='$kerja_ibu', nama_wali='$nama_wali',alamat_wali='$alamat_wali',hp_wali='$hp_wali',kerja_wali='$kerja_wali' WHERE nis='$nis'";
  mysqli_query($koneksi, $update);
 $leger= "UPDATE tb_leger SET  nis='$nis',nama='$nama', kelas='$kelas',jurusan='$jurusan',pemkelas='$pemkelas'  WHERE nis='$nis'";
 mysqli_query($koneksi, $leger);


 }
 else{
        //input data ke database (table datasiswa)
        $query=mysqli_query($koneksi,"INSERT into tb_siswa (nis,nisn,nama,kelas,jurusan,pemkelas,th_pelajaran,ttl,kelamin,agama,status,anak_ke,alamat_siswa,hp_siswa,asal_sekolah,tgl_terima,ayah,ibu,alamat_ortu,hp_ortu,kerja_ayah,kerja_ibu,nama_wali,alamat_wali,hp_wali,kerja_wali)  values('$nis','$nisn','$nama','$kelas','$jurusan','$pemkelas','$th_pelajaran','$ttl','$kelamin','$agama','$status','$anak_ke','$alamat_siswa','$hp_siswa','$asal_sekolah','$tgl_terima','$ayah','$ibu','$alamat_ortu','$hp_ortu','$kerja_ayah','$kerja_ibu','$nama_wali','$alamat_wali','$hp_wali','$kerja_wali')");
    
       $query=mysqli_query($koneksi,"INSERT into tb_leger (nis,nama,kelas,jurusan,pemkelas,th_pelajaran)  values('$nis','$nama','$kelas','$jurusan',$pemkelas,'$th_pelajaran')");
 }

     
                                           
$berhasil++;
   
}
 
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filedata']['name']);
 
// // alihkan halaman ke index.php
echo "<script>window.alert('sukses import $berhasil data!')</script>";
echo "<script>window.location='siswa.php'</script>";

?>