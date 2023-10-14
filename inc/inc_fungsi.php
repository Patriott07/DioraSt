<?php

function ssl_encrypt($data,$pass = 'sslopen123456789'){
    $file = openssl_encrypt($data,'AES-128-CBC',$pass,0,$pass);
    return $file;
}

function ssl_decrypt($data,$pass = 'sslopen123456789'){
    $file = openssl_decrypt($data,'AES-128-CBC',$pass,0,$pass);
    return $file;
}

?>