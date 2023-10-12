<?php

//buatkan logic login 
session_start();
$koneksi = mysqli_connect("localhost","root","","toko");

if(isset($_POST['login'])){
    $gmail = $_POST['gmail'];
    $pw = $_POST['pw'];

    //selanjutnya buatkan penyaringan untuk cek apakah data ada di database
    
    //jika menggunakan hash
    // $pwHash = md5($pw);
    // $sql1 = "select * from pengguna where gmail = '$gmail' AND password = '$pwHash'";

    $sql1 = "select * from pengguna where gmail = '$gmail' AND password = '$pw'";
    $q1   = mysqli_query($koneksi,$sql1);
    $r1  = mysqli_fetch_assoc($q1);

    if(mysqli_num_rows($q1) > 0){ //jika berhasil ditemkan
        $_SESSION['id'] = $r1['id']; // mengambil session dari id database guna page selanjutnya
        header("Location:index.php");
    }else{
        echo "Account tidak dapat ditemukan, Pastikan Menulis dengan benar";
    }
}


//buatkan sistem register

if(isset($_POST['reg'])){
    $gmail = $_POST['gmail'];
    $pw = $_POST['pw'];

    //lakukan bebrapaka validasi untuk memberikan keamanan serta anomali

    $sql1 = "select * from pengguna where gmail = '$gmail'";
    $q1  = mysqli_query($koneksi,$sql1);
    if(mysqli_num_rows($q1) > 0){ //berrti account dengan gmail $gmail sudah dibuat
        echo "Account dengan gmail $gmail Telah digunakan, gunakan alamat email lain";
    }else{
        if(strlen($pw) <= 9){ //jika password kurng dari 10 
            echo "Maaf password dibutuhkan minimal 10 huruf";
        }else{
            $pwHash = md5($pw);

            $sql1 = "insert into pengguna (gmail,password) VALUES ('$gmail',$pwHash)";
            $q1  = mysqli_query($koneksi,$sql1);

            if($q1){
                header("Location:index.php");
                exit();
            }else{
                echo "Terjadi kesalahan, mohon ulang";
            }
        }
    }
}

//buatkan untuk update barang 

if(isset($_GET['update'])){
    //contoh url : index.php?update=true&id=4
    $id = $_GET['id_barang'];
    
}
?>