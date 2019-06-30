<?php
    include "koneksi.php";

    if(isset($_POST['deleteMapel'])){
        $dltid_Mapel = $_POST["Id_Mapel"];

        $sql = "DELETE FROM Mapel  WHERE Id_Mapel='$dltid_Mapel'";

        if($conn->query($sql)==TRUE){
            echo "<script> 
                    alert('Data berhasil di hapus');
                  </script>;
                  <meta http-equiv='refresh' content='0'>
                  ";
        }else{
            echo "<script> 
                    alert('Data gagal di hapus');
                  </script>;
                  <meta http-equiv='refresh' content='0'>
                    ";
        }
    }
?>
