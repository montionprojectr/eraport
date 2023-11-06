<?php 

require_once("../../koneksi.php");
$kode = $_POST['kode_mapel'];
$th_pelajaran = $_POST['th_pelajaran1'];
$pisah = explode(" ", $kode);
$kelas = $pisah[0];
$kode_mapel = $pisah[1];

 if ($kode_mapel == 'mpp') { ?>
		<option value="ganjil">Ganjil</option>
		<option value="genap">Genap</option>
 <?php }else{

$queryw = mysqli_query($koneksi, "select * from tb_walikelas where kelas = '".$kelas."' and th_pelajaran = '$th_pelajaran' group by kelas, komp_keahlian");
while ($dw = mysqli_fetch_array($queryw)) { 
	if ($kelas == 'X') {
		if ($kode_mapel == 'dd_pplg' && $dw['komp_keahlian'] == 'PPLG') {
		?>
		<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
	<?php 	
		}else if ($kode_mapel == 'dd_te' && $dw['komp_keahlian'] == 'TE'){
		?>
		<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
	<?php 	
		}
		else if ($dkode_mapel == 'dd_oto' && $dw['komp_keahlian'] == 'TSM' && $dw['komp_keahlian'] == 'TKR'){
		?>
		<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
	<?php 	
		}
		else if ($kode_mapel == 'dd_oto' ){
		?>
		<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
	<?php 	
		}
		else if ($kode_mapel == 'dd_tmi' && $dw['komp_keahlian'] == 'TMI'){
		?>
		<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
	<?php 	
		}else if($kode_mapel != 'dd_pplg' && $kode_mapel != 'dd_te' && $kode_mapel != 'dd_oto' && $kode_mapel != 'dd_tmi'){
		?>
		<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
	<?php	
		}

	}else if($kelas == 'XI'){

			if ($kode_mapel == 'kons_pplg' && $dw['komp_keahlian'] == 'PPLG') {
			?>
			<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
		<?php 	
			}else if($kode_mapel == 'kons_te' && $dw['komp_keahlian'] == 'TE'){
			?>
			<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
		<?php 
			}else if($kode_mapel == 'kons_tsm' && $dw['komp_keahlian'] == 'TSM'){
			?>
			<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
		<?php 
			}else if($kode_mapel == 'kons_tkr' && $dw['komp_keahlian'] == 'TKR'){
			?>
			<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
		<?php 
			}else if($kode_mapel == 'kons_tmi' && $dw['komp_keahlian'] == 'TMI'){
			?>
			<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
		<?php 
			}else if($kode_mapel != 'kons_pplg' && $kode_mapel != 'kons_te' && $kode_mapel != 'kons_tsm' && $kode_mapel != 'kons_tkr' && $kode_mapel != 'kons_tmi'){ ?>
		<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
	<?php	
		}

	}else if($kelas == 'XII'){

	}

}

}
?>
  <!-- </select> -->

  <!-- Select2 -->
<!-- <script src="../../plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script> -->