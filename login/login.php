<?php
 // memanggil file koneksi.php
 include "config.php";
 // membuat variable dengan nilai dari form
 $username = $_POST['username'];
 $password = $_POST['password'];
 
 $perintah =mysqli_query($con,"SELECT username, password from login WHERE username = '$username' AND password = '$password'");
 $row = mysqli_fetch_array($perintah);
 if ($row['username'] == $username AND $row['password'] == $password) {
 session_start(); // memulai fungsi session
 $_SESSION['username'] = $username;
 header("location:../arah/index.php"); // jika berhasil login, maka masuk ke file admin.php
 }
 else {
 header("location:gagal.html"); // jika gagal, maka akan kembali ke halaman login
 }
 ?>