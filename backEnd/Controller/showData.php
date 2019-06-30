<?php
    include "koneksi.php";

    $dtSiswa = "SELECT * FROM Siswa";
    $dtKelas = "SELECT * FROM Kelas";
    $dtMapel = "SELECT * FROM Mapel";
    $dtGuru ="SELECT * FROM Guru";
    $Guru = $conn->query($dtGuru);
    $shdatasiswa = $conn->query($dtSiswa);
    $shdatakelas = $conn->query($dtKelas);
    $shdatamapel = $conn->query($dtMapel);
    
