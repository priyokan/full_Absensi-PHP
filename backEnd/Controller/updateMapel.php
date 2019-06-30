<?php
    include "koneksi.php";

    if(isset($_POST['updateMapel'])){
        $updid_Mapel = $_POST["Id_Mapel"];
        $updNama_Mapel = $_POST["Nama_Mapel"];
        $updNama_Mapel = htmlspecialchars($updNama_Mapel);

        $sql = "UPDATE Mapel SET Nama_Mapel='$updNama_Mapel' WHERE Id_Mapel='$updid_Mapel'";

        if($conn->query($sql)==TRUE){
            echo "<script> 
                    alert('Data berhasil di edit');
                  </script>;
                  <meta http-equiv='refresh' content='0'>
                  ";
        }else{
            echo "<script> 
                    alert('Data gagal di edit');
                  </script>;
                  <meta http-equiv='refresh' content='0'>
                    ";
        }
    }
?>
