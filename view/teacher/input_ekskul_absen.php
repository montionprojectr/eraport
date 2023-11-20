<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="#" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
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
$eks1 = $_POST['eks1'];
$eks2 = $_POST['eks2'];
$eks3 = $_POST['eks3'];
$eks4 = $_POST['eks4'];
$eks5 = $_POST['eks5'];
$eks6 = $_POST['eks6'];
$eks7 = $_POST['eks7'];
$sakit = $_POST['sakit'];
$ijin = $_POST['ijin'];
$alpa = $_POST['alpa'];

for ($i=0; $i<$jum; $i++)
{
    mysqli_query($koneksi,"update tb_leger set nis='$nis[$i]', nama='$nama[$i]' , eks1='$eks1[$i]', eks2='$eks2[$i]', eks3='$eks3[$i]', eks4='$eks4[$i]', eks5='$eks5[$i]', eks6='$eks6[$i]', eks7='$eks7[$i]', sakit='$sakit[$i]', ijin='$ijin[$i]', alpa='$alpa[$i]' where id='$id[$i]' ") 
    or die(mysqli_error($koneksi));
}
    echo "<script>
   
    document.location='guru?page=ekskul_absen&id_walikelas=".$rows['id_walikelas']."'</script>";
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
              				<th width="80"><center>PRAMUKA</center></th>
               				<th width="80"><center>PKS</center></th>
                			<th width="80"><center>PMR</center></th>
                 			<th width="80"><center>Olahraga</center></th>
                  			<th width="80"><center>ROHIS</center></th>
                   			<th width="80"><center>Kesenian</center></th>
                    		<th width="80"><center>E-Sport</center></th>
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

         		 echo "<td><center><select name='eks1[]'> 
         	          	 		<option value='$data[eks1]'>".$data['eks1']."</option>
         	 					<option value=''></option>
         	 					<option value='A'>A</option>
         	 					<option value='B'>B</option>
         	 					<option value='C'>C</option>
         	 					<option value='D'>D</option>
         	 					</select></center></td>";  
         	 	 echo "<td><center><select name='eks2[]'> 
         	          	 		<option value='$data[eks2]'>".$data['eks2']."</option>
         	 					<option value=''></option>
         	 					<option value='A'>A</option>
         	 					<option value='B'>B</option>
         	 					<option value='C'>C</option>
         	 					<option value='D'>D</option>
         	 					</select></center></td>";  
         	 	 echo "<td><center><select name='eks3[]'> 
         	          	 		<option value='$data[eks3]'>".$data['eks3']."</option>
         	 					<option value=''></option>
         	 					<option value='A'>A</option>
         	 					<option value='B'>B</option>
         	 					<option value='C'>C</option>
         	 					<option value='D'>D</option>
         	 					</select></center></td>";  
         	 	 echo "<td><center><select name='eks4[]'> 
         	          	 		<option value='$data[eks4]'>".$data['eks4']."</option>
         	 					<option value=''></option>
         	 					<option value='A'>A</option>
         	 					<option value='B'>B</option>
         	 					<option value='C'>C</option>
         	 					<option value='D'>D</option>
         	 					</select></center></td>";  
         	 	 echo "<td><center><select name='eks5[]'> 
         	          	 		<option value='$data[eks5]'>".$data['eks5']."</option>
         	 					<option value=''></option>
         	 					<option value='A'>A</option>
         	 					<option value='B'>B</option>
         	 					<option value='C'>C</option>
         	 					<option value='D'>D</option>
         	 					</select></center></td>";  
         	 	 echo "<td><center><select name='eks6[]'> 
         	          	 		<option value='$data[eks6]'>".$data['eks6']."</option>
         	 					<option value=''></option>
         	 					<option value='A'>A</option>
         	 					<option value='B'>B</option>
         	 					<option value='C'>C</option>
         	 					<option value='D'>D</option>
         	 					</select></center></td>";  
         	 	 echo "<td><center><select name='eks7[]'> 
         	          	 		<option value='$data[eks7]'>".$data['eks7']."</option>
         	 					<option value=''></option>
         	 					<option value='A'>A</option>
         	 					<option value='B'>B</option>
         	 					<option value='C'>C</option>
         	 					<option value='D'>D</option>
         	 					</select></center></td>";  




           	// echo "<td><center><input type='text' name='eks1[]' value='$data[eks1]' size='1'></center></td>";
          	// echo "<td><center><input type='text' name='eks2[]' value='$data[eks2]' size='1'></center></td>";
           //  echo "<td><center><input type='text' name='eks3[]' value='$data[eks3]' size='1'></center></td>";
           // 	echo "<td><center><input type='text' name='eks4[]' value='$data[eks4]' size='1'></center></td>";
          	// echo "<td><center><input type='text' name='eks5[]' value='$data[eks5]' size='1'></center></td>";
           // 	echo "<td><center><input type='text' name='eks6[]' value='$data[eks6]' size='1'></center></td>";
          	// echo "<td><center><input type='text' name='eks7[]' value='$data[eks7]' size='1'></center></td>";
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