<?php

//simpan
include "koneksi.php";

//
if(isset($_POST['simpan'])){
  
    //
    $simpan = mysqli_query($conn, "INSERT INTO mahasiswa (nama, nim, jurusan, email) 
                                    VALUES ('$_POST[nama]',
                                            '$_POST[nim]',
                                            '$_POST[jurusan]',
                                            '$_POST[email]') ");
    //
    if($simpan){
        echo "<script>
        alert('Simpan Berhasil Bro!');
        document.location='index.php';
        </script>";
    }else{
        echo "<script>
        alert('GAGAL!');
        document.location='index.php';
        </script>";
    }
}

//ubah
if(isset($_POST['ubah'])){
  
    //
    $ubah = mysqli_query($conn, "UPDATE mahasiswa SET 
                                                    nama = '$_POST[nama]',
                                                    nim = '$_POST[nim]',
                                                    jurusan = '$_POST[jurusan]',
                                                    email = '$_POST[email]'
                                                    WHERE id = '$_POST[id]'");


    //
    if($ubah){
        echo "<script>
        alert('Ubah Data Berhasil Bro!');
        document.location='index.php';
        </script>";
    }else{
        echo "<script>
        alert('GAGAL!');
        document.location='index.php';
        </script>";
    }
}

//hapus
if(isset($_POST['hapus'])){
  
    //
    $hapus = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = '$_POST[id]'");


    //
    if($hapus){
        echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location='index.php';
        </script>";
    }else{
        echo "<script>
        alert('GAGAL!');
        document.location='index.php';
        </script>";
    }
}