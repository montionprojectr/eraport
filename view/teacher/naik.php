<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="#" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= 'Print >' . $_GET['page'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->
<?php
include "koneksi.php";
 $cek_guru = mysqli_query($koneksi, "select * from tb_users where nipy = '".$_SESSION['nipy']."'");
$guru = mysqli_fetch_array($cek_guru);
 $sql = "SELECT * FROM tb_walikelas WHERE nipy='".$_SESSION['nipy']."'";
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
$status = $_POST['status'];

for ($i=0; $i<$jum; $i++)
{
    mysqli_query($koneksi,"update tb_leger set nis = '$nis[$i]', nama = '$nama[$i]' , status ='$status[$i]'    where id='$id[$i]'") 
    or die(mysqli_error($koneksi));
}
    echo "<script>
   
    document.location='guru?page=status'</script>";
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
							<th><center>STATUS KENAIKAN</center></th>
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

            

     
            echo "<td><center>".$no."</td></center>";
         
            echo "<td><center>".$data['nis']."<input type='hidden' name='nis[]' value='$data[nis]' size='40'></td></center>";
            echo "<td>".$data['nama']."<input type='hidden' name='nama[]' value='$data[nama]' size='40'></td>";
            ?>
            <?php
            if($rows['kelas']=="X"){
            echo "<td><center><select name='status[]'> <option value='XI'>NAIK</option><option value='X' >TIDAK </option></select> <input type='hidden' name='id[]' value='$data[id]'></center></td>";  
            }
            if($rows['kelas']=="XI"){
            echo "<td><center><select name='status[]'> <option value='XII'>NAIK</option><option value='XI' >TIDAK </option></select> <input type='hidden' name='id[]' value='$data[id]'> </center></td>";
            }       
                 
           


            $no++; 
                   

            
            echo "</tr>";

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