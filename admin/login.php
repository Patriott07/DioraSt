<?php
 include "../inc/inc_konek.php";
 session_start();
 if(isset($_POST['login'])){
    $email = $_POST['username'];
    $pw   = $_POST['password'];


    echo "oke";
    $sql1 = "select * from admin where gmail = '$email' AND password = '$pw'";
    $q1  = mysqli_query($koneksi,$sql1);
    $r1  = mysqli_fetch_assoc($q1);
    if(mysqli_num_rows($q1)>0){
        $_SESSION['id'] = $r1['id'];
        header("Location:index.php");
    }
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baumans&family=Bebas+Neue&family=Flamenco&family=Inter&family=Italiana&family=Josefin+Sans&family=Margarine&family=Martian+Mono&family=Megrim&family=Roboto+Mono:wght@500&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- bosstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin.css">
</head>
<style>
    /* header {
        height: 100vh;
        background-color: black;
    }

    .button-log {
        background-color: black;
        color: black;
    } */
</style>

<body>
    <header class="postion-relative" id="app">
        <span data-bs-toggle="modal" data-bs-target="#exampleModal"
            class="position-absolute top-50 start-50 button-log">
            click me
        </span>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Admin Log in Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">email:</label>
                                <input name="username" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Password:</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="login" class="btn btn-primary" data-bs-dismiss="modal">Log in Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>

    <script>
        const app = Vue.createApp({
            data() {
                return {

                }
            },
            methods: {
                getProduk(parent,req,key){
                    // to show all keep parameter null
                    const url = "../db/getProduk.php";

                    axios.get(url, {
                        params : {
                            
                        }
                    })
                }
            }
        })

        app.mount("#app");
    </script>
</body>

</html>