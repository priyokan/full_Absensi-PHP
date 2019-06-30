<?php
    include "koneksi.php";

    if(isset($_POST['updateKelas'])){
        $updid_Kelas = $_POST["Id_Kelas"];
        $updNama_Kelas = $_POST["Nama_Kelas"];
        $updNama_Kelas = htmlspecialchars($updNama_Kelas);

        $sql = "UPDATE Kelas SET Nama_Kelas='$updNama_Kelas' WHERE Id_Kelas='$updid_Kelas'";

        if($conn->query($sql)==TRUE){
            echo "<script> 
                    alert('Data berhasil di edit');
                  </script>;
                  <meta http-equiv='refresh' content='0'>
                  ";
        }else{
            echo "<script> 
                    alert('Data gagal di edit');
                  </script>";
        }
    }
?>
