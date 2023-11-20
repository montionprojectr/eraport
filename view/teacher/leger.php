<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' Print > ' . $_GET['page'] ?: 'Dashboard'; ?></li>
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

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-danger"><h3 class="card-title">LEGER SISWA <?=$rows['kelas'];?> <?=$rows['komp_keahlian'];?> <?=$rows['pkelas'];?>  


</h3><div class="form-group float-right">
<form action="" method="POST">
			<select name="semester" >
				<option value="">Pilih Semester</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
			</select>
<input type="submit" name="submit" value="oke">


</form>

		</div></div>	
			
			<div class="card-body bg-coral">
				<style>
					.h{
					text-align:center;
					font-size: 12px;
					}
					
					.vertical-header{
					writing-mode :vertical-rl;
					transform: rotate(-180deg);
					text-align:left;
					max-height: 100%;
					max-width: 100px;
					/*text-orientation: mixed;*/
					font-size: 12px;

				}
				</style>


			<table id="" class="table-bordered table-striped">
	
				<thead>
					<tr>
						
	<th class="h">No</th>
    <th class="h">NIS</th>
    <th width="280px"><center>Nama Siswa</center></th>
    <th width="90px"><center>Kelas</center></th>	 
    <th  class="vertical-header">semester</th>
     <th  class="vertical-header">Tahun Ajaran</th>		

	<?php
		if($rows['kelas']=="X"){
			echo "<th class='vertical-header'>".'PABP'."</th>";
            echo "<th class='vertical-header'>".'PKn'."</th>";  
			echo "<th class='vertical-header'>".'B.Indonesia'."</th>";
            echo "<th class='vertical-header'>".'Penjaskes'."</th>";
            echo "<th class='vertical-header'>".'Sejarah'."</th>";

            echo "<th class='vertical-header'>".'Seni Budaya'."</th>";
            echo "<th class='vertical-header'>".'Bahasa Jawa'."</th>";

            echo "<th class='vertical-header'>".'Matematika'."</th>";
            echo "<th class='vertical-header'>".'B.Inggris'."</th>";

            echo "<th class='vertical-header'>".'Informatika'."</th>";
            echo "<th class='vertical-header'>".'Projek IPAS'."</th>";          
            echo "<th class='vertical-header'>".'Dasar Keahlian'."</th>";
        } else if($rows['kelas']=="XI"){
			echo "<th class='vertical-header'>".'PABP'."</th>";
            echo "<th class='vertical-header'>".'PKn'."</th>";  
			echo "<th class='vertical-header'>".'B. Indonesia'."</th>";
            echo "<th class='vertical-header'>".'Penjaskes'."</th>";
            echo "<th class='vertical-header'>".'Sejarah'."</th>";

            echo "<th class='vertical-header'>".'Bahasa Jawa'."</th>";
            echo "<th class='vertical-header'>".'Bahasa Arab'."</th>";

            echo "<th class='vertical-header'>".'Matematika'."</th>";
            echo "<th class='vertical-header'>".'B.Inggris'."</th>";

            echo "<th class='vertical-header'>".'Kons. Keahlian'."</th>";
            echo "<th class='vertical-header'>".'PKK'."</th>";          

            echo "<th class='vertical-header'>".'Mapel Pilihan'."</th>";
         } else if($rows['kelas']=="XII"){
			echo "<th class='vertical-header'>".'PABP'."</th>";
            echo "<th class='vertical-header'>".'PKn'."</th>";  
			echo "<th class='vertical-header'>".'B. Indonesia'."</th>";
            echo "<th class='vertical-header'>".'Penjaskes'."</th>";
            echo "<th class='vertical-header'>".'Sejarah'."</th>";

            echo "<th class='vertical-header'>".'Bahasa Jawa'."</th>";
            echo "<th class='vertical-header'>".'Bahasa Arab'."</th>";

            echo "<th class='vertical-header'>".'Matematika'."</th>";
            echo "<th class='vertical-header'>".'B.Inggris'."</th>";

            echo "<th class='vertical-header'>".'Kons. Keahlian'."</th>";
            echo "<th class='vertical-header'>".'PKK'."</th>";          

            echo "<th class='vertical-header'>".'Mapel Pilihan'."</th>";
            echo "<th class='vertical-header'>".'Prakrin'."</th>";
         } 
    ?>



    <th class="vertical-header">TOTAL</th>
    <th class="vertical-header">RERATA</th>

