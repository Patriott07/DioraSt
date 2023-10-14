<?php
include "../inc/inc_konek.php";
include "../inc/inc_fungsi.php";

session_start();

if(isset($_POST['back'])){
    if(isset($_SESSION['transaksi'])){
        unset($_SESSION['transaksi']);
    }
    setHeader('../index.php');
}

if (isset($_GET['idTran']) && isset($_SESSION['transaksi'])) {
    $idTran = $_GET['idTran']; //berupa data hash yang didapat dri postTransaksi
    $key = "Diora12345678901"; //sama
    $idTran = str_replace(" ", "+", urldecode($idTran));
    $id = ssl_decrypt($idTran);
    // $id_transaksi_baru = openssl_encrypt($id_transaksi_baru,'AES-128-CBC',$key,0,$key);

    $sql1 = "SELECT transaksi.*,produk.name, produk.image,produk.price,produk.discount, user.username, user.img
    FROM transaksi
    JOIN produk ON FIND_IN_SET(produk.id_produk, transaksi.id_produk) > 0
    JOIN user ON transaksi.id_user = user.id
    WHERE transaksi.id = $id";

 

    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $r1 = mysqli_fetch_assoc($q1);
        //var_dump($r1);
        
    }
}else{
    setHeader("../index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baumans&family=Bebas+Neue&family=Flamenco&family=Inter&family=Italiana&family=Josefin+Sans&family=Margarine&family=Martian+Mono&family=Megrim&family=Roboto+Mono:wght@500&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        @media print {

            #guide,
            #guide2 {
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php

    $date = date("Y-m-d | h:i a", strtotime($r1['date']));
    $arrive = date("Y-m-d | h:i a", strtotime($r1['date'] . "+3 days"));
    $slash  = 70;
    $qty  = mysqli_num_rows($q1);

   
    
    ?>
    <div class="col-lg-8 col-md-10 offset-md-1 offset-lg-2">
        <div class="container mt-5 mb-5">
            <?php
            for ($i = 0; $i < $slash; $i++) {
                echo "/";
            }
            ?>
            <br>
            /<br>
            / &nbsp; &nbsp; &nbsp;<div class="badge bg-dark p-2"> Diora Store </div> <br>
            / <br>
            <?php
            for ($i = 0; $i < $slash; $i++) {
                echo "/";
            }
            ?>
            <br>
            - <br>
            - &nbsp; Penerima : <?= $r1['penerima'] ?> <br>
            - &nbsp; Tanggall &nbsp; : <?= $r1['date'] ?> <br>
            - &nbsp; Send to &nbsp;&nbsp;&nbsp;: <?= $r1['alamat'] ?> <br>
            - <br>
            <?php
            for ($i = 0; $i < $slash; $i++) {
                echo "/";
            }
            ?>

            <div class="row mt-3">
                <div class="col-5">
                    - Nama barang
                </div>
                <div class="col-1">
                    Qty
                </div>
                <div class="col-2">
                    diskon
                </div>
                <div class="col-3">
                    harga
                </div>
            </div>

            <?php
            $idpro = $r1['id_produk'];
            $sql2 = "Select * from produk where id_produk IN ($idpro)";
            $q2  = mysqli_query($koneksi,$sql2);
            while ($r2 = mysqli_fetch_assoc($q2)) {
                
            ?>

                <div class="row mt-3">
                    <div class="col-5">
                       - <?= $r2['name'] ?>
                    </div>
                    <div class="col-1">
                        1
                    </div>
                    <div class="col-2 badge-warning">
                        <?php
                        if ($r2['discount'] == 0) {
                            echo "-";
                        } else {
                        ?>
                            <span class="badge bg-dark">
                                <?php echo $r2['discount']; ?> %
                            </span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-4">
                        <?php
                        if ($r2['discount'] == 0) {
                            echo $r2['price'];
                        } else {
                            $hargareal = $r2['price'] * (1 - ($r2['discount'] / 100));
                        ?>
                            <span style="text-decoration:line-through;"><?= $r2['price'] ?></span>
                            <span class="badge ms-2 bg-dark"><?= $hargareal ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            
            ?>
            <br>
            <?php
            for ($i = 0; $i < $slash; $i++) {
                echo "/";
            }
            ?>
            <br>
            - <br>
            - Total : <?=$r1['total']?> <br>
            - Items : <?=$qty?> <br>
            - <br>
            <?php
            for ($i = 0; $i < $slash; $i++) {
                echo "/";
            }
            ?>
        </div>
        <form action="" method="post" class="my-5 text-center">
            <button type="submit" class="send-3 ms-2" id="guide2" name="back">Back Homepage</button>
        </form>
    </div>


    <script>
         window.print();
    </script>

</body>

</html>