<?php
require_once './vendor/autoload.php';

use Tuhin18003\SimPhpEnDecrypt\Builder;

$string = "Simpler PHP Encrypt & Decrypt";

$res = Builder::encrypt( $string );

// print_r( $res );

// echo Builder::decrypt( $res['cipher'], $res['key'] );

echo $encryptedToken = Builder::getEncryptedToken( $string );
echo "<br>";
echo Builder::getDecryptedToken( $encryptedToken );



?>