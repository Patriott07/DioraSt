<?php
session_start();
include "../inc/inc_konek.php";
$error = "";
$succes = "";
$q2 = "";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = json_decode(file_get_contents('php://input'),true);
    $id = $data['id_user'];
    $id_produk = $data['id_produk'];
    
    if($data['type'] == 'fav'){
        $sql1 = "select * from fav where id_user = '$id' AND id_produk = '$id_produk'";
        $q1  = mysqli_query($koneksi,$sql1);
        if(mysqli_num_rows($q1) > 0){
            $error = "You have this items on your favorite";
        }else{
            $sql2 = "insert into fav (id_user, id_produk, tanggal) VALUES ($id,$id_produk,NOW())";
            $q2  = mysqli_query($koneksi, $sql2);
            $succes = "Kamu telah Menambahkannya ke dalam daftar Produk Favorit";
        }
    }
    if($data['type'] == 'cart'){
        $sql1 = "select * from cart where id_user = '$id' AND id_produk = '$id_produk'";
        $q1  = mysqli_query($koneksi,$sql1);
        if(mysqli_num_rows($q1) > 0){
            $error = "You have this items on your Cart";
        }else{
            $sql2 = "insert into cart (id_user, id_produk, tanggal) VALUES ($id,$id_produk,NOW())";
            $q2  = mysqli_query($koneksi, $sql2);
            $succes = "Kamu telah Menambahkannya ke dalam Cart / Keranjang";
        }
    }
   

 
    //memberikan response ke axios
    if($q2) {
        echo json_encode(array("status" => "OK", "message" => "$succes"));
    }else {
        echo json_encode(array("status" => "Error", "message" => "$error"));
    }
}
