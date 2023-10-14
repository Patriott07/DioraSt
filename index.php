<?php
include "inc/inc_konek.php";
include "inc/inc_fungsi.php";
session_start();
$succes1 = "";
$error = "";


if (!isset($_SESSION['id'])) {
    unset($_SESSION['id']);
    session_destroy();
    header("Location:login.php");
    exit();
} else {
    $id = $_SESSION['id'];
    $sql1 = "update user set active = 'online' where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
}

if (isset($_POST['logout'])) {
    $sql1 = "update user set active = 'off' where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    unset($_SESSION['id']);
    session_destroy();
    header("Location:login.php");
    exit();
}

if (isset($_POST['rename'])) {
    $user = $_POST['username'];
    $url = $_POST['img'];
    $des = $_POST['des'];

    if ($url == "") {
        $error .= "<li>Kamu tidak bisa membiarkan url kosong</li>";
    } else {
        $sql1 = "update user set username = '$user', img = '$url', deskripsi = '$des' where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        $succes1 = "<li>Berhasil Merubah data anda, silahkan Refresh halaman</li>";
    }
}

if ($id == null || $id == "") {
    unset($_SESSION['id']);
    session_destroy();
    header("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="judulTab">Diora St</title>
    <link rel="icon" type="image/png" sizes="32x32" href="asset/Group 22.png">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baumans&family=Bebas+Neue&family=Flamenco&family=Inter&family=Italiana&family=Josefin+Sans&family=Margarine&family=Martian+Mono&family=Megrim&family=Roboto+Mono:wght@500&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- bosstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .box-des {
            width: 292px;
            height: auto;
            border-radius: 5px;
            background: #3A3A3A;
            color: white;
            padding: 7px 15px;
        }

        .ue {
            cursor: default;
        }

        img.dropdown-toggle {
            opacity: 0.9;
            transition: 0.2s;
        }

        img.dropdown-toggle:hover {
            opacity: 1;
            border-radius: 1px solid #fff;
        }

        input.logout {
            border: 0 !important;
            height: 30px;
            border-radius: 5px;
            background: #29D8FE;
            padding: 3px 80px;
            transition: all 0.7s;
        }

        .logout:hover {
            background: #29FE65;
            padding: 3px 20px;
            color: #fff;
        }

        .img-prod-trans {

            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .check-sold-out {
            padding: 2px 6px !important;
            color: white;
            border-radius: 5px;
            background: rgba(251, 140, 133, 0.80);
            font-size: 14px;
            box-shadow: none;
            border: 0px;
        }

        .btn-cart-2:hover {
            color: #0EFD09;
            padding: 4px 10px !important;
            background-color: #fff;
        }

        .btn-cart-2 {
            color: #fff;
            font-size: 14px;
            padding: 4px 6px;
            border-radius: 5px;
            background: #0EFD09;
            transition: all 0.4s;
        }

        .scrolling-container {

            display: flex;
            /* Membuat card menjadi tampilan flex */
            overflow-x: auto;
            /* Menambahkan bilah geser horizontal */
            white-space: nowrap;
            /* Mencegah card pindah ke baris berikutnya */
        }

        .scrool {
            overflow-x: auto;
        }

        html {
            scroll-behavior: smooth;
        }

        .car-bg {
            background-position: center;
            background-size: cover;
            height: 60vh;
        }



        @media screen and (max-width: 856px) {

            header {
                background-size: cover;
                transition: all 0.4s;
                background-image: url(asset/hero-1.png);
                height: 90vh;
                width: 100%;
                /* margin: 0px auto; */

                background-position: center;

            }

            .container {
                width: 100% !important;
            }

            .dropdown-menu {
                position: fixed;
                right: 0 !important;
                top: 0 !important;
                z-index: 33;
            }

            .nav-sm {
                display: none;
            }
        }

        @media screen and (max-width: 520px) {
            .container {
                width: 100% !important;
            }

            .diskon {
                display: none;
            }

            .nav-sm {
                display: none;
            }

            .nav-left {
                display: none;
            }

            .dropdown-menu {
                position: fixed;
                right: 0;
                top: 0;
                z-index: 33;
                max-width: 400px;
                transform: translate(-50%, 50%);
            }

            .btn-start {
                text-align: left;
            }

            .nav-span {
                display: none;
            }
        }

        /* Untuk checkbox yang belum dicentang */
        input[type="checkbox"] {
            background-color: black;
            /* Warna latar belakang hitam */
        }

        /* Untuk checkbox yang sudah dicentang */
        input[type="checkbox"]:checked {
            background-color: black;
            /* Warna latar belakang tetap hitam */
        }

        /* Untuk tanda ceklis pada checkbox yang sudah dicentang */
        input[type="checkbox"]:checked::before {
            content: '';
            /* Tanda ceklis (✓) putih */
            font-size: 18px;
            /* Ukuran font tanda ceklis */
            color: white;
            /* Warna tanda ceklis putih */
        }

        .btn-checkout {
            color: #050505;
            border: 1px solid #000;
            background: rgba(217, 217, 217, 0.00);
            transition: all 0.3s;
            padding: 10px 70px;
        }

        .btn-checkout:hover {
            color: #fff;
            border: 1px solid #000;
            background: #000;
            padding: 10px 80px;
        }
    </style>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div id="app" class="position-relative">
        <div :class="{show : toggle.info}" class="info position-fixed" style="display: none ;right: 3vw;top: 3vh;">
            <!-- <div class="box-info txt-xm mt-4 mb-3 p-2">
                <span class="text-start" style="font-size: 14px!important;">Diora Says : </span> <br>
                <span>Kamu telah Menambahkan </span> <span class="mark">{{ msg.info }}</span> <span class="ms-1">{{
                    msg.kondisi }}</span> <br>
                <div class="txt-end mt-1" style="font-size: 12px!important;">1 Second ago</div>
            </div> -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                <div class="toast-header">
                    <img src="asset/Group 22.png" class="rounded me-2" alt="...">
                    <strong class="me-auto">Diora Says :</strong>
                    <small>{{ getday }}</small>
                    <button type="button" class="btn-close e" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ msg.info }}
                </div>
            </div>
        </div>
        <header :class="{header2:loop.header}" :class="{
            'container': isDesktopView,
            'container-fluid': isTabletView,
                }" class="container">
            <nav class="mx-5 pt-5 row align-items-center">
                <div class="col-6 nav-left">
                    <span class="nav-span p-3"><span class="white pe-1">Diora St</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 21 21" fill="none">
                            <path class="cart" d="M19.5482 7H16.6564L16.0401 2.9225C15.9159 2.30557 15.6431 1.73739 15.2508 1.2783C14.8585 0.8192 14.3613 0.48632 13.8119 0.315C13.2599 0.118344 12.6849 0.0122194 12.1052 0H8.56538C7.98566 0.0122194 7.41066 0.118344 6.85869 0.315C6.30929 0.48632 5.81204 0.8192 5.41973 1.2783C5.02742 1.73739 4.7547 2.30557 4.63052 2.9225L4.01421 7H1.12232C0.997857 6.99916 0.874976 7.0309 0.763688 7.09263C0.6524 7.15435 0.555855 7.24432 0.481917 7.3552C0.407979 7.46607 0.35874 7.59473 0.338213 7.73068C0.317685 7.86662 0.32645 8.00602 0.363792 8.1375L3.3347 19.1625C3.48595 19.6951 3.7866 20.1604 4.19299 20.4909C4.59937 20.8213 5.09031 20.9997 5.59448 21H15.0761C15.5776 20.996 16.0649 20.8159 16.4682 20.4857C16.8714 20.1555 17.1696 19.6923 17.3201 19.1625L20.291 8.1375C20.3279 8.00742 20.3369 7.86958 20.3172 7.73497C20.2975 7.60036 20.2497 7.47272 20.1775 7.36221C20.1054 7.25171 20.0109 7.16141 19.9017 7.09852C19.7924 7.03564 19.6714 7.0019 19.5482 7ZM5.62608 7L6.19498 3.2025C6.25735 2.89244 6.40202 2.61012 6.6104 2.39183C6.81879 2.17354 7.08136 2.02924 7.36438 1.9775C7.75313 1.841 8.15768 1.76575 8.56538 1.75H12.1052C12.5176 1.764 12.9269 1.83925 13.322 1.9775C13.605 2.02924 13.8676 2.17354 14.076 2.39183C14.2844 2.61012 14.429 2.89244 14.4914 3.2025L15.0445 7H5.56287H5.62608Z" fill="white" />
                        </svg>
                    </span>
                    <span class="nav-sm nav-span black p-3 ms-2" style="background-color: white;">
                        <a @click="toggle.clothes = !toggle.clothes" href="#clothes">Woman Clothing</a>
                        <a @click="toggle.clothes = !toggle.clothes" href="#clothes">Man Clothing</a>
                        <a @click="toggle.shoes = !toggle.shoes" href="#shoes">Shoes</a>
                    </span>
                </div>
                <div class="col-lg-6 col-10 col-md-6 offset-md-0 offset-2 offset-lg-0 text-end">

                    <!-- nav fav -->
                    <span class="e btn-group dropdown">
                        <svg class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <circle cx="16" cy="16" r="16" fill="#fff" />
                            <path class="love" d="M20.5455 7C18.6364 7 16.9545 8.10833 16 9.85C15.0455 8.10833 13.3636 7 11.4545 7C8.45455 7 6 9.85 6 13.3333C6 19.6139 16 26 16 26C16 26 26 19.6667 26 13.3333C26 9.85 23.5455 7 20.5455 7Z" fill="black" />
                        </svg>


                        <div class="dropdown-menu mt-1 ue" style="width: 580px;">
                            <!-- Dropdown favorite -->
                            <div class="container py-3">
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <h5 class="txt-sm">Favorit</h5>
                                    </div>
                                    <div class="col-6 text-end">
                                        <h5 class="txt-sm e">Close</h5>
                                    </div>
                                </div>
                                <hr>

                                <div style="overflow-y: auto; height: 80vh">
                                    <div class="d-flex-column">

                                        <div v-if="dataApi.dataFavTop.length">
                                            <div v-for="(data,index) in dataApi.dataFavTop">
                                                <div class="row align-items-end mt-3">
                                                    <div class="col-12 text-end">
                                                        <!-- hapus btn -->
                                                        <!--id_fav, name-->
                                                        <svg @click="delFav(data.id_fav,data.name)" class="delFav e" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                                            <path class="close" d="M6.363 4.95L11.313 0L12.728 1.415L7.778 6.365L12.728 11.315L11.313 12.729L6.363 7.779L1.413 12.729L0 11.314L4.95 6.364L0 1.414L1.413 0.00199986L6.363 4.952V4.95Z" fill="black" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="row align-items-end my-3">
                                                    <div class="col-lg-8">
                                                        <div class="row align-items-end">
                                                            <div class="col-5 text-center">
                                                                <img class="img-fluid" style="border-radius: 10px;" :src="data.image" alt="">
                                                            </div>
                                                            <div class="col-7 ps-1">
                                                                <h5 class="txt-sm"> {{ data.name }}</h5>
                                                                <span class="txt-xm">Rp : {{ data.price }} </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12 mt-2">
                                                        <!-- 5 params  index, parent, id_user, id_produk, type-->
                                                        <div class="btn btn-cart" @click="cart(index,'SEPATU',<?php echo $id ?>, data.id_produk, 'cart')">
                                                            Tambah Keranjang
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-start form-text mb-3">
                                                    <!-- des -->
                                                    {{ data.deskripsi }}
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        <div v-else class="my-5 text-center txt-sm">
                                            <?php
                                            $sql1 = "select * from user where id = '$id'";
                                            $q1  = mysqli_query($koneksi, $sql1);
                                            $r1  = mysqli_fetch_assoc($q1);
                                            ?>
                                            <img style="width: 200px; height: 200px" src="<?php echo $r1['img'] ?>" alt="">
                                            <h5>Belum ada barang Favorit Anda, Mari Cari</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>

                    <!-- nav cart -->
                    <span class="mx-2 e btn-group dropdown">
                        <svg class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <circle cx="16" cy="16" r="16" fill="#fff" />
                            <path class="cart" d="M25.2209 12H22.329L21.7127 7.9225C21.5885 7.30557 21.3158 6.73739 20.9234 6.2783C20.5311 5.8192 20.0339 5.48632 19.4845 5.315C18.9325 5.11834 18.3575 5.01222 17.7778 5H14.238C13.6583 5.01222 13.0833 5.11834 12.5313 5.315C11.9819 5.48632 11.4846 5.8192 11.0923 6.2783C10.7 6.73739 10.4273 7.30557 10.3031 7.9225L9.68682 12H6.79493C6.67046 11.9992 6.54758 12.0309 6.4363 12.0926C6.32501 12.1544 6.22846 12.2443 6.15452 12.3552C6.08059 12.4661 6.03135 12.5947 6.01082 12.7307C5.99029 12.8666 5.99906 13.006 6.0364 13.1375L9.0073 24.1625C9.15855 24.6951 9.45921 25.1604 9.8656 25.4909C10.272 25.8213 10.7629 25.9997 11.2671 26H20.7487C21.2502 25.996 21.7375 25.8159 22.1408 25.4857C22.544 25.1555 22.8422 24.6923 22.9927 24.1625L25.9636 13.1375C26.0005 13.0074 26.0095 12.8696 25.9898 12.735C25.9701 12.6004 25.9223 12.4727 25.8502 12.3622C25.778 12.2517 25.6835 12.1614 25.5743 12.0985C25.465 12.0356 25.344 12.0019 25.2209 12ZM11.2987 12L11.8676 8.2025C11.93 7.89244 12.0746 7.61012 12.283 7.39183C12.4914 7.17354 12.754 7.02924 13.037 6.9775C13.4257 6.841 13.8303 6.76575 14.238 6.75H17.7778C18.1902 6.764 18.5995 6.83925 18.9946 6.9775C19.2776 7.02924 19.5402 7.17354 19.7486 7.39183C19.957 7.61012 20.1016 7.89244 20.164 8.2025L20.7171 12H11.2355H11.2987Z" fill="black" />
                        </svg>
                        <form action="" method="post" class="dropdown-menu ue pb-0" style="width: 580px; background-color: #E4E4E4">
                            <!-- Dropdown Cart -->
                            <div class="container py-3">
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <h5 class="txt-sm">
                                            <span class="badge-cart">Keranjang</span>
                                        </h5>
                                    </div>
                                    <div class="col-6 text-end">
                                        <h5 class="txt-sm e text-light">Close</h5>
                                    </div>
                                </div>
                                <hr>

                                <div style="overflow-y: auto; height: 55vh">
                                    <div class="d-flex-column">
                                        <?php
                                        $sql1 = "SELECT cart.*, produk.*, user.id FROM produk,cart,user WHERE cart.id_produk = produk.id_produk AND user.id = '$id' ORDER BY cart.id_cart DESC;";
                                        $q1 = mysqli_query($koneksi, $sql1);
                                        while ($r1 = mysqli_fetch_assoc($q1)) {

                                        ?>
                                            <div class="items-cart p-3 mb-4" style="background-color: #fff;">
                                                <div class="row align-items-end">
                                                    <!--benarkan-->
                                                    <div class="col-12 text-end">
                                                        <!-- hapus btn -->
                                                        <svg @click="delCart(<?php echo $r1['id_cart'] ?>,'<?php echo $r1['name'] ?>')" class="delFav e" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                                            <path class="close" d="M6.363 4.95L11.313 0L12.728 1.415L7.778 6.365L12.728 11.315L11.313 12.729L6.363 7.779L1.413 12.729L0 11.314L4.95 6.364L0 1.414L1.413 0.00199986L6.363 4.952V4.95Z" fill="black" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="row align-items-end my-3">
                                                    <div class="col-9">
                                                        <div class="row align-items-end">
                                                            <div class="col-4 text-center">
                                                                <img class="img-fluid" style="border-radius: 10px; max-width:100px; max-height:100px" src="<?php echo $r1['image'] ?>" alt="">
                                                            </div>
                                                            <div class="col-8 ps-1">
                                                                <h5 class="txt-sm"><?php echo $r1['name'] ?></h5>

                                                                <span class="txt-xm">Rp : <?php
                                                                                            if ($r1['discount'] != 0) {
                                                                                                $realprice = $r1['price'] * (1 - ($r1['discount'] / 100));
                                                                                                echo $realprice;
                                                                                            } else {
                                                                                                echo $r1['price'];
                                                                                            } ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <!-- <div class="btn btn-cart-2" @click.prevent='testApi("", "", "", <?php echo $r1['id_produk'] ?>)' data-bs-toggle="modal" data-bs-target="#transaksiForm">
                                                            Buy now
                                                        </div> -->

                                                        <div class="form-check">
                                                            <input @click="addTotalCheckout($event,
                                                            <?php
                                                            if ($r1['discount'] != 0) {
                                                                $realprice = $r1['price'] * (1 - ($r1['discount'] / 100));
                                                                echo $realprice;
                                                            } else {
                                                                echo $r1['price'];
                                                            }
                                                            ?>)" class="form-check-input" type="checkbox" name="checkout_item[]['id']" value="<?= $r1['id_produk'] ?>" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                pay now
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="text-start form-text mb-3">
                                                    <?php //echo $r1['deskripsi'] 
                                                    ?>
                                                </div>
                                                <hr> -->
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid p-3 mb-0" style="background-color: #fff;">
                                <div class="txt-xm form-text">Total : Rp. {{ totCheckout }}</div>
                                <div class="txt-sm form-text" style="font-size: 12px;">Qty : {{ qtyCheckout }}</div>
                                <hr>
                                <div class="my-2 col-12 text-center">
                                    <button class="btn-checkout txt-xm" type="submit" name="test" data-bs-toggle="modal" data-bs-target="#transaksiForm">
                                        Check out now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </span>


                    <?php
                    $sql1 = "select * from user where id = '$id'";
                    $q1  = mysqli_query($koneksi, $sql1);
                    $r1  = mysqli_fetch_assoc($q1);


                    ?>

                    <!-- nav photos -->
                    <span class="ms-2 e dropdown btn-group">
                        <img class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 100%;width: 60px; height:60px;" src="<?php echo $r1['img'] ?>" alt="">
                        <div class="dropdown-menu mt-2 ue container text-center pt-5 pb-4" style="width: 350px!important;">
                            <!-- berisi informasi profile  -->
                            <img style="width: 150px; border-radius: 50px" src="<?php echo $r1['img'] ?>" alt="">
                            <h5 style="font-size: 24px; margin-top:14px"><?php echo $r1['username'] ?></h5>
                            <h5 class="txt-xm"><?php echo $r1['gmail'] ?></h5>
                            <div class="mx-auto">
                                <div class=" ms-4 box-des my-4">
                                    <?php echo $r1['deskripsi'] ?>
                                </div>
                                <div class="container mb-3">
                                    <div class="row align-items-end text-start py-2" style="border-bottom: 1px solid #898787;">
                                        <div class="col-12 e" data-bs-toggle="modal" data-bs-target="#exampleModalAccount" data-bs-whatever="@mdo">
                                            <div class="" style="font-size: 14px;">
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="pt-2">Manage your Account</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-end text-start py-2" style="border-bottom: 1px solid #898787;">
                                        <div class="col-12 e" data-bs-toggle="modal" data-bs-target="#exampleModalPayment" data-bs-whatever="@mdo">
                                            <div class="" style="font-size: 14px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
                                                    <path d="M16.246 11.5C16.0471 11.5 15.8563 11.579 15.7157 11.7197C15.575 11.8603 15.496 12.0511 15.496 12.25C15.496 12.4489 15.575 12.6397 15.7157 12.7803C15.8563 12.921 16.0471 13 16.246 13H19.746C19.9449 13 20.1357 12.921 20.2763 12.7803C20.417 12.6397 20.496 12.4489 20.496 12.25C20.496 12.0511 20.417 11.8603 20.2763 11.7197C20.1357 11.579 19.9449 11.5 19.746 11.5H16.246ZM0 3.75C0 2.75544 0.395088 1.80161 1.09835 1.09835C1.80161 0.395088 2.75544 0 3.75 0H20.246C21.2406 0 22.1944 0.395088 22.8977 1.09835C23.6009 1.80161 23.996 2.75544 23.996 3.75V14.25C23.996 15.2446 23.6009 16.1984 22.8977 16.9017C22.1944 17.6049 21.2406 18 20.246 18H3.751C2.75644 18 1.80261 17.6049 1.09935 16.9017C0.396088 16.1984 0.00100017 15.2446 0.00100017 14.25V3.75H0ZM3.75 1.5C3.15326 1.5 2.58097 1.73705 2.15901 2.15901C1.73705 2.58097 1.5 3.15326 1.5 3.75V4.5H22.496V3.75C22.496 3.15326 22.2589 2.58097 21.837 2.15901C21.415 1.73705 20.8427 1.5 20.246 1.5H3.75ZM1.5 14.25C1.5 14.8467 1.73705 15.419 2.15901 15.841C2.58097 16.2629 3.15326 16.5 3.75 16.5H20.246C20.8427 16.5 21.415 16.2629 21.837 15.841C22.2589 15.419 22.496 14.8467 22.496 14.25V6H1.501V14.25H1.5Z" fill="black" />
                                                </svg>
                                                <span class="pt-2 ps-2">History Payment</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="container mb-4">
                                    <div class="row align-items-end text-start py-2">
                                        <form action="" method="POST" class="text-center">
                                            <input onclick="return confirm('Apakah yakin ingin meninggalkan halaman?')" class="logout" name="logout" value="Logout the account" type="submit" />
                                        </form>
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <div class="txt-xm text=center" style="font-size: 14px;">
                                        Thanks for Joined be member
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>
                </div>
            </nav>

        </header>


        <!-- ticker tape -->
        <div class="ticker-tape-section container bg-dark py-2">
            <div class="ticker-tape-section__container">
                <div class="ticker-tape__text-block">
                    <span class="ticker-tape--text">Free international delivery on orders over £200. </span>
                    <span class="ticker-tape--text">Sign up today for 15% off your first order. </span>
                    <span class="ticker-tape--text"> A RETAIL DESTINATION FOR EMERGING UNIQUE FASHION</span>
                    <span class="ticker-tape--text">Escape the everyday monotony</span>

                </div>
                <div class="ticker-tape__text-block">
                    <span class="ticker-tape--text">Free international delivery on orders over £200. </span>
                    <span class="ticker-tape--text">Sign up today for 15% off your first order. </span>
                    <span class="ticker-tape--text"> A RETAIL DESTINATION FOR EMERGING UNIQUE FASHION</span>
                    <span class="ticker-tape--text">Escape the everyday monotony</span>

                </div>
            </div>
        </div>
        <!-- ini recomended -->
        <div class="container py-5" style="background-color: #fff;">
            <?php
            if (isset($_COOKIE['recomended'])) {
            ?>
                <h4 class="text-center my-4">Recomended For You</h4>
                <div style="overflow-x: auto;">
                    <div class="d-flex gap-4 ms-4">
                        <?php

                        $randFav = explode(",", $_COOKIE['recomended']);
                        $num = rand(0, count($randFav) - 1);


                        $sql1 = "select * from produk where title_span LIKE '%$randFav[$num]%'";

                        $q1 = mysqli_query($koneksi, $sql1);

                        if (mysqli_num_rows($q1)) {
                            while ($r1 = mysqli_fetch_assoc($q1)) {
                                $link = str_replace(" ", "", $r1['name']); //str edit,str new, from data
                        ?>
                                <div class="card" style="min-width: 18rem; max-width:18rem">
                                    <div style="background-image: url(<?php echo $r1['image'] ?>); background-size:cover; background-position:center; height:200px; ">

                                    </div>

                                    <div class="card-body">
                                        <?php
                                        $data = explode(",", $r1['title_span']);
                                        foreach ($data as $tag) {
                                        ?>
                                            <span class="badge"><?php echo $tag ?></span>
                                        <?php
                                        }
                                        ?>

                                        <h5 class="card-title"><?php echo $r1['name'] ?></h5>
                                        <p class="card-text"><?php echo $r1['deskripsi'] ?></p>
                                        </a>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Price : <?php echo $r1['price'] ?></li>
                                        <li class="list-group-item">Discount : <?php echo $r1['discount'] ?>% </li>
                                        <li class="list-group-item">After Discount : <?php echo $r1['price'] * (1 - $r1['discount'] / 100) ?> </li>
                                    </ul>
                                    <a title="Antarkan saya melihat produk ini" style="text-decoration: none; color:#3A3A3A" href="#<?php echo $link ?>">
                                        <div class="mt-3 px-2 py-1 text-light text-center" style="background-color: #564632;">
                                            Antarkan saya
                                        </div>
                                    </a>

                                </div>

                        <?php

                            }
                        }


                        ?>

                    </div>
                </div>
            <?php } ?>
        </div>
        <main :class="{
            'container': isDesktopView,
            'container-fluid': isTabletView,
        }" class="container position-relative" style="background-color: #fff;">
            <div class="row">

                <!-- tempat untuk filter data -->
                <div id="leftbar" class="col-md-12 col-lg-3 pt-5 start-0 top-0 mb-3" style="position: relative;background-color: #fff;">
                    <p class="txt-md e harga">Category</p>
                    <div class="ps-3 mt-3" id="shoes">
                        <h6 class="txt-sm e" @click.prevent="toggle.shoes = !toggle.shoes">Shoes</h6>
                        <ul :class="{show:toggle.shoes}" class="ps-5" style="display: none;">
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('SEPATU','New',0)">New</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('SEPATU','New Colection',0)">New Colection</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('SEPATU','Shoes Man',0)">Shoes Man</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('SEPATU','Shoes Woman',0)">Shoes Woman</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('SEPATU','Expensive',0)">Expensive</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('SEPATU','Comfortable',0)">Comfortable</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('SEPATU','Soft',0)">Soft</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('SEPATU','Sandals',0)">Sandals</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('SEPATU','Formal',0)">Formal</li>
                        </ul>
                    </div>
                    <div class="ps-3 mt-3" id="clothes">
                        <h6 class="txt-sm e" @click="toggle.clothes = !toggle.clothes">Clothes</h6>
                        <ul :class="{show:toggle.clothes}" class="ps-5" style="display: none;">
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','New',1)">New</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','New Colection',1)">New Colection</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Woman Clothing',1)">Woman Clothing</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Mans Clothing',1)">Mans Clothing</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Expensive',1)">Expensive</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Stylish',1)">Stylish</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Soft',1)">Soft</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Shirts',1)">Shirts</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Dresses',1)">Dresses</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Blouses',1)">Blouses</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Tops',1)">Tops</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Coats',1)">Coats</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Jackets',1)">Jackets</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Sweaters',1)">Sweaters</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Skirts',1)">Skirts</li>
                            <li class="toggle-shop txt-xm e" @click.prevent="testApi('BAJU','Pants',1)">Pants</li>
                        </ul>
                    </div>

                    <div class="ps-3 mt-3">
                        <h6 class="txt-sm e" @click.prevent="testApi()">Show All</h6>
                    </div>
                </div>

                <div id="content-card" class="col-md-12 col-lg-9 mx-auto p-3" style="background-color: #F2F2F2;">
                    <!-- our page loading -->
                    <div v-if="toggle.load" class="position-relative" style="height: 100vh;">
                        <div :class="{trans : toggle.load}" class="position-absolute top-50 start-50 translate-middle">
                            <img src="asset/Triangles-1s-200px.gif" alt="">
                            <h5 class="txt-sm text-center">Loading<span> . . .</span></h5>
                        </div>

                    </div>

                    <!-- our page who filter the content/produk -->
                    <div v-else>
                        <div v-if="dataApi.dataFilter.length" class="row"> <!-- datafilter -->
                            <div v-for="(data, index) in dataApi.dataFilter" class="col-lg-4 col-md-6 col-12">
                                <div class="card mb-3">
                                    <div v-if="data.discount==0">
                                        <div class="harga p-2 txt-xm" style="font-size: 14px;">Rp. {{ data.price }}
                                        </div>
                                    </div>
                                    <div v-else class="row align-items-center justify-content-between ">
                                        <div title="Harga ini tidak berlaku lgi" class="col-5 py-1 dash txt-xm ms-1" style="font-size: 14px;">{{ data.price }}</div>
                                        <div class="col-6 py-1 text-end">
                                            <span class="badge" title="Ini diskon Produk">{{ data.discount }}%</span>
                                            <span class="badge" title="ini harga setelah diskon">{{ data.price * (1 -
                                                data.discount / 100) }}</span>
                                        </div>
                                    </div>
                                    <div style="object-fit: cover;">
                                        <img loading="lazy" :title="data.name" style=" max-height: 200px; object-fit: cover;" :src="data.image" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body px-2">
                                        <h5 class="">{{ data.name }}</h5>

                                        <span v-for="(span, index) in data.detail.titleSpan" :key="index" :title="span" class="badge">{{ span }}</span>

                                        <p class="txt-xm">{{ data.description }}</p>
                                        <div v-if="data.detail.count > 0" class="mt-3 row align-items-center">
                                            <div class="col-6">
                                                <span class="like e me-1" @click.prevent="favorit(index,'SEPATU',<?php echo $id; ?>,data.id,'fav')" :title="`Tambahkan Produk ${data.name} ke dalam Favorit`">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 21 19" fill="none">
                                                        <rect width="21" height="19" rx="5" fill="#A67CFF" />
                                                        <path class="love" d="M13.4545 4C12.2136 4 11.1205 4.64167 10.5 5.65C9.87955 4.64167 8.78636 4 7.54545 4C5.59545 4 4 5.65 4 7.66667C4 11.3028 10.5 15 10.5 15C10.5 15 17 11.3333 17 7.66667C17 5.65 15.4045 4 13.4545 4Z" fill="white" />
                                                    </svg>
                                                </span>
                                                <span class="cart e" @click.prevent="cart(index,'SEPATU',<?php echo $id; ?>,data.id,'cart')" :title="`Tambahkan Produk ${data.name} ke dalam Keranjang`">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 20 19" fill="none">
                                                        <rect width="20" height="19" rx="5" fill="#A67CFF" />
                                                        <path class="cart" d="M15.4413 7H13.7333L13.3693 4.67C13.2959 4.31747 13.1349 3.9928 12.9032 3.73046C12.6714 3.46811 12.3778 3.2779 12.0533 3.18C11.7273 3.06763 11.3877 3.00698 11.0453 3H8.95461C8.61221 3.00698 8.27261 3.06763 7.94661 3.18C7.62212 3.2779 7.32844 3.46811 7.09673 3.73046C6.86503 3.9928 6.70395 4.31747 6.63061 4.67L6.26661 7H4.55861C4.4851 6.99952 4.41252 7.01766 4.34679 7.05293C4.28107 7.0882 4.22404 7.13961 4.18038 7.20297C4.13671 7.26633 4.10763 7.33984 4.0955 7.41753C4.08338 7.49521 4.08855 7.57487 4.11061 7.65L5.86528 13.95C5.95461 14.2543 6.13218 14.5202 6.3722 14.7091C6.61221 14.8979 6.90217 14.9998 7.19994 15H12.7999C13.0961 14.9977 13.384 14.8948 13.6221 14.7061C13.8603 14.5175 14.0364 14.2527 14.1253 13.95L15.8799 7.65C15.9018 7.57567 15.9071 7.4969 15.8954 7.41998C15.8838 7.34306 15.8556 7.27012 15.8129 7.20698C15.7703 7.14383 15.7145 7.09224 15.65 7.0563C15.5855 7.02036 15.514 7.00108 15.4413 7ZM7.21861 7L7.55461 4.83C7.59144 4.65282 7.67689 4.4915 7.79996 4.36676C7.92304 4.24202 8.07812 4.15957 8.24528 4.13C8.47488 4.052 8.71381 4.009 8.95461 4H11.0453C11.2889 4.008 11.5306 4.051 11.7639 4.13C11.9311 4.15957 12.0862 4.24202 12.2093 4.36676C12.3323 4.4915 12.4178 4.65282 12.4546 4.83L12.7813 7H7.18128H7.21861Z" fill="white" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="check txt-xm e" data-bs-toggle="modal" data-bs-target="#exampleModal" @click.prevent="getDataModal(index,'filter','')">Check</span>
                                            </div>
                                        </div>
                                        <div v-else class="mt-3 row align-items-center">
                                            <div class="col-12">
                                                <button disabled class="check-sold-out" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="alert('Stock Is sold Out')">Stock Sold Out</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- data show all -->
                        <div v-else class="row">
                            <!-- data Sepatu -->
                            <div v-for="(data, index) in dataApi.data.SEPATU" class="col-lg-4 col-12 col-md-6">
                                <div class="card mb-3" :id="strtolink(data.name)">
                                    <div v-if="data.discount==0">
                                        <div class="harga p-2 txt-xm" style="font-size: 14px;">Rp. {{ data.price }}
                                        </div>
                                    </div>
                                    <div v-else class="row align-items-center justify-content-between ">
                                        <div title="Harga ini tidak berlaku lgi" class="col-5 py-1 dash txt-xm ms-1" style="font-size: 14px;">{{ data.price }}</div>
                                        <div class="col-6 py-1 text-end">
                                            <span class="badge" title="Ini diskon Produk">{{ data.discount }}%</span>
                                            <span class="badge" title="ini harga setelah diskon">{{ data.price * (1 -
                                                data.discount / 100) }}</span>
                                        </div>
                                    </div>
                                    <div style="object-fit: cover;">
                                        <img loading="lazy" :title="data.name" style=" max-height: 200px; object-fit: cover;" :src="data.image" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body px-2">
                                        <h5 class="">{{ data.name }}</h5>

                                        <span v-for="(span, index) in data.detail.titleSpan" :key="index" :title="span" class="badge">{{ span }}</span>

                                        <p class="txt-xm">{{ data.description }}</p>
                                        <div v-if="data.detail.count > 0" class="mt-3 row align-items-center">
                                            <div class="col-6">
                                                <span class="like e me-1" @click.prevent="favorit(index,'SEPATU',<?php echo $id; ?>,data.id,'fav')" :title="`Tambahkan Produk ${data.name} ke dalam Favorit`">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 21 19" fill="none">
                                                        <rect width="21" height="19" rx="5" fill="#A67CFF" />
                                                        <path class="love" d="M13.4545 4C12.2136 4 11.1205 4.64167 10.5 5.65C9.87955 4.64167 8.78636 4 7.54545 4C5.59545 4 4 5.65 4 7.66667C4 11.3028 10.5 15 10.5 15C10.5 15 17 11.3333 17 7.66667C17 5.65 15.4045 4 13.4545 4Z" fill="white" />
                                                    </svg>
                                                </span>
                                                <span class="cart e" @click.prevent="cart(index,'SEPATU',<?php echo $id; ?>,data.id,'cart')" :title="`Tambahkan Produk ${data.name} ke dalam Keranjang`">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 20 19" fill="none">
                                                        <rect width="20" height="19" rx="5" fill="#A67CFF" />
                                                        <path class="cart" d="M15.4413 7H13.7333L13.3693 4.67C13.2959 4.31747 13.1349 3.9928 12.9032 3.73046C12.6714 3.46811 12.3778 3.2779 12.0533 3.18C11.7273 3.06763 11.3877 3.00698 11.0453 3H8.95461C8.61221 3.00698 8.27261 3.06763 7.94661 3.18C7.62212 3.2779 7.32844 3.46811 7.09673 3.73046C6.86503 3.9928 6.70395 4.31747 6.63061 4.67L6.26661 7H4.55861C4.4851 6.99952 4.41252 7.01766 4.34679 7.05293C4.28107 7.0882 4.22404 7.13961 4.18038 7.20297C4.13671 7.26633 4.10763 7.33984 4.0955 7.41753C4.08338 7.49521 4.08855 7.57487 4.11061 7.65L5.86528 13.95C5.95461 14.2543 6.13218 14.5202 6.3722 14.7091C6.61221 14.8979 6.90217 14.9998 7.19994 15H12.7999C13.0961 14.9977 13.384 14.8948 13.6221 14.7061C13.8603 14.5175 14.0364 14.2527 14.1253 13.95L15.8799 7.65C15.9018 7.57567 15.9071 7.4969 15.8954 7.41998C15.8838 7.34306 15.8556 7.27012 15.8129 7.20698C15.7703 7.14383 15.7145 7.09224 15.65 7.0563C15.5855 7.02036 15.514 7.00108 15.4413 7ZM7.21861 7L7.55461 4.83C7.59144 4.65282 7.67689 4.4915 7.79996 4.36676C7.92304 4.24202 8.07812 4.15957 8.24528 4.13C8.47488 4.052 8.71381 4.009 8.95461 4H11.0453C11.2889 4.008 11.5306 4.051 11.7639 4.13C11.9311 4.15957 12.0862 4.24202 12.2093 4.36676C12.3323 4.4915 12.4178 4.65282 12.4546 4.83L12.7813 7H7.18128H7.21861Z" fill="white" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="check txt-xm e" data-bs-toggle="modal" data-bs-target="#exampleModal" @click.prevent="getDataModal(index,'all','SEPATU')">Check</span>
                                            </div>
                                        </div>

                                        <div v-else class="mt-3 row align-items-center">
                                            <div class="col-12">
                                                <button disabled class="check-sold-out" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="alert('Stock Is sold Out')">Stock Sold Out</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- data baju -->
                            <div v-for="(data, index) in dataApi.data.BAJU" class="col-lg-4 col-md-6 col-12">
                                <div class="card mb-3" :id="data.name">
                                    <div v-if="data.discount==0">
                                        <div class="harga p-2 txt-xm" style="font-size: 14px;">Rp. {{ data.price }}
                                        </div>
                                    </div>
                                    <div v-else class="row align-items-center justify-content-between ">
                                        <div title="Harga ini tidak berlaku lgi" class="col-5 py-1 dash txt-xm ms-1" style="font-size: 14px;">{{ data.price }}</div>
                                        <div class="col-6 py-1 text-end">
                                            <span class="badge" title="Ini diskon Produk">{{ data.discount }}%</span>
                                            <span class="badge" title="ini harga setelah diskon">{{ data.price * (1 -
                                                data.discount / 100) }}</span>
                                        </div>
                                    </div>
                                    <div style="object-fit: cover;">
                                        <img loading="lazy" :title="data.name" style=" max-height: 200px; object-fit: cover;" :src="data.image" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body px-2">
                                        <h5 class="">{{ data.name }}</h5>

                                        <span v-for="(span, index) in data.detail.titleSpan" :key="index" :title="span" class="badge">{{ span }}</span>

                                        <p class="txt-xm">{{ data.description }}</p>
                                        <div v-if="data.detail.count > 0" class="mt-3 row align-items-center">
                                            <div class="col-6">
                                                <span class="like e me-1" @click.prevent="favorit(index,'BAJU',<?php echo $id; ?>,data.id,'fav')" :title="`Tambahkan Produk ${data.name} ke dalam Favorit`">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 21 19" fill="none">
                                                        <rect width="21" height="19" rx="5" fill="#A67CFF" />
                                                        <path class="love" d="M13.4545 4C12.2136 4 11.1205 4.64167 10.5 5.65C9.87955 4.64167 8.78636 4 7.54545 4C5.59545 4 4 5.65 4 7.66667C4 11.3028 10.5 15 10.5 15C10.5 15 17 11.3333 17 7.66667C17 5.65 15.4045 4 13.4545 4Z" fill="white" />
                                                    </svg>
                                                </span>
                                                <span class="cart e" @click.prevent="cart(index,'BAJU',<?php echo $id; ?>,data.id,'cart')" :title="`Tambahkan Produk ${data.name} ke dalam Keranjang`">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 20 19" fill="none">
                                                        <rect width="20" height="19" rx="5" fill="#A67CFF" />
                                                        <path class="cart" d="M15.4413 7H13.7333L13.3693 4.67C13.2959 4.31747 13.1349 3.9928 12.9032 3.73046C12.6714 3.46811 12.3778 3.2779 12.0533 3.18C11.7273 3.06763 11.3877 3.00698 11.0453 3H8.95461C8.61221 3.00698 8.27261 3.06763 7.94661 3.18C7.62212 3.2779 7.32844 3.46811 7.09673 3.73046C6.86503 3.9928 6.70395 4.31747 6.63061 4.67L6.26661 7H4.55861C4.4851 6.99952 4.41252 7.01766 4.34679 7.05293C4.28107 7.0882 4.22404 7.13961 4.18038 7.20297C4.13671 7.26633 4.10763 7.33984 4.0955 7.41753C4.08338 7.49521 4.08855 7.57487 4.11061 7.65L5.86528 13.95C5.95461 14.2543 6.13218 14.5202 6.3722 14.7091C6.61221 14.8979 6.90217 14.9998 7.19994 15H12.7999C13.0961 14.9977 13.384 14.8948 13.6221 14.7061C13.8603 14.5175 14.0364 14.2527 14.1253 13.95L15.8799 7.65C15.9018 7.57567 15.9071 7.4969 15.8954 7.41998C15.8838 7.34306 15.8556 7.27012 15.8129 7.20698C15.7703 7.14383 15.7145 7.09224 15.65 7.0563C15.5855 7.02036 15.514 7.00108 15.4413 7ZM7.21861 7L7.55461 4.83C7.59144 4.65282 7.67689 4.4915 7.79996 4.36676C7.92304 4.24202 8.07812 4.15957 8.24528 4.13C8.47488 4.052 8.71381 4.009 8.95461 4H11.0453C11.2889 4.008 11.5306 4.051 11.7639 4.13C11.9311 4.15957 12.0862 4.24202 12.2093 4.36676C12.3323 4.4915 12.4178 4.65282 12.4546 4.83L12.7813 7H7.18128H7.21861Z" fill="white" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="check txt-xm e" data-bs-toggle="modal" data-bs-target="#exampleModal" @click.prevent="getDataModal(index,'all','BAJU')">Check</span>
                                            </div>
                                        </div>

                                        <div v-else class="mt-3 row align-items-center">
                                            <div class="col-12">
                                                <button disabled class="check-sold-out" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="alert('Stock Is sold Out')">Stock Sold Out</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- our footer | not well-->
        <footer class="container-fluid mt-3" style="background-color: #A67CFF;">
            <div class="container py-5">
                <div class="row align-items-center text-light">
                    <div class="col-lg-6">
                        <h6 class="txt-md harga">Diora <svg class="cart-footer" xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                                <path d="M24.0261 8.66667H20.4112L19.6408 3.61833C19.4856 2.85452 19.1447 2.15106 18.6543 1.58265C18.1639 1.01425 17.5424 0.60211 16.8556 0.39C16.1656 0.146521 15.4469 0.0151288 14.7222 0H10.2975C9.57283 0.0151288 8.85409 0.146521 8.16413 0.39C7.47738 0.60211 6.85581 1.01425 6.36542 1.58265C5.87503 2.15106 5.53413 2.85452 5.3789 3.61833L4.60852 8.66667H0.993659C0.83808 8.66563 0.684479 8.70493 0.545369 8.78135C0.40626 8.85777 0.285578 8.96916 0.193155 9.10643C0.100733 9.24371 0.0391844 9.403 0.013525 9.57131C-0.0121343 9.73963 -0.00117876 9.91221 0.0454987 10.075L3.75913 23.725C3.94819 24.3844 4.32401 24.9605 4.83199 25.3697C5.33997 25.7788 5.95365 25.9996 6.58386 26H18.4359C19.0627 25.995 19.6719 25.7721 20.176 25.3633C20.68 24.9545 21.0528 24.3809 21.2408 23.725L24.9545 10.075C25.0007 9.91395 25.0119 9.74329 24.9873 9.57663C24.9627 9.40997 24.9029 9.25193 24.8127 9.11512C24.7225 8.97831 24.6044 8.86651 24.4678 8.78865C24.3313 8.71079 24.18 8.66902 24.0261 8.66667ZM6.62337 8.66667L7.33449 3.965C7.41244 3.58112 7.59328 3.23158 7.85376 2.96131C8.11424 2.69104 8.44246 2.5124 8.79623 2.44833C9.28217 2.27933 9.78785 2.18617 10.2975 2.16667H14.7222C15.2378 2.184 15.7494 2.27717 16.2432 2.44833C16.597 2.5124 16.9252 2.69104 17.1857 2.96131C17.4462 3.23158 17.627 3.58112 17.705 3.965L18.3964 8.66667H6.54435H6.62337Z" fill="#FFF0F0" />
                            </svg></h6>
                        <h6 class="text-sm">
                            Selamat datang di Diora, destinasi belanja terbaik untuk pakaian dan sepatu berkualitas!
                            Kami bangga menyajikan koleksi terbaru yang didedikasikan untuk Anda yang mencari fashion
                            dengan gaya unik dan menarik. Tunggu apalagi? Temukan gaya Anda yang sesungguhnya di Diora
                            dan buat penampilan Anda semakin memukau.
                        </h6>
                    </div>
                    <div class="col-6 col-lg-2 text-start offset-lg-2">
                        <p class="txt-md harga">Shortcut</p>
                        <h5 class="txt-sm"><a href="#home">Home</a></h5>
                        <h5 class="txt-sm"><a href="#clothes">Clothes</a></h5>
                        <h5 class="txt-sm"><a href="#shoes">Shoes</a></h5>
                        <h5 class="txt-sm"><a href="#showAll">ShowAll</a></h5>
                    </div>
                    <div class="col-6 col-lg-2">
                        <p class="txt-md harga">Sosial</p>
                        <h5 class="txt-sm"><a href="">Instagram</a></h5>
                        <h5 class="txt-sm"><a href="">Github</a></h5>
                        <h5 class="txt-sm"><a href="">Facebook</a></h5>
                        <h5 class="txt-sm"><a href="">Gmail</a></h5>
                    </div>
                </div>
                <div class="text-center txt-sm mt-5 text-light foo-cop">
                    Created with love :3 . @copyright 2023
                </div>
            </div>
        </footer>

        <!-- modal setUsername and google | DOne -->
        <div class="modal fade" id="exampleModalAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST">
                        <div class="modal-body">
                            <?php
                            $sql1 = "select * from user where id = '$id'";
                            $q1 = mysqli_query($koneksi, $sql1);
                            $r1 = mysqli_fetch_assoc($q1);
                            ?>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Username</label>
                                <input required value="<?php echo $r1['username'] ?>" type="text" class="form-control" id="recipient-name" name="username">
                                <div class="form-text">Create The unique username</div>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">gmail</label>
                                <input value="<?php echo $r1['gmail'] ?>" type="email" class="form-control" id="recipient-name" disabled>
                                <div class="form-text">Sorry you cann't change the email</div>
                            </div>
                            <div class="mb-3">

                                <div class="row align-items-center">
                                    <label for="recipient-name" class="col-form-label">The Profile</label>
                                    <div class="col-10">
                                        <input required id="urlImg" value="<?php echo $r1['img'] ?>" type="text" class="form-control" id="recipient-name" name="img">
                                    </div>
                                    <div class="col-2">
                                        <button @click="resetBtn('urlImg')" type="button" class="btn btn-secondary">Reset</button>
                                    </div>
                                    <div class="form-text">Maaf atas ketidaknyamannya, Tolong masukan url Image hehe</div>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Description</label>
                                <textarea required value="<?php echo $r1['deskripsi'] ?>" class="form-control" id="message-text" name="des"></textarea>
                                <div class="form-text">Make the beautifull Word</div>
                            </div>


                            <?php
                            if ($succes1) {
                            ?>
                                <div class="suc">
                                    <ul>
                                        <?php echo $succes1 ?>
                                    </ul>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            if ($error) {
                            ?>
                                <div class="info-error">
                                    <ul>
                                        <?php echo $error ?>
                                    </ul>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="rename">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal payment not edited | DOne-->
        <div class="modal fade" id="exampleModalPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="POST">
                        <div class="modal-body">
                            <div style="overflow-y: auto; height:70vh">
                                <div class="d-flex-column">

                                    <!-- Hisrtory payment -->
                                    <?php
                                    $sql1 = "select produk.*, transaksi.* from produk, transaksi where transaksi.id_produk = produk.id_produk AND transaksi.id_user = '$id' ORDER BY transaksi.id DESC;";
                                    $q1  = mysqli_query($koneksi, $sql1);
                                    $index = 0;
                                    while ($r1  = mysqli_fetch_assoc($q1)) {
                                        $index++;
                                    ?>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-8">

                                            </div>
                                            <div class="col-4 text-end">
                                                <span class="badge txt-xm text-light">Payment : <?php echo $r1['via'] ?></span>
                                            </div>
                                        </div>

                                        <div class="row mx-2 mb-3 align-items-end">
                                            <div class="col-9">
                                                <div class="row align-items-end">
                                                    <div class="col-6">
                                                        <div class="img-prod-trans" style="background-image: url('<?php echo $r1['image'] ?>')!important; height:200px; max-width:250px;">

                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div style="font-size: 28px;"><?php echo $index ?>.</div>
                                                        <div style="font-size: 24px;"><?php echo $r1['name'] ?> </div>
                                                        <p class="txt-xm">Price : Rp. <?php echo $r1['price'] ?></p>
                                                        <?php

                                                        $loop = explode(',', $r1['titleSpan']);

                                                        foreach ($loop as $data) {
                                                        ?>
                                                            <span class="badge"><?php echo $data ?></span>
                                                        <?php
                                                        }
                                                        ?>

                                                        <h5 class=" form-text mt-2">
                                                            <?php echo $r1['deskripsi'] ?>
                                                        </h5>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-3 mb-3">
                                                <div class="form-text">Tanggal : <?php echo $r1['date'] ?></div>
                                                <div class="form-text">Penerima : <?php echo $r1['penerima'] ?></div>
                                                <div class="form-text text-primary">Alamat : <?php echo $r1['alamat'] ?></div>
                                            </div>
                                            <hr class="mt-5 mb-3">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-8">

                                        </div>
                                        <div class="col-4 text-end">
                                            <span class="badge txt-xm text-light">Payment : Paypal</span>
                                        </div>
                                    </div>

                                    <?php $url = "https://images.unsplash.com/photo-1560769629-975ec94e6a86?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8c2hvZXN8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60"; ?>
                                    <div class="row mx-2 mb-3 align-items-end">
                                        <div class="col-9">
                                            <div class="row align-items-end">
                                                <div class="col-6">
                                                    <div class="img-prod-trans" style="background-image: url('<?php echo $url ?>')!important; height:250px; width:250px!important">

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div style="font-size: 28px;">1.</div>
                                                    <div style="font-size: 24px;">Name produk</div>
                                                    <p class="txt-sm">Price : 150$</p>
                                                    <span class="badge">Mans Clothing</span>
                                                    <span class="badge">Mans Clothing</span>
                                                    <span class="badge">Mans Clothing</span>
                                                    <h5 class=" form-text mt-2">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, delectus?
                                                    </h5>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-3">
                                            <div class="form-text">Tanggal 17 Augst 2023</div>
                                            <div class="form-text">Penerima : Patriot Abdi Nuruxxaki</div>
                                            <div class="form-text text-primary">Alamat : Perum Bsp No.4 Ciledug Cirebon</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="rename">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- modal check btn | Done -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <h5 class="text-sm">{{ dataApi.dataModal.name }}</h5>
                        <div class="mt-3" style="height: 300px; background-size: cover; background-position: center;" :style="{ 'background-image': 'url(' + dataApi.dataModal.image + ')' }">

                        </div>
                        <span class="badge" v-for="(data,index) in dataApi.dataModal.detail.titleSpan">
                            {{ data }}
                        </span>
                        <br>
                        <div class="harga txt-xm mt-1" style="font-size: 14px!important;">Brand : {{
                            dataApi.dataModal.brand }}</div>
                        <div style="font-size: 14px!important;" class="harga txt-xm"> Stok : {{ dataApi.dataModal.detail.count }}</div>
                        <p class="txt-xm text-dark mt-3">
                            Desciption : " <br>
                            <span class="txt-xm">
                                {{ dataApi.dataModal.description }}
                            </span> "
                        </p>
                        <div class="mt-3" v-if="dataApi.dataModal.discount==0">
                            <p class="txt-xm text-dark">Price : {{ dataApi.dataModal.price }}</p>
                        </div>
                        <div v-else class="mt-3">
                            <div class="row align-items-center">
                                <div class="col-6 text-dark" style="font-size: 14px!important;">Price : <span class="dash">{{ dataApi.dataModal.price }}</span>
                                    {{dataApi.dataModal.price * ( 1 - dataApi.dataModal.discount / 100) }}
                                </div>
                                <div class="col-6 text-end">
                                    <span class="badge py-1 px-3" style="font-size: 14px;">
                                        {{dataApi.dataModal.discount }} %
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="px-3 py-1" type="button" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal transaksi form Done -->

        <?php
        if (isset($_POST['test'])) {
            //mengecek apakah checkbox kosong atau tidak

            if (isset($_POST['checkout_item']) && is_array($_POST['checkout_item'])) {
                //var_dump($_POST['checkout_item']);

                $items = [];
                $harga = 0;
                $id_post = [];

                foreach ($_POST['checkout_item'] as $data => $value) {
                    $id_pro = $value["'id'"]; //id
                    $id_post[] = $id_pro;
                    $sql1 = "select * from produk where id_produk = '$id_pro'";
                    $q1  = mysqli_query($koneksi, $sql1);
                    $r1  = mysqli_fetch_assoc($q1);

                    if ($r1['discount'] != 0) {
                        //lakukan logika kurang harga seusia diskon
                        $diskon = $r1['discount'] / 100;
                        $hargaDiskon = $r1['price'] * (1 - $r1['discount'] / 100);

                        $harga += intval($hargaDiskon);
                    } else {
                        $harga += $r1['price'];
                    }
                }

                var_dump($harga); //done harga

                $id_post = implode(",", $id_post); //done
                var_dump($id_post); //done id
                // $id_post = explode(",",$id_post);
                var_dump($id_post);

                //task : masukan id ke sebuah data di vue

                if (isset($id_post)) {
                echo '
                    <script type="text/javascript">
                        alert("oke");
                        function trans(totalharga, idproduk) {
                            const inputHarga = document.getElementById("form_total");
                            const inputId = document.getElementById("form_idproduk");

                            `inputHarga.value = "<?php echo $Harga?>"`;
                            `inputId.value = "<?php echo $id_post?>"`;
                        }
                    </script>
                    ';
                
                }
            } else { //jika checkbox koosong
                echo "<script></script>";
            }
        }
        ?>

        <div class="modal fade" id="transaksiForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <form method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Start Transaksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div style="height: 300px; background-size: cover; background-position: center;" :style="{ 'background-image': 'url(' + dataApi.dataBarangTransaksi.image + ')' }"></div>
                            <!-- <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Name Product :</label>
                                <input readonly type="text" class="form-control" id="" :value="dataApi.dataBarangTransaksi.name">
                            </div> -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Harga Yang harus di bayar :</label>
                                        <input readonly type="text" class="form-control" id="form_total" value="<?php if (isset($_POST['test'])) {
                                                                                                                    echo $harga;
                                                                                                                } ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Code Produk :</label>
                                        <input readonly type="text" class="form-control" name="form_id_produk" id="form_idproduk" value="<?php if (isset($_POST['test'])) {
                                                                                                                                                echo $id_post;
                                                                                                                                            } ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Penerima:</label>
                                <input type="text" name="form_penerima" class="form-control" id="form_penerima" value="<?php if (isset($_COOKIE['Name'])) {
                                                                                                                            echo $_COOKIE['Name'];
                                                                                                                        } ?>">
                                <div class="form-text">You can Change who will take the package</div>
                            </div>
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Metode Payment</label>
                                <select id="form_via" class="form-select" name="form_via">
                                    <option value="E-Banking">E-Banking</option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="COD">COD</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Alamat:</label>
                                <textarea class="form-control" id="form_alamat" name="form_alamat"></textarea>
                                <div class="form-text">Masukan Alamat Dengan Lengkap Dan Detail</div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="form_transaksi" data-bs-dismiss="modal" @click.prevent="postTransaksi()" style="background-color: #0EFD09;" class="btn btn-cart-2">Transaksi Now</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div id="getid" data-id="<?php echo $id ?>"></div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
            smoothScrollLinks.forEach(link => {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    const target = document.querySelector(this.getAttribute("href"));
                    target.scrollIntoView({
                        behavior: "smooth"
                    });
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <?php include 'vue.php'; ?>
</body>

</html>