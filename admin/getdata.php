<?php

header("Access-Control-Allow-Origin: http://localhost/projek/DioraSt/admin/index.php"); // Ganti dengan URL frontend Anda
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

include "../inc/inc_konek.php";
if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    $table = $_GET['table'];
    $primaryKey = $_GET['prikey'];
    $id = $_GET['id'];

    if($table == "" || $primaryKey == "" || $id == ""){
        echo json_encode(array("message"=>"Request is unvalid You need more parameter"));
    }else{
        $sql1 = "DELETE FROM $table where $primaryKey = '$id'";
    }
    $q1 = mysqli_query($koneksi,$sql1);
    if($q1){
        echo json_encode(array("message"=>"Curent Data is deleted"));
    }
}
 if($_SERVER['REQUEST_METHOD'] == "GET"){
    
    $table = $_GET['table'];
    $orderby = $_GET['orderby'];
    $order = $_GET['order'];
    $start = $_GET['start'];
    $max   = $_GET['max'];
    $id    = $_GET['id'];
    $priKey = $_GET['prikey'];

    if($table == "transaksi"){
        if($id != ""){
            $sql1 = "select * from $table where $priKey = '$id'";
        }else{
            if($order == ""){
                if($max == ""){
                    $sql1 = "SELECT user.*, produk.*, transaksi.* from user,produk,transaksi WHERE transaksi.id_user = user.id AND transaksi.id_produk = produk.id_produk";
                }else{
                    $sql1 = "SELECT user.*, produk.*, transaksi.* from user,produk,transaksi WHERE transaksi.id_user = user.id AND transaksi.id_produk = produk.id_produk LIMIT $max";
                }
            }else{
                if($max == ""){
                    $sql1 = "SELECT user.*, produk.*, transaksi.* from user,produk,transaksi WHERE transaksi.id_user = user.id AND transaksi.id_produk = produk.id_produk ORDER BY $orderby $order";
                }else{
                    if($orderby == ""){
                        $sql1 = "SELECT user.*, produk.*, transaksi.* from user,produk,transaksi WHERE transaksi.id_user = user.id AND transaksi.id_produk = produk.id_produk LIMIT $start, $max";
                    }
                }
            }
        }
        
     
    }else if($table == "cart"){
        if($id != ""){
            $sql1 = "select * from $table where $priKey = '$id'";
        }else{
            if($order == ""){
                if($max == ""){
                    $sql1 = "SELECT user.*,produk.*, cart.* from user,produk,cart WHERE cart.id_user = user.id AND cart.id_produk = produk.id_produk";
                }else{
                    $sql1 = "SELECT user.*,produk.*, cart.* from user,produk,cart WHERE cart.id_user = user.id AND cart.id_produk = produk.id_produk LIMIT $max";
                }
            }else{
                if($max == ""){
                    $sql1 = "SELECT user.*,produk.*, cart.* from user,produk,cart WHERE cart.id_user = user.id AND cart.id_produk = produk.id_produk ORDER BY $orderby $order";
                }else{
                    if($orderby == ""){
                        $sql1 = "SELECT user.*,produk.*, cart.* from user,produk,cart WHERE cart.id_user = user.id AND cart.id_produk = produk.id_produk LIMIT $start, $max";
                    }
                }
            }
        }
        
    }else if($table == "fav"){
            if($id != ""){
                $sql1 = "select * from $table where $priKey = '$id'";
            }else{
                if($order == ""){
                    if($max == ""){
                        $sql1 = "SELECT user.*, produk.*,fav.* from user,produk,fav WHERE fav.id_user = user.id AND fav.id_produk = produk.id_produk";
                    }else{
                        $sql1 = "SELECT user.*, produk.*,fav.* from user,produk,fav WHERE fav.id_user = user.id AND fav.id_produk = produk.id_produk LIMIT $max";
                    }
                }else{
                    if($max == ""){
                        $sql1 = "SELECT user.*, produk.*,fav.* from user,produk,fav WHERE fav.id_user = user.id AND fav.id_produk = produk.id_produk ORDER BY $orderby $order";
                    }else{
                        if($orderby == ""){
                            $sql1 = "SELECT user.*, produk.*,fav.* from user,produk,fav WHERE fav.id_user = user.id AND fav.id_produk = produk.id_produk LIMIT $start, $max";
                        }
                    }
                }
            }
        
       
    }else{
        if($id != ""){
            $sql1 = "select * from $table where $priKey = '$id'";
        }else{
            if($order == ""){
                if($max == ""){
                    $sql1 = "select * from $table";
                }else{
                    $sql1 = "select * from $table LIMIT $max";
                }
            }else{
                if($max == ""){
                    $sql1 = "select * from $table ORDER BY $orderby $order";
                }else{
                    if($orderby == ""){
                        $sql1 = "select * from $table LIMIT $start, $max";
                    }
                }
            }
        }

    }

    $q1 = mysqli_query($koneksi,$sql1);
    $result = array();

    while ($r1 = mysqli_fetch_assoc($q1)) {
        $result[] = $r1;
    }
    
    //agar format php bisa menjadi json
    header("Access-Control-Allow-Origin: http://localhost/projek/DioraSt/admin/index.php");
    header("Content-Type: application/json");
    echo json_encode($result);


 }if($_SERVER['REQUEST_METHOD'] == "POST"){
    
 }
?>