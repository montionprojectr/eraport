<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
      <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
      <li class="active"> > <?= $_GET['view'] ?: 'Dashboard'; ?></li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="card collapsed-card">
  <div class="card-header bg-danger">
    <h4 class="card-title">Input Tahun Pelajaran</h4>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
      </button>
    </div>
  </div>
  <div class="card-body bg-dark">
    <div class="row">
    
      <div class="col-sm-6">
        <form action="" method="post">
            <table class="table table-sm">
              <tr>
                <th><label>Tahun Pelajaran</label></th>
                <td>
                  <div class="form-group">
                    <input type="text" class="form-control" name="tahun_pelajaran" required>
                  </div>
                </td>
              </tr>
              
              <tr>
                <th><label>Semester</label></th>
                <td> 
                  <div class="form-group">
                    <select class="form-control-sm select2" style="width: 100%;" name="semester">
                      <option value="Ganjil">Ganjil</option>
                      <option value="Genap">Genap</option>
                    </select>
                  </div>
                </td>
              </tr>
         
              <tr>
                <td>
                  <div class="form-group float-center">
                    <button class="btn btn-primary float-center" type="submit" name="simpan"><i class="fas fa-save"></i> Simpan</button>
                    
                <!--     <a href="#" class="btn btn-primary">Import Data</a>  -->
                  </div>

                </td>
              </tr>
            </table>
            INFORMASI !!! Pengisian tanggal pembagian dengan klik icon <i class='fas btn-primary fa-edit'></i> pada tabel
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
if (isset($_POST['simpan'])) {

  $tahun_pelajaran = $_POST['tahun_pelajaran'];
  $semester = $_POST['semester'];
  require_once('view/operator/id_max.php');
  $query = mysqli_query($koneksi, "insert into tb_thpelajaran (id, tahun_pelajaran, semester ) values('$use','$tahun_pelajaran','$semester')");


  if ($query) {
    echo "<script>
    alert('DATA BERHASIL DISIMPAN');
    document.location.href = '?view=pembagian';
    </script>";
  }else{
    echo "<script>
    alert('DATA GAGAL DISIMPAN');
    document.location.href = '?view=pembagian';
    </script>";
  }
}
?>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header bg-danger"><h3 class="card-title">Tanggal Pembagian Raport</h3></div>
      <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
          <th>No</th>
          <th>Tahun Pelajaran</th>
          <th>Semester</th>
          <th>Tanggal Pembagian</th>
          <th>Action</th>
        </thead>
        <tbody>
        <?php 
          $no = 1;
          $query = mysqli_query($koneksi, "select * from tb_thpelajaran ");
          while ($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$data['tahun_pelajaran']."</td>";
            echo "<td>".$data['semester']."</td>";
            echo "<td>".$data['tgl_bagi']."</td>";          
           ?>
            <td><a href="?view=update_pembagian&id=<?= $data['id'] ?>" class='btn btn-primary' ><i class='fas fa-edit'></i></a>   ||  <a href="view/operator/del/delete_tahun_pelajaran.php?id=<?= $data['id'] ?>" class='btn btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus nama <?= $data['nama'] ?> ini?')"><i class='fas fa-trash'></i></a>
            </td> 
            <?php
            echo "</tr>";
          }
        ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>