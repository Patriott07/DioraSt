<?php
session_start();
include "../inc/inc_konek.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id_fav'];
   

    $sql1 = "DELETE FROM cart where id_cart = '$id'";
    $q1  = mysqli_query($koneksi, $sql1);

    //memberikan response ke axios
    if ($q1) {
        echo json_encode(array("status" => "Oke data berhasil dihapus"));
    } else {
        echo json_encode(array("status" => "Error", "message" => "$sql1"));
    }
}