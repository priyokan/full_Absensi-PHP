<?php
    include "koneksi.php"; 
        

        function upload(){
        global $sql;
        $image = $_FILES['gambar']['name'];
        $error = $_FILES['gambar']['error']; 

       
        $ekstensiGambarValid=["jpg","jpeg","png","bmp"];
        $ekstensiGambar = explode(".",$image);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if ( !in_array($ekstensiGambar,$ekstensiGambarValid)) {
            echo    "<script> 
                    alert('yang anda masukan bukan gambar');
                    </script>";
            return false;
        }
        

        $namafile = $_POST["Nama"];
        $namafile .= ".";
        $namafile .= $ekstensiGambar;         

        $target ="../assets/img/";
          move_uploaded_file($_FILES['gambar']['tmp_name'], $target . $namafile);
          return $namafile;
        }
    
        if(isset($_POST['tambahGuru'])){
            $insNamaGuru = $_POST["Nama"];
            $insAlamatGuru = $_POST["Alamat"];
            $insTglMasukGuru = $_POST["Tgl_Masuk"];
            $insNamaGuru = htmlspecialchars($insNamaGuru);
            $insAlamatGuru = htmlspecialchars($insAlamatGuru);
    
            $insImgGuru = upload();
            if(!$insImgGuru){
                return false;
            }else{
                $sql = "INSERT INTO Guru (Nama, Alamat, Tgl_Masuk, Img_Guru) VALUES ('$insNamaGuru', '$insAlamatGuru', '$insTglMasukGuru', '$insImgGuru')";
    
                if($conn->query($sql)==TRUE){
                   echo "<script> 
                            alert('success uploaded');
                         </script>;
                         <meta http-equiv='refresh' content='0'>;";
               }else{
                echo "<script> 
                alert('failed uploaded');
                     </script>"; 
               }   
            }
        }

        

    
    
?>
