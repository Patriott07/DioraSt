<script>
    const app = Vue.createApp({
        data() {
            return {
                totCheckout: 0,
                qtyCheckout: 0,
                nowa: 62,
                portalcode: 0,
                cookieform : 0,
                account: {
                    url: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOH2aZnIHWjMQj2lQUOWIL2f4Hljgab0ecZQ&usqp=CAU",
                    username: "Patriotto",
                    gmail: "Pwangtampn@gmail.com",
                    description: "Describing our self its a important for the better life. and passion is our power"
                },
                dataApi: {
                    url: "",
                    data: [

                    ],
                    dataBarangTransaksi: [],
                    dataFavTop: [

                    ],
                    dataFilter: [

                    ],
                    dataModal: {
                        name: "",
                        brand: "",
                        price: "",
                        discount: "",
                        description: "",
                        image: "",
                        detail: {
                            titleSpan: "",
                            count: "",
                            category: ""
                        }
                    }
                },
                loop: {
                    header: false
                },
                toggle: {
                    clothes: false,
                    shoes: false,
                    load: false,
                    info: false
                },
                msg: {
                    info: null,
                    kondisi: null
                },
                isDesktopView: true,
                isTabletView: false,

            }
        },

        computed: {
            getday() {
                const nowDate = new Date();
                return nowDate.getUTCDate() + " / " + nowDate.getMonth() + " / " + nowDate.getFullYear();
            }
        },

        methods: {
            setCookieForm(event) {
                if (event.target.checked) {
                    this.cookieform = 1;
                } else {
                    this.cookieform = 0;
                }
            },
            setNowa(value) {
                this.nowa = value;
            },
            setPortalcode(value) {
                this.portalcode = value;
            },
            addTotalCheckout(event, harga) {
                isCeklis = event.target.checked; //mengecek apakah checkbox di klik

                if (isCeklis) {
                    this.totCheckout += harga;
                    this.qtyCheckout += 1;
                } else {
                    this.totCheckout -= harga;
                    this.qtyCheckout -= 1;
                }
            },
            strtolink(str) {
                return str.replace(/\s/g, "");
            },
            postTransaksi(idproduk, total, id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Make sure to choose right payment method And Make a detail about your location (We will Protect) so your package will arrive on your addres",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#33da97',
                    cancelButtonColor: '#A39999',
                    confirmButtonText: 'Yes, pay now',
                    focusConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log('<?php echo $id_produk ?>');
                        console.log(document.getElementById("form_via").value);
                        console.log(document.getElementById("form_penerima").value);
                        console.log(document.getElementById("formnumberwa").value);
                        console.log(document.getElementById("formportalcode").value);
                        console.log(document.getElementById("form_alamat").value);
                        console.log(document.getElementById("isSave").value);

                        Swal.fire(
                            'Nice',
                            'Thanks For trusting us, i will make a struk for you',
                            'success'
                        );
                        setTimeout(() => {

                        }, 2500)
                        var url = "http://localhost/projek/DioraSt/db/postTransaksi.php";

                        axios.post(url, {
                                id: id,
                                idproduk: idproduk,
                                penerima: document.getElementById("form_penerima").value,
                                via: document.getElementById("form_via").value,
                                total: total,
                                no_wa: this.nowa,
                                portal_code: this.portalcode,
                                alamat: document.getElementById("form_alamat").value,
                                cookie: this.cookieform
                            }, {
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                            })
                            .then(response => {
                                console.log(response);
                                if (response.data.message == "Oke masuk data") {
                                    // Gabungkan parameter-parameter GET ke dalam UR
                                    var urlBaru = "http://localhost/projek/DioraSt/data/laporan.php?idTran=" + response.data.param;
                                    // Mengarahkan browser ke URL baru
                                    <?php $_SESSION['transaksi'] = 1; ?>
                                    window.location.href = urlBaru;
                                }
                            })
                            .catch(error => {
                                console.log('<?php echo $id_produk ?>')
                            });
                    }

                })



            },
            getFavTop(id_user) {
                var url = "http://localhost/projek/DioraSt/db/getFav.php";
                axios.get(url, {
                    params: {
                        id_user: id_user
                    }
                }).then(response => {

                    console.log(response.data);
                    this.dataApi.dataFavTop = response.data;
                });

            },
            delCart(id, name) { //Done

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Wanna Delete your Product from Cart?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var urlDelFav = "http://localhost/projek/DioraSt/db/delCart.php";
                        axios.post(urlDelFav, {
                                    id_fav: id
                                }, {
                                    headers: {
                                        'Content-Type': 'application/json',
                                    }
                                }

                            )
                            .then(response => {
                                Swal.fire(
                                    '',
                                    'Deleted Complete',
                                    'info'
                                );
                                setTimeout(() => {
                                    location.reload();
                                }, 1000)
                            })
                    } else {
                        Swal.fire(
                            'Good',
                            'Your items still save now',
                            'info'
                        )
                    }
                })
            },
            delFav(id, name) { //DOne
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Wanna Delete your Product from Cart?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var urlDelFav = "http://localhost/projek/DioraSt/db/delFav.php";
                        axios.post(urlDelFav, {
                                    id_fav: id
                                }, {
                                    headers: {
                                        'Content-Type': 'application/json',
                                    }
                                }

                            )
                            .then(response => {
                                Swal.fire(
                                    '',
                                    'Deleted Complete',
                                    'info'
                                );
                                setTimeout(() => {
                                    location.reload();
                                }, 1000)
                            })
                    } else {
                        Swal.fire(
                            'Good',
                            'Your items still save now',
                            'info'
                        );
                    }
                });
            },
            testPostCart(id_user, id_produk, type) {
                axios.post("http://localhost/projek/DioraSt/db/postFav.php", {
                        id_user: id_user,
                        id_produk: id_produk,
                        type: type
                        // tanggal : this.getday
                    }, {
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => {
                        const stat = response.data.status;
                        if (stat == "OK") {
                            Swal.fire({
                                title: 'Great, your items in cart now',
                                text: "To See it, you must restart the page",
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonColor: '#A67CFF',
                                cancelButtonColor: '#3c3c3c',
                                confirmButtonText: 'Yes, Restart Now',
                                cancelButtonText: 'No, Thanks'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(true);
                                    window.scrollTo(0, 0);
                                }
                            })
                        } else {
                            Swal.fire({
                                title: 'Malfunction',
                                text: "Maybe you have this items on your Cart",
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3c3c3c',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Okey',

                            })
                        }
                    })
                    .catch(error => console.log(error));
            },
            testPostFav(id_user, id_produk, type) {
                axios.post("http://localhost/projek/DioraSt/db/postFav.php", {
                        id_user: id_user,
                        id_produk: id_produk,
                        type: type
                        // tanggal : this.getday
                    }, {
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => {

                        this.msg.info = response.data.message;
                        const stat = response.data.status;
                        if (stat == "OK") {
                            Swal.fire({
                                title: 'Great your items in favorite now',
                                text: "To See it, you must restart the page",
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonColor: '#A67CFF',
                                cancelButtonColor: '#3c3c3c',
                                confirmButtonText: 'Yes, Restart Now',
                                cancelButtonText: 'No, Thanks'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(true);
                                    window.scrollTo(0, 0);
                                }
                            })
                        } else {
                            Swal.fire({
                                title: 'Malfunction',
                                text: "Maybe you have this items on your Favorite",
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3c3c3c',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Okey',

                            });
                        }
                    })
                    .catch(error => console.log(error));
            },
            // getProduk(){
            //     const url = "http://localhost/projek/DioraSt/db/getProduk.php";
            //     axios.get(url,{
            //         params : {

            //         }
            //     }).then(response => {
            //         console.log(response);
            //         this.dataApi.data = response.data;
            //     });
            // },
            toggleColor(e) {
                const toggle = document.getElementsByClassName('toggle-shop')
                console.log(e);
                Array.from(toggle).forEach(element => {
                    element.style.color = "black";
                });
                e.target.style.color = "blue";
            },
            testApi(parent, req, key, id = "") {
                //const url = "data.json";

                const url = "http://localhost/projek/DioraSt/db/getProduk.php";
                console.log(parent);
                console.log(req);
                console.log(key);
                if (id == "") {
                    axios.get(url, {
                        params: {

                        }
                    }).then(response => {
                        this.dataApi.data = response.data.product;
                        console.log(response);
                        this.loadScreen();
                        // console.log(this.dataApi.data);
                        if (parent === undefined || req === undefined || key === undefined) {
                            document.getElementById("judulTab").innerHTML = "Diora St";
                            this.dataApi.data = response.data.product[0];
                            this.dataApi.dataFilter = [];
                            // console.log(this.dataApi.data);
                        } else if (req != undefined) {
                            document.getElementById("judulTab").innerHTML = "Diora | " + req;
                            const filteredData = this.dataApi.data.reduce((result, category) => {
                                // console.log(category); //data
                                // console.log(result); //[]
                                const products = Object.values(category)[key]; //ini memfilter sesuai dengan KAtegori apakah BAJU/SEPATU
                                console.log(products);
                                const filteredProducts = products.filter(product => product.detail.titleSpan.includes(req));
                                this.dataApi.dataFilter = filteredProducts;
                            }, []);

                        }


                    }).catch(error => console.log(error));
                } else {
                    axios.get(url, {
                        params: {
                            id_produk: id
                        }
                    }).then(response => {
                        this.dataApi.dataBarangTransaksi = response.data;
                        console.log(this.dataApi.dataBarangTransaksi);
                    })
                }
            },

            loopHeader() {
                this.loop.header = !this.loop.header;
            },
            checkScreenSize() {
                // Fungsi untuk memeriksa ukuran layar dan mengubah nilai isDesktopView dan isTabletView sesuai kebutuhan
                const screenWidth = window.innerWidth;
                this.isDesktopView = screenWidth >= 992; // Ukuran desktop dalam Bootstrap adalah 992px
                this.isTabletView = screenWidth < 992; // Ukuran tablet adalah kurang dari 992px
            },
            loadScreen() {
                this.toggle.load = true;
                setTimeout(() => {
                    this.toggle.load = false;
                }, 600)
            },
            favoritF(index) {
                this.msg.kondisi = "Ke Dalam Daftar Favorit"
                this.msg.info = this.dataApi.dataFilter[index].name;
                this.toggle.info = true;
                setTimeout(() => {
                    this.toggle.info = false;
                }, 2000);

                // var nama = this.dataApi.dataFilter[index].name;
                // var des = this.dataApi.dataFilter[index].description;
                // var img = this.dataApi.dataFilter[index].image;
                // var price = this.dataApi.dataFilter[index].price;

                this.testPostFav(id_user, id_produk);
                var toastEl = document.querySelector('.toast');
                var toast = new bootstrap.Toast(toastEl);
                toast.show({
                    delay: 400
                });
            },
            cartF(index) {
                this.msg.kondisi = "Ke Dalam Daftar Keranjang"
                this.msg.info = this.dataApi.dataFilter[index].name;
                this.toggle.info = true;
                setTimeout(() => {
                    this.toggle.info = false;
                }, 2000);
            },
            favorit(index, parent, id_user, id_produk, type) {
                // console.log(this.dataApi.data[parent][index]);
                this.toggle.info = true;

                this.testPostFav(id_user, id_produk, type);

            },
            cart(index, parent, id_user, id_produk, type) {

                this.testPostCart(id_user, id_produk, type);
            },
            getDataModal(index, parent, category) {
                if (parent == 'filter') {
                    this.dataApi.dataModal = this.dataApi.dataFilter[index];
                } else if (parent == 'all') {
                    this.dataApi.dataModal = this.dataApi.data[category][index];
                    console.log(this.dataApi.dataModal);
                }
            },
            resetBtn(id) {
                document.getElementById(id).value = "";
            }
        },
        mounted: function() {
            // this.testPostFav();
            this.checkScreenSize();
            window.addEventListener('resize', this.checkScreenSize);

            setInterval(() => {
                this.loopHeader();
            }, 1000 * 3)
        },
        beforeDestroy: function() {
            // Jangan lupa untuk menghapus event listener saat komponen dihapus dari DOM
            window.removeEventListener('resize', this.checkScreenSize);
        },
        beforeCreate() {

        },
        created() {
            this.testApi();
            // this.getProduk();
            this.getFavTop(<?php echo $id ?>);
            <?php
            if (isset($_COOKIE['whatsapp'])) {
            ?>
                this.setNowa(<?= $_COOKIE['whatsapp'] ?>);
            <?php
            }
            if (isset($_COOKIE['portalcode'])) {
            ?>
                this.setPortalcode(<?= $_COOKIE['portalcode'] ?>)
            <?php

            }
            ?>
        }


    })

    app.mount('#app');
</script>