<?php

include "../inc/inc_konek.php";

$error = "";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $type = $data['type'];


    if($data['type'] == 'user'){
    $gmail = $data['gmail'];
    $password = $data['password'];
    $username = $data['username'];
    $deskripsi = $data['deskripsi'];
    $image = $data['image'];
    $pw_real = md5($password);

    $sql1 = "select * from user where gmail = '$gmail'";
    $q1  = mysqli_query($koneksi,$sql1);
    if(mysqli_num_rows($q1) > 0){
        $error = "Gmail yang dimasukan pernah digunakan";
    }else{
        $sql1 = "insert into user (gmail,password,username,deskripsi,img,active) VALUES ('$gmail','$pw_real','$username','$deskripsi','$image','off')";
    }

    }


    if($data['type'] == 'produk'){
    $name_produk = $data['name_produk'];
    $label_produk = $data['label_produk'];
    $category_produk = $data['category_produk'];
    $deskripsi_produk = $data['deskripsi_produk'];
    $harga_produk = $data['harga_produk'];
    $stok_produk = $data['stok_produk'];
    $discount_produk = $data['discount_produk'];
    $image_produk = $data['image_produk'];

    $sql1 = "insert into produk (name,title_span,category,deskripsi,price,count,discount,image) VALUES ('$name_produk','$label_produk','$category_produk','$deskripsi_produk','$harga_produk','$stok_produk','$discount_produk','$image_produk')";
    }


    if($data['type'] == 'transaksi'){
    $id_user = $data['id_user'];
    $id_produk = $data['id_produk'];
    $penerima = $data['penerima'];
    $via = $data['via'];
    $alamat = $data['alamat'];


    //belum kelar
    // $sql1 = "select * from produk where id_produk = '$id_produk'";
    // $q1  = mysqli_query($koneksi,$sql1);
    // $r1  = mysqli_fetch_assoc($q1);


    $sql1 = "insert into transaksi (id_user,id_produk,date,via,penerima,alamat) VALUES ('$id_user',' $id_produk',NOW(),' $via','$penerima','$alamat')";
    }


    if($data['type'] == 'cart'){
        $id_user = $data['id_user'];
        $id_produk = $data['id_produk'];

        $sql1 = "select * from produk where id_produk = '$id_produk'";
        $q1 = mysqli_query($koneksi,$sql1);
        if(mysqli_num_rows($q1) > 0){
            $sql1 = "select * from user where id = '$id_user'";
            $q1 = mysqli_query($koneksi,$sql1);

            if(mysqli_num_rows($q1) > 0){
                $sql1 = "insert into cart (id_user,id_produk,tanggal) VALUES ('$id_user','$id_produk',NOW())";
            }else{
                $error = "User dengan id = $id_user tidak ditemukan";
            }
        }else{
            $error = "Produk dengan id = $id_produk tidak ditemukan";
        }
       
    }


    if($data['type'] == 'favorit'){
        $id_user = $data['id_user'];
        $id_produk = $data['id_produk'];

        $sql1 = "select * from produk where id_produk = '$id_produk'";
        $q1 = mysqli_query($koneksi,$sql1);
        if(mysqli_num_rows($q1) > 0){
            $sql1 = "select * from user where id = '$id_user'";
            $q1 = mysqli_query($koneksi,$sql1);

            if(mysqli_num_rows($q1) > 0){
                $sql1 = "insert into fav (id_user,id_produk,tanggal) VALUES ('$id_user','$id_produk',current_timestamp())";
            }else{
                $error = "User dengan id = $id_user tidak ditemukan";
            }
        }else{
            $error = "Produk dengan id = $id_produk tidak ditemukan";
        }

        
    }

    $q1 = mysqli_query($koneksi,$sql1);
    if($q1 && $error == ""){
        echo json_encode(array("status" => "Oke Sukses menambahkan data $type"));
    }else{
        echo json_encode(array("status" => "$error" .mysqli_error($koneksi)));
    }
    
    


   
}
