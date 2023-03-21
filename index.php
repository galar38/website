<?php
 include "koneksi.php"
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galarkun</title>
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">

    <div class="m-3">
    <h3 class="text-center">Hallo Semuanya Selamat Datang di Website Galarkun</h3>
    </div>


    <div class="card mt-3" >
  <div class="card-header bg-primary text-white fw-bold">
    Data Mahasiswa Terkini
  </div>
  <div class="card-body">

<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambah">
  Tambah Data
</button>
<!-- Tabel -->
    <table class="table table-bordered table-striped table-hover">
      <tr>
        <th class="text-center">No.</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>Aksi</th>
      </tr>
      <?php
      $no = 1;
      $tampil = mysqli_query($conn, "SELECT * FROM mahasiswa");
      while($data = mysqli_fetch_array($tampil)) :
      ?>
      <tr>
      <td class="text-center"><?= $no ?></td>
        <td><?= $data["nama"]; ?></td>
        <td><?= $data["nim"]; ?></td>
        <td><?= $data["jurusan"]; ?></td>
        <td><?= $data["email"]; ?></td>
        <td>
          <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ubah<?= $no ?>">UBAH</a>
          <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $no ?>">HAPUS</a>
      </tr>

<!-- Awal Modal Ubah-->
<div class="modal fade" id="ubah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Ubah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi.php">
      <input type="hidden" name="id" value="<?= $data['id'] ?>">
      <div class="modal-body">
  
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" placeholder="Masukan Nama Anda!" autocomplete="off">
        </div>
        <div class="mb-3">
          <label class="form-label">Nim</label>
          <input type="text" class="form-control" name="nim" value="<?= $data['nim'] ?>" placeholder="Masukan Nim Anda!" autocomplete="off">
        </div>
        <div class="mb-3">
          <label class="form-label">Jurusan</label>
          <input type="text" class="form-control" name="jurusan" value="<?= $data['jurusan'] ?>" placeholder="Masukan Jurusan Anda!" autocomplete="off">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="text" class="form-control" name="email" value="<?= $data['email'] ?>"placeholder="Masukan Email Anda!" autocomplete="off">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="ubah">Ubah!</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal Ubah-->

<!-- Awal Modal Hapus-->
<div class="modal fade" id="hapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi.php">
      <input type="hidden" name="id" value="<?= $data['id'] ?>">
      <div class="modal-body">
  
        <h5 class="text-center"> Apakah Anda Yakin Menghapus Data<br>
        <span class="text-danger"><?= $data['nama'] ?> dengan NIM <?= $data['nim'] ?>?</span>
        </5>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="hapus">Hapus!</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal Hapus-->

      <?php $no++ ?>
      <?php endwhile; ?>
    </table>

<!-- Awal Modal Tambah-->
<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi.php">
      <div class="modal-body">
  
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Anda!" autocomplete="off">
        </div>
        <div class="mb-3">
          <label class="form-label">Nim</label>
          <input type="text" class="form-control" name="nim" placeholder="Masukan Nim Anda!" autocomplete="off">
        </div>
        <div class="mb-3">
          <label class="form-label">Jurusan</label>
          <input type="text" class="form-control" name="jurusan" placeholder="Masukan Jurusan Anda!" autocomplete="off">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="text" class="form-control" name="email" placeholder="Masukan Email Anda!" autocomplete="off">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="simpan">Simpan!</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal Tambah-->
  </div>
</div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
  </body>


</html>
