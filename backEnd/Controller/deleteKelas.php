<?php
    include "koneksi.php";

    if(isset($_POST['deleteKelas'])){
        $dltid_Kelas = $_POST["Id_Kelas"];

        $sql = "DELETE FROM Kelas WHERE Id_Kelas='$dltid_Kelas'";

        if($conn->query($sql)==TRUE){
            echo "<script> 
                    alert('Data berhasil di hapus');
                  </script>;
                  <meta http-equiv='refresh' content='0'>
                  ";
        }else{
            echo "<script> 
                    alert('Data gagal di hapus');
                  </script>
                    ";
        }
    }
?>
