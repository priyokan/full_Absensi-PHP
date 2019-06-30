<?php
if (isset($_POST['updateGuru'])) {
    include "koneksi.php";
    $updNamaGuru = htmlspecialchars($_POST['Nama']);
    $updAlamatGuru = htmlspecialchars($_POST['Alamat']);
    $gambarLama = ($_POST['gambarLama']);
    $nip = $_POST['NIP'];
    if ($_FILES['gambar']['error'] == 4) {
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE Guru SET
            Nama = '$updNamaGuru',
            Alamat = '$updAlamatGuru',
            Img_Guru = '$gambar'

            WHERE NIP = $nip
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