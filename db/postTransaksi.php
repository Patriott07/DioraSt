
<?php

include "../inc/inc_konek.php";
include "../inc/inc_fungsi.php";



if($_SERVER['REQUEST_METHOD'] == "POST"){
    $data = json_decode(file_get_contents("php://input"), true);
    $id  = $data['id'];
    $idproduk = $data['idproduk']; // string with coma
    $penerima = $data['penerima'];
    $via  = $data['via'];
    $total = $data['total']; //
    $no_wa = $data['no_wa'];
    $portal_code = $data['portal_code'];
    $alamat = $data['alamat']; 
    $cookie = $data['cookie']; //

    $sql1 = "insert into transaksi (id_user,id_produk,date,via,penerima,total,no_wa,portal_code,alamat) VALUES ($id,'$idproduk',NOW(),'$via','$penerima','$total','$no_wa','$portal_code','$alamat')";
    $q1 = mysqli_query($koneksi, $sql1);

    //cek cookie

    if($cookie === 1){
        $cookie = "masuk ke dalam if on";
        setcookie("whatsapp",$no_wa, time() + 30 * 24 * 60 * 60, "/");
        setcookie("payment",$via, time() + 30 * 24 * 60 * 60, "/");
        setcookie("address",$alamat, time() + 30 * 24 * 60 * 60, "/");
        setcookie("portalcode",$portal_code, time() + 30 * 24 * 60 * 60, "/");
    }

    $id_transaksi_baru = mysqli_insert_id($koneksi);

    //megubah id produk string to int 15,16 = ['15',16];

    $produkid = explode(",",$idproduk);
    $produkid = array_map(function($value){
         return intval($value);
    },$produkid); //int array

    $produkid = implode(",",$produkid); // int

    $sql2 = "select * from produk where id_produk IN ($produkid)";
    $q2   = mysqli_query($koneksi, $sql2);
    
     $titlespan = "";
     while($r2 = mysqli_fetch_assoc($q2)){
         $titlespan .= $r2['title_span'];
         $titlespan .= ",";
     }

     $sql3 = "DELETE FROM `cart` WHERE cart.id_produk IN ($produkid) AND cart.id_user = $id";

     $q3  = mysqli_query($koneksi,$sql3);
   

    if($q1 AND $q3) {
        //$id_transaksi = encrypt($id_transaksi_baru, $key);
        
        $id_transaksi_baru = ssl_encrypt($id_transaksi_baru);
        
        setcookie('recomended', $titlespan ,time() + 60 * 24 * 60 * 60, "/");
        echo json_encode(array("message" => "Oke masuk data","categ" => $_COOKIE['recomended'], "param"=>$id_transaksi_baru, "isCookie" => $cookie));
    }else{
        echo json_encode(array(//"message" => mysqli_error($koneksi),
         "cek" =>  $produkid));
    }
}

// Fungsi untuk mengenkripsi teks


?>