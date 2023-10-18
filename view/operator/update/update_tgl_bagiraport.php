<?php
include_once('koneksi.php');
$id = $_GET["id"];
?>
  

<!DOCTYPE html>
        <html lang="en">
        
        <head>
 <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Edit</title>
            <!-- import bootstrap  -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
                integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        </head>
        
        <body>
            <br>
 <div class="container col-lg-30">
                <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
                <h3 class="alert alert-success text-center" role="alert">
                    Edit Data Peserta Didik
                </h3>
 
<hr />

<hr />
 
<form method="post" action=''>
<table class="table ">
<thead class="thead-dark">
<?php
        include "koneksi.php";
        $no=1;
        $sql = "SELECT * FROM tb_thpelajaran WHERE id='$id'";
  $query = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_array($query);{
          
 
  ?>
   
  <tbody id="myTable">
  
    <tr>
      <td>Tahun pelajaran </td>
      <td>: <?php echo "<input type='text'size='10' name='tahun_pelajaran' value='$row[tahun_pelajaran]'>"; ?></td>
    </tr>
    <tr>
      <td>Semester</td>
      <td>: <?php echo "<input type='text'size='20' name='semester' value='$row[semester]'>"; ?></td>
    </tr>
    <tr>
      <td>Tanggal Pembagian Raport</td>
      <td>: <?php echo "<input type='text'size='50' name='tgl_bagi' value='$row[tgl_bagi]'>"; ?></td>
    </tr>
   
<tr>
  <div class="form-group float-center">
                    <td><button class="btn btn-primary float-center" type="submit" name="simpan_perubahan"><i class="fas fa-save"></i> Simpan Perubahan</button>  </td>
                    <!-- <a href="#" class="btn btn-primary">Download Template</a>  
                    <a href="#" class="btn btn-primary">Import Data</a>  -->
                  </div>  
    </tr>
   </tbody>
 </thead>

 </form>


   <?php
 
 } ?>
</table>
<?php



if(isset($_POST["simpan_perubahan"])){
 $id = $_GET["id"];
 $tahun_pelajaran = $_POST["tahun_pelajaran"];
 $semester = $_POST["semester"];
 $tgl_bagi = $_POST["tgl_bagi"];

  $update= "UPDATE tb_thpelajaran SET  tahun_pelajaran='$tahun_pelajaran', semester='$semester',tgl_bagi='$tgl_bagi' WHERE id='$id'";
 mysqli_query($koneksi, $update);
  if ($update) {
    echo "<script>
    alert('DATA PERUBAHAN BERHASIL DISIMPAN');
    document.location.href = '?view=pembagian';
    </script>";
  }else{
    echo "<script>
    alert('DATA PERUBAHAN GAGAL DISIMPAN');
    document.location.href = '?view=pembagian';
    </script>";
  }
}

?> 