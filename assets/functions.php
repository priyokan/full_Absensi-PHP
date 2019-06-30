<?php
  $conn = mysqli_connect( 'localhost' , 'root' , '' , 'Absen' ) ;
  
    function tampil($query){
      global $conn;
      $result = mysqli_query($conn,$query);
      $rows=[];

      while( $row = mysqli_fetch_assoc($result)){
          $rows[]=$row;
      }
      
      return $rows;
    }

    function insert_siswa($data){
        global $conn;

        $nama = htmlspecialchars($data['nama']);
        $alamat = htmlspecialchars($data['alamat']);
        $tglmasuk = ($data['tgl_masuk']);
        $img = upload();
        
        if(!$img){
          return false;
        }else {
          
          $query = "INSERT INTO Siswa
                    VALUES ('','$nama','$alamat','$tglmasuk','','$img')";

          mysqli_query($conn,$query);

          return mysqli_affected_rows($conn);
        }
    };

    function upload(){

      $namaFile = $_FILES['gambar']['name'];
      $tmpName = $_FILES['gambar']['tmp_name'];
      $error = $_FILES['gambar']['error'];
      $size = $_FILES['gambar']['size'];
      
      if ($error == 4) {
          echo"<script> 
              alert('anda perlu mengisi gambar');
              </script>";
          return false;
      }

      $ekstensiGambarValid=["jpg","jpeg","png","bmp"];
      $ekstensiGambar = explode(".",$namaFile);
      $ekstensiGambar = strtolower(end($ekstensiGambar));

      if ( !in_array($ekstensiGambar,$ekstensiGambarValid)) {
          echo"<script> 
              alert('yang anda masukan bukan gambar');
              </script>";
          return false;
      }

      //generate nama file

      $namaFileBaru = $_POST['nama'];
      $namaFileBaru .= ".";
      $namaFileBaru .= $ekstensiGambar;

      move_uploaded_file($tmpName,"../assets/img/".$namaFileBaru);
      return $namaFileBaru;        

  }
?>
