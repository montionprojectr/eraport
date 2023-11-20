<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="pembina" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= '' . $_GET['page'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->
<?php
include "koneksi.php";
 $cek_guru = mysqli_query($koneksi, "select * from tb_users where nipy = '".$_SESSION['nipy']."'");
$guru = mysqli_fetch_array($cek_guru);
 $sql = "SELECT * FROM tb_walikelas WHERE id_walikelas = '".$_GET['id_walikelas']."'";
  $query = mysqli_query($koneksi, $sql);
  $rows = mysqli_fetch_array($query);
?>

       
            <!-- <?=$rows['kelas'];?> <?=$rows['komp_keahlian'];?> <?=$rows['pkelas'];?> -->

<form action="" method="POST">
      <select name="semester" >
        <option value="">Pilih Semester</option>
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
      </select>
<input type="submit" name="submit" value="oke">
</form>

<form method="post" action="pembina?page=input_ekskul&id_walikelas=<?= $rows['id_walikelas'] ?>">            

<div class="card-body">

        <table  class="table table-sm table-bordered table-striped">
          <thead>
            <tr>
              <th><center>NO</center></th>
  <!--            <th><center>KELAS</center></th> -->
              <th><center>NIS</center></th>
              <th width="200"><center>NAMA</center></th>
               <th><center>SEMESTER</center></th>
              <th><center><input type="checkbox"  onchange="checkAll(this)" name="id">PILIH</center></th>
              <th width="80"><center>PRAMUKA</center></th>
              <th width="80"><center>PKS</center></th>
              <th width="80"><center>PMR</center></th>
              <th width="80"><center>Olahraga</center></th>
              <th width="80"><center>ROHIS</center></th>
              <th width="80"><center>Kesenian</center></th>
              <th width="80"><center>E-Sport</center></th>
          
            </tr>
          </thead>
          <tbody>

             <?php 
       $i=1;
          if (isset($_POST['submit'])){
          $cari= $_POST['semester'];

          $query = mysqli_query($koneksi, "select  * from tb_leger WHERE kelas='$rows[kelas]' and jurusan='$rows[komp_keahlian]' and pemkelas='$rows[pkelas]' and th_pelajaran='$rows[th_pelajaran]' and semester='".$cari."'");
          while ($data = mysqli_fetch_array($query)) 
          {
            echo "<tr>";
        
    
            ?>

            <?php

     
            echo "<td><center>".$i."</center></td>";
            echo "<td><center>".$data['nis']."</center></td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td><center>".$data['semester']."</td></center>";
            echo "<td><center><input type='checkbox' oninput='validasi()' name='id[]' id='cek' value='$data[id]'></center></td>";
            echo "<td><center>".$data['eks1']."</center></td>";
            echo "<td><center>".$data['eks2']."</center></td>";
            echo "<td><center>".$data['eks3']."</center></td>";
            echo "<td><center>".$data['eks4']."</center></td>";
            echo "<td><center>".$data['eks5']."</center></td>";
            echo "<td><center>".$data['eks6']."</center></td>";
            echo "<td><center>".$data['eks7']."</center></td>";
      
             $i++;
             echo "</tr>";
}
            }
            ?>
          
          </tbody>
        </table>
        <br>
        <a href="bk" class="btn btn-primary">Kembali</a>
        <input  class='btn btn-primary'  type='submit' name='simpan' value='INPUT' disabled="">
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