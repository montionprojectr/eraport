<?php
    include "../../koneksi.php";
    include "../../lib/excel-reader2.php";
    
    if ($_POST['upload'] == "upload") {
        $type = explode(".",$_FILES['namafile']['name']);
        
        if (empty($_FILES['namafile']['name'])) {
            ?>
                <script language="JavaScript">
                    alert('Oops! Please fill all / select file ...');
                    document.location='./';
                </script>
            <?php
        }
        else if(strtolower(end($type)) !='xls'){
            ?>
                <script language="JavaScript">
                    alert('Oops! Please upload only Excel XLS file ...');
                    document.location='./';
                </script>
            <?php
        }
        
        else{
        $target = basename($_FILES['namafile']['name']) ;
        move_uploaded_file($_FILES['namafile']['tmp_name'], $target);
    
        $data    =new Spreadsheet_Excel_Reader($_FILES['namafile']['name'],false);
    
        $baris = $data->rowcount($sheet_index=0);
    
        for ($i=2; $i<=$baris; $i++){
            $id_user =$data->val($i, 1);
            $username =$data->val($i, 2);
            $password =$data->val($i, 3);
            $nipy =$data->val($i, 4);
            $nama_lengkap =$data->val($i, 5);
            
            $query = mysqli_query($koneksi, "insert into tb_users (id_user, username, password, nipy, nama_lengkap) VALUES ('$id_users', '$username', '$password','$nipy','$nama_lengkap')");        
        }
    
            if(!$query){
                ?>
                    <script language="JavaScript">
                        alert('<b>Oops!</b> 404 Error Server.');
                        document.location='./';
                    </script>
                <?php
            }
            else{
                ?>
                    <script language="JavaScript">
                        alert('Good! Import Excel XLS file success...');
                        document.location='./';
                    </script>
                <?php
            }
        unlink($_FILES['namafile']['name']);
        }
    }
?>