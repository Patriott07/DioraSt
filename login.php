<?php
$error = "";
$succes = "";
$kondisi = "";
$remember = "";
$gmail = "";
$pw = "";
session_start();
include "inc/inc_konek.php";
ob_start();


if (isset($_POST["cek"])) { //create new account
    $rand = rand(1, 9999);
    $gmail = $_POST['gmail'];
    $pw    = $_POST['password'];


    $sql1 = "select * from user where gmail = '$gmail'";
    $q1 = mysqli_query($koneksi, $sql1);

    //kondisi ketika gmail sudh terdaftar
    if (mysqli_num_rows($q1) > 0) {
        $error .= "<li>Email yang anda gunakan sudah terdaftar. mohon gunakan gmail lain</li>";
    } else {
        if(strlen($pw) < 9) {
            $error .= "<li>Mohon masukan Minimal Karakter Password 8 digit</li>";
        } else {
            if (preg_match('/[A-Z]/', $pw)) {
                if (preg_match('/[^a-zA-Z0-9]/', $pw)) {

                    $pw = md5($pw);
                    $img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOH2aZnIHWjMQj2lQUOWIL2f4Hljgab0ecZQ&usqp=CAU";
                    $username = "Username_" . $rand;
                    $des   = "Saya belum Menambhkan apapun di dalam deskripsi";
                    $active = "off";
                    //setelah itu melakukan validasi (opsional)

                    $sql1 = "insert into user (gmail, password, img , username , deskripsi , active) VALUES ('$gmail','$pw','$img','$username','$des', '$active')";
                    $q1 = mysqli_query($koneksi, $sql1);

                    $succes = "Selamat Data Anda berhasil dibuat silahkan Mencoba untuk login";
                } else {
                    $error .= "<li>Mohon masukan Minimal 1 digit Simbol uniq</li>";
                }
            } else {
                $error .= "<li>Masukan Huruf Kapital Minimal 1</li>";
            }
        }
    }
}


if (isset($_POST['login'])) {
    $gmail = $_POST['gmail2'];
    $pw = $_POST['password2'];
    if(isset($_POST['remember'])){
        $remember = $_POST['remember'];
    }
    $real_pw = md5($pw);

    $sql1 = "select * from user where gmail = '$gmail'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_assoc($q1);

    if (mysqli_num_rows($q1) > 0) {
        if ($r1['active'] == "Ban") {
            $error .= "Maaf Akun Anda Telah di Banned Oleh Admin";
        } else {
            $sql1 = "select * from user where gmail = '$gmail' AND password = '$real_pw'";
            $q1 = mysqli_query($koneksi, $sql1);
            $r1 = mysqli_fetch_array($q1);
            // var_dump($r1);
            if (mysqli_num_rows($q1) > 0) {

                //Cokkie
                if($remember != ""){
                    setcookie("gmail",$gmail, time() + 30 * 24 * 60 * 60);
                    setcookie("pw",$pw, time() + 30 * 24 * 60 * 60);
                    setcookie("Name", $r1['username'] , time() + 30 * 24*60*60);
                    // jika ingin menampilkan gunakan $_COOKIE['gmail'];
                    echo $_COOKIE['gmail'];
                    echo $_COOKIE['pw'];
                }
            
                $_SESSION['id'] = $r1["id"];
                // var_dump($_SESSION['id']);
                header("Location: index.php");
                exit();
            } else {
                $error .= "<li>Password Salah, Periksa kembali password anda</li>";
            }
        }
    } else {
        $error .= "<li>Akun dengan gmail $gmail belum terdaftar</li>";
    }
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
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        .txt-md {
            font-size: 32px;
        }

        .txt-sm {
            font-size: 20px;
        }

        .txt-xm {
            font-size: 16px;
            color: #A39999;
        }

        #app {
            height: 100vh;
            font-family: 'Baumans', cursive;
        }

        header {
            height: 100vh;
            background-color: black !important;
        }

        .login {
            z-index: 33;
            height: 100vh;
            border-radius: 5px;
            background: #FFF;
        }

        a {
            text-decoration: none !important;
            transition: all 0.6s;
        }

        a:hover {
            margin-left: 15px;
            transform: skewX(15deg);
            color: #33da97;

        }

        .btn-self {
            transition: all 0.4s;
            border-radius: 5px;
            background: #0EFD09;
        }

        .btn-self:hover {
            box-shadow: 2px 4px 10px 0px rgba(81, 241, 241, 0.60);
            padding: 4px 20px;
            color: #FFF;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .info-error {
            background: #FF4C4C;
            font-size: 14px;
            color: white;
        }

        .info-succes {
            background: #00FFFF;
            font-size: 14px;
            color: white;
        }

        ul {
            padding: 8px 8px;
        }

        img:hover {
            transform: scale(2.5);
            transition: all 15s !important;
            cursor: zoom-in;
        }

        img {
            transition: all 1.5s;
        }

        @media screen and (max-width: 520px) {
            .login {
            z-index: 33;
            width: 100%;
            height: 100vh;
            border-radius: 5px;
            background: #FFF;
        }

        .right-side{
            display: none;
        }
       }

       @media screen and (521px < width > 870px) {

        .login {
            z-index: 33;
            width: 100%;
            height: 100vh;
            border-radius: 5px;
            background: #FFF;
        }

        .right-side{
            display: none;
        }

    }


    </style>
