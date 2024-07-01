<?php

//aktifkan session
session_start();

//panggil koneksi database
include"koneksi.php";

@$pass =md5($_POST['password']);
@$username =mysqli_escape_string($koneksi, $_POST['username']);//mysqli_escape_string menggamnkan inputan foom login secara ilegal
@$password =mysqli_escape_string($koneksi, $pass);

$login =mysqli_query($koneksi,"SELECT * FROM tuser where username='$username'
and password ='$password'and status ='Aktif' ");

$data=mysqli_fetch_array($login);

//uji jika usrname dan passwor ditemukan/sesusai

if($data){
    $_SESSION['id_user']=$data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
//arhkan ke halaman login
    header('location:admin.php');
    
}
else{
    echo"<script>alert('maaf,login ggal,pastikan dan password anda benar');
    document.location='index.php';
    </script>";
}
    



