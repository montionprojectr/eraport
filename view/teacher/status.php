<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="#" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= '' . $_GET['page'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->
<?php

 $cek_guru = mysqli_query($koneksi, "select * from tb_users where nipy = '".$_SESSION['nipy']."'");
$guru = mysqli_fetch_array($cek_guru);
 $sql = "SELECT * FROM tb_walikelas WHERE nipy='".$_SESSION['nipy']."'";
  $query = mysqli_query($koneksi, $sql);
  $rows = mysqli_fetch_array($query);
?>
       
            <!-- <?=$rows['kelas'];?> <?=$rows['komp_keahlian'];?> <?=$rows['pkelas'];?> -->

<form method="post" action="guru?page=naik">            

<div class="card-body">
				<table  class="table table-sm table-bordered table-striped" >
					<thead>
						<tr>
							<th><center>NO</center></th>
	<!-- 						<th><center>KELAS</center></th> -->
							<th><center>NIS</center></th>
							<th><center>NAMA</center></th>
              <th><center><input type="checkbox" onchange="checkAll(this)" name="id">PILIH SISWA</center></th>
							<th><center>STATUS</center></th>
						</tr>
						</tr>
					</thead>
					<tbody>

						 <?php 
       $i=1;


          $query = mysqli_query($koneksi, "select  * from tb_leger WHERE kelas='$rows[kelas]' and jurusan='$rows[komp_keahlian]' and pemkelas='$rows[pkelas]' and th_pelajaran='$rows[th_pelajaran]' and semester='Genap'");
          while ($data = mysqli_fetch_array($query)) 
          {
            echo "<tr>";
        
    
            ?>

            <?php

     
            echo "<td><center>".$i."</td></center>";
            // echo "<td><center>".$data['kelas'].' '.$data['jurusan'].' '.$data['pemkelas']."</td></center>";
            echo "<td><center>".$data['nis']."</td></center>";
            echo "<td>".$data['nama']."</td>";
            echo "<td><center><input type='checkbox' oninput='validasi()' name='id[]' id='cek' value='$data[id]'></center></td>";
            ?>
            <?php
            if($rows['kelas']=="X" && $data['status']=="XI"){
               echo "<td><center>NAIK KELAS</center></td>";
            }if($rows['kelas']=="XI" && $data['status']=="XII"){
               echo "<td><center>NAIK KELAS</center></td>";
            }if($rows['kelas']=="X" && $data['status']=="X"){
               echo "<td><center>TINGGAL KELAS</center></td>";
            }if($rows['kelas']=="XI" && $data['status']=="XI"){
               echo "<td><center>TINGGAL KELAS</center></td>";
            }
             $i++;
             echo "</tr>";
            }
            ?>
          
					</tbody>
				</table>
<br>
				<input  class='btn btn-primary'  type='submit' name='simpan' value='Naikan' disabled="">
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
$("input[type=checkbox]").on( "change", function(evt) {
var cek = $('input[id=cek]:checked');
if(cek.length == 0){
  $("input[name=simpan]").prop("disabled", true);
}else{
  $("input[name=simpan]").prop("disabled", false);
}
});
</script>
