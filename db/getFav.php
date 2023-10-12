<?php
include "../inc/inc_konek.php";

if($_SERVER['REQUEST_METHOD'] == "GET"){

    $id = $_GET['id_user'];
    $sql1 = "select fav.*, produk.* from fav, produk where fav.id_produk = produk.id_produk AND  fav.id_user = '$id' ORDER BY id_fav DESC";
    $q1  = mysqli_query($koneksi,$sql1);

$result = [];

while($r1 = mysqli_fetch_assoc($q1)){
    $result[] = $r1;
}



header('Content-Type: application/json');
echo json_encode($result);
}

?>
