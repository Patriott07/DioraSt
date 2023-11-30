<?php
include "../inc/inc_konek.php";
$index = "";

session_start();
if (!isset($_SESSION['id'])) {
    unset($_SESSION['id']);
    session_destroy();
    header("Location:login.php");
    exit();
}else{
    $id = $_SESSION['id'];
}

if (isset($_POST['logout'])) {
    session_unset();
    unset($_SESSION['id']);
    session_destroy();
    header("Location:login.php");
}

if (isset($_POST['user_update'])) {
    $active = $_POST['user_active'];
    $id_user = $_POST['id_user'];
    $sql1 = "update user set active = '$active' where id = '$id_user'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
        echo "
        <script>
        alert('Berhasil Merubah data User');
        </script>
        ";
    }
}

if (isset($_POST['produk_update'])) {
    $id_produk = $_POST['id_produk'];
    $produk = $_POST['produk'];
    $des = $_POST['des'];
    $title_span = $_POST['title_span'];
    $stok = $_POST['stok'];
    $img = $_POST['img'];
    $harga = $_POST['harga'];
    $discount = $_POST['discount'];


    $sql1 = "update produk set name = '$produk', deskripsi = '$des', title_span = '$title_span' , count = '$stok', image = '$img' , price = '$harga', discount = '$discount' where id_produk = '$id_produk'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
        echo "
        <script>
        alert('Berhasil Merubah data Produk');
        </script>
        ";
    }
}

if (isset($_POST['transaksi_update'])) {
    $idTran = $_POST['id_transaksi'];
    $id_user = $_POST['id_user_transaksi'];
    $id_produk = $_POST['id_produk_transaksi'];
    $via  = $_POST['via_transaksi'];
    $penerima = $_POST['penerima_transaksi'];
    $alamat = $_POST['alamat_transaksi'];


    $sql1 = "update transaksi set id_user = '$id_user', id_produk = '$id_produk', via = '$via' , penerima = '$penerima', alamat = '$alamat' where id = '$idTran'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
        echo "
        <script>
        alert('Berhasil Merubah data Transaksi');
        </script>
        ";
    }
}

if (isset($_POST['fav_update'])) {
    $idFav = $_POST['id_fav_fav'];
    $id_user = $_POST['id_user_fav'];
    $id_produk = $_POST['id_produk_fav'];

    $sql1 = "update fav set id_user = '$id_user', id_produk = '$id_produk' where id_fav = '$idFav'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
        echo "
        <script>
        alert('Berhasil Merubah data table Favorit');
        </script>
        ";
    }
}

