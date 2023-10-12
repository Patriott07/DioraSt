
<?php

include "../inc/inc_konek.php";



if($_SERVER['REQUEST_METHOD'] == "POST"){
    $data = json_decode(file_get_contents("php://input"), true);
    $id  = $data['id'];
    $idproduk = $data['idproduk'];
    $penerima = $data['penerima'];
    $via  = $data['via'];
    $alamat = $data['alamat'];

    $sql1 = "insert into transaksi (id_user,id_produk,date,via,penerima,alamat) VALUES ($id,$idproduk,NOW(),'$via','$penerima','$alamat')";

    $q1 = mysqli_query($koneksi, $sql1);
    $id_transaksi_baru = mysqli_insert_id($koneksi);

    $sql2 = "select * from produk where id_produk = '$idproduk'";
    $q2   = mysqli_query($koneksi, $sql2);
    $r2   = mysqli_fetch_assoc($q2);

    $sql3 = "DELETE FROM `cart` WHERE cart.id_produk = '$idproduk' AND cart.id_user = $id";
    $q3  = mysqli_query($koneksi,$sql3);
    $key = "Diora12345678901";
    if ($q1 AND $q3) {
        // $id_transaksi = encrypt($id_transaksi_baru, $key);
        $id_transaksi_baru = openssl_encrypt($id_transaksi_baru,'AES-128-CBC',$key,0,$key);
        
        setcookie('recomended', $r2['title_span'],time() + 60 * 24 * 60 * 60, "/");
        echo json_encode(array("message" => "Oke masuk data","categ" => $_COOKIE['recomended'], "param"=>$id_transaksi_baru));
    }else{
        echo array("message" => mysqli_error($koneksi));
    }
}

// Fungsi untuk mengenkripsi teks
function encrypt($data, $key) {
    $cipher = "aes-256-cbc";
    $options = OPENSSL_RAW_DATA;
    $iv_length = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($iv_length);
    $encrypted = openssl_encrypt($data, $cipher, $key, $options, $iv);
    $result = base64_encode($iv . $encrypted);
    return $result;
}

?>