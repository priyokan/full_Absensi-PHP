<?php
if (isset($_POST['updateSiswa'])) {
    include "koneksi.php";
    $updNamaSiswa = htmlspecialchars($_POST['Nama']);
    $updAlamatSiswa = htmlspecialchars($_POST['Alamat']);
    $gambarLama = ($_POST['gambarLama']);
    $nis = $_POST['NIS'];
    if ($_FILES['gambar']['error'] == 4) {
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE Siswa SET
            Nama = '$updNamaSiswa',
            Alamat = '$updAlamatSiswa',
            Img_Siswa = '$gambar'

            WHERE NIS = $nis
            ";

 mysqli_query($conn,$query);

    if( mysqli_affected_rows($conn) > 0){
        echo    "<script> 
        alert('Data berhasil di edit');
        </script>;
        <meta http-equiv='refresh' content='0'>
        ";
    }else{
        echo    "<script> 
        alert('Data Gagal diedit');
        </script>;";
    }
    
}
?>