if (isset($_POST['cart_update'])) {
    $idCart = $_POST['id_cart_cart'];
    $id_user = $_POST['id_user_cart'];
    $id_produk = $_POST['id_produk_cart'];

    $sql1 = "update cart set id_user = '$id_user', id_produk = '$id_produk' where id_cart = '$idCart'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
        echo "
        <script>
        alert('Berhasil Merubah data table Keranjang');
        </script>
        ";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page | </title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baumans&family=Bebas+Neue&family=Flamenco&family=Inter&family=Italiana&family=Josefin+Sans&family=Margarine&family=Martian+Mono&family=Megrim&family=Roboto+Mono:wght@500&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- bosstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin.css">
    <style>
       span.imp{
        background-color: #000;
        color: White;
        transition: all 0.2s;
       }
       span.imp:hover{
        color: #f39212!important;
        cursor: grab;
       }
        h2{
            transition: all 0.4s;
        }

        h2:hover {
            color: #33da97;
            
        }

        h2:hover::before {
            content: "# ";
            opacity: 1;
            color: #7c32f2!important;
        }
        h2::before{
            content: "# ";
            opacity: 0;
            transition: all 0.4s;
        }

        .right-bar {
            background: white !important;
            height: 100vh;
            color: rgba(32, 33, 35, 100);
        }

        .page-active {
            background-color: #7c32f2 !important;
            color: white !important;
        }

        a {
            text-decoration: none;
        }
    </style>

</head>

<body>
    <div id="app">
        <?php
        $sql1 = "select * from admin where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_assoc($q1);
        ?>
        <div class="row" id="ASC" name="<?php echo $r1['verifikasi_kode'] ?>">
            <div class="col-lg-3 col-md-4 left-bar pb-5 pt-3" style="height: 110vh;">
                <div class="text-end p-2 mb-3">
                    <form action="" method="post">
                        <button name="logout" type="submit" class="btn-self" onclick="return confirm('Yakin ingin meninggalkan halaman?')">Log out now</button>
                    </form>
                </div>
                <div class="text-center container">
                    <img style="width: 100px; height: 100px; border-radius: 50%;" src="https://tiffany-chen.com/img/memoji.gif" alt="">
                    <div class="my-3 text-center">
                        <?php
                        $sql1 = "select * from admin where id = '$id'";
                        $q1  = mysqli_query($koneksi, $sql1);
                        $r1 = mysqli_fetch_assoc($q1);
                        ?>
                        <h5 class="txt-sm" style="color: #D0D0D0;"><?php echo $r1['username'] ?></h5>
                        <h6 class="txt-xm">Admin | <span class="txt-xm text-success">Online</span></h6>
                        <hr>
                    </div>
                </div>
                <div class="doc my-2 container ps-5" id="selectLi">
                    <h5 class="txt-sm" @click="toggle.show = 'Home Page'">Home Page</h5>
                    <h5 class="txt-sm" @click="toggle.doc = !toggle.doc">Documentation</h5>
                    <ul class="ms-3" :class="{show : toggle.doc}" style="display: none;">
                        <li class="e" @click="toggle.show = 'Introduction'">Introduction</li>
                        <li class="e" @click="toggle.show = 'How To Input'">How To Input</li>
                        <li class="e" @click="toggle.show = 'How To Update'">How To Update</li>
                        <li class="e" @click="toggle.show = 'How To Delete'">How To Delete</li>
                    </ul>
                    <h5 class="txt-sm" @click="toggle.db = !toggle.db">Database</h5>
                    <form action="index.php" method="get">
                        <ul class="ms-3" :class="{show : toggle.db}" style="display: none;">
                            <li class="e" @click.prevent="getSpeData('User / Pengguna','user')">User/pengguna</li>
                            <li class="e" @click.prevent="getSpeData('Produk','produk')">Produk</li>
                            <li class="e" @click.prevent="getSpeData('Transaksi','transaksi')">Transaksi</li>
                            <li class="e" @click.prevent="getSpeData('Cart','cart')">Cart</li>
                            <li class="e" @click.prevent="getSpeData('Favorit','fav')">Favorit</li>
                        </ul>
                    </form>
                    <h5 class="txt-sm" @click="toggle.acc = !toggle.acc">Account</h5>
                    <ul class="ms-3" :class="{show : toggle.acc}" style="display: none;">
                        <li class="e" @click.prevent="getSpeData('Admin','')">Edit Password Admin</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 right-bar container-fluid m-0 p-0 position-relative px-5" style="height: 110vh;">

                <div class="position-absolute" style="left: 30px; top: 30px;">
                    <span class="kondisi py-2 px-3">
                        {{ toggle.show }}
                    </span>
                    <span v-if="toggle.show != 'Home Page'" class="ms-2 page-active py-2 px-3">
                        {{ curent.pagination }}
                    </span>
                    <a v-if="toggle.show != 'Home Page'" href="input.php">
                        <span class="ms-2 e page-active py-2 px-3" title="Anda Akan Di arahkan ke halaman Input Data">
                            Insert new data
                        </span>
                    </a>
                    <span v-else class="ms-2 page-active py-2 px-3 text-light" style="background: rgba(52, 53, 65, 0.75)!important;">
                        {{ curent.date }}
                    </span>

                </div>


                <div v-if="toggle.show == 'Home Page'">
                    <div class="position-absolute start-50 translate-middle" style="top: 40vh;">
                        <div class="text-center">
                            <img style="width: 100px; height: 100px; border-radius: 50%;" src="https://tiffany-chen.com/img/memoji.gif" alt="">
                            <h5 class="txt-sm mt-3 text-dark"> {{ homePageText }}</h5>
                            <h6 class="form-text">By ~ Owner DioraSt</h6>
                        </div>
                    </div>
                </div>

                <div class="my-5 py-3" v-if="toggle.show == 'Introduction'">
                    <div style="overflow-y: auto; height:80vh">
                        <div class="d-flex">
                            <?php
                            include "../Doc/introduction.php";
                            ?>
                        </div>
                    </div>
                </div>

                <div class="my-5 py-3" v-if="toggle.show == 'How To Input'">
                    <div style="overflow-y: auto; height:80vh">
                        <div class="d-flex">
                            <?php
                            include "../Doc/HowtoInput.php";
                            ?>
                        </div>
                    </div>
                </div>

                <div class="my-5 py-3" v-if="toggle.show == 'How To Update'">
                    <div style="overflow-y: auto; height:80vh">
                        <div class="d-flex">
                            <?php
                            include "../Doc/HowtoUpdate.php";
                            ?>
                        </div>
                    </div>
                </div>

                <div class="my-5 py-3" v-if="toggle.show == 'How To Delete'">
                    <div style="overflow-y: auto; height:80vh">
                        <div class="d-flex">
                            <?php
                            include "../Doc/HowtoDelete.php";
                            ?>
                        </div>
                    </div>
                </div>

                <div class="my-5 py-5 col-8 offset-2" v-if="toggle.show == 'Admin'">
                    <br><br><br><br>
                   <h2>Mohon Maaf</h2>
                   <p style="font-size: 18px;" class="form-text ms-5">Fitur Ini Di NonAktifkan Demi keamanan Database Hubungi Owner Bila Ada Masalah Terkait Account</p>
                </div>

                <div v-if="toggle.show == 'User / Pengguna'">
                    <table class="table table-hover" style="margin-top: 15vh;">
                        <thead>
                            <tr class="">
                                <th class="col ">#</th>
                                <th class="col ">Gmail</th>
                                <th class="col ">Username</th>
                                <th class="col ">Bio</th>
                                <th class="col ">Image</th>
                                <th class="col ">online</th>
                                <th class="col ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- {{ data.dataQuery }} -->
                            <tr v-for="(data ,index) in data.dataQuery">
                                <td scope="row">{{ index + 1 }}</td>
                                <td>{{ data.gmail }}</td>
                                <td>{{ data.username }}</td>
                                <td>{{ data.deskripsi }}</td>
                                <td>
                                    <img :src="data.img" alt="" style="width: 50px; height: 50px; border-radius:50%;">
                                </td>
                                <td>
                                    <div v-if="data.active == 'off'">
                                        <span class="badge bg-dark">Offline</span>
                                    </div>
                                    <div v-if="data.active == 'online'">
                                        <span class="badge bg-success">Online</span>
                                    </div>
                                    <div v-if="data.active == 'Ban'">
                                        <span class="badge bg-danger">Banned</span>
                                    </div>

                                </td>
                                <td>
                                    <span @click.prevent="getDataModal('user','','','','','','id', data.id)" data-bs-toggle="modal" data-bs-target="#ModalEdit" class="badge bg-warning text-dark me-2 e" data-id="data.id">Edit</span>
                                    <span @click.prevent="delData('user', data.id , 'id')" class="badge bg-danger e" data-id="data.id">Delete</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <div class="text-center">
                        <span @click.prevent='getData("user", "", "ASC", (index) * 5 ,"5",index);' v-for="(data , index) in pagination.pageSpan" type="submit" name="page" :value="index + 1" class="paginational">{{ index + 1  }}</span>
                    </div>

                </div>
                <div v-if="toggle.show == 'Produk'">
                    <table class="table table-hover" style="margin-top: 15vh;">
                        <thead>
                            <tr class="">
                                <th class="col ">#</th>
                                <th class="col ">Name_produk</th>
                                <th class="col ">Deskripsi</th>
                                <th class="col ">title_span</th>
                                <th class="col ">count</th>
                                <th class="col ">image</th>
                                <th class="col ">price</th>
                                <th class="col ">discount</th>
                                <th class="col ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- {{ data.dataQuery }} -->
                            <tr v-for="(data ,index) in data.dataQuery">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ data.name }}</td>
                                <td>{{ data.deskripsi }}</td>
                                <td>{{ data.title_span }}</td>
                                <td>{{ data.count }}</td>
                                <td>
                                    <img :src="data.image" alt="" style="width: 50px; height: 50px; border-radius:50%;">
                                </td>
                                <td>{{ data.price }}</td>
                                <td>{{ data.discount }}%</td>
                                <td>
                                    <span @click.prevent="getDataModal('produk','','','','','','id_produk', data.id_produk)" data-bs-toggle="modal" data-bs-target="#ModalEdit" class="badge bg-warning text-dark me-2 e" data-id="data.id">Edit</span>
                                    <span @click.prevent="delData('produk', data.id_produk , 'id_produk')" class="badge bg-danger e" data-id="data.id">Delete</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <div class="text-center">
                        <span @click.prevent='getData("produk", "", "ASC", (index) * 5 ,"5",index);' v-for="(data , index) in pagination.pageSpan" type="submit" name="page" :value="index + 1" class="paginational">{{ index + 1  }}</span>
                    </div>

                </div>
                <div v-if="toggle.show == 'Transaksi'">
                    <table class="table table-hover" style="margin-top: 15vh;">
                        <thead>
                            <tr class="">
                                <th class="col ">#</th>
                                <th class="col ">Id_user</th>
                                <th class="col ">Id_produk</th>
                                <th class="col ">Date</th>
                                <th class="col ">via</th>
                                <th class="col ">penerima</th>
                                <th class="col ">alamat</th>
                                <th class="col ">image</th>
                                <th class="col ">price</th>
                                <th class="col ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- {{ data.dataQuery }} -->
                            <tr v-for="(data ,index) in data.dataQuery">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ data.id_user }}</td>
                                <td>{{ data.id_produk }}</td>
                                <td>{{ data.date }}</td>
                                <td>{{ data.via }}</td>
                                <td>{{ data.penerima }}</td>
                                <td>{{ data.alamat }}</td>
                                <td>
                                    <img :src="data.image" alt="" style="width: 50px; height: 50px; border-radius:50%;">
                                </td>
                                <td>{{ data.price }}</td>
                                <td>
                                    <span @click.prevent="getDataModal('transaksi','','','','','','id', data.id)" data-bs-toggle="modal" data-bs-target="#ModalEdit" class="badge bg-warning text-dark me-2 e" data-id="data.id">Edit</span>
                                    <span @click.prevent="delData('transaksi', data.id , 'id')" class="badge bg-danger e" data-id="data.id">Delete</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <div class="text-center">
                        <span @click.prevent='getData("transaksi", "", "ASC", (index) * 5 ,"5",index);' v-for="(data , index) in pagination.pageSpan" type="submit" name="page" :value="index + 1" class="paginational">{{ index + 1  }}</span>
                    </div>

                </div>
                <div v-if="toggle.show == 'Cart'">
                    <table class="table table-light table-hover" style="margin-top: 15vh;">
                        <thead>
                            <tr class="table-light">
                                <th class="col table-light">#</th>
                                <th class="col table-light">id_user</th>
                                <th class="col table-light">Username</th>
                                <th class="col table-light">id_produk</th>
                                <th class="col table-light">Nama_produk</th>
                                <th class="col table-light">foto_produk</th>
                                <th class="col table-light">harga</th>
                                <th class="col table-light">Tanggal</th>
                                <th class="col table-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- {{ data.dataQuery }} -->
                            <tr v-for="(data ,index) in data.dataQuery">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ data.id_user }}</td>
                                <td>{{ data.username }}</td>
                                <td>{{ data.id_produk }}</td>
                                <td>{{ data.name }}</td>
                                <td>
                                    <div :style="`background-image: url(${data.image})`" alt="" style="background-size:cover; background-position:center; width: 60px; height: 60px; border-radius:50%;"></div>
                                </td>
                                <td>{{ data.price }}</td>
                                <td>{{ data.tanggal}}</td>
                                <td>
                                    <span @click.prevent="getDataModal('cart','','','','','','id_cart', data.id_cart)" data-bs-toggle="modal" data-bs-target="#ModalEdit" class="badge bg-warning text-dark me-2 e" data-id="data.id">Edit</span>
                                    <span @click.prevent="delData('cart', data.id_cart , 'id_cart')" class="badge bg-danger e" data-id="data.id">Delete</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <div class="text-center">
                        <div style="overflow-x:auto">
                            <div class="d-flex justify-content-center">
                                <div @click.prevent='getData("cart", "", "ASC", (index) * 5 ,"5",index);' v-for="(data , index) in pagination.pageSpan" type="submit" name="page" :value="index + 1" class="paginational">{{ index + 1  }}</div>
                            </div>
                        </div>

                    </div>

                </div>
                <div v-if="toggle.show == 'Favorit'">
                    <table class="table table-light table-hover" style="margin-top: 15vh;">
                        <thead>
                            <tr class="table-light">
                                <th class="col table-light">#</th>
                                <th class="col table-light">id_user</th>
                                <th class="col table-light">name_produk</th>
                                <th class="col table-light">Deskripsi</th>
                                <th class="col table-light">Image</th>
                                <th class="col table-light">Harga</th>
                                <th class="col table-light">Tanggal</th>
                                <th class="col table-light">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- {{ data.dataQuery }} -->
                            <tr v-for="(data ,index) in data.dataQuery">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ data.id_user }}</td>
                                <td>{{ data.name }}</td>
                                <td>{{ data.deskripsi }}</td>
                                <td>
                                    <div :style="`background-image: url(${data.image})`" alt="" style="background-size:cover; background-position:center; width: 60px; height: 60px; border-radius:50%;"></div>
                                </td>
                                <td>{{ data.price }}</td>
                                <td>{{ data.tanggal}}</td>
                                <td>
                                    <span @click.prevent="getDataModal('fav','','','','','','id_fav', data.id_fav)" data-bs-toggle="modal" data-bs-target="#ModalEdit" class="badge bg-warning text-dark me-2 e" data-id="data.id">Edit</span>
                                    <span @click.prevent="delData('fav', data.id_fav , 'id_fav')" class="badge bg-danger e" data-id="data.id">Delete</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <div class="text-center">
                        <div style="overflow-x:auto">
                            <div class="d-flex justify-content-center">
                                <div @click.prevent='getData("fav", "", "ASC", (index) * 5 ,"5",index);' v-for="(data , index) in pagination.pageSpan" type="submit" name="page" :value="index + 1" class="paginational">{{ index + 1  }}</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- modal edit -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form v-if="toggle.show == 'User / Pengguna'" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update table {{ toggle.show }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div v-for="(data , index) in data.dataModal" class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id:</label>
                                <input readonly name="id_user" :value="data.id" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">gmail:</label>
                                <input :value="data.gmail" disabled type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Username:</label>
                                <input :value="data.username" disabled type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Kondisi:</label>
                                <input required name="user_active" :value="data.active" type="text" class="form-control" id="recipient-name">
                                <div class="form-text">U just can choose 3. off , online , or Ban</div>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Deskripsi:</label>
                                <textarea :value="data.deskripsi" disabled class="form-control" id="message-text"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="user_update" class="btn btn-primary">Send Request</button>
                        </div>
                    </form>
                    <form v-if="toggle.show == 'Produk'" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update table {{ toggle.show }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div v-for="(data , index) in data.dataModal" class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id:</label>
                                <input readonly name="id_produk" :value="data.id_produk" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nama_produk:</label>
                                <input name="produk" :value="data.name" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Deskripsi:</label>
                                <textarea name="des" :value="data.deskripsi" class="form-control" id="message-text"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Title_span:</label>
                                <input name="title_span" :value="data.title_span" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Stok:</label>
                                <input name="stok" required :value="data.count" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Image:</label>
                                <textarea name="img" :value="data.image" class="form-control" id="message-text"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Harga:</label>
                                <input name="harga" :value="data.price" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Discount:</label>
                                <input name="discount" :value="data.discount" type="text" class="form-control" id="recipient-name">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="produk_update" class="btn btn-primary">Send Request</button>
                        </div>
                    </form>
                    <form v-if="toggle.show == 'Transaksi'" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update table {{ toggle.show }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div v-for="(data , index) in data.dataModal" class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id Transaksi:</label>
                                <input readonly name="id_transaksi" :value="data.id" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id User:</label>
                                <input name="id_user_transaksi" :value="data.id_user" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id Produk:</label>
                                <input name="id_produk_transaksi" :value="data.id_produk" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Via Pembayaran :</label>
                                <input name="via_transaksi" :value="data.via" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Penerima :</label>
                                <input name="penerima_transaksi" :value="data.penerima" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Alamat :</label>
                                <input name="alamat_transaksi" :value="data.alamat" type="text" class="form-control" id="recipient-name">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="transaksi_update" class="btn btn-primary">Send Request</button>
                        </div>
                    </form>
                    <form v-if="toggle.show == 'Favorit'" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update table {{ toggle.show }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div v-for="(data , index) in data.dataModal" class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id Favorit:</label>
                                <input readonly name="id_fav_fav" :value="data.id_fav" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id User:</label>
                                <input name="id_user_fav" :value="data.id_user" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id Produk:</label>
                                <input name="id_produk_fav" :value="data.id_produk" type="text" class="form-control" id="recipient-name">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="fav_update" class="btn btn-primary">Send Request</button>
                        </div>
                    </form>
                    <form v-if="toggle.show == 'Cart'" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update table {{ toggle.show }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div v-for="(data , index) in data.dataModal" class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id Keranjang:</label>
                                <input readonly name="id_cart_cart" :value="data.id_cart" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id User:</label>
                                <input name="id_user_cart" :value="data.id_user" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id Produk:</label>
                                <input name="id_produk_cart" :value="data.id_produk" type="text" class="form-control" id="recipient-name">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="cart_update" class="btn btn-primary">Send Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- membuat modal edit admin -->

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Change Now</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script>

    </script>
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    toggle: {
                        show: "Home Page",
                        doc: false,
                        db: false,
                        acc: false
                    },
                    data: {
                        dataQuery: [],
                        dataModal: [],
                    },
                    pagination: {
                        pageSpan: 0,
                        curentPage: 1,
                        maxPro: 10
                    },
                    curent: {
                        pagination: 1,
                        date: null
                    }
                }
            },
            computed: {
                homePageText() {
                    const waktu = new Date();
                    jam = waktu.getHours();
                    if (jam > 23 && jam < 5 || jam < 5) {
                        setTimeout(() => {
                            alert("Im sorry, Just Rest");
                            window.location.replace("https://www.example.com");
                        }, 1000 * 3);
                        return "Sudah Larut Malam, Saya ga mengizinkan kamu bekerja di jam ini, Lakukan lgi esok Hari";
                    }
                    if (jam < 10) {
                        return "Hii selamat pagi, Mari Mulai pagi ini Dengan Produktivitas Dan melakukan Kegiatan santai ya";
                    }
                    if (jam < 15) {
                        return "Hii selamat siang, jangan terlalu capek ya, Jangan lupa makan siang";
                    }
                    if (jam < 18) {
                        return "Hii selamat sore, jangan terlalu capek ya. luangkan waktu anda untuk kegiatan lainnya ya";
                    }
                    if (jam > 18) {
                        return "Hii selamat Malam, Anda sudah banyak bekerja Hari ini. Saya harap akan ada hasil yang bermanfaat dari kerja keras Anda";
                    }
                }
            },
            methods: {
                getDateCur() {
                    const date = new Date();
                    minutes = date.getMinutes();
                    hour = date.getHours();
                    if (hour < 10) {
                        hour = "0" + hour;
                    }
                    if (minutes < 10) {
                        minutes = "0" + minutes;
                    }
                    this.curent.date = hour + " : " + minutes;
                },
                delData(table, id, prikey) {
                    var ask = confirm("Yakin mau hapus data ini?");
                    if (ask) {
                        var code = document.getElementById("ASC").getAttribute("name");
                        verifikasi = prompt("give your code to continue");
                        if (verifikasi == code) {
                            var url = "http://localhost/projek/DioraSt/admin/getdata.php";
                            axios.delete(url, {
                                    params: {
                                        table: table,
                                        id: id,
                                        prikey: prikey
                                    }
                                })
                                .then(response => {
                                    console.log(response);
                                    location.reload();
                                })
                        } else {
                            alert("Well you wrong please remember me");
                        }
                    }
                },
                // toggle pagination color
                toggleColorBg() {
                    const toggleColorPag = document.querySelectorAll("span");
                    console.log(toggleColorPag);
                },
                getSpeData(toggle, table) {
                    this.toggle.show = toggle;
                    // ini select all data
                    this.getData(table, "", "", "", 5, 0, "", "");
                    this.getPagination(table, "", "", "", "");
                },
                // table orderby order max
                getData(table, orderby, order, start, max, index, prikey, id) {
                    this.curent.pagination = index + 1;
                    var url = "http://localhost/projek/DioraSt/admin/getdata.php";
                    axios.get(url, {
                            params: {
                                table: table,
                                orderby: orderby,
                                order: order,
                                max: max,
                                start: start,
                                prikey: "",
                                id: "",
                            }
                        })
                        .then(response => {
                            this.data.dataQuery = response.data;
                            console.log(response);
                            console.log(this.data.dataQuery);
                        })
                },
                getDataModal(table, orderby, order, start, max, index, prikey, id) {
                    var url = "http://localhost/projek/DioraSt/admin/getdata.php";
                    axios.get(url, {
                            params: {
                                table: table,
                                orderby: "",
                                order: "",
                                max: "",
                                start: "",
                                prikey: prikey,
                                id: id,
                            }
                        })
                        .then(response => {
                            console.log(response);
                            this.data.dataModal = response.data;
                            console.log(this.data.dataModal);
                        })
                },
                getPagination(table, orderby, order, start, max) {
                    var url = "http://localhost/projek/DioraSt/admin/getdata.php";
                    axios.get(url, {
                            params: {
                                table: table,
                                orderby: orderby,
                                order: order,
                                max: max,
                                start: start,
                                id: "",
                                prikey: ""
                            }
                        })
                        .then(response => {
                            console.log(response);
                            const span = Math.ceil(response.data.length / 5);
                            this.pagination.pageSpan = span;
                        })
                },
            },
            mounted() {
                // this.getData("user", "", "", "", "5", 0, "", "");
                // this.getPagination('user', "", "", "", "");
                setInterval(this.getDateCur(), 1000 * 30);
            }
        })

        app.mount("#app");
    </script>
</body>

</html>