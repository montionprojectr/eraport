<?php 

if (isset($_POST['type_test'])) {
  $type_test = $_POST['type_test'];
  $th_pelajaran = $_POST['th_pelajaran'];
  $semester = $_POST['semester'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $nama_mapel = $_POST['nama_mapel'];

  if ($type_test == 'formatif') { ?>
  <!-- Penilaian -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= $nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Menunjukan penguasaan yang baik dalam :</label>
          <textarea class="form-control"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Perlu ditingkatkan dalam :</label>
          <textarea class="form-control"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th style="width: 10px">No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th style="width: 40px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $array = array('3210001' => 'Muhammad', '3210002' => 'Irfa', '3210003' => 'Nufaiyal', '3210004' => 'Kharish', '3210005' => 'S.Kom');
              foreach ($array as $key => $val) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><input type="text" name="nama" class="form-control" value="<?= $key ?>"></td>
                  <td><input type="text" name="nama" class="form-control" value="<?= $val ?>"></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai" class="form-control-md">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
<?php }else if($type_test == 'sumatif_1'){
    echo "Sumatif_1";
  }else if($type_test == 'sumatif_2'){
    echo "Sumatif_2";
  }else if($type_test == 'sumatif_3'){
    echo "Sumatif_3";
  }else if($type_test == 'sumatif_4'){
    echo "Sumatif_4";
  }else if($type_test == 'asas_nontest'){
    echo "Sumatif_Akhir_Semester Non Test";
  }else if($type_test == 'asas_test'){
    echo "Sumatif_Akhir_Semester Test";
  }

}

?>