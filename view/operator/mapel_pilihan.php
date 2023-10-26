<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">MATA PELAJARAN PILIHAN</h3>
	</div>	
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<form action="" method="post" id="formID">
					<div class="form-group jumbotron mt-1" data-x-wrapper="employees">
						<label>Kelas Baru</label>
						<div class="d-flex my-1" data-x-group>
							<input type="text" name="emp_name" placeholder="Nama kelas" class="form-control-sm ml-2">
							<div class="form-group ml-2">
								<button type="button" class="btn btn-danger" data-remove-btn>-</button>
		            <button type="button" class="btn btn-primary" data-add-btn>+</button>
							</div>
						</div>
					</div>
					
					<div class="action-buttons">
			        <button type="submit" class="btn btn-primary">Submit</button>
			        <button type="button" class="btn btn-outline-danger">Cancel</button>
			    </div>
				</form>			
			</div>
		</div>
	</div>
</div>
<!-- <form action="" method="post" id="formID">
    <div class="jumbotron mt-1" data-x-wrapper="employees">
        <div class="d-flex my-1" data-x-group>
            <input type="text" name="emp_name" placeholder="Employee name" class="ml-2">
            <input type="text" name="emp_code" placeholder="Employee code" class="ml-2">
            <input type="text" name="emp_position" placeholder="Employee placeholder" class="ml-2">

            <div class="ml-2">
                <button type="button" class="btn btn-danger" data-remove-btn>-</button>
                <button type="button" class="btn btn-primary" data-add-btn>+</button>
            </div>
        </div>
    </div>
    <div class="action-buttons">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-outline-danger">Cancel</button>
    </div>
</form> -->