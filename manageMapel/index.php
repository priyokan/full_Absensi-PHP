<?php
  require '../backEnd/Controller/insertMapel.php';  
  require '../backEnd/Controller/showData.php';
  require '../backEnd/Controller/updateMapel.php';
  require '../backEnd/Controller/deleteMapel.php';
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
                    <a class="  text-light" href="../manageSiswa">
                                    Management Siswa
                    </a>
                    </li>
                    <li class="bg-dark list-group-item">
                            <a class=" text-light" href="../manageGuru">
                                    Management Guru
                            </a>
                    </li>
                    <li class="bg-dark list-group-item">
                            <a class=" text-light" href="../manageKelas">
                                    Management Kelas
                        </a>
                    </li>
                    <li class=" bg-dark list-group-item">
                                        <a class="text-light font-weight-bolder"  style="font-size:18px; margin:10px" href="../manageMapel">
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
        Tambahkan mapel baru
        </button>

        <!-- List -->
        <div class="card text-center shadow mt-3">
    
        <div class="card-body">
       
            <table class="table table-striped" >
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th>link</th>
                </tr>   
            </thead>
            <tbody>
            <?php $i=1 ; foreach ($shdatamapel as $res ) : ?>
                <tr>
                <th scope="row"><?= $i ?></th>
                <td scope="row" class="text-justify" ><?= $res["Nama_Mapel"] ?></td>
                <td >
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editMapel<?= $res['Id_Mapel']?>">edit</button>     
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusMapel<?=$res['Id_Mapel']?>">hapus</button>
                    
                       <!-- MODAL EDIT -->
                <div class="modal fade" id="editMapel<?= $res['Id_Mapel'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Mapel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                <div class="text-xl-left mr-5 ml-5 form-group">
                                <input type="hidden" name="Id_Mapel" value="<?= $res['Id_Mapel'] ?>">
                                <label for="nama">Nama Mapel</label>
                                <input type="text" name="Nama_Mapel" class="form-control" id="nama" value="<?= $res['Nama_Mapel'] ?>">
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="updateMapel" class="btn btn-primary">Edit</button>
                        </form>
                </div>
                </div>   
                
                </td>
                </tr>   

            <!-- MODAL HAPUS -->
            <div>
            <div class="modal fade" id="hapusMapel<?= $res['Id_Mapel'] ?>" tabindex="0" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Apakah anda yakin?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="Id_Mapel" value="<?= $res['Id_Mapel'] ?>">
                      <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" name="deleteMapel" class="btn btn-danger">Ya</button>
              </form>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="text-xl-left mr-5 ml-5 form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="Nama_Mapel" class="form-control" id="nama" placeholder="Masukan Nama Mapel...">
                    </div>
            </div>
            <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="tambahMapel" class="btn btn-primary">Tambah</button>
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
                $("#tgl_masuk").val(tgl.toString()+"/"+bln.toString()+"/"+thn.toString()) ;
                clearInterval(txtGambar);
            });
            
    </script>

</body>
</html>
