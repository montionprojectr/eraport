<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb">
	    <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['page'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
 <?php

 $cek_guru = mysqli_query($koneksi, "select * from tb_users where nipy = '".$_SESSION['nipy']."'");
$guru = mysqli_fetch_array($cek_guru);
 $sql = "SELECT * FROM tb_walikelas WHERE id_walikelas = '".$_GET['id_walikelas']."'";
  $query = mysqli_query($koneksi, $sql);
  $rows = mysqli_fetch_array($query);
?>
       
            <!--    <?=$rows['kelas'];?> <?=$rows['komp_keahlian'];?> <?=$rows['pkelas'];?> -->

<div class="card-body">
				<table  class="table table-sm table-bordered table-striped" >
					<thead>
						<tr>
							<th><center>NO</center></th>
							<th><center>KELAS</center></th>
							<th><center>NIS</center></th>
							<th><center>NAMA</center></th>
              <?php

            if($rows['kelas']=="X"){
              echo "<th ><center>".'CETAK COVER'."</center></th>"; 
              echo "<th><center>".'CETAK  RAPORT GANJIL'."</center></th>"; 
              echo "<th><center>".'CETAK  RAPORT GENAP'."</center></th>"; 

            }
            else if($rows['kelas']=="XI"){
               echo "<th ><center>".'CETAK COVER'."</center></th>"; 
              echo "<th><center>".'CETAK  RAPOR GANJIL'."</center></th>";
              echo "<th><center>".'CETAK  RAPORT GENAP'."</center></th>"; 
            }
          else if($rows['kelas']=="XII"){
             echo "<th ><center>".'CETAK COVER'."</center></th>"; 
              echo "<th><center>".'CETAK  RAPOR GANJIL'."</center></th>";
              echo "<th><center>".'CETAK  RAPORT GENAP'."</center></th>"; 
            }
            ?>
						<!-- 	<th><center>CETAK COVER</center></th>
							<th><center>CETAK  RAPORT</center></th> -->

						</tr>
					</thead>
					<tbody>


						 <?php 
          $no = 1;


          $query = mysqli_query($koneksi, "select  * from tb_leger WHERE kelas='$rows[kelas]' and jurusan='$rows[komp_keahlian]' and pemkelas='$rows[pkelas]' and th_pelajaran='$rows[th_pelajaran]'");
          while ($data = mysqli_fetch_array($query)) 
          {
            echo "<tr>";
        
    
            ?>

            <?php

            if($rows['kelas']=="X"&$data['semester']=="Ganjil"){
            echo "<td><center>".$no++."</td></center>";
            echo "<td><center>".$data['kelas'].' '.$data['jurusan'].' '.$data['pemkelas']."</td></center>";
            echo "<td><center>".$data['nis']."</td></center>";
            echo "<td>".$data['nama']."</td>";  
            echo "<td ><center>"."<a href=pdf/cover.php?id=".$data['id']."><i class='fas fa-book'>"."</i></a></center></td>";
            echo "<td ><center>"."<a href=pdf/raportx.php?nis=".$data['nis']."&semester=".$data['semester']."&th_pelajaran=".$data['th_pelajaran']."&kelas=".$data['kelas']."><i class='fas fa-print'>"."</i></a></center></td>";
            
            echo "<td ><center>"."<a href=pdf/raportx.php?nis=".$data['nis']."&semester=Genap"."&th_pelajaran=".$data['th_pelajaran']."&kelas=".$data['kelas']."><i class='fas fa-print'>"."</i></a></center></td>";
                
            }
            else if($rows['kelas']=="XI"&$data['semester']=="Ganjil"){
            echo "<td><center>".$no++."</td></center>";
            echo "<td><center>".$data['kelas'].' '.$data['jurusan'].' '.$data['pemkelas']."</td></center>";
            echo "<td><center>".$data['nis']."</td></center>";
            echo "<td>".$data['nama']."</td>"; 
              echo "<td ><center>"."<a href=pdf/cover.php?id=".$data['id']."><i class='fas fa-book'>"."</i></a></center></td>";
            echo "<td ><center>"."<a href=pdf/raportxi.php?nis=".$data['nis']."&semester=".$data['semester']."&th_pelajaran=".$data['th_pelajaran']."&kelas=".$data['kelas']."><i class='fas fa-print'>"."</i></a></center></td>";
            echo "<td ><center>"."<a href=pdf/raportxi.php?nis=".$data['nis']."&semester=Genap"."&th_pelajaran=".$data['th_pelajaran']."&kelas=".$data['kelas']."><i class='fas fa-print'>"."</i></a></center></td>";

            }
             else if($rows['kelas']=="XII"&$data['semester']=="Ganjil"){
            echo "<td><center>".$no++."</td></center>";
            echo "<td><center>".$data['kelas'].' '.$data['jurusan'].' '.$data['pemkelas']."</td></center>";
            echo "<td><center>".$data['nis']."</td></center>";
            echo "<td>".$data['nama']."</td>"; 
              echo "<td ><center>"."<a href=pdf/cover.php?id=".$data['id']."><i class='fas fa-book'>"."</i></a></center></td>";
            echo "<td ><center>"."<a href=pdf/raportxii.php?nis=".$data['nis']."&semester=".$data['semester']."&th_pelajaran=".$data['th_pelajaran']."&kelas=".$data['kelas']."><i class='fas fa-print'>"."</i></a></center></td>";
            echo "<td ><center>"."<a href=pdf/raportxii.php?nis=".$data['nis']."&semester=Genap"."&th_pelajaran=".$data['th_pelajaran']."&kelas=".$data['kelas']."><i class='fas fa-print'>"."</i></a></center></td>";
            }

            ?>
       


<!--            
<td><center><a href="pdf/cover.php?id=<?= $data['id'] ?>" class='btn btn-primary'><i class='fas fa-book'></i></a>  </center></td> --> 

           <!--  <td><center><a href="pdf/raport.php?nis=<?= $data['nis']?>&semester=<?= $data['semester']?>&th_pelajaran=<?= $data['th_pelajaran']?>&kelas=<?= $data['kelas']?>" class='btn btn-primary'><i class='fas fa-print'></i></a> </center> </td> -->
       

            <?php
            echo "</tr>";
          }
          echo $no-1; echo '  Siswa';
                    ?>
          
					</tbody>
				</table>
			</div>
<?php  ?>