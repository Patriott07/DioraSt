<?php
$urlProd = "https://images.unsplash.com/photo-1627841898714-bfd02f07207d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODR8fHBhbnRzJTIwc2hvcnR8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60"
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

    </style>
</head>

<body>
    <div class="container col-10 offset-1 my-5" id="content">
        
        <img style="width: 50px; border-radius: 50px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOH2aZnIHWjMQj2lQUOWIL2f4Hljgab0ecZQ&usqp=CAU" alt="">
        <span class="pt-5 txt-sm ms-2">Patriot Abdi Nuruzzaki

            <div class="form-text">
                <div class="txt-xm mt-2">
                    <span>Tanggal :</span> <span>17 agustus 1890</span>
                </div>
                <div class="txt-xm mt-1">
                    <span>Alamat :</span> <span>Penggung utara timur</span>
                </div>
                <div class="txt-xm mt-1">
                    <span>Will arrive at :</span> <span>20 agustus 1890</span>
                </div>
            </div>

            <div class="row align-items-end mt-3 text-start">
                <div class="col-6 text-end">
                    <img src="<?php echo $urlProd ?>" class="img-produk mx-auto img-fluid"/>
                </div>
                <div class="col-6">
                <div class="mt-3" style="font-size: 24px;">Name Produk</div>
                <div class="mt-2">
                    <span class="badge">Fit</span>
                    <span class="badge">Expensive</span>
                    <span class="badge">Comfortable</span>
                </div>
                <div class="" style="font-size: 20px;">Rp.7596940</div>
                </div>
            </div>


            <div class="text-center col-10 offset-1 my-5">
                <div class="form-text mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, cum dolorum? Commodi reprehenderit perferendis voluptate, quos iste quas, vero placeat ad quod, fuga quisquam maxime ipsa? Quae eos neque totam!</div>
                <span class="badge px-4 py-2 mt-3">Thanks for trusting us, see later</span>
            </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>