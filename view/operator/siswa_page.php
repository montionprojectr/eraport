<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-danger"><h3 class="card-title">Data Siswa</h3></div>
			<div class="card-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Password</th>
						<th>Nik</th>
						<th>Nama Lengkap</th>
						<th>Rols</th>
					</tr>		
				</thead>
				<tbody>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>