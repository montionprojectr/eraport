<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="bk" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' Print > ' . $_GET['page'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->

<?php
include "koneksi.php";
 $cek_guru = mysqli_query($koneksi, "select * from tb_users where nipy = '".$_SESSION['nipy']."'");
$guru = mysqli_fetch_array($cek_guru);
 $sql = "SELECT * FROM tb_walikelas WHERE id_walikelas = '".$_GET['id_walikelas']."'";
  $query = mysqli_query($koneksi, $sql);
  $rows = mysqli_fetch_array($query);
?>
       
<!-- <?=$rows['kelas'];?> <?=$rows['komp_keahlian'];?> <?=$rows['pkelas'];?> -->

<?php

include "koneksi.php";
if(isset($_POST["jum"])){
$jum = $_POST['jum'];  
$id = $_POST['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$sakit = $_POST['sakit'];
$ijin = $_POST['ijin'];
$alpa = $_POST['alpa'];

for ($i=0; $i<$jum; $i++)
{
    mysqli_query($koneksi,"update tb_leger set nis='$nis[$i]', nama='$nama[$i]', sakit='$sakit[$i]', ijin='$ijin[$i]', alpa='$alpa[$i]' where id='$id[$i]' ") 
    or die(mysqli_error($koneksi));
}
    echo "<script>
   
    document.location='bk?page=kehadiran&id_walikelas=".$rows['id_walikelas']."'</script>";
 }
?>
<form method="post" action="">            

<div class="card-body">
				<table  class="table table-sm table-bordered table-striped" >
					<thead>
						<tr>
							<th><center>NO</center></th>
							<th><center>NIS</center></th>
							<th><center>NAMA</center></th>
           		<th><center>Sakit</center></th>
           		<th><center>Ijin</center></th>
           		<th><center>Alpa</center></th>
						</tr>
						</tr>
					</thead>
					<tbody>

						 <?php
include "koneksi.php";
$no=1;

$id = $_POST['id'];
$jum = count($id); //menghitung jumlah ID yang dipilih

for ($i=0; $i<$jum; $i++) { // Proses Looping

    $sql = mysqli_query($koneksi,"select * from tb_leger where id='$id[$i]'")
    or die (mysqli_error($koneksi));
    
    while($data = mysqli_fetch_array($sql)){

            

     
            echo "<td><center>".$no."</center></td>";
         
            echo "<td><center>".$data['nis']."<input type='hidden' name='nis[]' value='$data[nis]'></center></td>";
            echo "<td>".$data['nama']."<input type='hidden' name='nama[]' value='$data[nama]' size='40'></td>";
           	echo "<td><center><input type='text' name='sakit[]' value='$data[sakit]' size='1'></center></td>";
          	echo "<td><center><input type='text' name='ijin[]' value='$data[ijin]' size='1'></center></td>";
           	echo "<td><center><input type='text' name='alpa[]' value='$data[alpa]' size='1'></center></td>";


            $no++; 
       
            
            echo "<input type='hidden' name='id[]' value='$data[id]'></tr>";

          }
       }

                    ?>

          
					</tbody>
				</table>
<br>
				<input  class='btn btn-primary'  type='submit' name='proses' value='Simpan' ><input type="hidden" name="jum" value="<?php echo $jum; ?>"> <?php echo $jum; ?> SISWA
			</form>
			</div>
<?php  ?>
<script type="text/javascript">
 function checkAll(ele) {
      var checkboxes = document.getElementsByTagName('input');
      if (ele.checked) {
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].type == 'checkbox' ) {
                  checkboxes[i].checked = true;
              }
          }
      } else {
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].type == 'checkbox') {
                  checkboxes[i].checked = false;
              }
          }
      }
  }
</script>