<?php

function ssl_encrypt($data,$pass = 'sslopen123456789'){
    $file = openssl_encrypt($data,'AES-128-CBC',$pass,0,$pass);
    return $file;
}

function ssl_decrypt($data,$valOut = "string",$pass = 'sslopen123456789'){
    if($valOut == "int"){
        $file = openssl_decrypt($data,'AES-128-CBC',$pass,0,$pass);
        $file  = intval($file);
        return $file;
    }else{
        $file = openssl_decrypt($data,'AES-128-CBC',$pass,0,$pass);
        return $file;
    }
}

function setHeader($locate){
    header("Location:$locate");
}

?>