<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="card collapsed-card">
	<div class="card-header  bg-danger">
		<h4 class="card-title">INPUT DATA MATA PELAJARAN</h4>
		<div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
      </button>
    </div>
	</div>
	<div class="card-body">
		
	</div>
</div>
<!-- Table Mata Pelajaran -->
<div class="card">
	<div class="card-header bg-danger">
		<h3 class="card-title">Data Mata Pelajaran</h3>
		<div class="form-group-sm float-right">
			<form action="" method="post">
      <select class="form-control-sm select2" style="width: 100%;" name="kelas" id="mapel">
      	<option value="">Pilih Kelas</option>
        <option value="X">Kelas X</option>
        <option value="XI">Kelas XI</option>
        <option value="XII">Kelas XII</option>
      </select>
      <!-- <div class="form-group-append">
          <button class="btn btn-primary" type="submit" name="cari">
            <i class="fas fa-search"></i> Cari
          </button>
        </div> -->
      </form>
    </div>
	</div>
	<div class="card-body" id="tampil_kelas">
		<!-- tampil_kelas dari 'view/operator/table_kelas.php' -->
	</div>
</div>