<?php
    include "koneksi.php";

    if(isset($_POST['tambahKelas'])){
        $insNamaKelas = $_POST["Nama_Kelas"];
        $insNamaKelas = htmlspecialchars($insNamaKelas);

        $sql = "INSERT INTO Kelas VALUES ('','$insNamaKelas')";

        if($conn->query($sql)==TRUE){
            echo "<script> 
            alert('success uploaded');
                    </script>";
            echo "<meta http-equiv='refresh' content='0'>";
        }else{
            echo "<script> 
                    alert('failed uploaded');
                  </script>";
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
?>
