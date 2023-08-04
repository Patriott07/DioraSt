<?php

include "../inc/inc_konek.php";


//memastikan axios.post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $rand = rand(1,1000);
    //terima data
    $gmail = $_POST['gmail'];
    $pw    = $_POST['password'];
    $img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOH2aZnIHWjMQj2lQUOWIL2f4Hljgab0ecZQ&usqp=CAU";
    $username = "Username_".$rand;
    $des   = "Saya belum Menambhkan apapun di dalam deskripsi";
    $active = false;
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