<!--     <th class="vertical-header">Rangking</th> -->

    <th class="vertical-header">Sakit</th>
    <th class="vertical-header">Ijin</th>
    <th class="vertical-header">Alpa</th>

    <th class="vertical-header">PRAMUKA</th>
    <th class="vertical-header">PKS</th>
    <th class="vertical-header">PMR</th>
    <th class="vertical-header">OLAHRAGA</th>
    <th class="vertical-header">ROHIS</th>
    <th class="vertical-header">KESENIAN</th>
    <th class="vertical-header">E-SPORT</th>
</font>
					</tr>		
				</thead>

				<tbody>
			<?php 
					$no = 1;
				 	$jumlah=0;
					$rata=0;
					if (isset($_POST['submit'])){
					$cari= $_POST['semester'];
					
					$query = mysqli_query($koneksi, "select * from tb_leger WHERE kelas='$rows[kelas]' and jurusan='$rows[komp_keahlian]' and pemkelas='$rows[pkelas]'and th_pelajaran='$rows[th_pelajaran]' and semester='".$cari."'");
				
					while ($data = mysqli_fetch_array($query)) {
					

						echo "<tr>";
						echo "<td>".$no++."</center></td>";
	
						echo "<td><center>".$data['nis']."</center></td>";
						echo "<td>".$data['nama']."</td>";
						echo "<td><center>".$data['kelas'].' '.$data['jurusan'].' '.$data['pemkelas']."</center></td>";
						echo "<td><center>".$data['semester']."</center></td>";
						echo "<td><center>".$data['th_pelajaran']."</center></td>";

						?>
						<?php

						if($rows['kelas']=="X"){
								$rata=($data['pabp']+$data['pkn']+$data['b_indo']+$data['penjas']+$data['sejarah']+$data['seni']+$data['b_jawa']+$data['mtk']+$data['b_ing']+$data['informatika']+$data['projek']+$data['dasar'])/12;
       				 			$jumlah=($data['pabp']+$data['pkn']+$data['b_indo']+$data['penjas']+$data['sejarah']+$data['seni']+$data['b_jawa']+$data['mtk']+$data['b_ing']+$data['informatika']+$data['projek']+$data['dasar']);
						echo "<td><center>".$data['pabp']."</center></td>";
						echo "<td><center>".$data['pkn']."</center></td>";
						echo "<td><center>".$data['b_indo']."</center></td>";
						echo "<td><center>".$data['penjas']."</center></td>";
						echo "<td><center>".$data['sejarah']."</center></td>";

						echo "<td><center>".$data['seni']."</center></td>";
						echo "<td><center>".$data['b_jawa']."</center></td>";
						echo "<td><center>".$data['mtk']."</center></td>";
						echo "<td><center>".$data['b_ing']."</center></td>";
						echo "<td><center>".$data['informatika']."</center></td>";
						echo "<td><center>".$data['projek']."</center></td>";
						echo "<td><center>".$data['dasar']."</center></td>";
						echo "<td><center>"."$jumlah"."</center></td>";
						echo "<td><center>".number_format($rata,1)."</center></td>";

						} else if($rows['kelas']=="XI"){
									$rata=($data['pabp']+$data['pkn']+$data['b_indo']+$data['penjas']+$data['sejarah']+$data['b_jawa']+$data['b_arab']+$data['mtk']+$data['b_ing']+$data['dasar']+$data['projek']+$data['mapel_pilihan'])/12;
       				 			$jumlah=($data['pabp']+$data['pkn']+$data['b_indo']+$data['penjas']+$data['sejarah']+$data['b_jawa']+$data['b_arab']+$data['mtk']+$data['b_ing']+$data['dasar']+$data['projek']+$data['mapel_pilihan']);



// 	$nilai=array($jumlah);


// 	$sort=$nilai;
// 	rsort($sort);
// echo "<pre>";
// print_r($sort);
// echo "</pre>";			 			

						echo "<td><center>".$data['pabp']."</center></td>";
						echo "<td><center>".$data['pkn']."</center></td>";
						echo "<td><center>".$data['b_indo']."</center></td>";
						echo "<td><center>".$data['penjas']."</center></td>";
						echo "<td><center>".$data['sejarah']."</center></td>";
						echo "<td><center>".$data['b_jawa']."</center></td>";
						echo "<td><center>".$data['b_arab']."</center></td>";
						echo "<td><center>".$data['mtk']."</center></td>";
						echo "<td><center>".$data['b_ing']."</center></td>";
						echo "<td><center>".$data['dasar']."</center></td>";
						echo "<td><center>".$data['projek']."</center></td>";
						echo "<td><center>".$data['mapel_pilihan']."</center></td>";
						echo "<td><center>"."$jumlah"."</center></td>";
						echo "<td><center>".number_format($rata,1)."</center></td>";


						} else if($rows['kelas']=="XII"){
									$rata=($data['pabp']+$data['pkn']+$data['b_indo']+$data['penjas']+$data['sejarah']+$data['b_jawa']+$data['b_arab']+$data['mtk']+$data['b_ing']+$data['dasar']+$data['projek']+$data['mapel_pilihan'])/12;
       				 			$jumlah=($data['pabp']+$data['pkn']+$data['b_indo']+$data['penjas']+$data['sejarah']+$data['b_jawa']+$data['b_arab']+$data['mtk']+$data['b_ing']+$data['dasar']+$data['projek']+$data['mapel_pilihan']);
						echo "<td><center>".$data['pabp']."</center></td>";
						echo "<td><center>".$data['pkn']."</center></td>";
						echo "<td><center>".$data['b_indo']."</center></td>";
						echo "<td><center>".$data['penjas']."</center></td>";
						echo "<td><center>".$data['sejarah']."</center></td>";
						echo "<td><center>".$data['b_jawa']."</center></td>";
						echo "<td><center>".$data['b_arab']."</center></td>";
						echo "<td><center>".$data['mtk']."</center></td>";
						echo "<td><center>".$data['b_ing']."</center></td>";
						echo "<td><center>".$data['dasar']."</center></td>";
						echo "<td><center>".$data['projek']."</center></td>";
						echo "<td><center>".$data['mapel_pilihan']."</center></td>";
						echo "<td><center>".$data['pkl']."</center></td>";
						echo "<td><center>"."$jumlah"."</center></td>";
						echo "<td><center>".number_format($rata,1)."</center></td>";

						}?>
<?PHP
						// echo "<td><center>".""."</center></td>";
						echo "<td><center>".$data['sakit']."</center></td>";
						echo "<td><center>".$data['ijin']."</center></td>";
						echo "<td><center>".$data['alpa']."</center></td>";
						echo "<td><center>".$data['eks1']."</center></td>";
						echo "<td><center>".$data['eks2']."</center></td>";
						echo "<td><center>".$data['eks3']."</center></td>";
						echo "<td><center>".$data['eks4']."</center></td>";
						echo "<td><center>".$data['eks5']."</center></td>";
						echo "<td><center>".$data['eks6']."</center></td>";
						echo "<td><center>".$data['eks7']."</center></td>";


						?>
						<!-- <td><a href="?view=update_guru&id=<?= $data['id_user'] ?>" class='btn btn-primary'><i class='fas fa-edit'></i></a> || <a href="view/operator/del/delete_users_guru.php?id=<?= $data['id_user'] ?>" class='btn btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus username <?= $data['username'] ?> ini?')"><i class='fas fa-trash'></i></a> </td> -->
						<?php
						echo "</tr>";

					}
					}?>

				</tbody>
		
			</table>
	<?php
            echo "</tr>";
          
          // echo $no-1; echo '  Siswa';
                    ?>
			</div>
		</div>
	</div>
</div>

            
<a href="guru" class="btn btn-primary">Kembali</a>
<input type="submit"  value="cetak" onclick="window.print()" class="btn btn-primary">

<!-- <button class="btn btn-primary float-center" type="submit" name="simpan_perubahan"><i class="fas fa-save"></i> Simpan Perubahan</button>
 -->

<!-- <script>
	window.print();
</script> -->
