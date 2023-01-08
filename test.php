<?php
require_once './vendor/autoload.php';

use Tuhin18003\SimPhpEnDecrypt\Builder;

$res = Builder::encrypt('test sdfsdf');

print_r( $res );

echo Builder::decrypt( $res['cipher'], $res['key'] );

?>