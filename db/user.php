<?php

include "../inc/inc_konek.php";


if($_SERVER['REQUEST_METHOD'] == "GET"){
    $sql1 = "select * from user";
    $q1 = mysqli_query($koneksi,$sql1);
    
    
    // Convert hasil query menjadi array asosiatif
    $data_produk = array();
    while ($row = mysqli_fetch_assoc($q1)) {
        $data_produk[] = $row;
    }
    
    // Convert array menjadi JSON
    $json_produk = json_encode($data_produk);
    
    // Tutup koneksi database
    mysqli_close($koneksi);
    
    // // Tampilkan hasil JSON
    echo $json_produk;
}


//memastikan axios.post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $rand = rand(1,1000);
    //terima data
    $gmail = $_POST['gmail']; 
    $pw    = $_POST['password'];
    // $pw = md5($pw);
    $img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOH2aZnIHWjMQj2lQUOWIL2f4Hljgab0ecZQ&usqp=CAU";
    $username = "Username_".$rand;
    $des   = "Saya belum Menambhkan apapun di dalam deskripsi";
    $active = "off";
    //setelah itu melakukan validasi (opsional)

    $sql1 = "insert into user (gmail, password, img , username , deskripsi , active) VALUES ('$gmail','$pw','$img','$username','$des', '$active')";
    $q1 = mysqli_query($koneksi,$sql1);

    //memberikan response ke axios
    if($q1){
        echo json_encode(array("status" => "OK"));
    }else{
        echo json_encode(array("status"=> "Error", "message"=> "There something wrong when try to post"));
    }

    mysqli_close($koneksi);
}
?>