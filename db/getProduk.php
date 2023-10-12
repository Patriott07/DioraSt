<?php

include "../inc/inc_konek.php";

if($_SERVER['REQUEST_METHOD'] == "GET"){
// $data = $_GET['req'];
// $category = $_GET['category'];
// if($data == "SHOWALL"){
//     $sql1 = "select * from produk";
// }if($data == "SEPATU"){
//     if($category != ""){
//         $sql1 = "select * from produk where category = '$data' AND title_span LIKE '%$category%'";
//     }else{
//         $sql1 = "select * from produk where category = '$data'";
//     }
// }if($data == "BAJU"){
//     if($category != ""){
//         $sql1 = "select * from produk where category = '$data' AND title_span LIKE '%$category%'";
//     }else{
//         $sql1 = "select * from produk where category = '$data'";
//     }
// }

// $q1 = mysqli_query($koneksi,$sql1);

// $data = array();

// while($r1 = mysqli_fetch_assoc($q1)){
//     $title = explode(",",$r1['title_span']);
//     $data[] = [
//                     "id" => $r1['id_produk'],
//                     "name" => $r1['name'],
//                     "brand" => "",
//                     "price" => $r1['price'],
//                     "discount" => $r1['discount'],
//                     "description" => $r1['deskripsi'],
//                     "image" => $r1['image'],
//                      "detail" => [
//                        "titleSpan" => $title,
//                       "count" => $r1['count'],
//                        "category" => $r1['category']
//                      ]
//     ];
// }

// header("Access-Control-Allow-Origin: http://localhost/projek/DioraSt/index.php");
// header("Content-Type: application/json");
//  echo json_encode($data);

}

if($_SERVER['REQUEST_METHOD'] == "GET"){
  if(isset($_GET['id_produk'])){
    $id = $_GET['id_produk'];
    $sql1 = "select * from produk where id_produk = '$id'";
    $q1  = mysqli_query($koneksi,$sql1);
    $r1 = mysqli_fetch_assoc($q1);
    header('Content-Type: application/json');
    echo json_encode($r1);
  }else{
$sql1sepatu = "select * from produk where category = 'SEPATU'";
$q1 = mysqli_query($koneksi,$sql1sepatu);

$sql1baju = "select * from produk where category = 'BAJU'";
$q2 = mysqli_query($koneksi,$sql1baju);

$dataSepatu = [];
$dataBaju = [];
while($r1 = mysqli_fetch_assoc($q1)){

    $title = explode(",",$r1['title_span']);

    $dataSepatu[] = [
                    "id" => $r1['id_produk'],
                    "name" => $r1['name'],
                    "brand" => "",
                    "price" => $r1['price'],
                    "discount" => $r1['discount'],
                    "description" => $r1['deskripsi'],
                    "image" => $r1['image'],
                    "detail" => [
                      "titleSpan" => $title,
                      "count" => $r1['count'],
                      "category" => $r1['category']
                    ]
    ];
}


while($r2 = mysqli_fetch_assoc($q2)){

    $title = explode(",",$r2['title_span']);

    $dataBaju[] = [
        "id" => $r2['id_produk'],
        "name" => $r2['name'],
        "brand" => "",
        "price" => $r2['price'],
        "discount" => $r2['discount'],
        "description" => $r2['deskripsi'],
        "image" => $r2['image'],
        "detail" => [
          "titleSpan" => $title,
          "count" => $r2['count'],
          "category" => $r2['category']
        ]
];

}


    $product = [
        "SEPATU" => $dataSepatu,
        "BAJU" => $dataBaju
    ];

    $output = ["product" => [$product]];

    header('Content-Type: application/json');
    echo json_encode($output);

  }

}
