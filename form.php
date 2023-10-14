<?php

include "inc/inc_konek.php";
include "inc/inc_fungsi.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Checkout</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baumans&family=Bebas+Neue&family=Flamenco&family=Inter&family=Italiana&family=Josefin+Sans&family=Margarine&family=Martian+Mono&family=Megrim&family=Roboto+Mono:wght@500&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- bosstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div id="app">
        <div class="">
            <div class="row">
                <div class="col-lg-7 form-left py-5">
                    <div class="container">
                        <span class="nav-span p-3"><span class="white pe-1">Diora St</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 21 21" fill="none">
                                <path class="cart" d="M19.5482 7H16.6564L16.0401 2.9225C15.9159 2.30557 15.6431 1.73739 15.2508 1.2783C14.8585 0.8192 14.3613 0.48632 13.8119 0.315C13.2599 0.118344 12.6849 0.0122194 12.1052 0H8.56538C7.98566 0.0122194 7.41066 0.118344 6.85869 0.315C6.30929 0.48632 5.81204 0.8192 5.41973 1.2783C5.02742 1.73739 4.7547 2.30557 4.63052 2.9225L4.01421 7H1.12232C0.997857 6.99916 0.874976 7.0309 0.763688 7.09263C0.6524 7.15435 0.555855 7.24432 0.481917 7.3552C0.407979 7.46607 0.35874 7.59473 0.338213 7.73068C0.317685 7.86662 0.32645 8.00602 0.363792 8.1375L3.3347 19.1625C3.48595 19.6951 3.7866 20.1604 4.19299 20.4909C4.59937 20.8213 5.09031 20.9997 5.59448 21H15.0761C15.5776 20.996 16.0649 20.8159 16.4682 20.4857C16.8714 20.1555 17.1696 19.6923 17.3201 19.1625L20.291 8.1375C20.3279 8.00742 20.3369 7.86958 20.3172 7.73497C20.2975 7.60036 20.2497 7.47272 20.1775 7.36221C20.1054 7.25171 20.0109 7.16141 19.9017 7.09852C19.7924 7.03564 19.6714 7.0019 19.5482 7ZM5.62608 7L6.19498 3.2025C6.25735 2.89244 6.40202 2.61012 6.6104 2.39183C6.81879 2.17354 7.08136 2.02924 7.36438 1.9775C7.75313 1.841 8.15768 1.76575 8.56538 1.75H12.1052C12.5176 1.764 12.9269 1.83925 13.322 1.9775C13.605 2.02924 13.8676 2.17354 14.076 2.39183C14.2844 2.61012 14.429 2.89244 14.4914 3.2025L15.0445 7H5.56287H5.62608Z" fill="white" />
                            </svg>
                        </span>

                        <span class="nav-span p-3 ms-3">
                            <span class="white pe-1">Form Checkout</span>
                        </span>
                        <div class="mt-5 information-header">
                            <div class="txt-xm text-light ps-3 fw-bold" style="letter-spacing: 1px">Information User</div>
                            <div class="col-8">
                                <hr>
                            </div>
                        </div>
                        <form action="" method="POST" class="mt-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Penerima :</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Who will take the package?">
                                <div class="form-text text-light">give me your detail name, we will protect your privasi</div>
                            </div>

                            <label for="exampleFormControlInput1" class="form-label">Number Whatsapp :</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">+62</span>
                                <input type="number" class="form-control" placeholder="Example : 6289109876" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-text text-light mb-3">Sometimes, when you package got problem. we will contact you</div>

                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select Payment Method</option>
                                <option value="E-Banking">E-Banking</option>
                                <option value="Paypal">Paypal</option>
                                <option value="COD">COD</option>
                            </select>
                            <div class="form-text text-light">Select metode payment</div>


                            <div class="mt-5 information-header">
                                <div class="txt-xm text-light ps-3 fw-bold" style="letter-spacing: 1px">Information Address</div>
                                <div class="col-8">
                                    <hr>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Example : Jln. Perjuangan No.13 Blok A Rw 3, Kec.Kedawung Kab.CIrebon"></textarea>
                                <div class="form-text text-light">give me your detail addres for continue</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Portal Code</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="example : 12455">
                                        <div class="form-text text-light">give me your City portal code</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label text-light" for="flexCheckDefault">
                                    Save form when checkout again.
                                </label>
                            </div>

                            <div class="mb-3 text-end">
                                <button type="reset" class="btn btn-dark">Reset</button>
                                <button type="button" class="send-succes" @click.prevent="postTransaksi()">Start Transaction {{account.username}}</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-5 form-right py-5">
                    <div class="container">
                        <div class="txt-sm">Your items</div>
                        <hr class="mb-3">
                        <div class="mt-4 row align-items-end">
                            <div class="col-3">
                                <img src="asset/hero-2.png" style="max-width: 120px; min-width: 100px; min-height:100" alt="">
                            </div>
                            <div class="col-7">
                                <div class="txt-xm text-dark">Tshirt Blue Jeans</div>
                                <div class="form-text" style="font-size:12px">
                                    Rp. 1678900
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-text">1 items</div>
                            </div>
                        </div>
                        <div class="mt-4 row align-items-end">
                            <div class="col-3">
                                <img src="asset/hero-2.png" style="max-width: 120px; min-width: 100px; min-height:100" alt="">
                            </div>
                            <div class="col-7">
                                <div class="txt-xm text-dark">Tshirt Blue Jeans</div>
                                <div class="form-text" style="font-size:12px">
                                    Rp. 1678900
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-text">1 items</div>
                            </div>
                        </div>
                        <div class="mt-4 row align-items-end">
                            <div class="col-3">
                                <img src="asset/hero-2.png" style="max-width: 120px; min-width: 100px; min-height:100" alt="">
                            </div>
                            <div class="col-7">
                                <div class="txt-xm text-dark">Tshirt Blue Jeans</div>
                                <div class="form-text" style="font-size:12px">
                                    Rp. 1678900
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-text">1 items</div>
                            </div>
                        </div>
                        <hr class="mt-4">

                        <!---total --->

                        <div class="form-text" style="font-size:12px">
                            Rp. 1678900
                        </div>
                        <div class="form-text" style="font-size:12px">
                            3 items
                        </div>

                        <div class="mt-3">
                            <div class="text-end">
                                <div class="form-text">Wanna Cancel this Transaction? Click
                                    button</div>
                                <form action="" method="POST" class="mt-2">
                                    <button class="send" type="submit">Bring me back</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    include "vue.php";
    ?>

</body>

</html>