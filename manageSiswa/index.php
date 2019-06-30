<?php
        require '../assets/functions.php';
        require '../backEnd/Controller/updateSiswa.php';

        $siswaa = tampil("SELECT * FROM Siswa");
        
        if (isset($_POST['tambah'])) {
            if(insert_siswa($_POST) > 0){
                echo" <script>
                    alert('Data Berhasil di tambahkan');
                    document.location.href= 'index.php';
                </script> ";
            }else{
                echo" <script>
                    alert('Data gagal di tambahkan');
                </script> ";
            }      
        }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Document</title>
    </head>
    <body>

                    <!-- NAVBAR -->
                    <nav class="shadow navbar navbar-expand-lg navbar-light bg-light sticky-top ">
                        <div class="container ">
                        <img src="../assets/img/smkbisa.png" class="navbar-brand" style="width:40px">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            
                            </ul>
                        </div>
                </div>
                </nav>      

                    <!-- SIDEBAR -->
                <div class="container bg-dark" style="position:fixed; width: 25%; height:100%">
                
                    <div class="mt-4 text-light text-center">
                    <h2 class="card-title text-center">Sekolah</h2>
                    <img src="../assets/img/school.png" style="width:45%" class="" alt="iconsekolah">
                    </div>
                    <div class="">
                    <ul class=" list-group list-group-flush">
                        <li class="bg-dark mt-5 list-group-item">
                        <a class=" font-weight-bolder text-light" href="../manageSiswa" style="font-size:18px; margin:10px">
                                        Management Siswa
                        </a>
                        </li>
                        <li class="bg-dark list-group-item">
                                <a class="list-group text-light" href="../manageGuru">
                                        Management Guru
                                </a>
                        </li>
                        <li class="bg-dark list-group-item">
                                <a class="text-light" href="../manageKelas">
                                        Management Kelas
                            </a>
                        </li>
                        <li class="bg-dark list-group-item">
                                            <a class="text-light" href="../manageMapel">
                                        Management Mapel
                            </a>
                        </li>
                        <li class="bg-dark list-group-item">
                                            <a class="text-light" href="#">
                                        Management Jadwal
                            </a>
                        </li>
                    </ul>
                    </div>
                    </div>    
        
            <!-- CONTENT -->
            
            <div class="container mb-3" style="position:relative ; top:40px; left:15%; width:60%" >        
                
            <!-- Button trigger modal Tambah -->
        
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Tambah siswa baru
            </button>

            <!-- List -->
            <div class="card text-center shadow mt-3">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Seluruh siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kelas 10</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kelas 11</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kelas 12</a>
                </li>
                </ul>
            </div>
            <div class="card-body">
        
                <table class="table table-striped text-center" >
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Tanggal Lulus</th>
                    <th scope="col">Gambar</th>
                    <th>link</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach ($siswaa as $siswa ) : ?>
                    <tr>
                    <th scope="row"><?= $i ?></th>
                    <th scope="row" class="text-justify"><?= $siswa["Nama"] ?></th>
                    <td><?= $siswa["NIS"] ?></td>
                    <td><?= $siswa["Alamat"] ?></td>
                    <td><?= $siswa["Tgl_Masuk"] ?></td>
                    <td><?= $siswa["Tgl_Keluar"] ?></td>
                    <td><img src="../assets/img/<?= $siswa["Img_Siswa"] ?>" alt="<?= $siswa["Img_Siswa"] ?>" style="width:50px"></td>
                    <td>
                    <button type="button" class="btn btn-success" id="" data-toggle="modal" data-target="#editSiswa<?= $siswa['NIS'] ?>">
                        edit
                    </button>
                </td>
                </tr>    
                   
      
        </div>
        </div></tr>    
          <!-- MODAL EDIT -->
          <div class="modal fade" id="editSiswa<?= $siswa['NIS'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="text-xl-left mr-5 ml-5 form-group">
                        <input type="hidden" name="NIS" value="<?= $siswa['NIS'] ?>">
                        <label for="nama">Nama</label>
                        <input type="text" name="Nama" class="form-control" id="nama" placeholder="<?= $siswa['Nama'] ?>" value="<?= $siswa['Nama'] ?>">
                    </div>
                    <div class="text-xl-left mr-5 ml-5 form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="Alamat" class="form-control" id="alamat" placeholder="<?= $siswa['Alamat'] ?>" value="<?= $siswa['Alamat'] ?>">
                    </div>
                    <div class="text-xl-left mr-5 ml-5 form-group">
                        <label for="mapel">Kelas</label>
                            <select class="custom-select" name="Mapel" id="mapel" placeholder="Pilih Mapel...">
                                <option value="10">Kelas 10</option>
                                <option value="11">Kelas 11</option>
                                <option value="12">Kelas 12</option>
                            </select>
                    </div>
                    <input type="hidden" name="Tgl_Keluar">
                    <div class="form-group text-xl-left mr-5 ml-5 ">  
                        <label for="gambar">Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar" id="gambar"  accept="image/*">
                            <label class="custom-file-label" for="gambar" id="txtgambar">Pilih Gambar...</label>
                        </div>
                        <input type="hidden" name="gambarLama" value="<?= $siswa['Img_Siswa'] ?>">
                    </div>
            </div>
            <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updateSiswa" class="btn btn-primary">Edit</button>
                </form>
            </div>
            </div>            
                <?php $i++; endforeach ?>
                </tbody>
                </table>

            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <div class="text-xl-left mr-5 ml-5 form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Siswa...">
                        </div>
                        <div class="text-xl-left mr-5 ml-5 form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat...">
                        </div>
                        <div class="text-xl-left mr-5 ml-5 form-group">
                            <label for="kelas">Kelas</label>
                                <select class="custom-select" name="kelas" id="kelas" placeholder="Pilih Kelas...">
                                    <option value="10">Kelas 10</option>
                                    <option value="11">Kelas 11</option>
                                    <option value="12">Kelas 12</option>
                                </select>
                        </div>
                        <input type="hidden" name="tgl_masuk" id="tgl_masuk">
                        <div class="form-group text-xl-left mr-5 ml-5 ">  
                            <label for="gambar">Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="gambar" accept="image/*">
                                <label class="custom-file-label" id="txtgambar" for="gambar">Pilih Gambar...</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
    

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
        
                const d = new Date();
                const tgl = d.getDate();
                const bln = 1 + d.getMonth();
                const thn = d.getFullYear();

                $("#gambar").click(()=>{
                    txtGambar = setInterval(()=>{
                        $('#txtgambar').html($("#gambar").val());
                    },1000)
                });
                $(".btn").click(()=>{
                    $("#tgl_masuk").val(thn.toString()+"-"+bln.toString()+"-"+tgl.toString()) ;
                    clearInterval(txtGambar);
                });
                
        </script>
    </body>
    </html>
