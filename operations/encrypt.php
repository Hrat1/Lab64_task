<?php
function encrypt($string)
{
    $ciphering = "AES-256-CBC";
    $options = 0;
    $encryption_iv = '1234567891011121';
    $key = md5("HratTahmazyan");
    $string = openssl_encrypt($string, $ciphering, $key, $options, $encryption_iv);
    return $string;
}

function decrypt($string)
{
    $encryption_iv = '1234567891011121';
    $ciphering = "AES-256-CBC";
    $options = 0;
    $key = md5("HratTahmazyan");

    $string = openssl_decrypt($string, $ciphering, $key, $options, $encryption_iv);
    return $string;
}