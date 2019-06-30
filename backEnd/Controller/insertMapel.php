<?php
    include "koneksi.php";

    if(isset($_POST['tambahMapel'])){
        $insNamaMapel = $_POST["Nama_Mapel"];
        $insNamaMapel = htmlspecialchars($insNamaMapel);

        $sql = "INSERT INTO Mapel VALUES ('','$insNamaMapel')";

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
