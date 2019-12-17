<?php
$brand = 'Dekhor';
$title = 'DekHor เว็บแอพลิเคชั่นจดบันทึกรายรับ-รายจ่ายสำหรับเด็กหอ';
$dirurl = 'http://localhost/dekhor';
$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbtable = 'dekhor';

//encrypt password  with openssl
$encrypt_method = "AES-256-CBC";
$secret_key = 'qm].BF=>:)mr63*G';
$secret_iv = 'YY6<L$C]eL6TxzY#';
// hash
$key = hash('sha256', $secret_key);
// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
$iv = substr(hash('sha256', $secret_iv), 0, 16);
