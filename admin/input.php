<?php

include "../inc/inc_konek.php";

session_start();
if ($_SESSION['id'] == "") {
    header("Location:login.php");
} else {
    $id = $_SESSION['id'];
}

if (isset($_POST['logout'])) {
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
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baumans&family=Bebas+Neue&family=Flamenco&family=Inter&family=Italiana&family=Josefin+Sans&family=Margarine&family=Martian+Mono&family=Megrim&family=Roboto+Mono:wght@500&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- bosstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin.css">

    <style>
        .page-active {
            background-color: #7c32f2 !important;
            color: white !important;
        }

        a {
            text-decoration: none;
        }

        label {
            color: black;
        }

        button.page-active,
        button.paginational {
            cursor: pointer;
            border: 0;
            border-radius: 5px;
        }

        button.page-active:hover,
        button.paginational:hover {
            opacity: 0.8;
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
            <div class="col-3 left-bar pb-5 pt-3" style="height: 110vh;">
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

                <ul class="ms-3 mt-3">
                    <li class="e" @click.prevent="curent.page = 'user'">User/pengguna</li>
                    <li class="e" @click.prevent="curent.page = 'produk'">Produk</li>
                    <li class="e" @click.prevent="curent.page = 'transaksi'">Transaksi</li>
                    <li class="e" @click.prevent="curent.page = 'cart'">Cart</li>
                    <li class="e" @click.prevent="curent.page = 'favorit'">Favorit</li>
                </ul>

            </div>
            <div class="col-9 right-bar container-fluid m-0 p-0 position-relative px-5" style="height: 110vh;">
                <div class="position-absolute" style="left: 30px; top: 30px;">
                    <a href="index.php">
                        <span class="ms-2 e page-active py-2 px-3" title="Anda Akan Di arahkan ke halaman utama">
                            Back to main page
                        </span>
                    </a>

                    <span class="ms-2 e page-active py-2 px-3" title="Date now">
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $data = date("l | h : i");
                        echo $data;
                        ?>
                    </span>

                    <span class="ms-2 page-active py-2 px-3 text-light" style="background: rgba(52, 53, 65, 0.75)!important;">
                        {{ curent.page }}
                    </span>
                </div>

                <!-- input form -->
                <div class="pt-5 mt-5 container-fluid">
                    <form action="" method="post">

                        <div v-if="curent.page == 'user'">
                            <div class="col-10 offset-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">gmail</label>
                                            <input type="email" class="form-control" id="gmail">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">password</label>
                                            <input type="password" class="form-control" id="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Image Profile</label>
                                    <textarea class="form-control" id="image" rows="3"></textarea>
                                    <div class="form-text">Mohon dalam bentuk link & bisa diakses</div>
                                </div>


                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 text-end">
                                            <button type="reset" class="paginational p-2">Reset</button>
                                            <button @click.prevent="postData('user')" type="button" class="page-active p-2 ms-2">Send Data</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div v-if="curent.page == 'produk'">
                            <div class="col-10 offset-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Name Produk</label>
                                            <input type="text" class="form-control" id="name_produk">
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="mb-3">
                                            <label for="disabledSelect" class="form-label">Category Produk</label>
                                            <select id="category_produk" class="form-select">
                                                <option value="SEPATU">Product Sepatu</option>
                                                <option value="BAJU">Product Baju</option>
                                            </select>
                                        </div>


                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Label Produk</label>
                                    <input type="text" class="form-control" id="label_produk">
                                    <div class="form-text">Penting diingat setiap category. berikan pemisah coma (,)</div>
                                </div>


                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk</label>
                                    <textarea class="form-control" id="deskripsi_produk" rows="3"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Harga</label>
                                            <input type="email" class="form-control" id="harga_produk">
                                            <div class="form-text">Jika tdk ada diskon masukan 0</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Stok</label>
                                            <input type="email" class="form-control" id="stok_produk">
                                            <div class="form-text">Jika tdk ada diskon masukan 0</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Discount</label>
                                            <input type="email" class="form-control" id="discount_produk">
                                            <div class="form-text">Jika tdk ada diskon masukan 0</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Image Produk</label>
                                    <textarea class="form-control" id="image_produk" rows="3"></textarea>
                                    <div class="form-text">Mohon dalam bentuk link & bisa diakses</div>
                                </div>
                                <div class="mb-3 text-end">
                                    <button type="reset" class="paginational p-2">Reset</button>
                                    <button @click.prevent="postData('produk')" type="button" class="page-active p-2 ms-2">Send Data</button>
                                </div>
                            </div>
                        </div>
                        <div v-if="curent.page == 'transaksi'">
                            <div class="col-10 offset-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">id_user</label>
                                            <input type="number" class="form-control" id="id_user_transaksi">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">id_produk</label>
                                            <input type="number" class="form-control" id="id_produk_transaksi">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Penerima</label>
                                            <input type="text" class="form-control" id="penerima_transaksi">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Via</label>
                                            <input type="text" class="form-control" id="via_transaksi">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_transaksi">
                                </div>
                                <div class="mb-3 text-end">
                                    <button type="reset" class="paginational p-2">Reset</button>
                                    <button @click.prevent="postData('transaksi')" type="button" class="page-active p-2 ms-2">Send Data</button>
                                </div>
                            </div>

                        </div>
                        <div v-if="curent.page == 'cart'">

                            <div class="col-10 offset-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">id_user</label>
                                            <input type="number" class="form-control" id="id_user_cart">
                                            <div class="form-text">Make sure Id_user ada dan terdefinisikan</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">id_produk</label>
                                            <input type="number" class="form-control" id="id_produk_cart">
                                            <div class="form-text">Make sure Id_produk ada dan terdefinisikan</div>
                                        </div>
                                    </div>
                                    <div class="mb-3 text-end">
                                        <button type="reset" class="paginational p-2">Reset</button>
                                        <button @click.prevent="postData('cart')" type="button" class="page-active p-2 ms-2">Send Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="curent.page == 'favorit'">
                            <div class="col-10 offset-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">id_user</label>
                                            <input type="number" class="form-control" id="id_user_fav">
                                            <div class="form-text">Make sure Id_user ada dan terdefinisikan</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">id_produk</label>
                                            <input type="number" class="form-control" id="id_produk_fav">
                                            <div class="form-text">Make sure Id_produk ada dan terdefinisikan</div>
                                        </div>
                                    </div>
                                    <div class="mb-3 text-end">
                                        <button type="reset" class="paginational p-2">Reset</button>
                                        <button @click.prevent="postData('favorit')" type="button" class="page-active p-2 ms-2">Send Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    curent: {
                        page: "user",
                    }
                }
            },
            methods: {
                postData(table) {
                    var url = "http://localhost/projek/DioraSt/admin/postdata.php";
                    if (table == "user") {
                        axios.post(url, {
                            type: table,
                            gmail: document.getElementById("gmail").value,
                            password: document.getElementById("password").value,
                            username: document.getElementById("username").value,
                            image: document.getElementById("image").value,
                            deskripsi: document.getElementById("deskripsi").value
                        }, {
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then(response => {
                            alert(response.data.status)
                        });
                    }
                    if (table == "produk") {
                        axios.post(url, {
                            type: table,
                            name_produk: document.getElementById("name_produk").value,
                            label_produk: document.getElementById("label_produk").value,
                            category_produk: document.getElementById("category_produk").value,
                            deskripsi_produk: document.getElementById("deskripsi_produk").value,
                            harga_produk: document.getElementById("harga_produk").value,
                            stok_produk: document.getElementById("stok_produk").value,
                            discount_produk: document.getElementById("discount_produk").value,
                            image_produk: document.getElementById("image_produk").value
                        }, {
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then(response => alert(response.data.status));
                    }
                    if (table == "transaksi") {
                        axios.post(url, {
                            type: table,
                            id_user: document.getElementById("id_user_transaksi").value,
                            id_produk: document.getElementById("id_produk_transaksi").value,
                            penerima: document.getElementById("penerima_transaksi").value,
                            via: document.getElementById("via_transaksi").value,
                            alamat: document.getElementById("alamat_transaksi").value,
                        }, {
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then(response => console.log(response));
                    }

                    if (table == "cart") {
                        axios.post(url, {
                            type: table,
                            id_user: document.getElementById("id_user_cart").value,
                            id_produk: document.getElementById("id_produk_cart").value
                        }, {
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then(response => alert(response.data.status));
                    }

                    if (table == "favorit") {
                        axios.post(url, {
                            type: table,
                            id_user: document.getElementById("id_user_fav").value,
                            id_produk: document.getElementById("id_produk_fav").value
                        }, {
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then(response => alert(response.data.status));
                    }

                    const input = document.getElementsByTagName("input");
                    const textArea = document.getElementsByTagName("textarea");
                    for (let i = 0; i < input.length; i++) {
                        input[i].value = "";
                    }
                    for (let i = 0; i < textArea.length; i++) {
                        textArea[i].value = "";
                    }
                }
            }
        })

        app.mount('#app');
    </script>

</body>

</html>