</head>

<body>

    <header class="container-fluid" id="app">
        <div class="row">
            <!-- login -->
            <div v-if="toggle.form" class="col-lg-3 col-12 col-md-8 offset-md-4 login offset-lg-0">
                <div class="container pt-5 pb-3 text-center">
                    <h6 style="font-size: 48px;">Diora</h6>
                    <div class="txt-sm">Login</div>
                </div>
                <div class="container">
                    <form action="" method="post">
                        <div class="my-3 text-start">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input  name="gmail2" type="email" class="form-control" id="gmail" value="<?php if(isset($_COOKIE['gmail'])){ echo $_COOKIE['gmail']; }?>"  required>
                            <div class="form-text">Write down your email</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <div class="row">
                                <div class="col-10">
                                    <input  name="password2" type="password" class="form-control" id="password" value="<?php if(isset($_COOKIE['pw'])){ echo $_COOKIE['pw']; }?>" placeholder="" required>
                                    <div class="form-text">Make sure no one see the password</div>
                                </div>
                                <div class="col-2 p-0 e" @click="switchPw">
                                    <div class="btn btn-secondary" v-if="!toggle.pwInspect">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                            <path d="M22.9543 9.75714C22.0786 7.62202 20.5515 5.77223 18.5612 4.43571L22.2336 1.00714L21.1526 0L0.766362 18.9929L1.84739 20L5.7575 16.3643C7.50281 17.312 9.48018 17.826 11.5 17.8571C13.999 17.7696 16.4157 17.0017 18.4514 15.6485C20.4871 14.2953 22.0526 12.416 22.9543 10.2429C23.0152 10.0859 23.0152 9.91408 22.9543 9.75714ZM11.5 14.6429C10.4432 14.6424 9.41426 14.327 8.56358 13.7429L9.96662 12.45C10.5484 12.747 11.2178 12.8602 11.8745 12.7727C12.5312 12.6852 13.1397 12.4016 13.6088 11.9646C14.0778 11.5276 14.3822 10.9607 14.4761 10.3489C14.57 9.7371 14.4485 9.11343 14.1297 8.57143L15.5174 7.27857C16.0576 7.96971 16.382 8.78654 16.4549 9.63876C16.5279 10.491 16.3464 11.3454 15.9307 12.1075C15.5149 12.8696 14.881 13.5098 14.0991 13.9573C13.3171 14.4047 12.4176 14.642 11.5 14.6429ZM2.70608 14.15L6.53953 10.5786C6.51959 10.3863 6.51191 10.1931 6.51653 10C6.51855 8.76922 7.04425 7.58939 7.97839 6.71909C8.91253 5.8488 10.1789 5.35903 11.5 5.35714C11.7025 5.35814 11.9047 5.37007 12.1057 5.39286L15.0038 2.7C13.8758 2.33908 12.6926 2.15092 11.5 2.14286C9.00099 2.23041 6.58429 2.99825 4.54859 4.35149C2.51289 5.70473 0.947424 7.58403 0.0456751 9.75714C-0.015225 9.91408 -0.015225 10.0859 0.0456751 10.2429C0.634512 11.7019 1.5402 13.032 2.70608 14.15Z" fill="black" />
                                        </svg>
                                    </div>
                                    <div class="btn btn-secondary" v-else>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="black" />
                                            <path d="M23.205 11.745C22.3229 9.46324 20.7915 7.48996 18.8001 6.06906C16.8088 4.64817 14.4447 3.84193 12 3.75C9.55544 3.84193 7.19134 4.64817 5.19995 6.06906C3.20856 7.48996 1.67717 9.46324 0.795047 11.745C0.735473 11.9098 0.735473 12.0902 0.795047 12.255C1.67717 14.5368 3.20856 16.51 5.19995 17.9309C7.19134 19.3518 9.55544 20.1581 12 20.25C14.4447 20.1581 16.8088 19.3518 18.8001 17.9309C20.7915 16.51 22.3229 14.5368 23.205 12.255C23.2646 12.0902 23.2646 11.9098 23.205 11.745ZM12 16.875C11.0359 16.875 10.0933 16.5891 9.29164 16.0534C8.48995 15.5177 7.86511 14.7564 7.49614 13.8656C7.12716 12.9748 7.03062 11.9946 7.21872 11.0489C7.40682 10.1033 7.87112 9.23464 8.5529 8.55285C9.23468 7.87107 10.1033 7.40677 11.049 7.21867C11.9946 7.03057 12.9748 7.12711 13.8656 7.49609C14.7564 7.86506 15.5178 8.48991 16.0535 9.2916C16.5891 10.0933 16.875 11.0358 16.875 12C16.8731 13.2923 16.3588 14.5311 15.445 15.445C14.5312 16.3588 13.2924 16.873 12 16.875Z" fill="black" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="my-3 ms-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" <?php if(isset($_COOKIE['gmail']) && isset($_COOKIE['pw'])) { ?> checked <?php }?>>
                                    <label class="form-check-label" for="exampleCheck1">Keep me login next time</label>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="reset" class="btn btn-secondary me-2 my-4">
                                    Reset
                                </button>
                                <button type="submit" name="login" class="btn btn-self my-4">
                                    Log in
                                </button>
                            </div>

                            <hr class="m-2 p-0">
                            <div class="text-center txt-xm">
                                Doesnt Have Account ?
                                <a href=""><span @click.prevent="toggle.form = !toggle.form">Start here</span></a>
                            </div>
                            <div class="info-error mt-2">
                                <?php
                                if ($error) {
                                ?>
                                    <ul>
                                        <?php echo $error ?>
                                    </ul>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="info-succes mt-2">
                                <?php
                                if ($succes) {
                                ?>
                                    <ul>
                                        <?php echo $succes ?>
                                    </ul>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- register -->
            <div v-else class="col-lg-3 col-12 col-md-8 offset-md-4 offset-lg-0 login" name="register">
                <div class="container pt-5 pb-3 text-center">
                    <h6 style="font-size: 48px;">Diora</h6>
                    <div class="txt-sm">Register</div>
                </div>
                <div class="container">
                    <form action="" method="post">
                        <div class="my-3 text-start">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input v-model="dataInput.gmail" name="gmail" type="email" class="form-control" id="gmail" placeholder="" required>
                            <div class="form-text">Make sure you havent register with same email</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <div class="row">
                                <div class="col-10">
                                    <input v-model="dataInput.password" name="password" type="password" class="form-control" id="password" placeholder="" required>
                                    <div class="form-text">I recomended you to use a strong password</div>
                                </div>
                                <div class="col-2 p-0 e" @click="switchPw">
                                    <div class="btn btn-secondary" v-if="!toggle.pwInspect">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                            <path d="M22.9543 9.75714C22.0786 7.62202 20.5515 5.77223 18.5612 4.43571L22.2336 1.00714L21.1526 0L0.766362 18.9929L1.84739 20L5.7575 16.3643C7.50281 17.312 9.48018 17.826 11.5 17.8571C13.999 17.7696 16.4157 17.0017 18.4514 15.6485C20.4871 14.2953 22.0526 12.416 22.9543 10.2429C23.0152 10.0859 23.0152 9.91408 22.9543 9.75714ZM11.5 14.6429C10.4432 14.6424 9.41426 14.327 8.56358 13.7429L9.96662 12.45C10.5484 12.747 11.2178 12.8602 11.8745 12.7727C12.5312 12.6852 13.1397 12.4016 13.6088 11.9646C14.0778 11.5276 14.3822 10.9607 14.4761 10.3489C14.57 9.7371 14.4485 9.11343 14.1297 8.57143L15.5174 7.27857C16.0576 7.96971 16.382 8.78654 16.4549 9.63876C16.5279 10.491 16.3464 11.3454 15.9307 12.1075C15.5149 12.8696 14.881 13.5098 14.0991 13.9573C13.3171 14.4047 12.4176 14.642 11.5 14.6429ZM2.70608 14.15L6.53953 10.5786C6.51959 10.3863 6.51191 10.1931 6.51653 10C6.51855 8.76922 7.04425 7.58939 7.97839 6.71909C8.91253 5.8488 10.1789 5.35903 11.5 5.35714C11.7025 5.35814 11.9047 5.37007 12.1057 5.39286L15.0038 2.7C13.8758 2.33908 12.6926 2.15092 11.5 2.14286C9.00099 2.23041 6.58429 2.99825 4.54859 4.35149C2.51289 5.70473 0.947424 7.58403 0.0456751 9.75714C-0.015225 9.91408 -0.015225 10.0859 0.0456751 10.2429C0.634512 11.7019 1.5402 13.032 2.70608 14.15Z" fill="black" />
                                        </svg>
                                    </div>
                                    <div class="btn btn-secondary" v-else>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="black" />
                                            <path d="M23.205 11.745C22.3229 9.46324 20.7915 7.48996 18.8001 6.06906C16.8088 4.64817 14.4447 3.84193 12 3.75C9.55544 3.84193 7.19134 4.64817 5.19995 6.06906C3.20856 7.48996 1.67717 9.46324 0.795047 11.745C0.735473 11.9098 0.735473 12.0902 0.795047 12.255C1.67717 14.5368 3.20856 16.51 5.19995 17.9309C7.19134 19.3518 9.55544 20.1581 12 20.25C14.4447 20.1581 16.8088 19.3518 18.8001 17.9309C20.7915 16.51 22.3229 14.5368 23.205 12.255C23.2646 12.0902 23.2646 11.9098 23.205 11.745ZM12 16.875C11.0359 16.875 10.0933 16.5891 9.29164 16.0534C8.48995 15.5177 7.86511 14.7564 7.49614 13.8656C7.12716 12.9748 7.03062 11.9946 7.21872 11.0489C7.40682 10.1033 7.87112 9.23464 8.5529 8.55285C9.23468 7.87107 10.1033 7.40677 11.049 7.21867C11.9946 7.03057 12.9748 7.12711 13.8656 7.49609C14.7564 7.86506 15.5178 8.48991 16.0535 9.2916C16.5891 10.0933 16.875 11.0358 16.875 12C16.8731 13.2923 16.3588 14.5311 15.445 15.445C14.5312 16.3588 13.2924 16.873 12 16.875Z" fill="black" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="reset" class="btn btn-secondary me-2 my-4">
                                    Reset
                                </button>
                                <button type="submit" name="cek" class="btn btn-self my-4">
                                    Register
                                </button>
                            </div>

                            <hr class="m-2 p-0">
                            <div class="text-center txt-xm">
                                Have Account ?
                                <a href=""><span @click.prevent="toggle.form = !toggle.form">Lets Begin !</span></a>
                            </div>
                            <div class="info-error mt-2">
                                <?php
                                if ($error) {
                                ?>
                                    <ul>
                                        <?php echo $error ?>
                                    </ul>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-8 col-lg-8 position-relative right-side">
                <div class="position-absolute translate-middle top-50 start-50">
                    <img style="width: 400px;" src="https://i.pinimg.com/originals/e4/e0/76/e4e076c273b1234de3cd3337a07640a0.gif" alt="">
                </div>
            </div>
        </div>

    </header>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>


    <script>
        const app = Vue.createApp({
            data() {
                return {
                    toggle: {
                        pwInspect: false,
                        form: true,
                    },
                    dataInput: {
                        password: "",
                        gmail: "",
                    }
                }

            },
            methods: {

                switchPw() {
                    this.toggle.pwInspect = !this.toggle.pwInspect;
                    if (this.toggle.pwInspect) {
                        document.getElementById("password").setAttribute("type", "text");
                    }
                    if (this.toggle.pwInspect == false) {
                        document.getElementById("password").setAttribute("type", "password");
                    }
                },
                testApidb() {
                    const url = "db/user.php";
                    axios.get(url, {
                            params: {

                            }
                        })
                        .then(Response => console.log(Response))
                        .catch(error => console.log(error))
                },

            },
            mounted: function() {
                this.testApid;
            }
        })
        app.mount("#app");
    </script>

    <?php


    ?>




</body>

</html>