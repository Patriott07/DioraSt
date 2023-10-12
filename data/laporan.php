<?php
include "../inc/inc_konek.php";

if (isset($_GET['idTran'])) {
    $idTran = $_GET['idTran']; //berupa data hash yang didapat dri postTransaksi
    $key = "Diora12345678901"; //sama
    // $id = $idTran;//decrypt($idTran, $key); //kosong
    $id = openssl_decrypt($idTran, 'AES-128-CBC', $key, 0, $key);
    // $id_transaksi_baru = openssl_encrypt($id_transaksi_baru,'AES-128-CBC',$key,0,$key);

    $sql1 = "SELECT transaksi.*, produk.*, user.id, user.username,user.img from produk,transaksi,user where transaksi.id_user = user.id AND transaksi.id_produk = produk.id_produk AND transaksi.id = $id";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $r1 = mysqli_fetch_assoc($q1);
    }
    // var_dump($id);



}

// Fungsi untuk mendekripsi teks
// function decrypt($data, $key)
// {
//     $cipher = "aes-256-cbc";
//     $options = OPENSSL_RAW_DATA;
//     $data = base64_decode($data);
//     $iv_length = openssl_cipher_iv_length($cipher);
//     $iv = substr($data, 0, $iv_length);
//     $data = substr($data, $iv_length);
//     $decrypted = openssl_decrypt($data, $cipher, $key, $options, $iv);
//     return $decrypted;
// }

function decrypt($data, $key)
{
    $cipher = "aes-256-cbc";
    $options = OPENSSL_RAW_DATA;
    $data = base64_decode($data);
    $iv_length = openssl_cipher_iv_length($cipher);
    $iv = substr($data, 0, $iv_length);
    $data = substr($data, $iv_length);
    $decrypted = openssl_decrypt($data, $cipher, $key, $options, $iv);
    return $decrypted;
}

function encrypt($data, $key)
{
    $cipher = "aes-256-cbc";
    $options = OPENSSL_RAW_DATA;
    $iv_length = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($iv_length);
    $encrypted = openssl_encrypt($data, $cipher, $key, $options, $iv);
    $result = base64_encode($iv . $encrypted);
    return $result;
}


// Contoh penggunaan





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    ?>
    <div class="container col-10 offset-1 my-5" id="content">

        <img style="max-width: 40px; border-radius: 50%" src="<?php echo $r1['img'] ?>" alt="">
        <span class="pt-5 txt-sm ms-2">Account : <?php echo $r1['username'] ?> </span> |
        <span class="pt-5 txt-sm ">Penerima : <?php echo $r1['penerima'] ?> </span>

        <div class="form-text">
            <div class="txt-xm mt-2">
                <span>Tanggal :</span> <span><?php echo $date ?></span>
            </div>
            <div class="txt-xm mt-1">
                <span>Alamat :</span> <span><?php echo $r1['alamat'] ?></span>
            </div>
            <div class="txt-xm mt-1">
                <span>Will arrive at :</span> <span> <?php echo $arrive ?></span>
            </div>
        </div>

        <div class="row align-items-end mt-3 text-start">
            <div class="col-6 text-end">
                <img src="<?php echo $r1['image'] ?>" class="img-produk mx-auto img-fluid" />
            </div>
            <div class="col-6">
                <div class="mt-3" style="font-size: 24px;"><?php echo $r1['name'] ?></div>
                <div class="mt-2">
                    <?php
                    $data = explode(",", $r1['title_span']);
                    foreach ($data as $span) {
                    ?>
                        <span class="badge"><?php echo $span ?></span>
                    <?php
                    }
                    ?>
                </div>
                <div class="" style="font-size: 20px;">Rp.<?php echo $r1['price'] ?></div>
            </div>
        </div>


        <div class="text-center col-8 offset-2 my-5">
            <div class="form-text mt-3"><?php echo $r1['deskripsi'] ?></div>
            <span class="badge px-4 py-2 mt-3">Thanks for trusting us, see later</span>
            <a href="../index.php" id="guide2"><span class="badge px-4 py-2 mt-3">Back to mainpage</span></a>
            <div class="form-text" id="guide">Jika tidak terdonwload struk berupa pdf, silahkan screenshot</div>
        </div>
    </div>

    <script>
        window.print();
    </script>

    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-4aee57b7-06c9-405f-a631-d943b6743d18"></div>
</body>

</html>