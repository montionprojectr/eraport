<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb">
	    <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > Dashboard</li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
  <div class="col-sm-12">
    <div class="form-group" hidden>
      <input type="text" class="form-control" name="nipy" id="nipy" value="<?= $_SESSION['nipy']; ?>">
    </div>
    <div class="form-group">
      <label>Pilih : Th. Pelajaran</label>
      <select class="form-control-sm select2" style="width: 100%;" name="th_pelajaran" id="th_pelajaran">
        <option value=""></option>
      </select>
    </div>
  </div>
</div>

<div class="row" id="box_kelas">
<!-- isi box kelas -->

  <!-- ./col -->
</div>