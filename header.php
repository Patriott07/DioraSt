
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
                                        <div class="col-12 e" data-bs-toggle="modal" data-bs-target="#exampleModalAccount" data-bs-whatever="@mdo">
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
                                                <a onclick="confirm('Apakah yakin ingin ingin keluar?')" href="startup.php">
                                                    <span class="pt-2">Log out</span>
                                                </a>
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