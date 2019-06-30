<?php
    include "koneksi.php";

    if(isset($_POST["tambahSiswa"])){
        $insNamaSiswa = $_POST["Nama"];
        $insAlamatSiswa = $_POST["Alamat"];
        $insTglMasukSiswa = $_POST["Tgl_Masuk"];
        $insNamaSiswa = htmlspecialchars($insAlamatSiswa);
        $insAlamatSiswa = htmlspecialchars($insAlamatSiswa);
        $insTglMasukSiswa = htmlspecialchars($insTglMasukSiswa);
        

        $sql = "INSERT INTO Siswa Nama='$insNamaSiswa', Alamat='$insAlamatSiswa', Tgl_Masuk='$insTglMasukSiswa'";

        if($conn->query($sql)==TRUE){
            echo "success input siswa";
        }else{
            echo " failed input siswa";
        }
        
        function upload(){
        $image = $_FILES['image']['name']; 
        $imageSiswa_text = mysqli_real_escape_string($_POST['Img_Siswa']);

        $target = "images/".basename($image);

        mysqli_query($conn, $sql);
        if ($error == 4){
            echo"<script> 
                    alert('anda perlu mengisi gambar');
                 </script>";
                 return false;
        }

        

        }
    }
?>