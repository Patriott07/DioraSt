<?php
include "inc/inc_konek.php";
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
    <link rel="stylesheet" href="style.css">
    <style>
        .box-des {
            width: 292px;
            height: auto;
            border-radius: 5px;
            background: #3A3A3A;
            color: white;
            padding: 7px 15px;
        }
    </style>
</head>

<body>

    <div id="app" class="position-relative">
        <div :class="{show : toggle.info}" class="info position-fixed" style="display: none ;right: 3vw;top: 3vh;">
            <div class="box-info txt-xm mt-4 mb-3 p-2">
                <span class="text-start" style="font-size: 14px!important;">Diora Says : </span> <br>
                <span>Kamu telah Menambahkan </span> <span class="mark">{{ msg.info }}</span> <span class="ms-1">{{
                    msg.kondisi }}</span> <br>
                <div class="txt-end mt-1" style="font-size: 12px!important;">1 Second ago</div>
            </div>
        </div>
        <header :class="{header2:loop.header}" :class="{
            'container': isDesktopView,
            'container-fluid': isTabletView,
        }" class="container position-relative">
            <nav class="mx-5 pt-5 row align-items-center">
                <div class="col-6">
                    <span class="nav-span p-3"><span class="white pe-1">Diora St</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 21 21" fill="none">
                            <path class="cart" d="M19.5482 7H16.6564L16.0401 2.9225C15.9159 2.30557 15.6431 1.73739 15.2508 1.2783C14.8585 0.8192 14.3613 0.48632 13.8119 0.315C13.2599 0.118344 12.6849 0.0122194 12.1052 0H8.56538C7.98566 0.0122194 7.41066 0.118344 6.85869 0.315C6.30929 0.48632 5.81204 0.8192 5.41973 1.2783C5.02742 1.73739 4.7547 2.30557 4.63052 2.9225L4.01421 7H1.12232C0.997857 6.99916 0.874976 7.0309 0.763688 7.09263C0.6524 7.15435 0.555855 7.24432 0.481917 7.3552C0.407979 7.46607 0.35874 7.59473 0.338213 7.73068C0.317685 7.86662 0.32645 8.00602 0.363792 8.1375L3.3347 19.1625C3.48595 19.6951 3.7866 20.1604 4.19299 20.4909C4.59937 20.8213 5.09031 20.9997 5.59448 21H15.0761C15.5776 20.996 16.0649 20.8159 16.4682 20.4857C16.8714 20.1555 17.1696 19.6923 17.3201 19.1625L20.291 8.1375C20.3279 8.00742 20.3369 7.86958 20.3172 7.73497C20.2975 7.60036 20.2497 7.47272 20.1775 7.36221C20.1054 7.25171 20.0109 7.16141 19.9017 7.09852C19.7924 7.03564 19.6714 7.0019 19.5482 7ZM5.62608 7L6.19498 3.2025C6.25735 2.89244 6.40202 2.61012 6.6104 2.39183C6.81879 2.17354 7.08136 2.02924 7.36438 1.9775C7.75313 1.841 8.15768 1.76575 8.56538 1.75H12.1052C12.5176 1.764 12.9269 1.83925 13.322 1.9775C13.605 2.02924 13.8676 2.17354 14.076 2.39183C14.2844 2.61012 14.429 2.89244 14.4914 3.2025L15.0445 7H5.56287H5.62608Z" fill="white" />
                        </svg>
                    </span>
                    <span class="nav-span black p-3 ms-2" style="background-color: white;">
                        <a @click="toggle.clothes = !toggle.clothes" href="#clothes">Woman Clothing</a>
                        <a @click="toggle.clothes = !toggle.clothes" href="#clothes">Man Clothing</a>
                        <a @click="toggle.shoes = !toggle.shoes" href="#shoes">Shoes</a>
                    </span>
                </div>
                <div class="col-6 text-end">

                    <span class="e">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <circle cx="16" cy="16" r="16" fill="#fff" />
                            <path class="love" d="M20.5455 7C18.6364 7 16.9545 8.10833 16 9.85C15.0455 8.10833 13.3636 7 11.4545 7C8.45455 7 6 9.85 6 13.3333C6 19.6139 16 26 16 26C16 26 26 19.6667 26 13.3333C26 9.85 23.5455 7 20.5455 7Z" fill="black" />
                        </svg>
                    </span>
                    <span class="mx-2 e">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <circle cx="16" cy="16" r="16" fill="#fff" />
                            <path class="cart" d="M25.2209 12H22.329L21.7127 7.9225C21.5885 7.30557 21.3158 6.73739 20.9234 6.2783C20.5311 5.8192 20.0339 5.48632 19.4845 5.315C18.9325 5.11834 18.3575 5.01222 17.7778 5H14.238C13.6583 5.01222 13.0833 5.11834 12.5313 5.315C11.9819 5.48632 11.4846 5.8192 11.0923 6.2783C10.7 6.73739 10.4273 7.30557 10.3031 7.9225L9.68682 12H6.79493C6.67046 11.9992 6.54758 12.0309 6.4363 12.0926C6.32501 12.1544 6.22846 12.2443 6.15452 12.3552C6.08059 12.4661 6.03135 12.5947 6.01082 12.7307C5.99029 12.8666 5.99906 13.006 6.0364 13.1375L9.0073 24.1625C9.15855 24.6951 9.45921 25.1604 9.8656 25.4909C10.272 25.8213 10.7629 25.9997 11.2671 26H20.7487C21.2502 25.996 21.7375 25.8159 22.1408 25.4857C22.544 25.1555 22.8422 24.6923 22.9927 24.1625L25.9636 13.1375C26.0005 13.0074 26.0095 12.8696 25.9898 12.735C25.9701 12.6004 25.9223 12.4727 25.8502 12.3622C25.778 12.2517 25.6835 12.1614 25.5743 12.0985C25.465 12.0356 25.344 12.0019 25.2209 12ZM11.2987 12L11.8676 8.2025C11.93 7.89244 12.0746 7.61012 12.283 7.39183C12.4914 7.17354 12.754 7.02924 13.037 6.9775C13.4257 6.841 13.8303 6.76575 14.238 6.75H17.7778C18.1902 6.764 18.5995 6.83925 18.9946 6.9775C19.2776 7.02924 19.5402 7.17354 19.7486 7.39183C19.957 7.61012 20.1016 7.89244 20.164 8.2025L20.7171 12H11.2355H11.2987Z" fill="black" />
                        </svg>
                    </span>


                    <span class="e dropstart btn-group">
                        <img class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 50px;max-width: 30px; max-height:30px" src="data:image/jpeg;base64,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" alt="">
                        <div class="dropdown-menu container text-center pt-5 pb-4" style="width: 350px;">
                            <!-- berisi informasi profile  -->
                            <img style="width: 150px; border-radius: 50px" :src="account.url" alt="">
                            <h5 style="font-size: 24px; margin-top:14px">{{ account.username }}</h5>
                            <h5 class="txt-xm">{{ account.gmail }}</h5>
                            <div class="mx-auto">
                                <div class=" ms-4 box-des my-4">
                                    {{ account.description }}
                                </div>
                                <div class="container mb-3">
                                    <div class="row align-items-end text-start py-2" style="border-bottom: 1px solid #898787;">
                                        <div class="col-12 e" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                            <div class="" style="font-size: 14px;">
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="pt-2">Manage your Account</span>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="container mb-4">
                                    <div class="row align-items-end text-start py-2" style="border-bottom: 1px solid #898787;">
                                        <div class="col-12">
                                            <div class="" style="font-size: 14px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12 12H19M19 12L16 15M19 12L16 9M19 6V5C19 4.46957 18.7893 3.96086 18.4142 3.58579C18.0391 3.21071 17.5304 3 17 3H7C6.46957 3 5.96086 3.21071 5.58579 3.58579C5.21071 3.96086 5 4.46957 5 5V19C5 19.5304 5.21071 20.0391 5.58579 20.4142C5.96086 20.7893 6.46957 21 7 21H17C17.5304 21 18.0391 20.7893 18.4142 20.4142C18.7893 20.0391 19 19.5304 19 19V18" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="pt-2">Log out</span>
                                            </div>

                                        </div>
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
        <main :class="{
            'container': isDesktopView,
            'container-fluid': isTabletView,
        }" class="container position-relative" style="background-color: #fff;">
            <div class="row">

                <div id="leftbar" class="col-md-3 col-lg-3 pt-5 start-0 top-0" style="position: relative;background-color: #fff;">
                    <p class="txt-md e harga">Category</p>
                    <div class="ps-3 mt-3" id="shoes">
                        <h6 class="txt-sm e" @click.prevent="toggle.shoes = !toggle.shoes">Shoes</h6>
                        <ul :class="{show:toggle.shoes}" class="ps-5" style="display: none;">
                            <li class="txt-xm e" @click.prevent="testApi('SEPATU','New',0)">New</li>
                            <li class="txt-xm e" @click.prevent="testApi('SEPATU','New Colection',0)">New Colection</li>
                            <li class="txt-xm e" @click.prevent="testApi('SEPATU','Shoes Man',0)">Shoes Man</li>
                            <li class="txt-xm e" @click.prevent="testApi('SEPATU','Shoes Woman',0)">Shoes Woman</li>
                            <li class="txt-xm e" @click.prevent="testApi('SEPATU','Expensive',0)">Expensive</li>
                            <li class="txt-xm e" @click.prevent="testApi('SEPATU','Comfortable',0)">Comfortable</li>
                            <li class="txt-xm e" @click.prevent="testApi('SEPATU','Soft',0)">Soft</li>
                            <li class="txt-xm e" @click.prevent="testApi('SEPATU','Sandals',0)">Sandals</li>
                            <li class="txt-xm e" @click.prevent="testApi('SEPATU','Formal',0)">Formal</li>
                        </ul>
                    </div>
                    <div class="ps-3 mt-3" id="clothes">
                        <h6 class="txt-sm e" @click="toggle.clothes = !toggle.clothes">Clothes</h6>
                        <ul :class="{show:toggle.clothes}" class="ps-5" style="display: none;">
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','New',1)">New</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','New Colection',1)">New Colection</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Woman Clothing',1)">Woman Clothing</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Mans Clothing',1)">Mans Clothing</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Expensive',1)">Expensive</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Stylish',1)">Stylish</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Soft',1)">Soft</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Shirts',1)">Shirts</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Dresses',1)">Dresses</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Blouses',1)">Blouses</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Tops',1)">Tops</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Coats',1)">Coats</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Jackets',1)">Jackets</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Sweaters',1)">Sweaters</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Skirts',1)">Skirts</li>
                            <li class="txt-xm e" @click.prevent="testApi('BAJU','Pants',1)">Pants</li>
                        </ul>
                    </div>

                    <div class="ps-3 mt-3">
                        <h6 class="txt-sm e" @click.prevent="testApi()">Show All</h6>
                    </div>
                </div>

                <div id="content-card" class="col-md-9 col-lg-9 mx-auto p-3" style="background-color: #F2F2F2;">
                    <div v-if="toggle.load" class="position-relative" style="height: 100vh;">
                        <div :class="{trans : toggle.load}" class="position-absolute top-50 start-50 translate-middle">
                            <img src="asset/Triangles-1s-200px.gif" alt="">
                            <h5 class="txt-sm text-center">Loading<span> . . .</span></h5>
                        </div>

                    </div>
                    <div v-else>
                        <div v-if="dataApi.dataFilter.length" class="row">
                            <div v-for="(data, index) in dataApi.dataFilter" class="col-lg-4 col-6">
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
                                        <div class="mt-3 row align-items-center">
                                            <div class="col-6">
                                                <span class="like e me-1" @click.prevent="favoritF(index)" :title="`Tambahkan Produk ${data.name} ke dalam Favorit`">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 21 19" fill="none">
                                                        <rect width="21" height="19" rx="5" fill="#A67CFF" />
                                                        <path class="love" d="M13.4545 4C12.2136 4 11.1205 4.64167 10.5 5.65C9.87955 4.64167 8.78636 4 7.54545 4C5.59545 4 4 5.65 4 7.66667C4 11.3028 10.5 15 10.5 15C10.5 15 17 11.3333 17 7.66667C17 5.65 15.4045 4 13.4545 4Z" fill="white" />
                                                    </svg>
                                                </span>
                                                <span class="cart e" @click.prevent="cartF(index)" :title="`Tambahkan Produk ${data.name} ke dalam Keranjang`">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 20 19" fill="none">
                                                        <rect width="20" height="19" rx="5" fill="#A67CFF" />
                                                        <path class="cart" d="M15.4413 7H13.7333L13.3693 4.67C13.2959 4.31747 13.1349 3.9928 12.9032 3.73046C12.6714 3.46811 12.3778 3.2779 12.0533 3.18C11.7273 3.06763 11.3877 3.00698 11.0453 3H8.95461C8.61221 3.00698 8.27261 3.06763 7.94661 3.18C7.62212 3.2779 7.32844 3.46811 7.09673 3.73046C6.86503 3.9928 6.70395 4.31747 6.63061 4.67L6.26661 7H4.55861C4.4851 6.99952 4.41252 7.01766 4.34679 7.05293C4.28107 7.0882 4.22404 7.13961 4.18038 7.20297C4.13671 7.26633 4.10763 7.33984 4.0955 7.41753C4.08338 7.49521 4.08855 7.57487 4.11061 7.65L5.86528 13.95C5.95461 14.2543 6.13218 14.5202 6.3722 14.7091C6.61221 14.8979 6.90217 14.9998 7.19994 15H12.7999C13.0961 14.9977 13.384 14.8948 13.6221 14.7061C13.8603 14.5175 14.0364 14.2527 14.1253 13.95L15.8799 7.65C15.9018 7.57567 15.9071 7.4969 15.8954 7.41998C15.8838 7.34306 15.8556 7.27012 15.8129 7.20698C15.7703 7.14383 15.7145 7.09224 15.65 7.0563C15.5855 7.02036 15.514 7.00108 15.4413 7ZM7.21861 7L7.55461 4.83C7.59144 4.65282 7.67689 4.4915 7.79996 4.36676C7.92304 4.24202 8.07812 4.15957 8.24528 4.13C8.47488 4.052 8.71381 4.009 8.95461 4H11.0453C11.2889 4.008 11.5306 4.051 11.7639 4.13C11.9311 4.15957 12.0862 4.24202 12.2093 4.36676C12.3323 4.4915 12.4178 4.65282 12.4546 4.83L12.7813 7H7.18128H7.21861Z" fill="white" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="check txt-xm e" data-bs-toggle="modal" data-bs-target="#exampleModal" @click.prevent="getDataModal(index,'filter')">Check</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-else class="row">
                            <!-- {{ dataApi.data }} -->
                            <div v-for="(data, index) in dataApi.data.SEPATU" class="col-lg-4 col-6">
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
                                        <div class="mt-3 row align-items-center">
                                            <div class="col-6">
                                                <span class="like e me-1" @click.prevent="favorit(index,'SEPATU')" :title="`Tambahkan Produk ${data.name} ke dalam Favorit`">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 21 19" fill="none">
                                                        <rect width="21" height="19" rx="5" fill="#A67CFF" />
                                                        <path class="love" d="M13.4545 4C12.2136 4 11.1205 4.64167 10.5 5.65C9.87955 4.64167 8.78636 4 7.54545 4C5.59545 4 4 5.65 4 7.66667C4 11.3028 10.5 15 10.5 15C10.5 15 17 11.3333 17 7.66667C17 5.65 15.4045 4 13.4545 4Z" fill="white" />
                                                    </svg>
                                                </span>
                                                <span class="cart e" @click.prevent="cart(index,'SEPATU')" :title="`Tambahkan Produk ${data.name} ke dalam Keranjang`">
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
                                    </div>
                                </div>
                            </div>



                            <div v-for="(data, index) in dataApi.data.BAJU" class="col-lg-4 col-6">
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
                                        <div class="mt-3 row align-items-center">
                                            <div class="col-6">
                                                <span class="like e me-1" @click.prevent="favorit(index,'BAJU')" :title="`Tambahkan Produk ${data.name} ke dalam Favorit`">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 21 19" fill="none">
                                                        <rect width="21" height="19" rx="5" fill="#A67CFF" />
                                                        <path class="love" d="M13.4545 4C12.2136 4 11.1205 4.64167 10.5 5.65C9.87955 4.64167 8.78636 4 7.54545 4C5.59545 4 4 5.65 4 7.66667C4 11.3028 10.5 15 10.5 15C10.5 15 17 11.3333 17 7.66667C17 5.65 15.4045 4 13.4545 4Z" fill="white" />
                                                    </svg>
                                                </span>
                                                <span class="cart e" @click.prevent="cart(index,'BAJU')" :title="`Tambahkan Produk ${data.name} ke dalam Keranjang`">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="container-fluid mt-3" style="background-color: #A67CFF;">
            <div class="container py-5">
                <div class="row align-items-center text-light">
                    <div class="col-6">
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
                    <div class="col-2 text-start offset-2">
                        <p class="txt-md harga">Shortcut</p>
                        <h5 class="txt-sm"><a href="">Home</a></h5>
                        <h5 class="txt-sm"><a href="">Clothes</a></h5>
                        <h5 class="txt-sm"><a href="">Shoes</a></h5>
                        <h5 class="txt-sm"><a href="">ShowAll</a></h5>
                    </div>
                    <div class="col-2">
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

        <!-- modal setUsername and google -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Username</label>
                                <input v-model="account.username" type="text" class="form-control" id="recipient-name">
                                <div class="form-text">Create The unique username</div>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">gmail</label>
                                <input v-model="account.gmail" type="email" class="form-control" id="recipient-name" disabled>
                                <div class="form-text">Sorry you cann't change the email</div>
                            </div>
                            <div class="mb-3">

                                <div class="row align-items-center">
                                <label for="recipient-name" class="col-form-label">The Profile</label>
                                    <div class="col-10">
                                        <input v-model="account.url" type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="col-2">
                                        <button @click="account.url ='' " type="button" class="btn btn-secondary">Reset</button>
                                    </div>
                                    <div class="form-text">Maaf atas ketidaknyamannya, Tolong masukan url Image hehe</div>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Description</label>
                                <textarea v-model="account.description" class="form-control" id="message-text"></textarea>
                                <div class="form-text">Make the beautifull Word</div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- modal check btn -->
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
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>


    <script>
        const app = Vue.createApp({
            data() {
                return {
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

            methods: {
                testApi(parent, req, key) {
                    const url = "data.json";
                    console.log(parent);
                    console.log(req);
                    axios.get(url, {
                        params: {

                        }
                    }).then(response => {
                        this.dataApi.data = response.data.product;
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
                },
                cartF(index) {
                    this.msg.kondisi = "Ke Dalam Daftar Keranjang"
                    this.msg.info = this.dataApi.dataFilter[index].name;
                    this.toggle.info = true;
                    setTimeout(() => {
                        this.toggle.info = false;
                    }, 2000);
                },
                favorit(index, parent) {
                    this.msg.kondisi = "Ke Dalam Daftar Favorit"
                    this.msg.info = this.dataApi.data[parent][index].name;
                    this.toggle.info = true;
                    setTimeout(() => {
                        this.toggle.info = false;
                    }, 2000);
                },
                cart(index, parent) {
                    this.msg.kondisi = "Ke Dalam Daftar Keranjang"
                    this.msg.info = this.dataApi.data[parent][index].name;
                    this.toggle.info = true;
                    setTimeout(() => {
                        this.toggle.info = false;
                    }, 2000);
                },
                getDataModal(index, parent, category) {
                    if (parent == 'filter') {
                        this.dataApi.dataModal = this.dataApi.dataFilter[index];
                    } else if (parent == 'all') {
                        this.dataApi.dataModal = this.dataApi.data[category][index];
                        console.log(this.dataApi.dataModal);
                    }
                }
            },
            mounted: function() {
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
            }


        })

        app.mount('#app');
    </script>
</body>

</html>